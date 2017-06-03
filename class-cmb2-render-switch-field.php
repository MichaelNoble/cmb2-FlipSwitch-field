<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'cmb2_Render_Switch_Field' ) ) {
	/**
	 * Class CMB2_Button_Switch
 	*/
	class cmb2_Render_Switch_Field extends CMB2_Type_Base{
		const VERSION = '0.1.0';

		public static function init() {
		//	add_action( 'cmb2_render_switch', array( $this, 'render_switch' ), 10, 5 );
			add_action( 'admin_enqueue_scripts', array( __CLASS__, 'setup_admin_scripts' ) );

			add_filter( 'cmb2_render_class_switch', array( __CLASS__, 'class_name' ) );

		}

		public static function class_name() { return __CLASS__; }

		public function render() {

		    $label =(isset($this->field->args['label'])?esc_attr($this->field->args['label']):'OnOff');
		   
		
			return $this->rendered( 
				$this->types->checkbox( array( 
						'class' => 'cmb2-flipswitch fs-' . $label,
						'value' => 'on',
					 ) )
			 );	
		}

		public static function setup_admin_scripts() {
			// Get correct URL and path to wp-content
			$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
			// Fix path on Windows
			$dir = wp_normalize_path( __DIR__ );
			$content_dir = wp_normalize_path( untrailingslashit( WP_CONTENT_DIR ) );

			$url = str_replace( $content_dir, $content_url, $dir );
			wp_enqueue_style( 'flipswitch-css', $url . '/flipswitch.css', array(), self::VERSION );
			wp_enqueue_script( 'flipswitch-js', $url . '/jquery.onoff.js', array(), self::VERSION, true );
		}

	}
	
}

