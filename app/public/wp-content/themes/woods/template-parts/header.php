<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Woods
 */
?>

<?php get_template_part( 'template-parts/top-panel' ); ?>

<div <?php woods_header_class(); ?>>
	<?php do_action( 'woods-theme/header/before' ); ?>
	<div class="space-between-content">
		<div <?php woods_site_branding_class(); ?>>
			<?php woods_header_logo(); ?>
		</div>
		<?php woods_main_menu(); ?>
	</div>
	<?php do_action( 'woods-theme/header/after' ); ?>
</div>
