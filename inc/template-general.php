<?php
/**
 * General template tags for theme authors to use in their themes.
 *
 * @package   Backdrop Custom Portfolio
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-custom-portfolio
 */

/**
 * Conditional tag to check if viewing any portfolio page.
 * @since  1.0.0
 * @access public
 * @return bool
 */
function bcp_is_portfolio(): bool {

	$is_portfolio = bcp_is_archive() || bcp_is_single_portfolio();

	return apply_filters( 'bcp/is/portfolio', $is_portfolio );
}

/**
 * Conditional tag to check if viewing any type of portfolio archive page.
 *
 * @since  2.0.0
 * @access public
 * @return bool
 */
function bcp_is_archive() {

	$is_archive = bcp_is_portfolio_archive() || bcp_is_author() || bcp_is_category();

	return apply_filters( 'ccp_is_archive', $is_archive );
}

/**
 * Checks if viewing the project archive.
 *
 * @since  1.0.0
 * @access public
 * @return bool
 */
function bcp_is_portfolio_archive() {

	return apply_filters( 'bcp_is_portfolio_archive', is_post_type_archive( bcp_get_portfolio_post_type() ) && ! bcp_is_author() );
}

/**
 * Conditional tag to check if viewing a project author archive.
 *
 * @since  1.0.0
 * @access public
 * @param  mixed  $author
 * @return bool
 */
function bcp_is_author( mixed $author = '' ): bool {

	return apply_filters( 'ccp_is_author', is_post_type_archive( bcp_get_portfolio_post_type() ) && is_author( $author ) );
}

/**
 * Conditional tag to check if viewing a portfolio category archive.
 *
 * @since  1.0.0
 * @access public
 * @param  mixed  $term
 * @return bool
 */
function bcp_is_category( mixed $term = '' ): bool {

	return apply_filters( 'ccp_is_category', is_tax( bcp_get_feature_taxonomy(), $term ) );
}

/**
 * Checks if viewing a single project.
 *
 * @since  1.0.0
 * @access public
 * @param  mixed  $post
 * @return bool
 */
function bcp_is_single_portfolio( $post = '' ) {

	$is_single = is_singular( bcp_get_portfolio_post_type() );

	if ( $is_single && $post )
		$is_single = is_single( $post );

	return apply_filters( 'ccp_is_single_project', $is_single, $post );
}

/**
 * Conditional tag to check if viewing a project author archive.
 *
 * @since  1.0.0
 * @access public
 * @param  mixed  $author
 * @return bool
 */
function ccp_is_author( $author = '' ) {

	return apply_filters( 'ccp_is_author', is_post_type_archive( bcp_get_portfolio_post_type() ) && is_author( $author ) );
}

/**
 * Conditional tag to check if viewing a portfolio category archive.
 *
 * @since  1.0.0
 * @access public
 * @param  mixed  $term
 * @return bool
 */
function ccp_is_category( $term = '' ) {

	return apply_filters( 'ccp_is_category', is_tax( bcp_get_feature_taxonomy(), $term ) );
}

/**
 * Conditional tag to check if viewing a portfolio tag archive.
 *
 * @since  1.0.0
 * @access public
 * @param  mixed  $term
 * @return bool
 */
function bcp_is_tag( mixed $term = '' ): bool {

	return apply_filters( 'ccp_is_tag', is_tax( bcp_get_feature_taxonomy(), $term ) );
}

/**
 * Checks if viewing the project archive.
 *
 * @since  1.0.0
 * @access public
 * @return bool
 */
function bcp_is_project_archive() {

	return apply_filters( 'ccp_is_project_archive', is_post_type_archive( bcp_get_portfolio_post_type() ) && ! ccp_is_author() );
}


function path( $file = '' ) {
	$file = ltrim( $file, '/' );
	$path = 'public/views';

	return $file ? trailingslashit( $path ) . $file : trailingslashit( $path );
}
