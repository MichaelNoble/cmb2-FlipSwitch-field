<?php


function cmb2_init_switch_field() {
	require_once dirname( __FILE__ ) . '/class-cmb2-render-switch-field.php';
	CMB2_Render_Switch_Field::init();
	// $cmb2_switch_button = new CMB2_Type_Switch();
}
add_action( 'cmb2_init', 'cmb2_init_switch_field');
