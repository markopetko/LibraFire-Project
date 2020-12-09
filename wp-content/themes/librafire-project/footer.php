<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LibraFire_Project
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'librafire-project' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Copyright © 2020 Bernhardt Furniture Company. All Rights Reserved. %s', '' ), '' );
			?>
		</a>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( '%2$s', '' ), '', '' );
			?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/functions.js"></script>

</body>
</html>
