<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woods
 */

?>

<footer class="entry-footer">
	<div class="entry-meta"><?php
		woods_post_tags ( array(
			'prefix'    => __( 'Tags:', 'woods' ),
			'delimiter' => ''
		) );
	?></div>
</footer><!-- .entry-footer -->