<?php

namespace Elementor;

class My_Widget_5 extends Widget_Base
{

	public function get_name()
	{
		return 'dspublicprofile';
	}

	public function get_title()
	{
		return 'DS Public Profile';
	}

	public function get_icon()
	{
		return 'fas fa-user';
	}

	public function get_categories()
	{
		return ['basic'];
	}

	protected function _register_controls()
	{

		$this->start_controls_section(
			'section_title',
			[
				'label' => __('Heading', 'ds'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);




		$this->add_control(
			'heading_color',
			[
				'label' => __('Text Color', 'ds'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ds-head-txt-color' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __('Typography', 'plugin-domain'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ds-head-txt-typo',
			]
		);



		$this->end_controls_section();


		//<!-------- name section --------->

		$this->start_controls_section(
			'namesec',
			[
				'label' => __('User Name', 'ds'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'user_info_color',
			[
				'label' => __('Text Color', 'ds'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ds-user-info-txt-color' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'user_info_typography',
				'label' => __('Typography', 'ds'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ds-user-info-txt-typo',
			]
		);



		$this->end_controls_section();


		//<!-------- left sidebar section --------->

		$this->start_controls_section(
			'left_sidebar',
			[
				'label' => __('Left Sidebar', 'ds'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'br',
			[
				'label' => __('Profile Photo Border Radius', 'ds'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('', 'ds'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'vr_box_shadow',
				'label' => __('Profile Photo Box Shadow', 'ds'),
				'selector' => '{{WRAPPER}} .profile-photo-box-shadow',
			]
		);


		$this->add_control(
			'vr_color',
			[
				'label' => __('Verify Text Color', 'ds'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ds-vr-txt-color' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'vr_typography',
				'label' => __('Verify Typography', 'ds'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ds-vr-txt-typo',
			]
		);

		$this->add_control(
			'vr_invi_txt',
			[
				'label' => __('Invitation Price Text', 'ds'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('', 'ds'),
			]
		);



		$this->end_controls_section();


		//<!-------- booking box section --------->

		$this->start_controls_section(
			'booking_box',
			[
				'label' => __('Booking Box', 'ds'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bb_br',
			[
				'label' => __('Border Radius', 'ds'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('', 'ds'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bb_shadow',
				'label' => __('Box Shadow', 'ds'),
				'selector' => '{{WRAPPER}} .bb-box-shadow',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'bb_border',
				'label' => __('Border', 'ds'),
				'selector' => '{{WRAPPER}} .bb-border',
			]
		);

		$this->add_control(
			'bb_pad',
			[
				'label' => __('Padding', 'ds'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('', 'ds'),
			]
		);


		$this->add_control(
			'bb_color',
			[
				'label' => __('Text Color', 'ds'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bb-txt-color' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bb_typography',
				'label' => __('Verify Typography', 'ds'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bb-txt-typo',
			]
		);


		$this->add_control(
			'bb_btn_txt',
			[
				'label' => __('Button Text', 'ds'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('', 'ds'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'bb_background',
				'label' => __('Button Background', 'ds'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .bb-wrapper',
			]
		);

		$this->add_control(
			'bb_btn_color',
			[
				'label' => __('Button Text Color', 'ds'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bb-btn-color' => 'color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_section();
	}

	protected function render()
	{

		do_action("ds_booking_now");

		$settings = $this->get_settings_for_display();

		global $wpdb;
		$curUserID = get_current_user_id();
		$loggedin_user = get_user_by('slug', get_query_var('author_name'));

		//get video and status
		$tablename = $wpdb->prefix . "video_verify";
		$usertablename = $wpdb->prefix . "users";
		$sql = "SELECT t1.*,t2.* FROM $tablename t1 LEFT JOIN $usertablename t2 on(t1.vf_user_id=t2.ID) WHERE vf_user_id = '" . $loggedin_user->ID . "'";
		$results = $wpdb->get_results($sql);

		if (empty($loggedin_user)) {
			$loggedin_user = $curUserID->user_login;
		} else {
			$loggedin_user = $loggedin_user;
		}
		$table_book = $wpdb->prefix . "booking";

		$metaID = get_user_meta($loggedin_user->ID, 'avatar_user', true);
		$attachment_url = wp_get_attachment_url($metaID);

		$looking_for = get_user_meta($loggedin_user->ID, 'looking_for', true);
		$tagline = get_user_meta($loggedin_user->ID, 'tag_line', true);
		$offer = get_user_meta($loggedin_user->ID, 'offe_r', true);
		$location = get_user_meta($loggedin_user->ID, 'location', true);
		$age = get_user_meta($loggedin_user->ID, 'age', true);

		$body_type = get_user_meta($loggedin_user->ID, 'body_type', true);
		$hair_color = get_user_meta($loggedin_user->ID, 'hair_color', true);
		$eye_color = get_user_meta($loggedin_user->ID, 'eye_color', true);
		$piercings = get_user_meta($loggedin_user->ID, 'piercings', true);
		$tattoos = get_user_meta($loggedin_user->ID, 'tattoos', true);
		$height = get_user_meta($loggedin_user->ID, 'height', true);
		$smoking = get_user_meta($loggedin_user->ID, 'smoking', true);
		$drinking = get_user_meta($loggedin_user->ID, 'drinking', true);
		$yearly_income = get_user_meta($loggedin_user->ID, 'yearly_income', true);
		$net_worth = get_user_meta($loggedin_user->ID, 'net_worth', true);
		$education = get_user_meta($loggedin_user->ID, 'education', true);
		$sex = get_user_meta($loggedin_user->ID, 'sex', true);
		$my_price = get_user_meta($loggedin_user->ID, 'my_price', true);

		//getting current user's sex
		$sex_cur_user = get_user_meta($curUserID, 'sex', true);





?>

		<div class="container mb-4">

			<div class="row mt-4">

				<div class="col-md-3" style="position: relative;">


					<?php
					if (isset($results[0]->vf_status) == 1) :
					?>
						<div class="ribbon ribbon-top-right-profile">
                        	<span><i class="fas fa-check-circle"></i> Verified</span>
                    	</div>
					<?php endif; ?>

					<?php if (empty($attachment_url) || $loggedin_user->photo_status == 0 || $loggedin_user->photo_status == 1) { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="img-fluid img-thumbnail mb-4 image profile-photo-box-shadow" style="border-radius: <?php echo $settings['br'] ?> !important;" alt="profile photo">
					<?php } else { ?>
						<img src="<?php echo $attachment_url; ?>" class="img-fluid img-thumbnail mb-4 image profile-photo-box-shadow" style="border-radius: <?php echo $settings['br'] ?> !important;" alt="profile photo">
					<?php } ?>

					<h4 class="mb-2"><?php echo $settings['vr_invi_txt']; ?> </h4>
					<h4>$<?php echo $my_price; ?> / 2 hours</h4>

					<div class="d-grid gap-2 mt-3">

						<!-- <?php //if(isset($results[0]->vf_status) == 1) { 
								?>
    <a href="#" class="ds-vr-txt-color ds-vr-txt-typo" style="color: <?php echo $settings['vr_color'] ?> !important;"><i class="fas fa-check-circle"></i> Verified &nbsp; </a>
	<?php //} 
	?> -->

						<!-- <p style="font-weight: 600;" class="mt-3">Video Verification <span class="badge bg-danger"><a style="text-decoration: none; color: #fff;" href=""><i class="fas fa-play-circle"></i> Play</a></span></p>
    <p>John proved they are the person in the photos by recording a video speaking.</p> -->
					</div>

					<?php do_shortcode('[ds-insta-view-photos]'); ?>

				</div>
				<div class="col-md-1"></div>
				<div class="col-md-8">

					<div class="row">

						<div class="col-md-7">

							<h4 class="ds-user-info-txt-color ds-user-info-txt-typo" style="color: <?php echo $settings['user_info_color']; ?>;"> <?php echo ($loggedin_user->user_login ? $loggedin_user->user_login : 'Username'); ?> </h4>
							<p><?php echo (isset($sex) ? $sex : ''); ?></p>

							<p class="text-secondary"><?php echo (isset($tagline) ? $tagline : ''); ?></p>
							<p class="text-secondary"> <?php echo (isset($location) ? $location : ''); ?></p>
							<p class="text-secondary"><?php echo (isset($offer) ? $offer : ''); ?></p>



							<!-- <h4><i class="fas fa-user"></i> Bio</h4>
<p><?php //echo (isset($offer) ? $offer : ''); 
	?></p> -->

							<h4 class="mt-4 ds-head-txt-color ds-head-txt-typo"><i class="fas fa-building"></i> Occupation</h4>
							<p><?php echo (isset($looking_for) ? $looking_for : ''); ?></p>

							<h4 class="mt-6 ds-head-txt-color ds-head-txt-typo"><i class="fas fa-running"></i> Physical</h4>
							<div class="table-responsive">
							<table class="table table-borderless">
								<thead>
									<tr>
										<th style="width: 25%">AGE</th>
										<th style="width: 25%">BODY TYPE</th>
										<th style="width: 25%">GENDER</th>
										<th style="width: 25%">HAIR COLOR</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo (isset($age) ? $age : ''); ?></td>
										<td><?php echo (isset($body_type) ? $body_type : ''); ?></td>
										<td><?php echo (isset($sex) ? $sex : ''); ?></td>
										<td><?php echo (isset($hair_color) ? $hair_color : ''); ?></td>
									</tr>
								</tbody>
							</table>

							<table class="table table-borderless">
								<thead>
									<tr>
										<th style="width: 25%">EYE COLOR</th>
										<th style="width: 25%">PIERCINGS</th>
										<th style="width: 25%">TATTOOS</th>
										<th style="width: 25%">HEIGHT</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo (isset($eye_color) ? $eye_color : ''); ?></td>
										<td><?php echo (isset($piercings) ? $piercings : ''); ?></td>
										<td><?php echo (isset($tattoos) ? $tattoos : ''); ?></td>
										<td><?php echo (isset($height) ? $height : ''); ?></td>
									</tr>
								</tbody>
							</table>


							<h4 class="mt-6 ds-head-txt-color ds-head-txt-typo"><i class="fas fa-glass-cheers"></i> Lifestyle</h4>

							<table class="table table-borderless">
								<thead>
									<tr>
										<th style="width: 25%">SMOKES</th>
										<th style="width: 25%">DRINKS</th>
										<th style="width: 25%">EDUCATION</th>
										<th style="width: 25%">INCOME</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo (isset($smoking) ? $smoking : ''); ?></td>
										<td><?php echo (isset($drinking) ? $drinking : ''); ?></td>
										<td><?php echo (isset($education) ? $education : ''); ?></td>
										<td><?php echo (isset($yearly_income) ? $yearly_income : ''); ?></td>
									</tr>
								</tbody>
							</table>
                                <p class="text-center"><a style="color: #fff;" class="btn btn-dark" href="<?php echo home_url(); ?>/browse"><i class="fas fa-long-arrow-alt-left"></i> Back To Search</a></p>
							</div>

							<!-- <table class="table table-borderless">
<thead>
<tr>
<th style="width: 25%">NET WORTH</th>

</tr>
</thead>
<tbody>
<tr>
<td><?php //echo (isset($net_worth) ? $net_worth : ''); 
	?></td>

</tr>
</tbody>
</table> -->

						</div>

						<div class="col-md-5">


							<div class=" bb-box-shadow bb-border bb-txt-color bb-txt-typo" style="border-radius: <?php echo $settings['bb_br']; ?> !important; padding: <?php echo $settings['bb_pad']; ?>; ">
								<!-- book_now_sec -->
								<h4 class="text-left bb-txt-color bb-txt-typo" style="line-height: 26px; font-size: 16px;" color: <?php echo $settings['bb_color']; ?> !important;>You want to date with <?php echo ($loggedin_user->user_login); ?>? <br> <br> You can now request a two hours invitation date in a restaurant for  $<?php echo $my_price; ?>.</h4>


								<!-- <label id="book_date_time"></label> -->

								<form action="" method="post">
									<div class="d-grid gap-2">
										<?php if (is_user_logged_in()) { ?>
											<?php if ($my_price != '' && $my_price > '0' && $curUserID != $loggedin_user->ID) { ?>


												<a id="book_sub" href="javascript:void(0)" class="btn btn-sm bb-btn-color booknow bb-wrapper" style="color: <?php echo $settings['bb_btn_color'] ?> !important;"><i class="fas fa-calendar-alt"></i> <?php echo $settings['bb_btn_txt'] ?></a>


											<?php } elseif (isset($_GET['action']) == "elementor") { ?>

												<a id="book_sub" href="javascript:void(0)" class="btn btn-sm bb-btn-color booknow bb-wrapper" style="color: <?php echo $settings['bb_btn_color'] ?> !important;"><i class="fas fa-calendar-alt"></i> <?php echo $settings['bb_btn_txt'] ?></a>

											<?php } ?>
										<?php } else { ?>
                                            <a href="#" class="btn btn-dark btn-sm login_modal_btn"><i class="fas fa-user"></i> Log In</a>
											<a href="#" id="register_start_modal_btn" class="btn btn-primary btn-sm"><i class="fas fa-user"></i> Create an free account</a>

										<?php } ?>

									</div>

									<input type="hidden" id="hd_book_dt" name="book_dt">

								</form>
							</div>




						</div>
					</div>






				</div>
			</div>
		</div>






		<!-- booking time modal -->

		<div class="modal fade" id="book_time_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

			<div class="modal-dialog modal-md modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center">
						<form action="" method="post">
							<input type="hidden" id="hd_date" name="hd_date">
							<input type="hidden" id="hd_login_id" name="hd_login_id" value="<?php echo $loggedin_user->ID; ?>">

							<i style="font-size: 34px; color: #34495e;" class="fas fa-clock"></i>

							<p class="mt-4" id="selected_data"></p>
							<h4 class="mt-2">Book <span><?php echo ($loggedin_user->user_login); ?></span></h4>
							<p>Choose your favourite time to book <span style="font-weight: 700;;"><?php echo ($loggedin_user->user_login); ?></span></p>
							<div class="mt-4">


								<div id="feedback">

								</div>


							</div>


						</form>
					</div>

				</div>
			</div>
		</div>


<?php

	}

	protected function _content_template()
	{
	}
}
