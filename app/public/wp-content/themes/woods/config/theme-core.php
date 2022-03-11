<?php

add_action( 'jet-theme-core/register-config', 'woods_core_config' );

function woods_core_config( $manager ) {
	$manager->register_config(
		array(
			'dashboard_page_name' => esc_html__( 'Woods', 'woods' ),
			'menu_icon'           => 'dashicons-admin-generic',
			'api'                 => array(
				'enabled'   => false,
				'base'      => 'https://monstroid.zemez.io/',
				'path'      => 'wp-json/croco/v1',
				'id'        => 9,
				'endpoints' => array(
					'templates'  => '/templates/',
					'keywords'   => '/keywords/',
					'categories' => '/categories/',
					'info'       => '/info/',
					'template'   => '/template/',
					'plugins'    => '/plugins/',
					'plugin'     => '/plugin/',
				),
			),
			'guide' => array(
				'title' => esc_html__( 'Learn More About Woods', 'woods' ),
				'links' => array(
					'documentation' => array(
						'label'  => esc_html__( 'Check documentation', 'woods' ),
						'type'   => 'primary',
						'target' => '_blank',
						'icon'   => 'dashicons-welcome-learn-more',
						'desc'   => esc_html__( 'Get more info from documentation', 'woods' ),
						'url'    => 'http://documentation.zemez.io/wordpress/index.php?project=woods',
					),
					'knowledge-base' => array(
						'label'  => esc_html__( 'Knowledge Base', 'woods' ),
						'type'   => 'primary',
						'target' => '_blank',
						'icon'   => 'dashicons-sos',
						'desc'   => esc_html__( 'Access the vast knowledge base', 'woods' ),
						'url'    => 'https://zemez.io/wordpress/support/knowledge-base-category/woods/',
					),
					'community' => array(
						'label'  => esc_html__( 'Community', 'woods' ),
						'type'   => 'primary',
						'target' => '_blank',
						'icon'   => 'dashicons-facebook',
						'desc'   => esc_html__( 'Join community to stay tuned to the latest news', 'woods' ),
						'url'    => 'https://www.facebook.com/groups/ZemezJetCommunity/',
					),
					'video-tutorials' => array(
						'label' => esc_html__( 'View Video', 'woods' ),
						'type'   => 'primary',
						'target' => '_blank',
						'icon'   => 'dashicons-format-video',
						'desc'   => esc_html__( 'View video tutorials', 'woods' ),
						'url'    => 'https://zemez.io/wordpress/support/video-tutorials/',
					),
				),
			),
		)
	);
}
