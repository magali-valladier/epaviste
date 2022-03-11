<?php
/**
 * Template part for breadcrumbs.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Woods
 */

$breadcrumbs_visibillity = woods_theme()->customizer->get_value( 'breadcrumbs_visibillity' );
$breadcrumbs_visibillity = apply_filters( 'woods-theme/breadcrumbs/breadcrumbs-visibillity', $breadcrumbs_visibillity );

if ( ! $breadcrumbs_visibillity ) {
	return;
}

$breadcrumbs_front_visibillity = woods_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' );

if ( ! $breadcrumbs_front_visibillity && is_front_page() ) {
	return;
}

do_action( 'woods-theme/breadcrumbs/breadcrumbs-before-render' );

?><div <?php echo woods_get_container_classes( 'site-breadcrumbs' ); ?>>
	<div <?php woods_breadcrumbs_class(); ?>>
		<?php do_action( 'woods-theme/breadcrumbs/before' ); ?>
		<?php do_action( 'cx_breadcrumbs/render' ); ?>
		<?php do_action( 'woods-theme/breadcrumbs/after' ); ?>
	</div>
</div><?php

do_action( 'woods-theme/breadcrumbs/breadcrumbs-after-render' );
