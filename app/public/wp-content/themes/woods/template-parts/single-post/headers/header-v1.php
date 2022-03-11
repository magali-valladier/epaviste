<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woods
 */

?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title h2-style">', '</h1>' ); ?>
	<div class="entry-meta">
		<?php
			woods_posted_by();
			woods_posted_in( array(
				'prefix'  => __( 'In', 'woods' ),
			) );
			woods_posted_on( array(
				'prefix'  => __( 'Posted', 'woods' ),
			) );
			woods_post_comments( array(
				'postfix' => __( 'Comment(s)', 'woods' ),
			) );
		?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php woods_post_thumbnail( 'woods-thumb-l', array( 'link' => false ) ); ?>