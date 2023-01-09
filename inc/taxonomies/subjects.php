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
add_action( 'init', 'bcp_register_subject_taxonomy', 9 );

/**
 * Register backdrop-portfolio's subject taxonomy for the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void.
 */
function bcp_register_subject_taxonomy(): void {

	// Set up the arguments for the portfolio tag taxonomy.
	$tag_args = array(
		'public'            => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true,
		'hierarchical'      => false,
		'query_var'         => bcp_get_subjects_taxonomy(),
		'labels'            => ccp_get_tag_labels(),

		// The rewrite handles the URL structure.
		'rewrite' => array(
			'slug'         => ccp_get_tag_rewrite_slug(),
			'with_front'   => false,
			'hierarchical' => false,
			'ep_mask'      => EP_NONE
		),
	);

	// Register the taxonomies.
	register_taxonomy( bcp_get_subjects_taxonomy(),      ccp_get_project_post_type(), apply_filters( 'ccp_tag_taxonomy_args',      $tag_args ) );
}
