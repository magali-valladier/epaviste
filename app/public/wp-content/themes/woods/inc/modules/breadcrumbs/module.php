<?php
/**
 * Breadcrumbs module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Woods_Breadcrumbs_Module' ) ) {

	/**
	 * Define Woods_Breadcrumbs_Module class
	 */
	class Woods_Breadcrumbs_Module extends Woods_Module_Base {

		/**
		 * Holder for current Breadcrumbs module instance.
		 *
		 * @since 1.0.0
		 * @var   CX_Dynamic_CSS
		 */
		public $breadcrumbs = null;

		/**
		 * Module ID
		 *
		 * @return string
		 */
		public function module_id() {
			return 'breadcrumbs';
		}

		/**
		 * Module actions
		 *
		 * @return void
		 */
		public function actions() {
			add_action( 'wp_head',           array( $this, 'init_breadcrumbs' ) );
			add_action( 'after_setup_theme', array( $this, 'add_meta_options' ), 6 );

			add_action( 'woods-theme/site/breadcrumbs-area', array( $this, 'print_breadcrumbs_area' ) );
		}

		/**
		 * Module filters
		 *
		 * @return void
		 */
		public function filters() {
			// Customizer options
			add_filter( 'woods-theme/customizer/options', array( $this, 'add_customizer_options' ) );

			// Breadcrumbs visibility on specific page/post
			add_filter( 'woods-theme/breadcrumbs/breadcrumbs-visibillity', array( $this, 'breadcrumbs_visibility' ) );
		}

		/**
		 * Run initialization of breadcrumbs.
		 *
		 * @since 1.0.0
		 */
		public function init_breadcrumbs() {
			$this->breadcrumbs = new CX_Breadcrumbs( $this->get_breadcrumbs_options() );
		}

		/**
		 * Add breadcrumbs options to the customizer
		 *
		 * @param array $options
		 *
		 * @return array
		 */
		public function add_customizer_options( $options = array() ) {

			$breadcrumbs_options = array(
				/** `Breadcrumbs` section */
				'breadcrumbs' => array(
					'title'    => esc_html__( 'Breadcrumbs', 'woods' ),
					'priority' => 30,
					'type'     => 'section',
					'panel'    => 'general_settings',
				),
				'breadcrumbs_visibillity' => array(
					'title'   => esc_html__( 'Enable Breadcrumbs', 'woods' ),
					'section' => 'breadcrumbs',
					'default' => true,
					'field'   => 'checkbox',
					'type'    => 'control',
				),
				'breadcrumbs_front_visibillity' => array(
					'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'woods' ),
					'section' => 'breadcrumbs',
					'default' => false,
					'field'   => 'checkbox',
					'type'    => 'control',
				),
				'breadcrumbs_page_title' => array(
					'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'woods' ),
					'section' => 'breadcrumbs',
					'default' => false,
					'field'   => 'checkbox',
					'type'    => 'control',
				),
				'breadcrumbs_path_type' => array(
					'title'   => esc_html__( 'Show full/minified path', 'woods' ),
					'section' => 'breadcrumbs',
					'default' => 'minified',
					'field'   => 'select',
					'choices' => array(
						'full'     => esc_html__( 'Full', 'woods' ),
						'minified' => esc_html__( 'Minified', 'woods' ),
					),
					'type'    => 'control',
				),
			);

			$options['options'] = array_merge( $options['options'], $breadcrumbs_options );

			unset( $options['options']['breadcrumbs_typography']['active_callback'] );
			//$options['options']['breadcrumbs_typography']['active_callback'] = '__true';

			return $options;
		}

		/**
		 * Retrieve a holder for breadcrumbs options.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public function get_breadcrumbs_options() {
			/**
			 * Filter a holder for breadcrumbs options.
			 *
			 * @since 1.0.0
			 */
			return apply_filters( 'woods-theme/breadcrumbs/options' , array(
				'show_browse'       => false,
				'show_on_front'     => woods_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' ),
				'show_title'        => woods_theme()->customizer->get_value( 'breadcrumbs_page_title' ),
				'path_type'         => woods_theme()->customizer->get_value( 'breadcrumbs_path_type' ),
				'css_namespace'     => array(
					'module'    => 'breadcrumbs',
					'content'   => 'breadcrumbs_content',
					'wrap'      => 'breadcrumbs_wrap',
					'browse'    => 'breadcrumbs_browse',
					'item'      => 'breadcrumbs_item',
					'separator' => 'breadcrumbs_item_sep',
					'link'      => 'breadcrumbs_item_link',
					'target'    => 'breadcrumbs_item_target',
				),
			) );
		}

		/**
		 * Print Breadcrumbs area.
		 */
		public function print_breadcrumbs_area() {
			get_template_part( 'inc/modules/breadcrumbs/template-parts/breadcrumbs' );
		}

		/**
		 * Add meta options
		 */
		public function add_meta_options() {
			woods_post_meta()->add_options( array(
				'id'            => 'woods-extra-page-settings',
				'title'         => esc_html__( 'Page Settings', 'woods' ),
				'page'          => array( 'page', 'post' ),
				'context'       => 'normal',
				'priority'      => 'high',
				'callback_args' => false,
				'fields'        => array(
					'woods_extra_enable_breadcrumbs' => array(
						'type'        => 'select',
						'title'       => esc_html__( 'Use Breadcrumbs', 'woods' ),
						'description' => esc_html__( 'Enable Breadcrumbs global settings redefining.', 'woods' ),
						'value'       => 'inherit',
						'options'     => array(
							'inherit' => esc_html__( 'Inherit', 'woods' ),
							'true'    => esc_html__( 'Enable', 'woods' ),
							'false'   => esc_html__( 'Disable', 'woods' ),
						),
					),
				),
			) );
		}

		/**
		 * Breadcrumbs visibility on specific page/post
		 *
		 * @param $visibility
		 *
		 * @return bool
		 */
		public function breadcrumbs_visibility( $visibility ) {
			$post_id = get_the_ID();

			$meta_value = get_post_meta( $post_id, 'woods_extra_enable_breadcrumbs', true );

			if ( ! $meta_value || 'inherit' === $meta_value ) {
				return $visibility;
			}

			return filter_var( $meta_value, FILTER_VALIDATE_BOOLEAN );
		}
	}

}
