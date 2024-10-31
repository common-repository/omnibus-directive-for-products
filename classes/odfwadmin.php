<?php

namespace ofwp;

class odfwAdmin {
	public $options;

	function __construct()
	{
		add_action( 'admin_menu', array($this, 'addWoomnibusPage' ));
		add_action( 'admin_init', array($this, 'registerWoomnibusSettings' ));

	}
	public function addWoomnibusPage()
	{
		add_menu_page(
			'Woomnibus',
			'Woomnibus',
			'administrator',
			__FILE__,
			array($this, 'createWoomnibusAdminPage'),
			get_stylesheet_directory_uri('stylesheet_directory') . "/images/icon.png");
	}

	public function createWoomnibusAdminPage()
	{
		// Set class property
		$this->options = get_option( 'woomnibus_option' );
		?>
		<div class="wrap">
			<h1>Woomnibus - Woocommerce Omnibus Plugin</h1>
			<form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields
				settings_fields( 'woomnibus_options' );
				do_settings_sections( 'woomnibus_settings_section' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}


	function registerWoomnibusSettings()
    {
		//register our settings
		register_setting(
			'woomnibus_options', // Option group
			'woomnibus_option', // Option name

		);

		add_settings_section(
			'woomnibus_options_section', // ID
			'My Custom Settings', // Title
			array( $this, 'print_section_info' ), // Callback
			'woomnibus_settings_section' // Page
		);

		add_settings_field(
			'price_message', // ID
			'Price Message', // Title
			array( $this, 'price_message_callback' ), // Callback
			'woomnibus_settings_section', // Page
			'woomnibus_options_section' // Section
		);

		add_settings_field(
			'date_message',
			'Date message',
			array( $this, 'date_message_callback' ),
			'woomnibus_settings_section',
			'woomnibus_options_section'
		);
	}

	public function sanitize( $input )
	{
		$new_input = array();
		if( isset( $input['price_message'] ) )
			$new_input['price_message'] = sanitize_text_field( $input['price_message'] );
		if( isset( $input['date_message'] ) )
			$new_input['date_message'] = sanitize_text_field( $input['date_message'] );

		return $new_input;
	}
	public function print_section_info()
	{
		print 'Set your lowest price messages text:';
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function price_message_callback()
	{
		printf(
			'<input type="text" id="price_message" name="woomnibus_option[price_message]" value="%s" />',
			isset( $this->options['price_message'] ) ? esc_attr( $this->options['price_message']) : ''
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function date_message_callback()
	{
		printf(
			'<input type="text" id="date_message" name="woomnibus_option[date_message]" value="%s" />',
			isset( $this->options['date_message'] ) ? esc_attr( $this->options['date_message']) : ''
		);
	}
}



