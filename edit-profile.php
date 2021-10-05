<?php 
/* Template Name: Custom Edit Profile */ 


global $current_user;

$loggedin_user = wp_get_current_user();

//get video and status
$tablename = $wpdb->prefix . "video_verify";
$usertablename = $wpdb->prefix . "users";
$sql = "SELECT t1.*,t2.* FROM $tablename t1 LEFT JOIN $usertablename t2 on(t1.vf_user_id=t2.ID) WHERE vf_user_id = '".$loggedin_user->ID."'";
$results = $wpdb->get_results($sql);

$metaID = get_user_meta($loggedin_user->ID, 'avatar_user', true);
$attachment_url = wp_get_attachment_url($metaID);

$looking_for = get_user_meta($current_user->ID, 'looking_for', true);
$tagline = get_user_meta($current_user->ID, 'tag_line', true);
$tagline = explode(',', $tagline);
$offer = get_user_meta($current_user->ID, 'offe_r', true);
$location = get_user_meta($current_user->ID, 'location', true);

$body_type = get_user_meta($current_user->ID, 'body_type', true);
$hair_color = get_user_meta($current_user->ID, 'hair_color', true);
$eye_color = get_user_meta($current_user->ID, 'eye_color', true);
$piercings = get_user_meta($current_user->ID, 'piercings', true);
$tattoos = get_user_meta($current_user->ID, 'tattoos', true);
$height = get_user_meta($current_user->ID, 'height', true);
$smoking = get_user_meta($current_user->ID, 'smoking', true);
$drinking = get_user_meta($current_user->ID, 'drinking', true);
$yearly_income = get_user_meta($current_user->ID, 'yearly_income', true);
$net_worth = get_user_meta($current_user->ID, 'net_worth', true);
$education = get_user_meta($current_user->ID, 'education', true);
$my_price = get_user_meta($current_user->ID, 'my_price', true);


if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['save_changes']) ) {
    
    update_user_meta( $current_user->ID, 'looking_for', sanitize_text_field($_POST['looking_for']) );
    update_user_meta( $current_user->ID, 'tag_line', sanitize_text_field(implode(',', $_POST['tag_line'])) );
    update_user_meta( $current_user->ID, 'offe_r', sanitize_text_field($_POST['offe_r']) );
    update_user_meta( $current_user->ID, 'location', sanitize_text_field($_POST['location']) );
    update_user_meta( $current_user->ID, 'body_type', sanitize_text_field($_POST['body_type']) );
    update_user_meta( $current_user->ID, 'hair_color', sanitize_text_field($_POST['hair_color']) );
    update_user_meta( $current_user->ID, 'eye_color', sanitize_text_field($_POST['eye_color']) );
    update_user_meta( $current_user->ID, 'piercings', sanitize_text_field($_POST['piercings']) );
    update_user_meta( $current_user->ID, 'tattoos', sanitize_text_field($_POST['tattoos']) );
    update_user_meta( $current_user->ID, 'height', sanitize_text_field($_POST['height']) );
    update_user_meta( $current_user->ID, 'smoking', sanitize_text_field($_POST['smoking']) );
    update_user_meta( $current_user->ID, 'drinking', sanitize_text_field($_POST['drinking']) );
    update_user_meta( $current_user->ID, 'yearly_income', sanitize_text_field($_POST['yearly_income']) );
    update_user_meta( $current_user->ID, 'net_worth', sanitize_text_field($_POST['net_worth']) );
    update_user_meta( $current_user->ID, 'education', sanitize_text_field($_POST['education']) );

    if(sanitize_text_field($_POST['my_price']) > 49) {
        update_user_meta( $current_user->ID, 'my_price', sanitize_text_field($_POST['my_price']) );
    } else {
        echo "<script>alert('Your price should be more than or equal to $50')</script>";
    }
    

    wp_redirect(home_url("edit-profile"));
    exit();


}

// change profile photo upload script
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    // These files need to be included as dependencies when on the front end.
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    // Let WordPress handle the upload.
    $img_id = media_handle_upload( 'avatar_user', 0 );
    

    if ( is_wp_error( $img_id ) ) {
      echo $img_id->get_error_message();
    } else {
      update_user_meta( $loggedin_user->ID, 'avatar_user', $img_id );
      wp_redirect(home_url("edit-profile"));
      exit();
    }
}





?>

    
    <?php get_header(); ?>

    <!----- profile photo change form ----->
    <form method="post" id="adduser" action="" enctype='multipart/form-data'>
        <input class="text-input" name="avatar_user" type="file" id="avatar_user" onchange="uploadProfilePhoto();" multiple="false" style="display: none;"/>
        <input style="display: none;" name="updateuser" type="submit" id="quick_upload" class="submit button" value="<?php _e('GRAVAR', 'profile'); ?>" />
        <input name="action" type="hidden" id="action" value="update-user" />
    </form>

  <form action="" method="post">
    <div class="container mb-4">
        <div class="row mt-4">

            <div class="col-md-12">
                <h2>Profile</h2>
            </div>

        </div>

        <div class="row mt-4">

            <div class="col-md-3">

            
            
            
            <div class="pro_img">
                <?php if(empty($attachment_url)) { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="img-fluid img-thumbnail mb-4 image" alt="profile photo">
                    <a onclick="startUploadProfile();" href="#"><div class="overlay">
                        <div class="text" style="font-size: 14px;">
                            <i class="fas fa-camera"></i> Change photo
                        </div>
                    </div></a>
                <?php } else { ?> 
                    <img src="<?php echo $attachment_url; ?>" class="img-fluid img-thumbnail mb-4 image" alt="profile photo">
                    <a onclick="startUploadProfile();" href="#"><div class="overlay">
                        <div class="text" style="font-size: 14px;">
                            <i class="fas fa-camera"></i> Change photo
                        </div>
                    </div></a>
                <?php } ?>
            </div>
            

            <h4 style="font-weight: bold; text-transform: capitalize;"> <?php echo ($loggedin_user->user_login); ?></h4>
            <h6 class="mb-2">$<?php echo $my_price; ?> / 2 hours</h6>
            <p><a class=" btn-link" href="<?php echo home_url() ?>/profile/<?php echo $loggedin_user->user_login; ?>">View profile</a></p>
            <p>Copy your profile URL and paste it on your insta or any social media platform to get more dating request and earn more money.</p>
            <input type="text" class="form-control" style="border: none !important;" id="ds_copy_url" value="<?php echo site_url(); ?>/profile/<?php echo $loggedin_user->user_login; ?>">
            <p style="font-size: 14px;" class="mt-2"><a style="border: 2px solid #000; padding: 10px; color: #000; font-weight: bold; font-size: 10px;" href="#" onclick="ds_copy()" onclick="ds_copy()">Copy URL</a></p>

            <hr />
            <div class="d-grid gap-2">
            <?php if(isset($results[0]->vf_status) == 1) { ?>

                <a href="#" class="btn btn-success btn-lg mt-2" style="color: #fff;"><i class="far fa-check-circle"></i> Verified</a>

            <?php } else { ?>

            <a href="<?php echo home_url() ?>/verified" class="btn btn-primary btn-lg mt-2"><i class="far fa-check-circle"></i> Get Verified</a>

            <?php } ?>
            <?php do_shortcode( '[ds-insta-btn]'); ?>

            <?php do_shortcode( '[ds-insta-photos]'); ?>
            </div>
            
            <?php do_shortcode( '[ds-insta-view-photos]'); ?>
            


            </div>
            <div class="col-md-9">


            <h4>Basics</h4>
            <hr />
            
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="mb-2">Location*</label>
                        <input required type="text" name="location" id="location_reg" class="form-control p-4" placeholder="Enter your city" value="<?php echo (isset($location) ? $location : ''); ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2">Ethinicity*</label>
                        <select required class="form-control" name="offe_r">
                            <option value="">Select one</option>
                            <option <?php echo (isset($offer) && $offer == 'Black' ? 'selected' : ''); ?>>Black</option>
                            <option <?php echo (isset($offer) && $offer == 'White' ? 'selected' : ''); ?>>White</option>
                            <option <?php echo (isset($offer) && $offer == 'Hispanic' ? 'selected' : ''); ?>>Hispanic</option>
                            <option <?php echo (isset($offer) && $offer == 'Asian' ? 'selected' : ''); ?>>Asian</option>
                        </select>
                        <!-- <textarea required rows="6" class="form-control" name="offe_r" placeholder="Describe yourself and write what you are going to offer."><?php //echo (isset($offer) ? $offer : ''); ?></textarea> -->
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">What are you looking for?</label>
                        <select required name="tag_line[]" class="form-control" multiple style="height: 230px;">
                            
                            <option <?php echo (in_array('Hook up',$tagline) ? 'selected' : ''); ?>>Hook up</option>
                            <option <?php echo (in_array('Friends with benifits',$tagline) ? 'selected' : ''); ?>>Friends with benifits</option>
                            <option <?php echo (in_array('Long-term',$tagline) ? 'selected' : ''); ?>>Long-term</option>
                            <option <?php echo (in_array('Marriage minded',$tagline) ? 'selected' : ''); ?>>Marriage minded</option>
                            <option <?php echo (in_array('Open relationship',$tagline) ? 'selected' : ''); ?>>Open relationship</option>
                            <option <?php echo (in_array('Travel with you',$tagline) ? 'selected' : ''); ?>>Travel with you</option>
                            <option <?php echo (in_array('Vaccations',$tagline) ? 'selected' : ''); ?>>Vaccations</option>
                            <option <?php echo (in_array('Sugar daddy',$tagline) ? 'selected' : ''); ?>>Sugar daddy</option>
                            <option <?php echo (in_array('Sugar baby',$tagline) ? 'selected' : ''); ?>>Sugar baby</option>
                        </select>
                        <small>NOTE: (You can choose one or more values)</small>
                        <!-- <input type="text" name="tag_line" class="form-control p-4" placeholder="Enter your city" value="<?php //echo (isset($tagline) ? $tagline : ''); ?>"> -->
                    </div>
                    
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group mb-4">
                        <label class="mb-2">Occupation Industry*</label>
                        
                        <select required class="form-control" name="looking_for">
                        <option value="" selected="selected" disabled="disabled">-- select one --</option>
                        <option <?php echo ($looking_for == "Accounting" ? 'selected' : ''); ?> value="Accounting">Accounting</option>
                        <option <?php echo ($looking_for == "Airlines Aviation" ? 'selected' : ''); ?> value="Airlines Aviation">Airlines/Aviation</option>
                        <option <?php echo ($looking_for == "Banking Mortgage" ? 'selected' : ''); ?> value="Banking Mortgage">Banking/Mortgage</option>
                        <option <?php echo ($looking_for == "Broadcast Media" ? 'selected' : ''); ?> value="Broadcast Media">Broadcast Media</option>
                        <option <?php echo ($looking_for == "Civil Engineering" ? 'selected' : ''); ?> value="Civil Engineering">Civil Engineering</option>
                        <option <?php echo ($looking_for == "Computer Games" ? 'selected' : ''); ?> value="Computer Games">Computer Games</option>
                        <option <?php echo ($looking_for == "Graphic Design Web Design" ? 'selected' : ''); ?> value="Graphic Design Web Design">Graphic Design/Web Design</option>
                        <option <?php echo ($looking_for == "Hospital Health Care" ? 'selected' : ''); ?> value="Hospital Health Care">Hospital/Health Care</option>
                        <option <?php echo ($looking_for == "Hospitality" ? 'selected' : ''); ?> value="Hospitality">Hospitality</option>
                        <option <?php echo ($looking_for == "Import Export" ? 'selected' : ''); ?> value="Import Export">Import/Export</option>
                        <option <?php echo ($looking_for == "Information Technology IT" ? 'selected' : ''); ?> value="Information Technology IT">Information Technology/IT</option>
                        <option <?php echo ($looking_for == "Insurance" ? 'selected' : ''); ?> value="Insurance">Insurance</option>
                        <option <?php echo ($looking_for == "Legal Services" ? 'selected' : ''); ?> value="Legal Services">Legal Services</option>
                        <option <?php echo ($looking_for == "Logistics" ? 'selected' : ''); ?> value="Logistics Procurement">Logistics/Procurement</option>
                        <option <?php echo ($looking_for == "Marketing Advertising Sales" ? 'selected' : ''); ?> value="Marketing Advertising Sales">Marketing/Advertising/Sales</option>
                        <option <?php echo ($looking_for == "Mechanical or Industrial Engineering" ? 'selected' : ''); ?> value="Mechanical or Industrial Engineering">Mechanical or Industrial Engineering</option>
                        <option <?php echo ($looking_for == "Music" ? 'selected' : ''); ?> value="Music">Music</option>
                        <option <?php echo ($looking_for == "Pharmaceuticals" ? 'selected' : ''); ?> value="Pharmaceuticals">Pharmaceuticals</option>
                        <option <?php echo ($looking_for == "Photography" ? 'selected' : ''); ?> value="Photography">Photography</option>
                        <option <?php echo ($looking_for == "Real Estate Mortgage" ? 'selected' : ''); ?> value="Real Estate Mortgage">Real Estate/Mortgage</option>
                        <option <?php echo ($looking_for == "Restaurants" ? 'selected' : ''); ?> value="Restaurants">Restaurants</option>
                        <option <?php echo ($looking_for == "Retail Industry" ? 'selected' : ''); ?> value="Retail Industry">Retail Industry</option>
                        <option <?php echo ($looking_for == "Sports" ? 'selected' : ''); ?> value="Sports">Sports</option>
                        <option <?php echo ($looking_for == "Supermarkets" ? 'selected' : ''); ?> value="Supermarkets">Supermarkets</option>
                        <option <?php echo ($looking_for == "Transportation" ? 'selected' : ''); ?> value="Transportation">Transportation</option>

                        </select>


                    </div>
                    <label class="mb-2" style="font-weight: 700;">Set your price/2 hours (Min: $50)*</label>
                    <div class="input-group">
                        
                        <span style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;" class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        <input required style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" class="form-control" type="number" min="50" name="my_price" placeholder="Eg. 100" value="<?php echo (isset($my_price) ? $my_price : ''); ?>">
                        
                    </div>
                    <small style="font-weight: bold; font-style: italic;">Note: Datingshortcut will take 15% comission on each booking.</small>
                    

                </div>
            </div>

            <h4 class="mt-6">Physical</h4>
            <hr />

            <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                        <label class="mb-2">Body Type</label>
                        <select class="form-control" name="body_type">
                        <option <?php echo ($body_type == 'Slim' ? 'selected' : ''); ?> value="Slim" class="ng-star-inserted">Slim</option><option <?php echo ($body_type == 'Fit' ? 'selected' : ''); ?>  value="Fit" class="ng-star-inserted">Fit</option><option <?php echo ($body_type == 'Muscular' ? 'selected' : ''); ?>  value="Muscular" class="ng-star-inserted">Muscular</option><option <?php echo ($body_type == 'Average' ? 'selected' : ''); ?>  value="Average" class="ng-star-inserted">Average</option><option <?php echo ($body_type == 'A few extra pounds' ? 'selected' : ''); ?>  value="A few extra pounds" class="ng-star-inserted">A few extra pounds</option><option <?php echo ($body_type == 'Heavy' ? 'selected' : ''); ?>  value="Heavy" class="ng-star-inserted">Heavy</option><option <?php echo ($body_type == 'Very Heavy' ? 'selected' : ''); ?>  value="Very Heavy" class="ng-star-inserted">Very Heavy</option><!---->
                    </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Eye Color</label>
                        <select id="eyeColors" name="eye_color" class="form-control ng-pristine ng-valid ng-touched">
                        <option <?php echo ($eye_color == 'Black' ? 'selected' : ''); ?> value="Black" class="ng-star-inserted">Black</option><option <?php echo ($eye_color == 'Blue' ? 'selected' : ''); ?> value="Blue" class="ng-star-inserted">Blue</option><option <?php echo ($eye_color == 'Brown' ? 'selected' : ''); ?> value="Brown" class="ng-star-inserted">Brown</option><option <?php echo ($eye_color == 'Gray' ? 'selected' : ''); ?> value="Gray" class="ng-star-inserted">Gray</option><option <?php echo ($eye_color == 'Green' ? 'selected' : ''); ?> value="Green" class="ng-star-inserted">Green</option><option <?php echo ($eye_color == 'Hazel' ? 'selected' : ''); ?> value="Hazel" class="ng-star-inserted">Hazel</option><option <?php echo ($eye_color == 'Other' ? 'selected' : ''); ?> value="Other" class="ng-star-inserted">Other</option><!---->
                    </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Tattoos</label>
                        <select id="tattoos" name="tattoos" class="form-control ng-untouched ng-pristine ng-valid">
                        <option <?php echo ($tattoos == 'None' ? 'selected' : ''); ?> value="None" class="ng-star-inserted">None</option><option <?php echo ($tattoos == 'A few' ? 'selected' : ''); ?> value="A few" class="ng-star-inserted">A few</option><option <?php echo ($tattoos == 'Many' ? 'selected' : ''); ?> value="Many" class="ng-star-inserted">Many</option><option <?php echo ($tattoos == 'Covered' ? 'selected' : ''); ?> value="Covered" class="ng-star-inserted">Covered</option><!---->
                    </select>
                    </div>


                    
                </div>
                <div class="col-md-6">
                    
                <div class="form-group mb-4">
                        <label class="mb-2">Hair Color</label>
                        <select id="hairColors" name="hair_color" class="form-control ng-untouched ng-pristine ng-valid">
                        <option <?php echo ($hair_color == 'Black' ? 'selected' : ''); ?> value="Black" class="ng-star-inserted">Black</option><option <?php echo ($hair_color == 'Blonde' ? 'selected' : ''); ?> value="Blonde" class="ng-star-inserted">Blonde</option><option <?php echo ($hair_color == 'Light Brown' ? 'selected' : ''); ?> value="Light Brown" class="ng-star-inserted">Light Brown</option><option <?php echo ($hair_color == 'Dark Brown' ? 'selected' : ''); ?> value="Dark Brown" class="ng-star-inserted">Dark Brown</option><option <?php echo ($hair_color == 'Red' ? 'selected' : ''); ?> value="Red" class="ng-star-inserted">Red</option><option <?php echo ($hair_color == 'Other' ? 'selected' : ''); ?> value="Other" class="ng-star-inserted">Other</option><!---->
                    </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Piercings</label>
                        <select id="piercings" name="piercings" class="form-control ng-untouched ng-pristine ng-valid">
                        <option <?php echo ($piercings == 'None' ? 'selected' : ''); ?> value="None" class="ng-star-inserted">None</option><option <?php echo ($piercings == 'Just ears' ? 'selected' : ''); ?> value="Just ears" class="ng-star-inserted">Just ears</option><option <?php echo ($piercings == 'A few' ? 'selected' : ''); ?> value="A few" class="ng-star-inserted">A few</option><option <?php echo ($piercings == 'Many' ? 'selected' : ''); ?> value="Many" class="ng-star-inserted">Many</option><option <?php echo ($piercings == 'Covered' ? 'selected' : ''); ?> value="Covered" class="ng-star-inserted">Covered</option><!---->
                    </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Height</label>
                        <select name="height" class="form-control">
                        
                        <option value="" selected="selected" disabled="disabled">-- select one --</option>
                            
                                <option <?php echo ($height == '140' ? 'selected' : ''); ?> value="140">4'7" (140 cm)</option>
                                
                                <option <?php echo ($height == '143' ? 'selected' : ''); ?> value="143">4'8" (143 cm)</option>
                                
                                <option <?php echo ($height == '145' ? 'selected' : ''); ?> value="145">4'9" (145 cm)</option>
                                
                                <option <?php echo ($height == '148' ? 'selected' : ''); ?> value="148">4'10" (148 cm)</option>
                                
                                <option <?php echo ($height == '150' ? 'selected' : ''); ?> value="150">4'11" (150 cm)</option>
                                
                                <option <?php echo ($height == '153' ? 'selected' : ''); ?> value="153">5' (153 cm)</option>
                                
                                <option <?php echo ($height == '155' ? 'selected' : ''); ?> value="155">5'1" (155 cm)</option>
                                
                                <option <?php echo ($height == '158' ? 'selected' : ''); ?> value="158">5'2" (158 cm)</option>
                                
                                <option <?php echo ($height == '161' ? 'selected' : ''); ?> value="161">5'3" (161 cm)</option>
                                
                                <option <?php echo ($height == '163' ? 'selected' : ''); ?> value="163">5'4" (163 cm)</option>
                                
                                <option <?php echo ($height == '166' ? 'selected' : ''); ?> value="166">5'5" (166 cm)</option>
                                
                                <option <?php echo ($height == '168' ? 'selected' : ''); ?> value="168">5'6" (168 cm)</option>
                                
                                <option <?php echo ($height == '171' ? 'selected' : ''); ?> value="171">5'7" (171 cm)</option>
                                
                                <option <?php echo ($height == '173' ? 'selected' : ''); ?> value="173">5'8" (173 cm)</option>
                                
                                <option <?php echo ($height == '176' ? 'selected' : ''); ?> value="176">5'9" (176 cm)</option>
                                
                                <option <?php echo ($height == '178' ? 'selected' : ''); ?> value="178">5'10" (178 cm)</option>
                                
                                <option <?php echo ($height == '181' ? 'selected' : ''); ?> value="181">5'11" (181 cm)</option>
                                
                                <option <?php echo ($height == '183' ? 'selected' : ''); ?> value="183">6' (183 cm)</option>
                                
                                <option <?php echo ($height == '186' ? 'selected' : ''); ?> value="186">6'1" (186 cm)</option>
                                
                                <option <?php echo ($height == '188' ? 'selected' : ''); ?> value="188">6'2" (188 cm)</option>
                                
                                <option <?php echo ($height == '191' ? 'selected' : ''); ?> value="191">6'3" (191 cm)</option>
                                
                                <option <?php echo ($height == '194' ? 'selected' : ''); ?> value="194">6'4" (194 cm)</option>
                                
                                <option <?php echo ($height == '196' ? 'selected' : ''); ?> value="196">6'5" (196 cm)</option>
                                
                                <option <?php echo ($height == '199' ? 'selected' : ''); ?> value="199">6'6" (199 cm)</option>
                                
                                <option <?php echo ($height == '201' ? 'selected' : ''); ?> value="201">6'7" (201 cm)</option>
                                
                                <option <?php echo ($height == '204' ? 'selected' : ''); ?> value="204">6'8" (204 cm)</option>
                                
                                <option <?php echo ($height == '206' ? 'selected' : ''); ?> value="206">6'9 (206 cm)</option>
                                
                                <option <?php echo ($height == '209' ? 'selected' : ''); ?> value="209">6'10" (209 cm)</option>
                                
                                <option <?php echo ($height == '211' ? 'selected' : ''); ?> value="211">6'11" (211 cm)</option>
                                
                                <option <?php echo ($height == '214' ? 'selected' : ''); ?> value="214">7' (214 cm)</option>
                                
                                <option <?php echo ($height == '216' ? 'selected' : ''); ?> value="216">7'1" (216 cm)</option>
                                
                                <option <?php echo ($height == '219' ? 'selected' : ''); ?> value="219">7'2" (219 cm)</option>
                                
                        </select>
                    </div>

                </div>
            </div>

            <h4 class="mt-6">Lifestyle</h4>
            <hr />

            <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                        <label class="mb-2">Smoking</label>
                        <select id="smokes" name="smoking" class="form-control ng-pristine ng-valid ng-touched">
                        <option <?php echo ($smoking == 'No' ? 'selected' : ''); ?> value="No" class="ng-star-inserted">No</option>
                        <option <?php echo ($smoking == 'Occasionally' ? 'selected' : ''); ?> value="Occasionally" class="ng-star-inserted">Occasionally</option>
                        <option <?php echo ($smoking == 'Regularly' ? 'selected' : ''); ?> value="Regularly" class="ng-star-inserted">Regularly</option><!---->
                    </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Yearly Income</label>
                        <select onchange="check_income(this.value)" id="incomes" name="yearly_income" class="form-control ng-untouched ng-pristine ng-valid">
                        <option <?php echo ($yearly_income == 'Rather not say' ? 'selected' : ''); ?> value="Rather not say" class="ng-star-inserted">Rather not say</option>
                        <option <?php echo ($yearly_income == 'Under $100K' ? 'selected' : ''); ?> value="Under $100K" class="ng-star-inserted">Under $100K</option>
                        <option <?php echo ($yearly_income == '$100-250K' ? 'selected' : ''); ?> value="$100-250K" class="ng-star-inserted">$100-250K</option>
                        <option <?php echo ($yearly_income == '$250-500K' ? 'selected' : ''); ?> value="$250-500K" class="ng-star-inserted">$250-500K</option>
                        <option <?php echo ($yearly_income == '$500K-1M' ? 'selected' : ''); ?> value="$500K-1M" class="ng-star-inserted">$500K-1M</option>
                        <option <?php echo ($yearly_income == 'Over $1M' ? 'selected' : ''); ?> value="Over $1M" class="ng-star-inserted">Over $1M</option><!---->
                    </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Education</label>
                        <select id="educations" name="education" class="form-control ng-untouched ng-pristine ng-valid">
                        <option <?php echo ($education == 'High School' ? 'selected' : ''); ?> value="High School" class="ng-star-inserted">High School</option>
                        <option <?php echo ($education == 'Some College' ? 'selected' : ''); ?> value="Some College" class="ng-star-inserted">Some College</option>
                        <option <?php echo ($education == 'Associate Degree' ? 'selected' : ''); ?> value="Associate Degree" class="ng-star-inserted">Associate Degree</option>
                        <option <?php echo ($education == 'Bachelors Degree' ? 'selected' : ''); ?> value="Bachelors Degree" class="ng-star-inserted">Bachelor's Degree</option>
                        <option <?php echo ($education == 'Graduate Degree' ? 'selected' : ''); ?> value="Graduate Degree" class="ng-star-inserted">Graduate Degree</option>
                        <option <?php echo ($education == 'PhD / Post-Doctoral' ? 'selected' : ''); ?> value="PhD / Post-Doctoral" class="ng-star-inserted">PhD / Post-Doctoral</option><!---->
                    </select>
                    </div>


                    
                </div>
                <div class="col-md-6">
                    
                <div class="form-group mb-4">
                        <label class="mb-2">Drinking</label>
                        <select id="drinks" name="drinking" class="form-control ng-untouched ng-pristine ng-valid">
            <option <?php echo ($drinking == 'No' ? 'selected' : ''); ?> value="No" class="ng-star-inserted">No</option>
            <option <?php echo ($drinking == 'Socially' ? 'selected' : ''); ?> value="Socially" class="ng-star-inserted">Socially</option>
            <option <?php echo ($drinking == 'Regularly' ? 'selected' : ''); ?> value="Regularly" class="ng-star-inserted">Regularly</option><!---->
          </select>
                    </div>

                    <div class="form-group mb-4" id="verify_bank" style="display: none;">
                        <label class="mb-2">&nbsp;</label>
                        <a class="btn btn-success" style="color: #fff; margin-top: 35px;" href="#"><i class="fas fa-money-check"></i> Verify with your bank account</a>
                        <input required type="text" style="visibility: hidden;" value="verify_b" id="verify_b" name="verify_b">
                        <!-- <label class="mb-2">Net Worth</label>
                        <select id="netWorths" name="net_worth" class="form-control ng-untouched ng-pristine ng-valid">
                        <option <?php //echo ($net_worth == 'Rather not say' ? 'selected' : ''); ?> value="Rather not say" class="ng-star-inserted">Rather not say</option>
                        <option <?php //echo ($net_worth == 'Under $500K' ? 'selected' : ''); ?> value="Under $500K" class="ng-star-inserted">Under $500K</option>
                        <option <?php //echo ($net_worth == '$500K-1M' ? 'selected' : ''); ?> value="$500K-1M" class="ng-star-inserted">$500K-1M</option>
                        <option <?php //echo ($net_worth == '$1-10M' ? 'selected' : ''); ?> value="$1-10M" class="ng-star-inserted">$1-10M</option>
                        <option <?php //echo ($net_worth == 'Over $10M' ? 'selected' : ''); ?> value="Over $10M" class="ng-star-inserted">Over $10M</option>
                    </select> -->
                    </div>

                    

                </div>
            </div>

            </div>
        </div>
    </div>


    <section class="container-fluid" style="position: fixed; bottom: 0; background: #FBFBFB; color: #888; padding: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>All changes must be saved or will be lost. Changes will be reviewed  to ensure they meet site guidelines.</p>
                </div>
                <div class="col-md-6 text-right">
                    <button style="float: right;" name="save_changes" type="submit" class="btn btn-dark btn-lg">Save Changes</button>
                </div>
            </div>
        </div>
        
    </section>
  </form>

  <?php
    while ( have_posts() ) :
        the_post();

        the_content();

    endwhile; // End of the loop.
?>
    
<?php get_footer(); ?>

<script>
    function ds_copy() {
  /* Get the text field */
  var copyText = document.getElementById("ds_copy_url");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied URL");
}


// checking bank balance
function check_income(str) {
    if(str == "Rather not say") {
        document.getElementById('verify_bank').style.display = "none";
        document.getElementById("verify_b").value = str;
    } else {
        //alert("We need to verify your income. We will integrate that later.")
        $("#conf_alert_modal").modal("show");
        $("#html_confirm").html("We need to verify your income. We will integrate that later.");
        $("#confirm_title").html("Alert!");
        document.getElementById('verify_bank').style.display = "block";
        document.getElementById("verify_b").value = "";
    }
}


</script>

<!-- confirm alert Modal -->
<div class="modal fade" id="conf_alert_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirm_title"></h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body" id="html_confirm">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>