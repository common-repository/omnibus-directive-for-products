<?php

/*
Plugin Name: Omnibus Directive for Products
Plugin URI: https://mateuszwitkowski.pl/woocommerce-omnibus
Description: Add lowest price from 30 days to your Woocommerce products
Version: 1.0.2
Author: mateuszwitkowski
Author URI: https://mateuszwitkowski.pl
License: MIT
*/

include( 'classes/odfwadmin.php' );
include( 'classes/odfwmetabox.php' );
include( 'classes/odfwomnibus.php' );


use ofwp\odfwAdmin;
use ofwp\odfwmetabox;
use ofwp\odfwomnibus;

new odfwAdmin();
new odfwmetabox();
new odfwomnibus();


function addWoomnibusMetabox()
{
	include plugin_dir_path( __FILE__ ) . './templates/productForm.php';
}