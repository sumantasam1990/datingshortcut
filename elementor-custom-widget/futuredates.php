<?php
namespace Elementor;

class My_Widget_4 extends Widget_Base {
	
	public function get_name() {
		return 'DSFutureDates';
	}
	
	public function get_title() {
		return 'DS Future Dates';
	}
	
	public function get_icon() {
		return 'fas fa-calendar';
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
				'label' => __( 'Searchbox placeholder', 'ds' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);
		
		$this->add_control(
			'label',
			[
				'label' => __( 'Searchbox Label', 'elementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);

        $this->add_control(
			'btn',
			[
				'label' => __( 'Search Button Value', 'elementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);

        $this->add_control(
			'br',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);

        $this->add_control(
			'fontsize',
			[
				'label' => __( 'Name Font Size', 'elementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);

        $this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ds_e_name' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .wrapper',
			]
		);

        

		$this->end_controls_section();



        // 2nd section----------------------------------

        $this->start_controls_section(
			'booking_date',
			[
				'label' => __( 'Booking Date', 'ds' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'book_date_fontsize',
			[
				'label' => __( 'Font Size', 'elementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '', 'ds' ),
			]
		);

        $this->add_control(
			'book_date_name_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ds_e_name_book_date' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        // book time section----------------------------------

        $this->start_controls_section(
			'booking_time',
			[
				'label' => __( 'Booking Time', 'ds' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ds-text-typo-book-time',
			]
		);

        $this->add_control(
			'book_time_name_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ds_e_name_book_time' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        // Offer msg section----------------------------------

        $this->start_controls_section(
			'ofr_msg',
			[
				'label' => __( 'Offer Message', 'ds' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography2',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ds-text-typo-offer-msg',
			]
		);

        $this->add_control(
			'offr_name_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ds_e_name_offr' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        
        global $wpdb;

        $curUserID = get_current_user_id();
        $sex = get_user_meta($curUserID, 'sex', true);
        $today = date("Y-m-d");
        $table_book = $wpdb->prefix . "booking";
        $table_payment = $wpdb->prefix . "ds_payment";

//if($sex == "Woman") {
    $sql = "SELECT t1.*,t2.* FROM $table_book t1 LEFT JOIN $table_payment t2 on (t1.book_id = t2.book_pay_id) WHERE t1.book_pay_status = '1' AND ((t1.book_to_id = '$curUserID' AND t1.book_date > '$today') OR (t1.book_from_id = '$curUserID' AND t1.book_date > '$today'))";
    $results = $wpdb->get_results($sql);
//} else {
    // $sql = "SELECT t1.*,t2.* FROM $table_book t1 LEFT JOIN $table_users t2 ON(t1.book_to_id = t2.ID) WHERE t1.book_from_id = '$curUserID' AND t1.book_date > '$today'";
    // $results = $wpdb->get_results($sql);
//}

if(isset($_GET['search_date'])) {
    $search_query = $wpdb->escape($_GET['q']);
    $exp = explode("to", $search_query);
        $sql = "SELECT t1.*,t2.* FROM $table_book t1 LEFT JOIN $table_payment t2 on (t1.book_id = t2.book_pay_id) WHERE t1.book_pay_status = '1' AND ((t1.book_to_id = '$curUserID' AND t1.book_date BETWEEN '".$exp[0]."' AND '".$exp[1]."') OR (t1.book_from_id = '$curUserID' AND t1.book_date BETWEEN '".$exp[0]."' AND '".$exp[1]."'))";
        $results = $wpdb->get_results($sql);
}

if(isset($_GET['r'])) {
    $updated = $wpdb->update( $table_book, array('book_status' => '1'), array('book_id' => $_GET['r']) );
 
    if ( false === $updated ) {
        // There was an error.
    } else {
        echo "<script>window.location.href='appointments'</script>";
    }

}

if(isset($_GET['a'])) {
    $secret = rand(5050,9999);
    $updated = $wpdb->update( $table_book, array('book_status' => '2', 'book_secret' => $secret), array('book_id' => $_GET['a']) );
 
    if ( false === $updated ) {
        // There was an error.
    } else {
        echo "<script>window.location.href='appointments'</script>";
    }

}

if(isset($_POST['sec_code_btn'])) {
    $secret_code = $_POST['sec_code'];
    $bookID = $_POST['book_id'];
    $table_book = $wpdb->prefix . "booking";

    $sql = "select book_secret from $table_book where book_secret = '".$secret_code."' and book_id = '".$bookID."'";
    $res = $wpdb->get_results($sql);

    if($res[0]->book_secret == $secret_code) {
        $updated = $wpdb->update( $table_book, array('book_secret' => '1'), array('book_id' => $bookID) );
        echo "<script>window.location.href='appointments?e_secret=Your code is successfully verified. Now go to your withdrawl page and make a withdrawl request.'</script>";
    } else {
        echo "<script>window.location.href='appointments?e_secret=Error! Your secret code is wrong.'</script>";
    }
}




        ?>

<style>
    .card {
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,.125) !important;
    }

    p {
        line-height: 15px;
    }

</style>


<div class="container mt-2 mb-4">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 col-xxl-4">
                <p><?php echo $settings['label']; ?></p>
            <form class="d-flex" style="width: 100%; " class="mb-4" action="" method="GET">
            
            <input style="border-top-left-radius: 16px !important; border-bottom-left-radius: 16px !important; border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important; font-weight: bold; box-shadow: 0 1px 4px 2px #00000014; border: 0; padding: 12px !important; background: #FFF; color: #444;" type="search" name="q" class="form-control datepicker mt-3" placeholder="<?php echo $settings['placeholder']; ?>" value="<?php echo (isset($_GET['q']) ? $_GET['q'] : ''); ?>">
            <button style="width: 50px;
    
    margin-top: 14px;
    border-radius: 0px;" type="submit" name="search_date" class="btn btn-dark btn-sm"><?php echo $settings['btn']; ?></button>
            </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h4>Your Bookings</h4>
            </div>
        </div>
        <div class="row"> 
        <?php 
                if(count($results) > 0) {
                foreach( $results as $result ) {
                
                // get users account info
                if($result->book_to_id == $curUserID) {
                    $user = get_user_by('id', $result->book_from_id);

                    $metaID = get_user_meta($result->book_from_id, 'avatar_user', true);
                    $attachment_url = wp_get_attachment_url($metaID);
                    $location = get_user_meta($result->book_from_id, 'location', true);
                    $age = get_user_meta($result->book_from_id, 'age', true);
                } else {
                    $user = get_user_by('id', $result->book_to_id);

                    $metaID = get_user_meta($result->book_to_id, 'avatar_user', true);
                    $attachment_url = wp_get_attachment_url($metaID);
                    $location = get_user_meta($result->book_to_id, 'location', true);
                    $age = get_user_meta($result->book_to_id, 'age', true);
                }
                
                
                //end--------------------
                


                ?>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-12" style="">

            <div class="card mb-3 wrapper" style="min-height: 330px !important; border-radius: <?php echo $settings['br']; ?>;">
                <div class="row g-0">
                    <div class="col-md-5">

                    <?php if($result->book_status < 2 && $result->book_to_id == $curUserID) { ?>
                        <?php if(empty($attachment_url)) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/blur.png" class="img-fluid" style="min-height: 100%; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } else { ?> 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blur.png" class="img-fluid " style="min-height: 100%; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } ?>
                    
                        <?php } else { ?>
                            <?php if(empty($attachment_url)) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="img-fluid" style="min-height: 100%; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } else { ?> 
                            <img src="<?php echo $attachment_url; ?>" class="img-fluid " style="min-height: 100%; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } ?>
                        <?php } ?>




                    
                    </div>
                    <div class="col-md-7">
                    <div class="card-body">

                        <h5 class="card-title ds_e_name" style="font-size: <?php echo $settings['fontsize']; ?>; color: <?php echo $settings['name_color'] ?>">
                            
                            <?php echo ( $result->book_status == 2 ? $user->display_name : $user->user_login ); ?> , <?php echo $age; ?>
                        </h5>
                        <!-- <p class="card-text"><?php //echo $location; ?></p> -->
                        <p class="card-text"><small class=" ds_e_name_book_date" style="font-size: <?php echo $settings['book_date_fontsize']; ?>; color: <?php echo $settings['book_date_name_color']; ?>">Booking Date: <br /> <span style="font-weight: bold;"><?php echo date('l jS \of F Y', strtotime($result->book_date)); ?></span></small></p>
                        
                        <p class="card-text ds-text-typo-book-time"><small class="ds_e_name_book_time" font-size: <?php echo $settings['book_time_fontsize']; ?>; color: <?php echo $settings['book_time_name_color']; ?>>Booking Time: <br /> <span class="ds-text-typo-book-time"><?php echo $result->book_time; ?></span></small></p>


                        <?php 
                        if($result->book_to_id == $curUserID) {
                         
                            if($result->book_status == 0) {
                        ?>
                        <h6 style="font-size: 14px;" class="mb-3">You will get <span style="font-weight: bold;"><?php echo ($result->amount*85)/100; ?> <?php echo $result->currency; ?></span> after finish this date. <br> We took 15% fees (<?php echo ($result->amount*15)/100; ?> <?php echo $result->currency; ?>).</h6>
                        
                        

                        <div class="d-grid gap-2">
                        <a onclick="return confirm_rej_alert('<?php echo $result->book_id; ?>', '<?php echo md5($user->user_login); ?>')" class="btn btn-outline-danger btn-lg" href="?r=<?php echo $result->book_id; ?>&id=<?php echo md5($user->user_login); ?>"> Reject </a>

                        <a style="color: #fff;" onclick="return confirm_alert('<?php echo $result->book_id; ?>', '<?php echo md5($user->user_login); ?>')" class="btn btn-success btn-lg" href="#"> Accept </a>
                        </div>

                        <?php } elseif($result->book_status == 2) { ?>
                            <p class="ds-text-typo-offer-msg ds_e_name_offr" style="color: <?php echo $settings['offr_name_color']; ?>;"><i class="fas fa-check-circle"></i> Congradulations! Best of luck for your date.</p>

                            <div class="">
                                <?php if(isset($_GET['e_secret'])) { ?>
                                    <div style="border: 2px solid #EC75CC; padding: 10px;">
                                        <?php echo $_GET['e_secret']; ?>
                                    </div>
                                <?php } ?>

                                <?php if($result->book_secret != '1') { ?>
                                <form class="row" action="" method="post">
                                    <input type="hidden" name="book_id" value="<?php echo $result->book_id; ?>">
                                    <label>*Secret code*</label>
                                    <div class="col-6">
                                        <input class="form-control" type="number" required name="sec_code" placeholder="Your secret code">
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" name="sec_code_btn" class="btn btn-success btn-sm">Verify Code</button>
                                    </div>
                                    <small>Note: You will get your secret code from the guy/girls you're going to date.</small>
                                </form>
                                <?php } else { ?>
                                    <h6 style="font-size: 18px;" class="mb-3 mt-2"><i class="fas fa-money-check-alt"></i> You got <span style="font-weight: bold;"><?php echo ($result->amount*85)/100; ?> <?php echo $result->currency; ?></span>. <br> <br> <span style="font-size: 12px;">We took 15% fees (<?php echo ($result->amount*15)/100; ?> <?php echo $result->currency; ?>).</span></h6>
                                <?php } ?>
                                
                            </div>
                        <!-- <a class="btn btn-primary btn-sm" href="<?php echo home_url() ?>/review/<?php echo $user->user_login; ?>"><i class="fas fa-star-half-alt"></i> Give a review </a> -->
                        <?php } else { ?>
                            <p class="text-danger" style="text-transform: uppercase;"><i class="fas fa-times-circle"></i> Rejected</p>
                            <?php } ?>
                        <?php
                         } else {
                            if($result->book_status == 0) {
                        ?>
                        <p class="ds-text-typo-offer-msg ds_e_name_offr" style="color: <?php echo $settings['offr_name_color']; ?>;"><i class="fas fa-hourglass-half"></i> Your offer is Pending.</p>
                        <?php } elseif($result->book_status == 1) { ?>
                            <p class="text-danger ds-text-typo-offer-msg"><i class="fas fa-times-circle"></i> You have been Rejected.</p>
                            <?php } else { ?>
                                <p class="ds-text-typo-offer-msg ds_e_name_offr" style="color: <?php echo $settings['offr_name_color']; ?>;"><i class="fas fa-check-circle"></i> Congradulations! Your offer has been accepted.</p>
                                <!------- secret code ------------>
                                <?php if($result->book_secret > 1): ?>
                                <h6>*Secret Code: <span class="badge bg-dark" style="font-size: 24px;"><?php echo ($result->book_secret > 0 ? $result->book_secret : ''); ?></span></h6>
                                <?php endif; ?>
                                <?php } ?>
                                
                            <a class="btn btn-danger btn-sm" href="<?php echo home_url() ?>/profile/<?php echo $user->user_login; ?>">Profile <i class="fas fa-long-arrow-alt-right"></i></a>

                        <?php } ?>
                        
                    </div>
                    </div>
                </div>
                </div>
                
            </div>
            <?php } } else { ?>
                <p>No booking found.</p>
            <?php } ?>
        </div>
    </div>


    <!-- confirm accept alert Modal -->
<div class="modal fade" id="conf_alert_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirm_title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="html_confirm">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal" id="xyz"> I Understand And Agreed </button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- confirm reject Modal -->

<div class="modal fade" id="conf_rej_alert_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirm_title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="html_confirm_rej">
        
      </div>
      <div class="modal-footer">
        <div class="d-grid gap-2 col-12 mx-auto">
            <a style="color: #fff;" href="" class="btn btn-success" data-bs-dismiss="modal"> Pay $10 dollars to avoid be ban for one week </a>
            <a style="color: #fff; background-color: #DC3545 !important;" href="" class="btn btn-danger" style="background-color: #c23616 !important;">I want be ban for a week</a>
            <a style="color: #fff;" href="" class="btn btn-dark">I want to take advance from my yellow card ( no penalty only once per month )</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function confirm_alert(a,id) {
    $("#conf_alert_modal").modal("show");
    $("#html_confirm").html(`
    <p>Be sure be on time on this date, if you
don't show up you will be penalized.</p>
<p>You will receive by email and text
message restaurant location.</p>
<p>Went you arrive to the place ask to the
other person about the confirmation
code and introduce that code
immediately on the web or reply with
that verification code to the text
message we will sent to your phone.</p>
<p>This is the only way you will be able to
receive compensation for your time</p>
    `);
    $("#confirm_title").html("Follow this instructions");

    $(document).ready(function() {
        $("#xyz").click(function() {
           return window.location = "?a=" + a + "&id=" + id;
        });
        
    });

    return false;

    
}

function confirm_rej_alert(r,id) {
    $("#conf_rej_alert_modal").modal("show");
    $("#html_confirm_rej").html(`
    <p style='line-height: 22px; font-weight: 500 !important;'>Our goal is you give opportunities to this person to
show how valuable they can be in your life, that's
why this profile is not available for you until you
accept the date, this is a guarantee to avoid
preferences based on how physically look the other
person who pays for your time.</p>
<p>If you want reject this date you can pick one of this options</p>
    `);
    $("#confirm_title").html("Follow this instructions");

    $(document).ready(function() {
        $("#xyz").click(function() {
           return window.location = "?r=" + r + "&id=" + id;
        });
        
    });

    return false;

    
}
</script>


<?php 
		 

	}
	
	protected function _content_template() {

    }
	
	
}
