<?php
/**
 * Menus configuration.
 *
 * @package Woods
 */

add_action( 'after_setup_theme', 'woods_register_menus', 5 );
function woods_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'woods' ),
		//'footer' => esc_html__( 'Footer', 'woods' ),
		'social' => esc_html__( 'Social', 'woods' ),
	) );
}
