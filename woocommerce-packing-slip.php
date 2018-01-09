<?php
/** 
 * Plugin Name:  Shipping and Warehouse Label
 * Description:  Plugin to create Shipping and Warehouse Label.
 * Version:      1.0.0
 * Author:       Tonjoo
 * Author URI:   http://www.tonjoo.com/
 * Plugin URI:   http://www.tonjoostudio.com/plugin/shipping-and-warehouse-label
 * License:      GPL
 * Text Domain:  swl
 * Domain Path:  /languages 
 **/

// exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Shipping_And_Warehouse_Label' ) ) {

	/**
	 * Main Class Shipping_And_Warehouse_Label
	 */
	class Shipping_And_Warehouse_Label {

		/**
		 * Class constructor.
		 *
		 * @return void
		 */
		public function __construct() {

			$this->define_constants();
			$this->includes();

			add_action( 'plugins_loaded', array( $this, 'swl_load_textdomain' ) );	
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

			new SWL_Admin_Page();
		}

		/**
		 * Setup plugin constants.
		 *
		 */
		public function define_constants() {
			define( 'SWL_VERSION', '1.0.0' );
			define( 'SWL_URL', plugins_url( '', __FILE__ ) );
			define( 'SWL_PATH', plugin_dir_path( __FILE__ ) );
			define( 'SWL_REL_PATH', dirname( plugin_basename( __FILE__ ) ) . '/' );
			define( 'SWL_LIMIT_ITEM', apply_filters( 'swl_limit_order_item', 14 ) );
		}

		/**
		 * Include required files.
		 *
		 */
		public function includes() {
			include_once SWL_PATH . 'inc/helpers.php';
			include_once SWL_PATH . 'inc/class-admin-page.php';
			include_once SWL_PATH . 'inc/class-pdf-maker.php';
		}

		/**
		 * Enqueue BE scripts and styles.
		 *
		 * @global string $post_type
		 */
		public function admin_enqueue_scripts() {
			//wp_enqueue_style( 'swl-print-style', SWL_URL . '/assets/css/style.css' );
		}

		/**
		 * Load translation
		 */
		public function swl_load_textdomain() {
			load_plugin_textdomain( 'swl', false, SWL_REL_PATH . 'languages' );
		}

	}

	new Shipping_And_Warehouse_Label();

}
