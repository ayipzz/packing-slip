<?php
include_once SWL_PATH . 'vendor/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

if ( ! class_exists( 'SWL_Pdf_Maker' ) ) {
	
	/**
	 * Main Class SWL_Pdf_Maker
	 */
	class SWL_Pdf_Maker {

		/**
		 * Class constructor.
		 *
		 * @return void
		 */
		public function __construct() {
			
			add_action( 'admin_post_generate_swl_download_file', array( $this, 'swl_download_file' ) );	
		}

		/**
		 * Convert to pdf, ready to download
		 * 
		 * @param  $content - html template
		 */
		public function pdf_output( $content, $order_id ) {

			echo $content;
			die();
			
			$dompdf = new Dompdf();
			$dompdf->set_option('isRemoteEnabled', true);
			$dompdf->set_option('isJavascriptEnabled', true);
			$dompdf->set_option('isHtml5ParserEnabled', true);
			$dompdf->loadHtml( $content );
			$dompdf->set_paper( 'A4' , 'portrait' );
			$dompdf->render();
			
			$doctitle = $order_id;
			$dompdf->stream( $doctitle );
			 
			exit();
		}

		/**
		 * handle action download file button
		 * @return pdf file
		 */
		public function swl_download_file() {
			$content = '';
			$ex_order_id = explode( "_" , sanitize_text_field( $_GET['o_id'] ) );

			foreach ( $ex_order_id as $o_id ) {
				$order_id = $o_id;
				$order = new WC_Order( $order_id );
				$courier = get_post_meta( $order_id, 'plugin_resi_ekspedisi_nama',true );
				
				ob_start();

				include apply_filters( 'swl_template', SWL_PATH . 'templates/template-default.php' );
				$content .= ob_get_clean();
			}

			$this->pdf_output( $content, $order_id );
			
		}

	}

	new SWL_Pdf_Maker();

}
