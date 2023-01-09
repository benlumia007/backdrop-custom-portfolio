<?php
/**
 * File for registering layouts taxonomy for portfolio.
 *
 * @package   Backdrop Custom Portfolio
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-custom-portfolio
 */

# Register taxonomies on the 'init' hook.
add_action( 'init', 'bcp_register_layouts_taxonomy', 9 );

/**
 * Returns the labels for the portfolio Feature taxonomy.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function bcp_get_layout_labels(): array {

	$labels = array(
		'name'                       => __( 'Layouts',					'backdrop-custom-portfolio' ),
		'singular_name'              => __( 'Layout',					'backdrop-custom-portfolio' ),
		'menu_name'                  => __( 'Layouts',					'backdrop-custom-portfolio' ),
		'name_admin_bar'             => __( 'Layout',					'backdrop-custom-portfolio' ),
		'search_items'               => __( 'Search Layouts',			'backdrop-custom-portfolio' ),
		'popular_items'              => __( 'Popular Layouts',			'backdrop-custom-portfolio' ),
		'all_items'                  => __( 'All Layouts',				'backdrop-custom-portfolio' ),
		'edit_item'                  => __( 'Edit Layout',				'backdrop-custom-portfolio' ),
		'view_item'                  => __( 'View Layout',				'backdrop-custom-portfolio' ),
		'update_item'                => __( 'Update Layout',			'backdrop-custom-portfolio' ),
		'add_new_item'               => __( 'Add New Layout',			'backdrop-custom-portfolio' ),
		'new_item_name'              => __( 'New Layout Name',			'backdrop-custom-portfolio' ),
		'not_found'                  => __( 'No layouts found.',		'backdrop-custom-portfolio' ),
		'no_terms'                   => __( 'No layouts',				'backdrop-custom-portfolio' ),
		'items_list_navigation'      => __( 'Layouts list navigation',	'backdrop-custom-portfolio' ),
		'items_list'                 => __( 'Layouts list',			'backdrop-custom-portfolio' ),

		// Hierarchical only.
		'select_name'                => __( 'Select Feature',			'backdrop-custom-portfolio' ),
		'parent_item'                => __( 'Parent Feature',			'backdrop-custom-portfolio' ),
		'parent_item_colon'          => __( 'Parent Feature:',			'backdrop-custom-portfolio' ),
	);

	return apply_filters( 'bcp/get/post/type/portfolio/layout/labels', $labels );
}

/**
 * Register taxonomies for the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void.
 */
function bcp_register_layouts_taxonomy(): void {

	// Set up the arguments for the portfolio feature taxonomy.
	$layout_args = array(

		'labels'            => bcp_get_layout_labels(),

		'public'            => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
//		'query_var'         => ccp_get_Feature_taxonomy(),

		// The rewrite handles the URL structure.
		'rewrite' => array(
//			'slug'         => ccp_get_Feature_rewrite_slug(),
			'with_front'   => false,
			'hierarchical' => false
		),
	);

	register_taxonomy( bcp_get_layouts_taxonomy(), bcp_get_post_type_portfolio(), apply_filters( 'bcp/layouts/taxonomy/args', $layout_args ) );
}
