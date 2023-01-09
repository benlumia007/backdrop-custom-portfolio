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
 * Text Domain: backdrop-custom-portfolio
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
	  * Returns the instance.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return object
	  */
	 public static function get_instance(): object {

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
	  * Initial plugin setup.
	  *
	  * @since  1.0.0
	  * @access private
	  * @return void
	  */
	 private function setup(): void {

		 $this->dir_path = trailingslashit( plugin_dir_path( __FILE__ ) );
	 }

	 /**
	  * Initial includes.
	  *
	  * @since  1.0.0
	  * @access private
	  * @return void
	  */
	 private function includes(): void {

		 // Load helper files.
		 array_map( function( $file ) {
			 require_once $this->dir_path . "inc/helpers/$file.php";
		 }, [
			 'general',
			 'rewrite'
		 ] );

		 // Load post type
		 array_map( function( $file ) {
			 require_once $this->dir_path . "inc/post-type/$file.php";
		 }, [
			 'backdrop-portfolio'
		 ] );

		 // Load post type taxonomies
		 array_map( function( $file ) {
			 require_once $this->dir_path . "inc/taxonomies/$file.php";
		 }, [
			 'features',
			 'layouts',
			 'subjects'
		 ] );

		 // Load functions files.
//		 require_once( $this->dir_path . 'inc/functions-filters.php'      );
//		 require_once( $this->dir_path . 'inc/functions-options.php'      );
//		 require_once( $this->dir_path . 'inc/functions-meta.php'         );
//		 require_once( $this->dir_path . 'inc/functions-rewrite.php'      );
//		 require_once( $this->dir_path . 'inc/functions-taxonomies.php'   );
//		 require_once( $this->dir_path . 'inc/functions-project.php'      );

		 // Load template files.
//		 require_once( $this->dir_path . 'inc/template-project.php'  );
//		 require_once( $this->dir_path . 'inc/template-general.php'  );

		 // Load admin files.
//		 if ( is_admin() ) {
//			 require_once( $this->dir_path . 'admin/functions-admin.php'       );
//			 require_once( $this->dir_path . 'admin/class-manage-portfolio.php' );
//			 require_once( $this->dir_path . 'admin/class-project-edit.php'    );
//			 require_once( $this->dir_path . 'admin/class-settings.php'        );
//		 }
	 }

	 /**
	  * Sets up initial actions.
	  *
	  * @since  1.0.0
	  * @access private
	  * @return void
	  */
	 private function setup_actions(): void {

		 // Internationalize the text strings used.
		 add_action( 'plugins_loaded', [ $this, 'i18n' ], 2 );
	 }

	 /**
	  * Loads the translation files.
	  *
	  * @since  1.0.0
	  * @access public
	  * @return void
	  */
	 public function i18n(): void {

		 load_plugin_textdomain( 'backdrop-custom-portfolio', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) . 'language' );
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
