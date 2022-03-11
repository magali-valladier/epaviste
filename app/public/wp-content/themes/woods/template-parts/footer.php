<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Woods
 */
?>

<?php do_action( 'woods-theme/widget-area/render', 'footer-area' ); ?>

<div <?php woods_footer_class(); ?>>
	<div class="space-between-content"><?php
		woods_footer_copyright();
		woods_social_list( 'footer' );
	?></div>
</div><!-- .container -->
