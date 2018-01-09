<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<div style="page-break-inside:avoid;">
			<img src="<?php echo apply_filters( 'swl_template_logo', SWL_URL . '/assets/img/logo.jpg' ); ?>" width="140">
			<h3><?php echo __( 'order_id', 'swl' ); ?> : #<?php echo $order_id; ?></h3>
			<p><?php echo wc_format_datetime( $order->get_date_created() ); ?></p>

			<?php do_action( 'swl_' ); ?>
			<?php if ( ! empty( $courier ) ) {
				echo '<h2>' . $courier . '</h2>';
			}
			?>
			<table border="1">
				<tr>
					<td><?php echo __( 'customer_name', 'swl' ); ?></td>
					<td><?php echo $order->get_formatted_billing_full_name(); ?></td>
				</tr>
				<tr>
					<td><?php echo __( 'customer_address', 'swl' ); ?></td>
					<td><?php echo $order->get_formatted_billing_address(); ?></td>
				</tr>
			</table>
			<hr />

			<?php 
				$page = ceil( count( $order->get_items() ) / SWL_LIMIT_ITEM );
				// select template 1 if item more than SWL_LIMIT_ITEM
				if ( $page > 1 ) {
					include SWL_PATH . "templates/template-v1.php";
				} else {
					include SWL_PATH . "templates/template-v2.php";
				}
			?>
		</div>
	</body>
</html>