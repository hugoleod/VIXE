<?php
/**
 * The sidebar containing the main widget area
 * @package Church Services
 * @subpackage church_services
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'church-services' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>