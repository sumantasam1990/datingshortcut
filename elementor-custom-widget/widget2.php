<?php
namespace Elementor;

class My_Widget_2 extends Widget_Base {
	
	public function get_name() {
		return 'DSsearchusers';
	}
	
	public function get_title() {
		return 'DS search users';
	}
	
	public function get_icon() {
		return 'fas fa-search';
	}
	
	public function get_categories() {
		return [ 'basic' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'ds' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'placeholder',
			[
				'label' => __( 'Textbox placeholder', 'ds' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);
		
		$this->add_control(
			'bt',
			[
				'label' => __( 'Button Title', 'elementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);

        // $this->add_control(
		// 	'Require_Logged_In',
		// 	[
		// 		'label' => __( 'Require Logged In?', 'elementor' ),
		// 		'type' => Controls_Manager::SWITCHER,
		// 		'label_on' => __( 'Yes', 'your-plugin' ),
		// 		'label_off' => __( 'No', 'your-plugin' ),
		// 		'return_value' => 'yes',
		// 		'default' => 'yes',
		// 	]
		// );

		// $this->add_control(
		// 	'link',
		// 	[
		// 		'label' => __( 'Link', 'elementor' ),
		// 		'type' => Controls_Manager::URL,
		// 		'placeholder' => __( 'https://your-link.com', 'elementor' ),
		// 		'default' => [
		// 			'url' => '',
		// 		]
		// 	]
		// );

		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        
        ?>

        <div class="ds-search">
            <form class="" action="" method="get">
                <input style="border-radius: 25px !important; font-weight: bold; box-shadow: 0 1px 4px 2px #00000014; border: 0; padding: 12px !important;" type="search" value="<?php echo (isset($_GET['q']) ? $_GET['q'] : ''); ?>" name="q" class="form-control" placeholder="<?php echo $settings['placeholder']; ?>">
                <button name="search" style="display: none;" type="submit" class="btn btn-primary"><?php echo $settings['bt']; ?></button>
            </form>
        </div>


<?php 
		 

	}
	
	protected function _content_template() {

    }
	
	
}