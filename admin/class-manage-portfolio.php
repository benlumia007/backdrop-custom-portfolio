<?php
/**
 * Manage projects admin screen.
 *
 * @package   Backdrop Custom Portfolio
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/backdrop-custom-portfolio
 */

/**
 * Adds additional columns and features to the projects admin screen.
 *
 * @since  1.0.0
 * @access public
 */
final class CCP_Manage_Projects {

	/**
	 * Sets up the needed actions.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	private function __construct() {

		add_action( 'load-edit.php', array( $this, 'load' ) );

		// Hook the handler to the manage projects load screen.
		// add_action( 'ccp_load_manage_projects', array( $this, 'handler' ), 0 );

		// Add the help tabs.
		// add_action( 'ccp_load_manage_projects', array( $this, 'add_help_tabs' ) );
	}

	/**
	 * Runs on the page load. Checks if we're viewing the project post type and adds
	 * the appropriate actions/filters for the page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function load(): void {

		$screen       = get_current_screen();
		$project_type = bcp_get_portfolio_post_type();

		// Bail if not on the portfolio screen.
		if ( empty( $screen->post_type ) || $project_type !== $screen->post_type )
			return;

		// Custom columns on the edit portfolio items screen.
		add_filter( "manage_edit-{$project_type}_columns", [ $this, 'columns' ] );
		add_action( "manage_{$project_type}_posts_custom_column", [ $this, 'custom_column' ], 10, 2 );
	}

	/**
	 * Sets up custom columns on the projects edit screen.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array  $columns
	 * @return array
	 */
	public function columns( array $columns ): array {

		$new_columns = array(
			'cb'    => $columns['cb'],
			'title' => __( 'Portfolio', 'custom-content-portfolio' )
		);

		if ( current_theme_supports( 'post-thumbnails' ) )
			$new_columns['thumbnail'] = __( 'Thumbnail', 'custom-content-portfolio' );

		$columns = array_merge( $new_columns, $columns );

		$columns['title'] = $new_columns['title'];

		return $columns;
	}

	/**
	 * Displays the content of custom project columns on the edit screen.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $column
	 * @param  int     $post_id
	 * @return void
	 */
	public function custom_column( string $column, int $post_id ): void {

		if ( 'thumbnail' === $column ) {

			if ( has_post_thumbnail() ) {
				the_post_thumbnail( array( 75, 75 ) );
			}
		}
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance(): object {

		static $instance = null;

		if ( is_null( $instance ) )
			$instance = new self;

		return $instance;
	}
}

CCP_Manage_Projects::get_instance();
