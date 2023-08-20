<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Church Services
 * @subpackage church_services
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function church_services_categorized_blog() {
	$church_services_category_count = get_transient( 'church_services_categories' );

	if ( false === $church_services_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$church_services_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$church_services_category_count = count( $church_services_categories );

		set_transient( 'church_services_categories', $church_services_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $church_services_category_count > 1;
}

if ( ! function_exists( 'church_services_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Church Services
 */
function church_services_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in church_services_categorized_blog.
 */
function church_services_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'church_services_categories' );
}
add_action( 'edit_category', 'church_services_category_transient_flusher' );
add_action( 'save_post',     'church_services_category_transient_flusher' );
