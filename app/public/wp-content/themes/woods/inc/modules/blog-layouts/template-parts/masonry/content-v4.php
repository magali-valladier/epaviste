<?php
/**
 * Template part for displaying style-v4 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woods
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item masonry-item' ); ?>>
	<?php woods_post_thumbnail( 'woods-thumb-masonry' ); ?>
	<div class="masonry-item-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				woods_posted_by();
				woods_posted_in( array(
					'prefix' => __( 'In', 'woods' ),
					'delimiter' => ', '
				) ); 
				woods_posted_on( array(
					'prefix' => __( 'Posted', 'woods' ),
				) );
				?>
			</div><!-- .entry-meta -->
			<h4 class="entry-title"><?php 
				woods_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h4>
		</header><!-- .entry-header -->
		<?php woods_post_excerpt(); ?>

		<footer class="entry-footer">
				<div class="entry-meta">
					<?php
						woods_post_tags();

						$post_more_btn_enabled = strlen( woods_theme()->customizer->get_value( 'blog_read_more_text' ) ) > 0 ? true : false;
						$post_comments_enabled = woods_theme()->customizer->get_value( 'blog_post_comments' );

						if( $post_more_btn_enabled || $post_comments_enabled ) {
							?><div class="space-between-content"><?php
								woods_post_link();
								woods_post_comments();
							?></div><?php
						}
					?>
				</div>
			<?php woods_edit_link(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .masonry-item-wrap-->
</article><!-- #post-<?php the_ID(); ?> -->
