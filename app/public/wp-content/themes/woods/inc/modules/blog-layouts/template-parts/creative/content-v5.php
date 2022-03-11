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

	<?php $title = get_the_title(); ?>

	<div class="creative-item__title-first-letter">
		<?php echo substr($title, 0, 1); ?>
	</div>

	<div class="creative-item__content">
		<header class="entry-header">
			<?php
				woods_posted_in();
			?>
			<h3 class="entry-title"><?php 
				woods_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
		</header><!-- .entry-header -->

		<?php woods_post_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<div class="entry-meta">
			<div>
				<?php
					woods_posted_by();
					woods_posted_on( array(
						'prefix' => __( 'Posted', 'woods' )
					) );
					woods_post_comments( array(
						'postfix' => __( 'Comment(s)', 'woods' )
					) );
				?>
			</div>
			<?php
				woods_post_tags( array(
					'prefix' => __( 'Tags:', 'woods' )
				) );
				woods_post_link();
			?>
		</div>
		<?php woods_edit_link(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
