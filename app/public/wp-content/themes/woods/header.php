<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Woods
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php woods_body_open(); ?>
<?php do_action( 'woods-theme/site/page-start' ); ?>
<?php woods_get_page_preloader(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'woods' ); ?></a>
	<header id="masthead" <?php echo woods_get_container_classes( 'site-header' ); ?>>
		<?php woods_theme()->do_location( 'header', 'template-parts/header' ); ?>
	</header><!-- #masthead -->
	<?php do_action( 'woods-theme/site/breadcrumbs-area' ); ?>
	<div id="content" <?php echo woods_get_container_classes( 'site-content' ); ?>>
