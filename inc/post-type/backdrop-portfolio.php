<?php
/**
* File for registering custom post types
*
* @package   Backdrop Custom Portfolio
* @author    Benjamin Lu <benlumia007@gmail.com>
* @copyright 2023. Benjamin Lu
* @license   https://www.gnu.org/licenses/gpl-2.0.html
* @link      https://github.com/benlumia007/backdrop-custom-portfolio
*/

# Register custom post types on the 'init' hook.
add_action( 'init', 'bcp_register_post_type_portfolio' );

/**
 * Registers post types needed by the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function bcp_register_post_type_portfolio(): void {

	$labels = [
		'name'                  => __( 'Portfolios',					'backdrop_custom_portfolio' ),
		'singular_name'         => __( 'Portfolio',					'backdrop_custom_portfolio' ),
		'menu_name'             => __( 'Portfolio',					'backdrop_custom_portfolio' ),
		'name_admin_bar'        => __( 'Portfolio',					'backdrop_custom_portfolio' ),
		'add_new'               => __( 'New Portfolio',				'backdrop_custom_portfolio' ),
		'add_new_item'          => __( 'Add New Portfolio',			'backdrop_custom_portfolio' ),
		'edit_item'             => __( 'Edit Portfolio',				'backdrop_custom_portfolio' ),
		'new_item'              => __( 'New Portfolio',				'backdrop_custom_portfolio' ),
		'view_item'             => __( 'View Portfolio',				'backdrop_custom_portfolio' ),
		'view_items'            => __( 'View Portfolios',				'backdrop_custom_portfolio' ),
		'search_items'          => __( 'Search Portfolios',			'backdrop_custom_portfolio' ),
		'not_found'             => __( 'No portfolios found',			'backdrop_custom_portfolio' ),
		'not_found_in_trash'    => __( 'No portfolios found in trash',	'backdrop_custom_portfolio' ),
		'all_items'             => __( 'Portfolios',					'backdrop_custom_portfolio' ),
		'featured_image'        => __( 'Portfolio Image',				'backdrop_custom_portfolio' ),
		'set_featured_image'    => __( 'Set portfolio image',			'backdrop_custom_portfolio' ),
		'remove_featured_image' => __( 'Remove portfolio image',		'backdrop_custom_portfolio' ),
		'use_featured_image'    => __( 'Use as portfolio image',		'backdrop_custom_portfolio' ),
		'insert_into_item'      => __( 'Insert into portfolio',		'backdrop_custom_portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Portfolio',	'backdrop_custom_portfolio' ),
		'filter_items_list'     => __( 'Filter portfolios list',		'backdrop_custom_portfolio' ),
		'items_list_navigation' => __( 'Portfolios list navigation',	'backdrop_custom_portfolio' ),
		'items_list'            => __( 'Portfolios list',				'backdrop_custom_portfolio' ),

		// Custom labels b/c WordPress doesn't have anything to handle this.
		// 'archive_title'         => bcp_get_portfolio_title(),
	];

	$bcp_args = [
		'labels'                => $labels,

		'can_export'            => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'hierarchical'          => false,
		'map_meta_cap'          => true,
		'menu_icon'             => 'dashicons-portfolio',
		'menu_position'         => null,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_admin_bar'     => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,

		// The rewrite handles for the URL structure.
		'rewrite' => [
			'with_front' => false,
			'slug' => bcp_get_portfolio_rewrite_slug()
		],

		// What features the post type supports.
		'supports' => [
			'title',
			'editor',
			'thumbnail'
		],
	];

	// register_post_type( 'backdrop-portfolio', apply_filters( 'bcp/portfolio/post/type/args', $bcp_args ) );
	register_post_type( bcp_get_post_type_portfolio(), apply_filters( 'bcp/post/type/portfolio/args', $bcp_args ) );
}
