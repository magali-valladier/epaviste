<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Woods
 * @subpackage widgets
 */

$is_enabled = woods_theme()->customizer->get_value( 'single_author_block' );

if ( ! $is_enabled ) {
	return;
}

?>
<div class="post-author-bio">
	<div class="post-author__avatar"><?php
		woods_get_post_author_avatar();
	?></div>
	<div class="post-author__content">
		<h4 class="post-author__title"><?php
			woods_get_post_author();
		?></h4>
		<div class="post-author__content"><?php
			woods_get_author_meta();
		?></div>
	</div>
</div>
