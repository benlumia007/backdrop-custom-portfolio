<?php
/**
 * Plugin Name: Backdrop Custom Portfolio
 * Author: Benjamin Lu
 * Author URI: https://benjlu.com
 * Description: Backdrop Custom Portfolio
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Requires PHP: 7.4
 * Requires CP: 1.4
 * Version: 1.0.0
 * Text Domain: backdrop-custom-portoflio
 */

 /**
  * Singleton class that sets up and initializes the plugin
  *
  * @since  1.0.0
  * @access public
  * @return void
  */
 final class BCP_Plugin {

	 /**
	  * Directory path for the plugin folder.
	  *
	  * @since  1.0.0
	  * @access public
	  * @var	string
	  */
	 public string $dir_path = '';

	 /**
	  * Directory URI to the plugin folder.
	  *
	  * @since  1.0.0
	  * @access public
	  * @var 	string
	  */
	 public string $dir_uri = '';

	 /**
	  * JavaScript directory URI.
	  *
	  * @since  1.0.0
	  * @access public
	  * @var    string
	  */
	 public string $js_uri = '';

	 /**
	  * CSS directory URI.
	  *
	  * @since  1.0.0
	  * @access public
	  * @var    string
	  */
	 public string $css_uri = '';

	 /**
	  * Returns the instance.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return object
	  */
	 public static function get_instance() {

		 static $instance = null;

		 if ( is_null( $instance ) ) {
			 $instance = new self;
			 $instance->setup();
			 $instance->includes();
			 $instance->setup_actions();
		 }

		 return $instance;
	 }

	 /**
	  * Constructor method.
	  *
	  * @since  1.0.0
	  * @access private
	  * @return void
	  */
	 private function __construct() {}
	 /**
	  * Magic method to output a string if trying to use the object as a string.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return string
	  */
	 public function __toString(): string {
		 return 'backdrop-custom-portfolio';
	 }

	 /**
	  * Magic method to keep the object from being cloned.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return void
	  */
	 public function __clone() {
		 _doing_it_wrong( __FUNCTION__, __( 'Whoah, partner!', 'backdrop-custom-portfolio' ), '1.0.0' );
	 }

	 /**
	  * Magic method to keep the object from being unserialized.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return void
	  */
	 public function __wakeup() {
		 _doing_it_wrong( __FUNCTION__, __( 'Whoah, partner!', 'backdrop-custom-portfolio' ), '1.0.0' );
	 }

	 /**
	  * Magic method to prevent a fatal error when calling a method that doesn't exist.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return void
	  */
	 public function __call( $method = '', $args = array() ) {
		 _doing_it_wrong( "Backdrop_Custom_Portfolio::{$method}", __( 'Method does not exist.', 'backdrop-custom-portfolio' ), '1.0.0' );
		 unset( $method, $args );
		 return null;
	 }

	 /**
	  * Initial plugin setup.
	  *
	  * @since  1.0.0
	  * @access private
	  * @return void
	  */
	 private function setup() {

		 $this->dir_path = trailingslashit( plugin_dir_path( __FILE__ ) );
		 $this->dir_uri  = trailingslashit( plugin_dir_url(  __FILE__ ) );

		 $this->js_uri  = trailingslashit( $this->dir_uri . 'js'  );
		 $this->css_uri = trailingslashit( $this->dir_uri . 'css' );
	 }

	 private function includes() {

		 // Load functions files.
//		 require_once( $this->dir_path . 'inc/functions-capabilities.php' );
//		 require_once( $this->dir_path . 'inc/functions-filters.php'      );
//		 require_once( $this->dir_path . 'inc/functions-options.php'      );
//		 require_once( $this->dir_path . 'inc/functions-meta.php'         );
//		 require_once( $this->dir_path . 'inc/functions-rewrite.php'      );
		 require_once( $this->dir_path . 'inc/functions-post-types.php'   );
		 require_once( $this->dir_path . 'inc/functions-taxonomies.php'   );
//		 require_once( $this->dir_path . 'inc/functions-project.php'      );
//		 require_once( $this->dir_path . 'inc/functions-deprecated.php'   );

		 // Load template files.
//		 require_once( $this->dir_path . 'inc/template-project.php'  );
//		 require_once( $this->dir_path . 'inc/template-general.php'  );

		 // Load admin files.
		 if ( is_admin() ) {
//			 require_once( $this->dir_path . 'admin/butterbean/butterbean.php' );
			 require_once( $this->dir_path . 'admin/functions-admin.php'       );
			 require_once( $this->dir_path . 'admin/class-manage-portfolios.php' );
//			 require_once( $this->dir_path . 'admin/class-project-edit.php'    );
//			 require_once( $this->dir_path . 'admin/class-settings.php'        );
		 }
	 }

	 /**
	  * Sets up initial actions.
	  *
	  * @since  1.0.0
	  * @access private
	  * @return void
	  */
	 private function setup_actions() {

		 // Internationalize the text strings used.
		 add_action( 'plugins_loaded', array( $this, 'i18n' ), 2 );

		 // Register activation hook.
		 register_activation_hook( __FILE__, array( $this, 'activation' ) );
	 }

	 /**
	  * Loads the translation files.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return void
	  */
	 public function i18n() {

		 load_plugin_textdomain( 'backdrop-custom-portfolio', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) . 'lang' );
	 }

	 /**
	  * Method that runs only when the plugin is activated.
	  *
	  * @since  1.0.0
	  * @access public
	  * @global $wpdb
	  * @return void
	  */
	 public function activation() {

		 // Temp. code to make sure post types and taxonomies are correct.
		 global $wpdb;

		 $wpdb->query( "UPDATE {$wpdb->posts}         SET post_type = 'portfolio_project'  WHERE post_type = 'portfolio_item'"     );
		 $wpdb->query( "UPDATE {$wpdb->postmeta}      SET meta_key  = 'url'                WHERE meta_key  = 'portfolio_item_url'" );
		 $wpdb->query( "UPDATE {$wpdb->term_taxonomy} SET taxonomy  = 'portfolio_category' WHERE taxonomy  = 'portfolio'"          );

		 // Get the administrator role.
		 $role = get_role( 'administrator' );

		 // If the administrator role exists, add required capabilities for the plugin.
		 if ( ! is_null( $role ) ) {

			 // Remove old caps.
			 $role->remove_cap( 'manage_portfolio'       );
			 $role->remove_cap( 'create_portfolio_items' );
			 $role->remove_cap( 'edit_portfolio_items'   );

			 // Taxonomy caps.
			 $role->add_cap( 'manage_portfolio_categories' );
			 $role->add_cap( 'edit_portfolio_categories'   );
			 $role->add_cap( 'delete_portfolio_categories' );
			 $role->add_cap( 'assign_portfolio_categories' );

			 $role->add_cap( 'manage_portfolio_tags'       );
			 $role->add_cap( 'edit_portfolio_tags'         );
			 $role->add_cap( 'delete_portfolio_tags'       );
			 $role->add_cap( 'assign_portfolio_tags'       );

			 // Post type caps.
			 $role->add_cap( 'create_portfolio_projects'           );
			 $role->add_cap( 'edit_portfolio_projects'             );
			 $role->add_cap( 'edit_others_portfolio_projects'      );
			 $role->add_cap( 'publish_portfolio_projects'          );
			 $role->add_cap( 'read_private_portfolio_projects'     );
			 $role->add_cap( 'delete_portfolio_projects'           );
			 $role->add_cap( 'delete_private_portfolio_projects'   );
			 $role->add_cap( 'delete_published_portfolio_projects' );
			 $role->add_cap( 'delete_others_portfolio_projects'    );
			 $role->add_cap( 'edit_private_portfolio_projects'     );
			 $role->add_cap( 'edit_published_portfolio_projects'   );
		 }
	 }
 }

/**
 * Gets the instance of the `CCP_Plugin` class.  This function is useful for quickly grabbing data
 * used throughout the plugin.
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function bcp_plugin(): object {
	return BCP_Plugin::get_instance();
}

bcp_plugin();
