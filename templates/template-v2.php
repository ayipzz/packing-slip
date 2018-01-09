<main>
	<div class="main-wrapper">
		<div class="left">
		    <h3 class="text-center">Packing Slip</h3>
		    <span class="order-id">Order ID: #<?php echo $order_id; ?></span>
		    <span class="date"><?php echo wc_format_datetime( $order->get_date_created() ); ?></span> 

			<?php 
			for ( $i2=0; $i2 < $page; $i2++) { 
			?>
				<table class="display tables" width="100%" cellspacing="0">
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
				</table>
				<div class="calculate">
				<?php
					if ( $totals = $order->get_order_item_totals() ) {
						foreach ( $totals as $total ) { ?>
				            <div class="item <?php echo $total['label'] == 'Total:' ? 'total' : ''; ?>">
				                <span class="calc-label"><?php echo $total['label']; ?></span>
				                <span class="calc-value"><i><?php echo $total['value']; ?></i></span>
				            </div>
				        <?php
				    	}
				    }
		            ?>                                       
		        </div>
			<?php } ?>
		</div>
		<div class="right">
			<h3 class="text-center">Packing Slip (Admin Gudang)</h3>
		    <span class="order-id">Order ID: #<?php echo $order_id; ?></span>
		    <span class="date"><?php echo wc_format_datetime( $order->get_date_created() ); ?></span> 

			<?php 
			for ( $i3=0; $i3 < $page; $i3++) { 
			?>
				<table class="display tables" width="100%" cellspacing="0">
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
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
</main>