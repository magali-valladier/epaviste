<?php
/**
 * Template part for displaying creative posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woods
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item creative-item' ); ?>>

	<?php if ( woods_theme()->customizer->get_value( 'blog_post_publish_date' ) ) : ?>
		<div class="creative-item__post-date">
			<?php
				woods_posted_on();
			?>
		</div>
	<?php endif; ?>

	<div class="creative-item__content">
		<header class="entry-header">
			<h3 class="entry-title"><?php 
				woods_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
			<div class="entry-meta"><?php
				woods_posted_by();
				woods_posted_in( array(
					'prefix' => __( 'In', 'woods' ),
				) );
			?></div>
		</header><!-- .entry-header -->

		<?php woods_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta"><?php
				woods_post_tags( array(
					'prefix' => __( 'Tags:', 'woods' )
				) );
				?><div><?php
					woods_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
						'class'  => 'comments-button'
					) );
					woods_post_link();
				?></div>
			</div>
			<?php woods_edit_link(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
