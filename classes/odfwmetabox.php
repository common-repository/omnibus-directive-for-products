<?php

namespace ofwp;

class odfwmetabox {

	public function __construct()
	{
		//add_action( 'woocommerce_product_options_general_product_data', 'addWoomnibusMetabox' );
		add_action( 'woocommerce_product_options_advanced', 'addWoomnibusMetabox');
		add_action( 'save_post', array($this, 'saveWoomnibusMeta') );

	}

	function saveWoomnibusMeta( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}
		$fields = [
			'price',
			'date',
		];
		foreach ( $fields as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
			}
		}
	}
}


