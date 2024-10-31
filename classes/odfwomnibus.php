<?php

namespace ofwp;

class odfwomnibus {
	function __construct()
	{
		add_filter( 'woocommerce_get_price_html', array($this,'addWoomnibusLowestPrice' ));
		add_filter( 'woocommerce_before_variations_form', array($this,'addWoomnibusLowestPrice' ));
	}

	function addWoomnibusLowestPrice( $price )
	{
		global $post;
		$options = get_option('woomnibus_option');
		$lowestprice = get_post_meta($post->ID, 'price', true);
		$pricedate = get_post_meta($post->ID, 'date', true);
		$message = $options['price_message'];
		$message2 =$options['date_message'];

		if ( is_singular() && !empty($lowestprice))
		{
			$price .= '<span class="lowestprice" style="display:block; font-size: 14px"> '.$message.$lowestprice.'</span><span class="lowestprice" style="display:block; font-size: 14px"> '.$message2.$pricedate.'</span>';
			return $price;
		}
		else
		{
			return $price;
		}
	}
}