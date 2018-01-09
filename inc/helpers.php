<?php
/**
 * Display order item
 * 
 * @param  object  $order order data detail
 * @param  boolean $price display product price or not
 * @param  integer $start item start display
 * @param  integer $limit limit display item per column
 */
function swl_order_items( $order, $price = true, $start = 0, $limit = 16 ) {
	$items = $order->get_items();
	$no = 0;
	foreach ( $items as $item_id => $item ) :
		if ( $no >= $start && $no < $limit ) {
			$product = $item->get_product();
				?>
			<tr>
				<td><?php echo $item->get_name(); wc_display_item_meta( $item ); ?></td>
				<td align="center"><?php echo $item->get_quantity(); ?></td>
				<?php if ( isset( $price ) && $price == true ) { ?>
					<td align="right"><?php echo $order->get_formatted_line_subtotal( $item ); ?></td>
				<?php } ?>
			</tr>
			<?php
		}
		$no++;
	endforeach; 
}