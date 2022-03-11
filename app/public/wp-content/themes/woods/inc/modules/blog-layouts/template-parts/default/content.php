<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woods
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item default-item'); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php 
			woods_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h3>
		<div class="entry-meta">
			<?php
				woods_posted_by();
				woods_posted_in( array(
					'prefix' => __( 'In', 'woods' ),
				) );
				woods_posted_on( array(
					'prefix' => __( 'Posted', 'woods' )
				) );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<?php woods_post_thumbnail( 'woods-thumb-l' ); ?>

	<?php woods_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
				woods_post_tags( array(
					'prefix' => __( 'Tags:', 'woods' )
				) );
			?>
			<div><?php
				woods_post_comments( array(
					'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
					'class'  => 'comments-button'
				) );
				woods_post_link();
			?></div>
		</div>
		<?php woods_edit_link(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
