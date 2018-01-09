<main>
    <div class="main-wrapper">
		<div class="head">
		    <h3 class="text-left">Packing Slip</h3>
		    <span class="order-id">Order ID: #<?php echo $order_id; ?></span>
		    <span class="date"><?php echo wc_format_datetime( $order->get_date_created() ); ?></span> 
		</div>

		<?php 
		for ( $i2=0; $i2 < $page; $i2++) { 
		?>
			<div class="<?php echo $i2 > 0 ? 'right' : 'left'; ?>">
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
				<?php if ( $i2 > 0 ) { ?>
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
		<?php } ?>
		<div class="clearfix"></div>
	</div>
</main>
<main>
    <div class="main-wrapper">
		<div class="head">
			<h3 class="text-left">Packing Slip (Admin Gudang)</h3>
		    <span class="order-id">Order ID: #<?php echo $order_id; ?></span>
		    <span class="date"><?php echo wc_format_datetime( $order->get_date_created() ); ?></span> 
		</div>

		<?php 
		for ( $i2=0; $i2 < $page; $i2++) { 
		?>
			<div class="<?php echo $i2 > 0 ? 'right' : 'left'; ?>">
				<table class="display tables" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th><?php _e( 'product', 'swl' ); ?></th>
							<th><?php _e( 'quantity', 'swl' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						swl_order_items( $order, false, ( SWL_LIMIT_ITEM * $i2 ), ( SWL_LIMIT_ITEM * ( $i2 + 1 ) ) );
						?>
					</tbody>
				</table>	
			</div>
		<?php } ?>
		<div class="clearfix"></div>
	</div>
</main>
