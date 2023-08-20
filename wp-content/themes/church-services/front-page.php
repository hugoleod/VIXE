<?php
/**
 * The front page template file
 *
 * @package Church Services
 * @subpackage church_services
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'church_services_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'church_services_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/about' ); ?>
	<?php do_action( 'church_services_after_about' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'church_services_after_home_content' ); ?>
</main>

<?php get_footer();
