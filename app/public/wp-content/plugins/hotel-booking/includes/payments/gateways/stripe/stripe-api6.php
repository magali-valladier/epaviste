<?php

namespace MPHB\Payments\Gateways\Stripe;

use Stripe\PaymentIntent;
use Stripe\Source;
use Stripe\Stripe;

class StripeAPI6
{
    protected static $loaderRegistered = false;

    protected $secretKey = '';

    public function __construct($gatewaySettings)
    {
        $this->secretKey = $gatewaySettings['secret_key'];

        $this->registerLoader();
    }

    protected function registerLoader()
    {
        if (self::$loaderRegistered) {
            return;
        }

        // Use autoloader instead of requiring all 120+ files each time
        spl_autoload_register(function ($className) {
            // "Stripe\Checkout\Session"
            $className = ltrim($className, '\\');

            if (strpos($className, 'Stripe') !== 0) {
                return false;
            }

            // "lib\Checkout\Session"
            $pluginFile = str_replace('Stripe\\', 'lib\\', $className);
            // "lib/Checkout/Session"
            $pluginFile = str_replace('\\', DIRECTORY_SEPARATOR, $pluginFile);
            // "lib/Checkout/Session.php"
            $pluginFile .= '.php';
            // ".../vendors/stripe-api/lib/Checkout/Session.php"
            $pluginFile = MPHB()->getPluginPath('vendors/stripe-api/') . $pluginFile;

            if (file_exists($pluginFile)) {
                require $pluginFile;
                return true;
            } else {
                return false;
            }
        });

        self::$loaderRegistered = true;
    }

    /**
     * See also convertToSmallestUnit() in stripe-gateway.js.
     *
     * @param float $amount
     * @param string $currency
     * @return int
     */
    public function convertToSmallestUnit($amount, $currency = null)
    {
        if (is_null($currency)) {
            $currency = MPHB()->settings()->currency()->getCurrencyCode();
        }

        // See all currencies presented as links on page
        // https://stripe.com/docs/currencies#presentment-currencies
        switch (strtoupper($currency)) {
            // Zero decimal currencies
            case 'BIF':
            case 'CLP':
            case 'DJF':
            case 'GNF':
            case 'JPY':
            case 'KMF':
            case 'KRW':
            case 'MGA':
            case 'PYG':
            case 'RWF':
            case 'UGX':
            case 'VND':
            case 'VUV':
            case 'XAF':
            case 'XOF':
            case 'XPF':
                $amount = absint($amount);
                break;
            default:
                $amount = round($amount, 2) * 100; // In cents
                break;
        }

        return (int)$amount;
    }

    /**
     * @param string $currency
     * @return float
     */
    public function getMinimumAmount($currency)
    {
        // See https://stripe.com/docs/currencies#minimum-and-maximum-charge-amounts
        switch (strtoupper($currency)) {
            case 'USD':
            case 'AUD':
            case 'BRL':
            case 'CAD':
            case 'CHF':
            case 'EUR':
            case 'NZD':
            case 'SGD': $minimumAmount = 0.50; break;

            case 'DKK': $minimumAmount = 2.50; break;
            case 'GBP': $minimumAmount = 0.30; break;
            case 'HKD': $minimumAmount = 4.00; break;
            case 'JPY': $minimumAmount = 50.00; break;
            case 'MXN': $minimumAmount = 10.00; break;

            case 'NOK':
            case 'SEK': $minimumAmount = 3.00; break;

            default:    $minimumAmount = 0.50; break;
        }

        return $minimumAmount;
    }

    /**
     * Checks Stripe minimum amount value authorized per currency.
     *
     * @param float $amount
     * @param string $currency
     * @return bool
     */
    public function checkMinimumAmount($amount, $currency)
    {
        $currentAmount = $this->convertToSmallestUnit($amount, $currency);
        $minimumAmount = $this->convertToSmallestUnit($this->getMinimumAmount($currency), $currency);
        return $currentAmount >= $minimumAmount;
    }

    public function setApp()
    {
        Stripe::setAppInfo(MPHB()->getName(), MPHB()->getVersion(), MPHB()->getPluginStoreUri());
        return $this;
    }

    /**
     * @param float $amount
     * @param string $description
     * @param string $currency
     * @return \Stripe\PaymentIntent|\WP_Error
     */
    public function createPaymentIntent($amount, $description = '', $currency = null)
    {
        if (is_null($currency)) {
            $currency = MPHB()->settings()->currency()->getCurrencyCode();
        }

        Stripe::setApiKey($this->secretKey);

        try {
            $requestArgs = array(
                'amount'               => $this->convertToSmallestUnit($amount, $currency),
                'currency'             => strtolower($currency),
                'payment_method_types' => array('card')
            );

            if (!empty($description)) {
                $requestArgs['description'] = $description;
            }

            // See details in https://stripe.com/docs/api/payment_intents/create
            $paymentIntent = PaymentIntent::create($requestArgs);

            return $paymentIntent;
        } catch (\Exception $e) {
            return new \WP_Error('stripe_api_error', $e->getMessage());
        }
    }

    public function retrievePaymentIntent($paymentIntentId)
    {
        Stripe::setApiKey($this->secretKey);
        return PaymentIntent::retrieve($paymentIntentId);
    }

    public function retrieveSource($sourceId)
    {
        Stripe::setApiKey($this->secretKey);
        return Source::retrieve($sourceId);
    }
}
