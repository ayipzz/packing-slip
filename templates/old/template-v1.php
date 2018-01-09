<h3>Packing Slip</h3>
<p>Order ID : #<?php echo $order_id; ?></p>
<p><?php echo wc_format_datetime( $order->get_date_created() ); ?></p>
<div style="overflow: auto;">
	<?php 
	for ( $i2=0; $i2 < $page; $i2++) { 
	?>
		<div style="width: 45%; display: inline-block; vertical-align: top">
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
					swl_order_items( $order, true, ( SWL_LIMIT_ITEM * $i2 ), ( SWL_LIMIT_ITEM * ( $i2 + 1 ) ) );
					?>
				</tbody>
				<?php
				if ( $i2 > 0 ) { ?>
					<tfoot>
						<?php
							if ( $totals = $order->get_order_item_totals() ) {
								foreach ( $totals as $total ) {
									?><tr>
										<th colspan="2"><?php echo $total['label']; ?></th>
										<td><?php echo $total['value']; ?></td>
									</tr><?php
								}
							}
						?>
					</tfoot>
				<?php } ?>
			</table>	
		</div>
	<?php } ?>
</div>
<div style="overflow: auto;">
	<hr />
	<h3>Packing Slip (Gudang)</h3>
	<p>Order ID : #<?php echo $order_id; ?></p>
	<p><?php echo wc_format_datetime( $order->get_date_created() ); ?></p>
	<?php 
	for ( $i3=0; $i3 < $page; $i3++) { 
	?>
		<div style="width: 42%; display: inline-block; vertical-align: top">
			<table border="1" width="100%">
				<thead>
					<tr>
						<th><?php _e( 'product', 'swl' ); ?></th>
						<th><?php _e( 'quantity', 'swl' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					swl_order_items( $order, false, ( SWL_LIMIT_ITEM * $i3 ), ( SWL_LIMIT_ITEM * ( $i3 + 1 ) ) );
					?>
				</tbody>
				
			</table>	
		</div>
	<?php } ?>
</div>