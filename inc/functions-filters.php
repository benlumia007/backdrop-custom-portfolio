<?php
/**
 * Various functions, filters, and actions used by the plugin.
 *
 * @package   Backdrop Custom Portfolio
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-custom-portfolio
 */

# Template hierarchy.
add_filter( 'template_include', 'bcp_template_include', 5 );

/**
 * Basic top-level template hierarchy. I generally prefer to leave this functionality up to
 * themes.  This is just a foundation to build upon if needed.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $template
 * @return string
 */
function bcp_template_include( string $template ): string {

	// Bail if not a portfolio page.
	if ( ! bcp_is_portfolio() )
		return $template;

	$templates = array();

	// Author archive.
	if ( ccp_is_author() ) {
		$templates[] = 'portfolio-author.php';
		$templates[] = 'portfolio-archive.php';

		// Category archive.
	} else if ( ccp_is_category() ) {
		$templates[] = 'portfolio-category.php';
		$templates[] = 'portfolio-archive.php';

		// Tag archive.
	} else if ( ccp_is_tag() ) {
		$templates[] = 'portfolio-tag.php';
		$templates[] = 'portfolio-archive.php';

		// Project archive.
	} else if ( ccp_is_project_archive() ) {
		$templates[] = 'portfolio-archive.php';

		// Single project.
	} else if ( bcp_is_single_portfolio() ) {
		$templates[] = 'portfolio-project.php';
	}

	$templates[] = 'public/views/portfolio.php';

	// Fallback template.
	$templates[] = 'portfolio.php';

	// Check if we have a template.
	$has_template = locate_template( apply_filters( 'ccp_template_hierarchy', $templates ) );

	// Return the template.
	return $has_template ? $has_template : $template;
}
