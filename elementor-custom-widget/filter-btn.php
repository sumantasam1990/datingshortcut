<?php
namespace Elementor;

class My_Widget_3 extends Widget_Base {
	
	public function get_name() {
		return 'DSFilterButton';
	}
	
	public function get_title() {
		return 'DS Filter Button';
	}
	
	public function get_icon() {
		return 'fas fa-filter';
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
			'bt',
			[
				'label' => __( 'Button Title', 'ds' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' => __( 'Button Color', 'ds' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .dropdown' => 'color: {{VALUE}}',
				],
			]
		);

        

		$this->end_controls_section();
	}
	
	protected function render() {
        $settings = $this->get_settings_for_display();
        
        ?>

        <div class="ds-filter">
            
            <div class="dropdown">
            <a class="btn btn-primary dropdown-toggle" style="background-color: <?php echo $settings['btn_color']; ?>;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $settings['bt']; ?>
            </a>

            <form class="dropdown-menu" style="border-radius: 16px; box-shadow: 0 0 20px #1113; border: 0; padding: 10px; margin-top: 10px !important;" action="" method="get">

				<div style="padding: 10px;">
				<p style="font-weight: bold;">Age</p>
				
				<div style="margin-top: -10px;">
				<input type="text" id="amount" readonly style="border:0; color:#000; font-weight:bold;">
				<input type="hidden" id="amount_hd" name="amount_hd" readonly style="border:0; color:#f6931f; font-weight:bold;">
				

				<div id="slider-range"></div>
				</div>
				



				
				<p class="mt-3" style="font-weight: bold;">Ethinicity</p>
				<div class="form-check">
				<input checked class="form-check-input" type="checkbox" name="eth[]" id="flexRadioDefault1" value="Black">
				<label class="form-check-label" for="flexRadioDefault1">
					Black
				</label>
				</div>
				<div class="form-check">
				<input checked class="form-check-input" type="checkbox" name="eth[]" id="flexRadioDefault1" value="White">
				<label class="form-check-label" for="flexRadioDefault1">
					White
				</label>
				</div>
				<div class="form-check">
				<input checked class="form-check-input" type="checkbox" name="eth[]" id="flexRadioDefault1" value="Hispanic">
				<label class="form-check-label" for="flexRadioDefault1">
					Hispanic
				</label>
				</div>
				<div class="form-check">
				<input checked class="form-check-input" type="checkbox" name="eth[]" id="flexRadioDefault1" value="Asian">
				<label class="form-check-label" for="flexRadioDefault1">
					Asian
				</label>
				</div>

				<p class="mt-3" style="font-weight: bold;">Verified users</p>
				<div class="form-check form-check-inline">
				<input checked class="form-check-input" type="radio" name="vu" id="flexRadioDefault1" value="yes">
				<label class="form-check-label" for="flexRadioDefault1">
					Yes
				</label>
				</div>
				<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="vu" id="flexRadioDefault2" value="no">
				<label class="form-check-label" for="flexRadioDefault1">
					No
				</label>
				</div>

				
				</div>

				<div class="d-grid gap-2">
					<button type="submit" name="filter_btn" class="btn btn-danger btn-sm mt-3">Apply filter</button>
				</div>
				
			</form>

            </div>
            
        </div>


<?php 
		 

	}
	
	protected function _content_template() {
       
    }
	
	
}