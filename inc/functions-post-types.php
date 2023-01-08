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
add_action( 'init', 'bcp_register_post_types' );

/**
 * Returns the name of the project post type.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function bcp_get_portfolio_post_type(): string {

	return apply_filters( 'ccp/get/portfolio/post/type', 'backdrop-portfolio' );
}

/**
 * Returns the labels for the project post type.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function bcp_get_portfolio_labels(): array {

	$labels = array(
		'name'                  => __( 'Portfolios',					'backdrop_custom_portfolio' ),
		'singular_name'         => __( 'Portfolio',						'backdrop_custom_portfolio' ),
		'menu_name'             => __( 'Portfolio',						'backdrop_custom_portfolio' ),
		'name_admin_bar'        => __( 'Portfolio',						'backdrop_custom_portfolio' ),
		'add_new'               => __( 'New Portfolio',					'backdrop_custom_portfolio' ),
		'add_new_item'          => __( 'Add New Portfolio',				'backdrop_custom_portfolio' ),
		'edit_item'             => __( 'Edit Portfolio',				'backdrop_custom_portfolio' ),
		'new_item'              => __( 'New Portfolio',					'backdrop_custom_portfolio' ),
		'view_item'             => __( 'View Portfolio',				'backdrop_custom_portfolio' ),
		'view_items'            => __( 'View Portfolios',				'backdrop_custom_portfolio' ),
		'search_items'          => __( 'Search Portfolios',				'backdrop_custom_portfolio' ),
		'not_found'             => __( 'No portfolios found',			'backdrop_custom_portfolio' ),
		'not_found_in_trash'    => __( 'No portfolios found in trash',	'backdrop_custom_portfolio' ),
		'all_items'             => __( 'Portfolios',					'backdrop_custom_portfolio' ),
		'featured_image'        => __( 'Portfolio Image',				'backdrop_custom_portfolio' ),
		'set_featured_image'    => __( 'Set portfolio image',			'backdrop_custom_portfolio' ),
		'remove_featured_image' => __( 'Remove portfolio image',		'backdrop_custom_portfolio' ),
		'use_featured_image'    => __( 'Use as portfolio image',		'backdrop_custom_portfolio' ),
		'insert_into_item'      => __( 'Insert into portfolio',			'backdrop_custom_portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Portfolio',	'backdrop_custom_portfolio' ),
		'filter_items_list'     => __( 'Filter portfolios list',		'backdrop_custom_portfolio' ),
		'items_list_navigation' => __( 'Portfolios list navigation',	'backdrop_custom_portfolio' ),
		'items_list'            => __( 'Portfolios list',				'backdrop_custom_portfolio' ),

		// Custom labels b/c WordPress doesn't have anything to handle this.
		// 'archive_title'         => bcp_get_portfolio_title(),
	);

	return apply_filters( 'bcp/get/portfolio/labels', $labels );
}

/**
 * Registers post types needed by the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function bcp_register_post_types(): void {

	$bcp_args = [
		'labels' => bcp_get_portfolio_labels(),
		'public' => true,
	];

	register_post_type( bcp_get_portfolio_post_type(), apply_filters( 'bcp/portfolio/post/type/args', $bcp_args ) );
}
