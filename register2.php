<?php 
/* Template Name: Custom quickstart */ 


$loggedin_user = $_GET['c'];

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
      update_user_meta( $loggedin_user, 'avatar_user', $img_id );
      wp_redirect(home_url("quickstart?q=next&c=".$loggedin_user));
      exit();
    }
}

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['finish_quick']) ) {
    

    $mob = get_users(array(
        'meta_key' => 'mob',
        'meta_value' => sanitize_text_field($_POST['mob_num'])
    ));

    if(!empty($mob)) {
        echo "<script>alert('This phone number already exist. Please try with another phone number.')</script>";

    } else {
        update_user_meta( $loggedin_user, 'looking_for', sanitize_text_field($_POST['looking_for']) );
        update_user_meta( $loggedin_user, 'tag_line', sanitize_text_field($_POST['tag_line']) );
        update_user_meta( $loggedin_user, 'offe_r', sanitize_text_field($_POST['offe_r']) );
        update_user_meta( $loggedin_user, 'first_name', sanitize_text_field($_POST['fname']) );
        update_user_meta( $loggedin_user, 'last_name', sanitize_text_field($_POST['lname']) );
        
        update_user_meta( $loggedin_user, 'mob', sanitize_text_field($_POST['mob_num']) );
        update_user_meta( $loggedin_user, 'datewith', sanitize_text_field($_POST['date_with']) );

        wp_redirect(home_url("/"));
        exit();
    }

    
}


//--------- get profile photo and every data----
$metaID = get_user_meta($loggedin_user, 'avatar_user', true);
$attachment_url = wp_get_attachment_url($metaID);

$looking_for = get_user_meta($loggedin_user, 'looking_for', true);
$tagline = get_user_meta($loggedin_user, 'tag_line', true);
$tagline = explode(',', $tagline);
$offer = get_user_meta($loggedin_user, 'offe_r', true);
$fname = get_user_meta($loggedin_user, 'first_name', true);
$lname = get_user_meta($loggedin_user, 'last_name', true);
$mob = get_user_meta($loggedin_user, 'mob', true);
$datewith = get_user_meta($loggedin_user, 'datewith', true);

?>
    
    <?php get_header(); ?>

    <div class="container mb-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-4">

            
            
            <h4 class="text-uppercase text-center">Complete your profile</h4>
            <!-- <h5 class="text-uppercase text-center mt-3">Welcome, <?php //echo $current_user->user_firstname; ?></h5> -->
            <div class="boxx mt-4" style="border: 2px solid #eee; margin-bottom: 30PX; padding: 20px; border-radius: 16px; box-shadow: 1px 1px 5px 2px #eee; ">
                <div class="text-center">
                <?php if(empty($attachment_url)) { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="profile-photo mb-3" alt="profile photo">
                <?php } else { ?> 
                    <img src="<?php echo $attachment_url; ?>" class="profile-photo mb-3" alt="profile photo">
                <?php } ?>
                    
                    <h5 style="font-size: 16px;" class="text-uppercase mb-4">Upload a photo</h5>
                    <p class="mb-4">Having a photo will give you the best chance of success.</p>
                    
                    
                    <form method="post" id="adduser" action="" enctype='multipart/form-data'>
                        <input class="text-input" name="avatar_user" type="file" id="avatar_user" onchange="uploadProfilePhoto();" multiple="false" style="display: none;"/>
                        <input style="display: none;" name="updateuser" type="submit" id="quick_upload" class="submit button" value="<?php _e('GRAVAR', 'profile'); ?>" />
                        <input name="action" type="hidden" id="action" value="update-user" />
                    </form>

                        <button onclick="startUploadProfile();" class="btn btn-danger btn-md" type="button"><i class="fas fa-camera-retro"></i> Upload a photo</button>
                    
                        </div>
                    
                        
                        <form action="" method="post">

                        <div class="form-group mt-6">
                            <label style="text-align: left !important;" class="text-uppercase text-left mb-2">Date With*</label>
                            <select required name="date_with" class="form-control">
                                <option value="" selected disabled>Select one</option>
                                <option <?php echo ($datewith == 'Man' ? 'selected' : ''); ?>>Man</option>
                                <option <?php echo ($datewith == 'Woman' ? 'selected' : ''); ?>>Woman</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                            <div class="form-group mt-6">
                            <label style="text-align: left !important;" class="text-uppercase text-left mb-2">First name*</label>
                            <input required type="text" class="form-control" placeholder="Eg. John" name="fname" value="<?php echo (isset($fname) ? $fname : ''); ?>">
                        </div>
                            </div>

                            <div class="col-6">
                            <div class="form-group mt-6">
                            <label style="text-align: left !important;" class="text-uppercase text-left mb-2">Last name*</label>
                            <input required type="text" class="form-control" placeholder="Eg. Doe" name="lname" value="<?php echo (isset($lname) ? $lname : ''); ?>">
                            </div>
                            </div>

                        </div>

                        <?php if($mob == '') { ?>
                        <div class="form-group mt-6">
                            <label style="text-align: left !important;" class="text-uppercase text-left mb-2">Mobile Number*</label>
                            <input style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" required type="text" class="form-control" placeholder="" name="mob_num" value="<?php echo (isset($mob) ? $mob : ''); ?>">
                        </div>
                        <?php } else { ?>
                            <div class="form-group mt-6">
                            <label style="text-align: left !important; font-weight: bold;" class="text-uppercase text-left text-success"><i class="fas fa-check"></i> Mobile number verified.</label>
                            <input readonly type="text" class="form-control" placeholder="" value="<?php echo (isset($mob) ? $mob : ''); ?>">
                            </div>
                        <?php } ?>
                        
                        <div class="form-group mt-6">
                            <label style="text-align: left !important;" class="text-uppercase text-left mb-2">Occupation Industry*</label>
                            
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


                        <div class="form-group mt-6">
                            <label style="text-align: left !important;" class="text-uppercase text-left mb-2">What are you looking for?*</label>
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
                        <small>(Choose one or more value with press "Ctrl + mouse click")</small>
                        </div>


                        <div class="form-group mt-6">
                            <label style="text-align: left !important;" class="text-uppercase text-left mb-2">Ethinicity*</label>
                            <select required class="form-control" name="offe_r">
                            <option value="" selected="selected" disabled="disabled">-- select one --</option>
                            <option <?php echo (isset($offer) && $offer == 'Black' ? 'selected' : ''); ?>>Black</option>
                            <option <?php echo (isset($offer) && $offer == 'White' ? 'selected' : ''); ?>>White</option>
                            <option <?php echo (isset($offer) && $offer == 'Hispanic' ? 'selected' : ''); ?>>Hispanic</option>
                            <option <?php echo (isset($offer) && $offer == 'Asian' ? 'selected' : ''); ?>>Asian</option>
                        </select>
                        </div>

                        <div class="text-center mt-6">
                            
                            <div class="d-grid gap-2 col-6 mx-auto">
                                
                                

                                <button type="submit" name="finish_quick" class="btn btn-primary mt-6 btn-lg otp_veri">Finish</button>
                            </div>


                            



                        </div>

                </form>
                
                



                
            </div>

                
            </div>
            <div class="col-md-3"></div>
            
        </div>
    </div>




    
<?php get_footer(); ?>