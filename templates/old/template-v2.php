<div style="overflow: auto;">
	<div style="width: 42%; display: inline-block; vertical-align: top">
		<h3>Packing Slip</h3>
		<p>Order ID : #<?php echo $order_id; ?></p>
		<p><?php echo wc_format_datetime( $order->get_date_created() ); ?></p>
		<table border="1" width="100%">
			<thead>
				<tr>
					<th><?php _e( 'product', 'swl' ); ?></th>
					<th><?php _e( 'quantity', 'swl' ); ?></th>
					<th><?php _e( 'price', 'swl' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				swl_order_items( $order, true );
				?>
			</tbody>
			<tfoot>
				<?php
					if ( $totals = $order->get_order_item_totals() ) {
						$i = 0;
						foreach ( $totals as $total ) {
							$i++;
							?><tr>
								<th colspan="2"><?php echo $total['label']; ?></th>
								<td><?php echo $total['value']; ?></td>
							</tr><?php
						}
					}
				?>
			</tfoot>
		</table>	
	</div>

	<div style="width: 42%; display: inline-block; vertical-align: top">
		<h3>Packing Slip (Admin Gudang)</h3>
		<p>Order ID : #<?php echo $order_id; ?></p>
		<p><?php echo wc_format_datetime( $order->get_date_created() ); ?></p>
		<table border="1" width="100%">
			<thead>
				<tr>
					<th><?php _e( 'product', 'swl' ); ?></th>
					<th><?php _e( 'quantity', 'swl' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				swl_order_items( $order, false );
				?>
			</tbody>
		</table>
	</div>
</div>