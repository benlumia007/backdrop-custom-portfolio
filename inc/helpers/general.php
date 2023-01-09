<?php
/**
 * Helper functions.
 *
 * @package   Backdrop Custom Portfolio
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-custom-portfolio
 */

/**
 * Returns the name of the custom post type.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function bcp_get_post_type_portfolio(): string {

	// Returns custom post type: backdrop-portfolio
	return apply_filters( 'ccp/get/portfolio/post/type', 'backdrop-portfolio' );
}

/**
 * Returns the name of the portfolio tag taxonomy.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function bcp_get_features_taxonomy(): string {

	return apply_filters( 'bcp/get/subject/taxonomy', 'portfolio-features' );
}

/**
 * Returns the name of the portfolio tag taxonomy.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function bcp_get_layouts_taxonomy(): string {

	return apply_filters( 'bcp/get/layouts/taxonomy', 'portfolio-layouts' );
}

/**
 * Returns the name of the portfolio tag taxonomy.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function bcp_get_subjects_taxonomy(): string {

	return apply_filters( 'bcp/get/post/type/portfolio/layouts/taxonomy', 'portfolio-layouts' );
}



/**
 * Returns a plugin setting.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $setting
 * @return mixed
 */
function bcp_get_setting( string $setting ): mixed {

	$defaults = bcp_get_default_settings();
	$settings = wp_parse_args( get_option( 'bcp_settings', $defaults ), $defaults );

	return $settings[ $setting ] ?? false;
}

/**
 * Returns the default settings for the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return array
 */
function bcp_get_default_settings(): array {

	return array(
		'portfolio_title'        => __( 'Portfolio', 'backdrop-custom-portfolio' ),
		'portfolio_description'  => '',
		'portfolio_rewrite_base' => 'portfolio',
		'category_rewrite_base'  => 'categories',
		'tag_rewrite_base'       => 'tags',
		'author_rewrite_base'    => 'authors'
	);
}
