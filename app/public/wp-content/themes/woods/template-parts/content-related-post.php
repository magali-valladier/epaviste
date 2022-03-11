<?php
/**
 * The template for displaying related posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Woods
 * @subpackage single-post
 */
?>
<div class="related-post <?php echo esc_attr( $grid_class ); ?>"><?php
	if ( $settings['image_visible'] ) :
		woods_post_thumbnail( 'woods-thumb-s' );
	endif; ?>
	<div class="entry-meta"><?php
		if ( $settings['date_visible'] ) :
			woods_posted_on();
		endif;

		if ( $settings['author_visible'] ) :
			woods_posted_by();
		endif; ?>
	</div>
	<header class="entry-header"><?php
		if ( $settings['title_visible'] ) :
			printf(
				'<h6 class="entry-title"><a href="%s" rel="bookmark">%s</a></h6>',
				esc_url( get_permalink() ),
				get_the_title()
			);
		endif; ?>
	</header>
	<div class="entry-content"><?php
		if ( $settings['excerpt_visible'] ) :
			the_excerpt();
		endif; ?>
	</div>
</div>
