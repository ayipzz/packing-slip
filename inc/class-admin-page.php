<?php
/**
 * SWL_Admin_Page 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SWL_Admin_Page' ) ) {

	/**
	 *
	 * Class for Manage reseller SWL_Admin_Page
	 */
	class SWL_Admin_Page {

		/**
		 * Constructor.
		 *
		 * @version 1.0.0
		 */
		public function __construct() {
			add_action( 'add_meta_boxes', array( $this, 'meta_box_download_invoice' ) );
			add_filter( 'post_row_actions', array( $this, 'swl_order_row_action' ), 10, 2);
			add_filter( 'bulk_actions-edit-shop_order', array( $this, 'swl_order_bulk_action' ), 10, 2 );
			add_filter( 'handle_bulk_actions-edit-shop_order', array( $this, 'swl_order_bulk_action_handle' ), 10, 3 );
		}

		/**
		 * Create Metabox Download Invoice to edit order/ order detail
		 * 
		 */
		public function meta_box_download_invoice() {
			add_meta_box(
		        'swl_download_invoice',
		        __( 'download_invoice', 'swl' ),
		        array( $this, 'download_invoice_content' ),
		        'shop_order',
		        'side',
		        'high'
		    );
		}

		/**
		 * Content Metabox Download Invoice
		 */
		public function download_invoice_content() {
			global $post;
			echo sprintf( '<a href="%s" class="button button-primary">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=generate_swl_download_file&o_id='.$post->ID ), 'download_action', 'download_nonce' ), __( 'download_invoice', 'swl' ) );
		}

		/**
		 * Add new row action download invoice to woocommerce table order
		 * 
		 * @param  array $actions list action link
		 * @param  object $order   order detail
		 * @return array
		 */
		public function swl_order_row_action( $actions, $order ) {
			if ( $order->post_type == 'shop_order' ) {
				$actions['swl_download_invoice'] = sprintf( '<a href="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=generate_swl_download_file&o_id='.$order->ID ), 'download_action', 'download_nonce' ), __( 'download_invoice', 'swl' ) );
			}
			
			return $actions;
		}

		/**
		 * Add new Bulk action download invoices to table order woocommerce
		 * @param  array $actions
		 * @return array
		 */
		public function swl_order_bulk_action( $actions ) {
			$actions['swl_download_invoices'] = __( 'download_invoices', 'swl' );

			return $actions;
		}

		/**
		 * method to handle Download invoice bulk action
		 * 
		 * @param  $redirect_to
		 * @param  $action
		 * @param  $ids
		 * 
		 * @return array
		 */
		public function swl_order_bulk_action_handle( $redirect_to, $action, $ids ) {
			$order_id = '';
			if ( $ids ) {
				$no = 0;
				foreach ( $ids as $id ) {
					if ( $no > 0 ) $order_id .= '_'; 
					$order_id .= $id;
					$no++;
				}
			}

			//$redirect_to = wp_nonce_url( admin_url( 'admin-post.php?action=generate_swl_download_file&o_id='.$order_id ), 'download_action', 'download_nonce' );

			//$action = 'generate_swl_download_file';
			$redirect_to = add_query_arg( array(
				'action' => 'generate_swl_download_file',
				'o_id' => $order_id
			), admin_url( 'admin-post.php' ) );

			return wp_safe_redirect( $redirect_to );
		}

	}

}