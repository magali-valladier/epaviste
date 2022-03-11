<?php
/**
 * Template part for displaying creative posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woods
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item creative-item invert-hover' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="creative-item__thumbnail" <?php woods_post_overlay_thumbnail( 'woods-thumb-m' ); ?>></div>
	<?php endif; ?>

	<header class="entry-header">
		<?php
			woods_posted_in();
			woods_posted_on( array(
				'prefix' => __( 'Posted', 'woods' )
			) );
		?>
		<h4 class="entry-title"><?php 
			woods_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h4>
	</header><!-- .entry-header -->

	<?php woods_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<div>
				<?php
					woods_posted_by();
					woods_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>'
					) );
					woods_post_tags( array(
						'prefix' => __( 'Tags:', 'woods' )
					) );
				?>
			</div>
			<?php
				woods_post_link();
			?>
		</div>
		<?php woods_edit_link(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
