<?php

/**
 * Help sidebar for all of the help tabs.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function bcp_get_help_sidebar_text() {

	// Get docs and help links.
	$docs_link = sprintf( '<li><a href="https://themehybrid.com/docs">%s</a></li>', esc_html__( 'Documentation', 'custom-content-portfolio' ) );
	$help_link = sprintf( '<li><a href="https://themehybrid.com/board/topics">%s</a></li>', esc_html__( 'Support Forums', 'custom-content-portfolio' ) );

	// Return the text.
	return sprintf(
		'<p><strong>%s</strong></p><ul>%s%s</ul>',
		esc_html__( 'For more information:', 'custom-content-portfolio' ),
		$docs_link,
		$help_link
	);
}
