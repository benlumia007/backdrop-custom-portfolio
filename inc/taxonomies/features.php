<?php
/**
 * File for registering subject taxonomy for portfolio.
 *
 * @package   Backdrop Custom Portfolio
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-custom-portfolio
 */

# Register taxonomies on the 'init' hook.
add_action( 'init', 'bcp_register_features_taxonomy', 9 );

/**
 * Returns the labels for the portfolio Feature taxonomy.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function bcp_get_feature_labels(): array {

	$labels = array(
		'name'                       => __( 'Features',					'backdrop_custom_portfolio' ),
		'singular_name'              => __( 'Feature',					'backdrop_custom_portfolio' ),
		'menu_name'                  => __( 'Features',					'backdrop_custom_portfolio' ),
		'name_admin_bar'             => __( 'Feature',					'backdrop_custom_portfolio' ),
		'search_items'               => __( 'Search Features',			'backdrop_custom_portfolio' ),
		'popular_items'              => __( 'Popular Features',			'backdrop_custom_portfolio' ),
		'all_items'                  => __( 'All Features',				'backdrop_custom_portfolio' ),
		'edit_item'                  => __( 'Edit Feature',				'backdrop_custom_portfolio' ),
		'view_item'                  => __( 'View Feature',				'backdrop_custom_portfolio' ),
		'update_item'                => __( 'Update Feature',			'backdrop_custom_portfolio' ),
		'add_new_item'               => __( 'Add New Feature',			'backdrop_custom_portfolio' ),
		'new_item_name'              => __( 'New Feature Name',			'backdrop_custom_portfolio' ),
		'not_found'                  => __( 'No features found.',		'backdrop_custom_portfolio' ),
		'no_terms'                   => __( 'No features',				'backdrop_custom_portfolio' ),
		'items_list_navigation'      => __( 'Features list navigation',	'backdrop_custom_portfolio' ),
		'items_list'                 => __( 'Features list',			'backdrop_custom_portfolio' ),

		// Hierarchical only.
		'select_name'                => __( 'Select Feature',			'backdrop_custom_portfolio' ),
		'parent_item'                => __( 'Parent Feature',			'backdrop_custom_portfolio' ),
		'parent_item_colon'          => __( 'Parent Feature:',			'backdrop_custom_portfolio' ),
	);

	return apply_filters( 'bcp/get/feature/labels', $labels );
}

/**
 * Register taxonomies for the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void.
 */
function bcp_register_features_taxonomy(): void {

	// Set up the arguments for the portfolio feature taxonomy.
	$feature_args = array(
		'public'            => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
//		'query_var'         => ccp_get_Feature_taxonomy(),
//		'capabilities'      => ccp_get_Feature_capabilities(),
		'labels'            => bcp_get_feature_labels(),

		// The rewrite handles the URL structure.
		'rewrite' => array(
//			'slug'         => ccp_get_Feature_rewrite_slug(),
			'with_front'   => false,
			'hierarchical' => false
		),
	);

	// Set up the arguments for the portfolio feature taxonomy.
	$layout_args = array(
		'public'            => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
//		'query_var'         => ccp_get_Feature_taxonomy(),
//		'capabilities'      => ccp_get_Feature_capabilities(),
		'labels'            => bcp_get_feature_labels(),

		// The rewrite handles the URL structure.
		'rewrite' => array(
//			'slug'         => ccp_get_Feature_rewrite_slug(),
			'with_front'   => false,
			'hierarchical' => false
		),
	);

	register_taxonomy( bcp_get_features_taxonomy(), bcp_get_post_type_portfolio(), apply_filters( 'bcp/features/taxonomy/args', $feature_args ) );
}
