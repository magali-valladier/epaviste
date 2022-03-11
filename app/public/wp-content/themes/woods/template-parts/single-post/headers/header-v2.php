<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woods
 */
?>

<div class="single-header-2 container">
	<div class="row">
		<div class="col-xs-12 col-lg-8 col-lg-push-2">
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
		</div>
	</div>
</div>

<?php woods_post_thumbnail( 'woods-thumb-xl', array( 'link' => false ) ); ?>