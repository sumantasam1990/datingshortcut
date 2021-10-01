<?php
class My_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once('widget1.php');
		require_once('widget2.php');
		require_once('filter-btn.php');
		require_once('futuredates.php');
		require_once('publicprofile.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\My_Widget_1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\My_Widget_2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\My_Widget_3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\My_Widget_4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\My_Widget_5() );
	}

}

add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
	My_Elementor_Widgets::get_instance();
}