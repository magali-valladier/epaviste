<?php
/**
 * Theme Customizer.
 *
 * @package Woods
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */

function woods_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'woods-theme/customizer/options' , array(
		'prefix'        => 'woods',
		'path'          => get_theme_file_path( 'framework/modules/customizer/' ),
		'capability'    => 'edit_theme_options',
		'type'          => 'theme_mod',
		'fonts_manager' => new CX_Fonts_Manager(),
		'options'       => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline on top panel', 'woods' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'woods' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'woods' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Favicon` section */
			'favicon' => array(
				'title'       => esc_html__( 'Favicon', 'woods' ),
				'priority'    => 10,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'woods' ),
				'priority' => 40,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'woods' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'woods' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'woods' ),
				'priority' => 20,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'container_type' => array(
				'title'   => esc_html__( 'Container type', 'woods' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'woods' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'woods' ),
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'woods' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),
			'show_page_title' => array(
				'title'    => esc_html__( 'Show Page Title', 'woods' ),
				'section'  => 'page_layout',
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/** `ToTop button` section */
			'totop_button' => array(
				'title'    => esc_html__( 'ToTop button', 'woods' ),
				'priority' => 60,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),

			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'woods' ),
				'section'  => 'totop_button',
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_vertical_padding' => array(
				'title'       => esc_html__( 'Vertical Padding, px', 'woods' ),
				'section'     => 'totop_button',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'type' => 'control',
				'active_callback' => 'woods_is_totop_enable',
			),

			'totop_horizontal_padding' => array(
				'title'       => esc_html__( 'Horizontal Padding, px', 'woods' ),
				'section'     => 'totop_button',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'type' => 'control',
				'active_callback' => 'woods_is_totop_enable',
			),

			'totop_border_radius' => array(
				'title'   => esc_html__( 'Border Radius, px', 'woods' ),
				'section' => 'totop_button',
				'default' => '0',
				'field'   => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
				'active_callback' => 'woods_is_totop_enable',
			),

			'totop_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'woods' ),
				'section' => 'totop_button',
				'default' => false,
				'field'   => 'hex_color',
				'type'    => 'control',
				'active_callback' => 'woods_is_totop_enable',
			),

			'totop_icon_color' => array(
				'title'   => esc_html__( 'Icon Color', 'woods' ),
				'section' => 'totop_button',
				'default' => false,
				'field'   => 'hex_color',
				'type'    => 'control',
				'active_callback' => 'woods_is_totop_enable',
			),

			'totop_bg_color_hover' => array(
				'title'   => esc_html__( 'Background Color Hover', 'woods' ),
				'section' => 'totop_button',
				'default' => false,
				'field'   => 'hex_color',
				'type'    => 'control',
				'active_callback' => 'woods_is_totop_enable',
			),

			'totop_icon_color_hover' => array(
				'title'   => esc_html__( 'Icon Color Hover', 'woods' ),
				'section' => 'totop_button',
				'default' => false,
				'field'   => 'hex_color',
				'type'    => 'control',
				'active_callback' => 'woods_is_totop_enable',
			),

			/* Booking styles */

			'booking_styles' => array(
				'title'       => esc_html__( 'Booking styles', 'woods' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Colors  */

			'mphb_colors_variables' => array(
				'title'       => esc_html__( 'Colors', 'woods' ),
				'priority'    => 25,
				'panel'       => 'booking_styles',
				'type'        => 'section',
			),
			'mphb_bg_accent_color' => array(
			    'title'   => esc_html__( 'Background colors', 'woods' ),
				'description'   => esc_html__( 'Accent', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_bg_accent_color2' => array(
				'description'   => esc_html__( 'Accent 2', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#162541',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_bg_primary_color' => array(
				'description'   => esc_html__( 'Primary', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_bg_secondary_color' => array(
				'description'   => esc_html__( 'Secondary', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#f5f5f5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_accent_color' => array(
				'title'   => esc_html__( 'Text color', 'woods' ),
				'description'   => esc_html__( 'Accent', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',

			),
			'mphb_txt_accent_color2' => array(
				'description'   => esc_html__( 'Accent 2', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_primary_color' => array(
				'description'   => esc_html__( 'Primary', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#7f7d8e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_secondary_color' => array(
				'description'   => esc_html__( 'Secondary', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#b0aebe',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_secondary_color2' => array(
				'description'   => esc_html__( 'Secondary 2', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#b0aebe',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_invert_color' => array(
				'description'   => esc_html__( 'Invert', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_link_color' => array(
				'description'   => esc_html__( 'Link', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_link_hover_color' => array(
				'description'   => esc_html__( 'Link Hover', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_button_bg' => array(
				'description'   => esc_html__( 'Button', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_button_bg_invert' => array(
				'description'   => esc_html__( 'Invert Button', 'woods' ),
				'section' => 'mphb_colors_variables',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography  */

			'mphb_typography' => array(
				'title'       => esc_html__( 'Typography', 'woods' ),
				'priority'    => 25,
				'panel'       => 'booking_styles',
				'type'        => 'section',
			),


			/*           Body text                  */


			'mphb_bt_font_family' => array(
				'title'   => esc_html__( 'Body text', 'woods' ),
				'description' => esc_html__( 'Font Family', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_bt_font_style' => array(
				'description' => esc_html__( 'Font Style', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_bt_font-weight' => array(
				'description' => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_bt_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '15',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_bt_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_bt_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_bt_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'woods' ),
                                'lowercase' => esc_html__( 'lowercase', 'woods' ),
                                'uppercase' => esc_html__( 'uppercase', 'woods' ),
                                'none' => esc_html__( 'none', 'woods' ),
                            ),
				'type'    => 'control',
			),


			/*           entry title                  */


			'mphb_et_font_family' => array(
				'title'   => esc_html__( 'Entry title', 'woods' ),
				'description' => esc_html__( 'Font Family', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_et_font_style' => array(
				'description' => esc_html__( 'Font Style', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_et_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_et_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '70',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_et_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_et_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '-1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_et_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'woods' ),
                                'lowercase' => esc_html__( 'lowercase', 'woods' ),
                                'uppercase' => esc_html__( 'uppercase', 'woods' ),
                                'none' => esc_html__( 'none', 'woods' ),
                            ),
				'type'    => 'control',
			),


			/*           title                  */


			'mphb_title_font_family' => array(
				'title'   => esc_html__( 'Title', 'woods' ),
				'description' => esc_html__( 'Font Family', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_title_font_style' => array(
				'description' => esc_html__( 'Font Style', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_title_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_title_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_title_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_title_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '-0.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_title_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'woods' ),
                                'lowercase' => esc_html__( 'lowercase', 'woods' ),
                                'uppercase' => esc_html__( 'uppercase', 'woods' ),
                                'none' => esc_html__( 'none', 'woods' ),
                            ),
				'type'    => 'control',
			),


			/*           subtitle                  */


			'mphb_st_font_family' => array(
				'title'   => esc_html__( 'Subtitle', 'woods' ),
				'description' => esc_html__( 'Font Family', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_st_font_style' => array(
				'description' => esc_html__( 'Font Style', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_st_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'mphb_typography',
				'default' => '900',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_st_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_st_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '1.667',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_st_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '0.96',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_st_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'woods' ),
                                'lowercase' => esc_html__( 'lowercase', 'woods' ),
                                'uppercase' => esc_html__( 'uppercase', 'woods' ),
                                'none' => esc_html__( 'none', 'woods' ),
                            ),
				'type'    => 'control',
			),


			/*           price                  */


			'mphb_price_font_family' => array(
				'title'   => esc_html__( 'Price', 'woods' ),
				'description' => esc_html__( 'Font Family', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_price_font_style' => array(
				'description' => esc_html__( 'Font Style', 'woods' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_price_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_price_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '15',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_price_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'woods' ),
				'section'     => 'mphb_typography',
				'default'     => '1.2667',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),

/*



----------- End Booking Styles -------------------------------------------------------------




 */

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'woods' ),
				'description' => esc_html__( 'Configure Color Scheme', 'woods' ),
				'priority'    => 40,
				'type'        => 'section',
			),

			'accent_color' => array(
				'title'   => esc_html__( 'Accent color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#398ffc',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'primary_text_color' => array(
				'title'   => esc_html__( 'Primary Text color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'secondary_text_color' => array(
				'title'   => esc_html__( 'Secondary Text color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#a1a2a4',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Invert Text color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_color' => array(
				'title'   => esc_html__( 'Link color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#398ffc',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'woods' ),
				'section' => 'color_scheme',
				'default' => '#3b3d42',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'woods' ),
				'description' => esc_html__( 'Configure typography settings', 'woods' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'woods' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'body_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'body_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'body_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'woods' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => woods_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'woods' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'h1_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'h1_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'h1_typography',
				'default'     => '56',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'h1_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'woods' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => woods_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'woods' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'h2_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'h2_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'h2_typography',
				'default'     => '40',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'h2_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'woods' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => woods_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'woods' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'h3_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'h3_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'h3_typography',
				'default'     => '28',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'h3_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'woods' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => woods_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'woods' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'h4_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'h4_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'h4_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'h4_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'woods' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => woods_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'woods' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'h5_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'h5_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'h5_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'h5_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'woods' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => woods_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'woods' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'h6_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'h6_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'h6_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'h6_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'woods' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => woods_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Logo text` section */
			'logo_typography' => array(
				'title'       => esc_html__( 'Logo text', 'woods' ),
				'priority'    => 40,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'woods' ),
				'section'         => 'logo_typography',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'woods' ),
				'section'         => 'logo_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => woods_get_font_styles(),
				'type'            => 'control',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'woods' ),
				'section'         => 'logo_typography',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => woods_get_font_weight(),
				'type'            => 'control',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'woods' ),
				'section'         => 'logo_typography',
				'default'         => '26',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'woods' ),
				'section'         => 'logo_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => woods_get_character_sets(),
				'type'            => 'control',
			),

			/** `Menu` section */
			'menu_typography' => array(
				'title'       => esc_html__( 'Menu', 'woods' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'menu_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'woods' ),
				'section'         => 'menu_typography',
				'default'         => 'Roboto, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'menu_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'woods' ),
				'section'         => 'menu_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => woods_get_font_styles(),
				'type'            => 'control',
			),
			'menu_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'woods' ),
				'section'         => 'menu_typography',
				'default'         => '400',
				'field'           => 'select',
				'choices'         => woods_get_font_weight(),
				'type'            => 'control',
			),
			'menu_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'woods' ),
				'section'         => 'menu_typography',
				'default'         => '14',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'menu_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'menu_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'menu_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'woods' ),
				'section'         => 'menu_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => woods_get_character_sets(),
				'type'            => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'           => esc_html__( 'Breadcrumbs', 'woods' ),
				'priority'        => 50,
				'panel'           => 'typography',
				'type'            => 'section',
				'active_callback' => '__false',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'woods' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'woods' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => woods_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'woods' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => woods_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'woods' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '11',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'woods' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => woods_get_character_sets(),
				'type'    => 'control',
			),
			/** `Button` section */
			'button_typography' => array(
				'title'       => esc_html__( 'Button', 'woods' ),
				'priority'    => 55,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'button_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'woods' ),
				'section'         => 'button_typography',
				'default'         => 'Roboto, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'button_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'woods' ),
				'section'         => 'button_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => woods_get_font_styles(),
				'type'            => 'control',
			),
			'button_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'woods' ),
				'section'         => 'button_typography',
				'default'         => '900',
				'field'           => 'select',
				'choices'         => woods_get_font_weight(),
				'type'            => 'control',
			),
			'button_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'woods' ),
				'section'         => 'button_typography',
				'default'         => '11',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'button_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'woods' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'woods' ),
				'section'     => 'button_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'button_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'woods' ),
				'section'     => 'button_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'button_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'woods' ),
				'section'         => 'button_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => woods_get_character_sets(),
				'type'            => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'woods' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'woods' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_bg_color' => array(
				'title'           => esc_html__( 'Background Color', 'woods' ),
				'section'         => 'header_styles',
				'field'           => 'hex_color',
				'default'         => '#ffffff',
				'type'            => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'woods' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'woods' ),
				'section' => 'header_styles',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'woods' ),
					'repeat'     => esc_html__( 'Tile', 'woods' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'woods' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'woods' ),
				),
				'type' => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'woods' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'woods' ),
					'center' => esc_html__( 'Center', 'woods' ),
					'right'  => esc_html__( 'Right', 'woods' ),
				),
				'type' => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'woods' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'woods' ),
					'fixed'  => esc_html__( 'Fixed', 'woods' ),
				),
				'type' => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'woods' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_enable' => array(
				'title'   => esc_html__( 'Enable Top Panel', 'woods' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'woods' ),
				'section' => 'header_top_panel',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'woods' ),
				'priority' => 110,
				'type'     => 'section',
			),

			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'woods' ),
				'section' => 'footer_options',
				'default' => woods_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'woods' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'woods' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				//'active_callback' => 'is_home',
			),
			'blog_sidebar_position' => array(
				'title'    => esc_html__( 'Sidebar', 'woods' ),
				'section'  => 'blog',
				'default'  => 'one-right-sidebar',
				'field'    => 'select',
				'priority' => 10,
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'woods' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'woods' ),
					'none'              => esc_html__( 'No sidebar', 'woods' ),
				),
				'type' => 'control',
				'active_callback' => 'woods_is_blog_sidebar_enabled',
			),
			'blog_navigation_type' => array(
				'title'   => esc_html__( 'Navigation type', 'woods' ),
				'section' => 'blog',
				'default' => 'navigation',
				'field'   => 'select',
				'choices' => array(
					'navigation' => esc_html__( 'Navigation', 'woods' ),
					'pagination' => esc_html__( 'Pagination', 'woods' ),
				),
				'type' => 'control',
			),
			'blog_sticky_type' => array(
				'title'    => esc_html__( 'Sticky label type', 'woods' ),
				'section'  => 'blog',
				'default'  => 'icon',
				'field'    => 'select',
				'priority' => 15,
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'woods' ),
					'icon'  => esc_html__( 'Font Icon', 'woods' ),
					'both'  => esc_html__( 'Text with Icon', 'woods' ),
				),
				'type' => 'control',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'woods' ),
				'description'     => esc_html__( 'Label for sticky post', 'woods' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'woods' ),
				'field'           => 'text',
				'priority'        => 20,
				'active_callback' => 'woods_is_sticky_text',
				'type'            => 'control',
			),
			'blog_post_author' => array(
				'title'    => esc_html__( 'Show post author', 'woods' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 25,
				'type'     => 'control',
			),
			'blog_post_publish_date' => array(
				'title'    => esc_html__( 'Show publish date', 'woods' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 30,
				'type'     => 'control',
			),
			'blog_post_categories' => array(
				'title'    => esc_html__( 'Show categories', 'woods' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 35,
				'type'     => 'control',
			),
			'blog_post_tags' => array(
				'title'    => esc_html__( 'Show tags', 'woods' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 40,
				'type'     => 'control',
			),
			'blog_post_comments' => array(
				'title'    => esc_html__( 'Show comments', 'woods' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 45,
				'type'     => 'control',
			),
			'blog_post_excerpt' => array(
				'title'   => esc_html__( 'Show Excerpt', 'woods' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'priority' => 50,
				'type'    => 'control'
			),
			'blog_post_excerpt_words_count' => array(
				'title'       => esc_html__( 'Excerpt Words Count', 'woods' ),
				'section'     => 'blog',
				'default'     => '50',
				'priority'    => 55,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type' => 'control',
			),
			'blog_read_more_type' => array(
				'title'    => esc_html__( 'Read more button type', 'woods' ),
				'section'  => 'blog',
				'default'  => 'text',
				'field'    => 'select',
				'priority' => 60,
				'choices' => array(
					'text'      => esc_html__( 'Text', 'woods' ),
					'icon'      => esc_html__( 'Icon', 'woods' ),
					'text_icon' => esc_html__( 'Text & Icon', 'woods' ),
					'none'      => esc_html__( 'None', 'woods' ),
				),
				'type'    => 'control',
			),
			'blog_read_more_text' => array(
				'title'           => esc_html__( 'Read more button text', 'woods' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'More', 'woods' ),
				'field'           => 'text',
				'priority'        => 65,
				'type'            => 'control',
				'active_callback' => 'woods_is_blog_read_more_btn_text',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'woods' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar', 'woods' ),
				'section' => 'blog_post',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'woods' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'woods' ),
					'none'              => esc_html__( 'No sidebar', 'woods' ),
				),
				'type' => 'control',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'woods' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'woods' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'woods' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'woods' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'woods' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'woods' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'woods' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'woods' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'   => esc_html__( 'Related posts block title', 'woods' ),
				'section' => 'related_posts',
				'default' => esc_html__( 'Related Posts', 'woods' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_count' => array(
				'title'   => esc_html__( 'Number of post', 'woods' ),
				'section' => 'related_posts',
				'default' => '4',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_grid' => array(
				'title'   => esc_html__( 'Layout', 'woods' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'select',
				'choices' => array(
					'2'        => esc_html__( '2 columns', 'woods' ),
					'3'        => esc_html__( '3 columns', 'woods' ),
					'4'        => esc_html__( '4 columns', 'woods' ),
				),
				'type' => 'control',
			),
			'related_posts_image' => array(
				'title'   => esc_html__( 'Show post image', 'woods' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_publish_date' => array(
				'title'   => esc_html__( 'Show post publish date', 'woods' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_author' => array(
				'title'   => esc_html__( 'Show post author', 'woods' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_title' => array(
				'title'   => esc_html__( 'Show post title', 'woods' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_excerpt' => array(
				'title'   => esc_html__( 'Display excerpt', 'woods' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type' => 'control',
			),

			/* 'related_posts_categories' => array(
				'title'   => esc_html__( 'Show post categories', 'woods' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			), */
			/* 'related_posts_tags' => array(
				'title'   => esc_html__( 'Show post tags', 'woods' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			), */
			/* 'related_posts_comment_count' => array(
				'title'   => esc_html__( 'Show post comment count', 'woods' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			), */

	) ) );
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function woods_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;

}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function woods_is_sticky_text( $control ) {
	return woods_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function woods_is_sticky_icon( $control ) {
	return woods_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize
 * @return void
 */
function woods_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'woods_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'woods' );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'woods_customizer_change_core_controls', 20 );

/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function woods_get_font_styles() {
	return apply_filters( 'woods-theme/font/styles', array(
		'normal'  => esc_html__( 'Normal', 'woods' ),
		'italic'  => esc_html__( 'Italic', 'woods' ),
		'oblique' => esc_html__( 'Oblique', 'woods' ),
		'inherit' => esc_html__( 'Inherit', 'woods' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function woods_get_character_sets() {
	return apply_filters( 'woods-theme/font/character_sets', array(
		'latin'        => esc_html__( 'Latin', 'woods' ),
		'greek'        => esc_html__( 'Greek', 'woods' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'woods' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'woods' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'woods' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'woods' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'woods' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function woods_get_text_aligns() {
	return apply_filters( 'woods-theme/font/text-aligns', array(
		'inherit' => esc_html__( 'Inherit', 'woods' ),
		'center'  => esc_html__( 'Center', 'woods' ),
		'justify' => esc_html__( 'Justify', 'woods' ),
		'left'    => esc_html__( 'Left', 'woods' ),
		'right'   => esc_html__( 'Right', 'woods' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function woods_get_font_weight() {
	return apply_filters( 'woods-theme/font/weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function woods_get_dynamic_css_options() {
	return apply_filters( 'woods-theme/dynamic_css/options', array(
		'prefix'        => 'woods',
		'type'          => 'theme_mod',
		'parent_handles' => array(
			'css' => 'woods-theme-style',
			'js'  => 'woods-theme-script',
		),
		'css_files'      => array(
			get_theme_file_path( 'assets/css/dynamic.css' ),
			get_theme_file_path( 'assets/css/dynamic/header.css' ),
			get_theme_file_path( 'assets/css/dynamic/menus.css' ),
			get_theme_file_path( 'assets/css/dynamic/social.css' ),
			get_theme_file_path( 'assets/css/dynamic/navigation.css' ),
			get_theme_file_path( 'assets/css/dynamic/buttons.css' ),
			get_theme_file_path( 'assets/css/dynamic/forms.css' ),
			get_theme_file_path( 'assets/css/dynamic/post.css' ),
			get_theme_file_path( 'assets/css/dynamic/page.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-grid.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-justify.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-masonry.css' ),
			get_theme_file_path( 'assets/css/dynamic/widgets.css' ),
			get_theme_file_path( 'assets/css/dynamic/plugins.css' ),
			get_theme_file_path( 'assets/css/dynamic/mphb.css' ),
		),
		'options_cb'     => 'get_theme_mods',
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function woods_get_default_footer_copyright() {
	return esc_html__( '&copy; %%year%% Woods | Multipurpose WP Theme with Elementor Page Builder', 'woods' );
}

/**
 * Return true if blog sidebar enabled.
 *
 * @return bool
 */
function woods_is_blog_sidebar_enabled() {
	return apply_filters( 'woods-theme/customizer/blog-sidebar-enabled', true );
}

/**
 * Return true if option Read More button type is text type. Otherwise - return false.
 *
 * @return bool
 */
function woods_is_blog_read_more_btn_text() {
	$btn_type = woods_theme()->customizer->get_value( 'blog_read_more_type' );
	return 'text' === $btn_type || 'text_icon' === $btn_type ? true : false;
}

/**
 * Return false if option Enable Totop button is enable.
 *
 * @param  object $control Parent control.
 * @return bool
 */

function woods_is_totop_enable( $control ) {
	return woods_is_not_setting( $control, 'totop_visibility', false );
}