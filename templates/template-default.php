<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Invoice</title>
        <link href="<?php echo SWL_URL . '/assets/css/style.css'; ?>" rel="stylesheet" media="all" type="text/css">  
	</head>
	<body>
		<div class="wrapper" style="page-break-inside:avoid;">
            <header>
                <div class="header-content">
                    <div class="left relative">
                        <div id="logo" class="site-brand">
                            <h1><img src="<?php echo apply_filters( 'swl_template_logo', SWL_URL . '/assets/img/logo.jpg' ); ?>" width="140"></h1>
                        </div>
                        <span class="order-id">Order ID: #<?php echo $order_id; ?></span>
                        <span class="date"><?php echo wc_format_datetime( $order->get_date_created() ); ?></span>
                        <?php if ( ! empty( $courier ) ) : ?>
							<span class="ekspedisi">Pengiriman : <?php echo $courier; ?></span>
						<?php endif; ?>
                    </div>
                    <div class="right">
                        <div class="right-item">
                            <span class="label"><?php echo __( 'customer_name', 'swl' ); ?></span>
                            <span class="value"><?php echo ucwords( strtolower( $order->get_formatted_billing_full_name() ) ); ?></span>
                        </div>
                        <div class="right-item">
                            <span class="label">Alamat</span>
                            <span class="value">
                                <?php
                                echo '<p>'.$order->get_billing_address_1() .'<p>';
                                echo '<p>'.$order->get_billing_city() .', '. $order->get_billing_postcode() .'<p>';
                                echo '<p>'.$order->get_billing_phone() .'<p>';
                                ?>
                            </span>
                        </div>                        
                    </div>
                </div>
            </header>
            
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