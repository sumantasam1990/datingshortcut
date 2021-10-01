<?php 
/* Template Name: Custom Profile */ 



global $current_user;

$loggedin_user = wp_get_current_user();

$metaID = get_user_meta($loggedin_user->ID, 'avatar_user', true);
$attachment_url = wp_get_attachment_url($metaID);

$looking_for = get_user_meta($current_user->ID, 'looking_for', true);
$tagline = get_user_meta($current_user->ID, 'tag_line', true);
$offer = get_user_meta($current_user->ID, 'offe_r', true);
$location = get_user_meta($current_user->ID, 'location', true);
$age = get_user_meta($current_user->ID, 'age', true);

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
$sex = get_user_meta($current_user->ID, 'sex', true);
$my_price = get_user_meta($loggedin_user->ID, 'my_price', true);




?>

    
    <?php get_header(); ?>

    
    <div class="container mb-4">

        <div class="row mt-4">

            <div class="col-md-3">
                
            <?php if(empty($attachment_url)) { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="img-fluid img-thumbnail mb-4 image" alt="profile photo">
            <?php } else { ?> 
                <img src="<?php echo $attachment_url; ?>" class="img-fluid img-thumbnail mb-4 image" alt="profile photo">
            <?php } ?>

            <h4 class="mb-2">Invitation For Restaurant: </h4>
            <h4>$<?php echo $my_price; ?> / 2 hours</h4>

            <div class="d-grid gap-2 mt-3">
            <a href="#" style="font-weight: bold; color: #00c684 !important;" class="text-success btn-link"><i class="fas fa-check-circle"></i> Verified &nbsp; </a>
            <p style="font-weight: 600;" class="mt-3">Video Verification <span class="badge bg-danger"><a style="text-decoration: none; color: #fff;" href=""><i class="fas fa-play-circle"></i> Play</a></span></p>
            <p>John proved they are the person in the photos by recording a video speaking.</p>
            </div>
            
            <?php do_shortcode( '[ds-insta-view-photos]'); ?>

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-8">

                <h4 style="font-weight: bold; text-transform: capitalize;" class="display-6"> <?php echo ($loggedin_user->display_name); ?> <span style="color: #888; font-size: 14px;"><?php echo (isset($sex) ? $sex : ''); ?></span></h4>

                <p class="text-secondary"><?php echo (isset($tagline) ? $tagline : ''); ?></p>
                <p class="text-secondary"> <?php echo (isset($location) ? $location : ''); ?></p>
                <p class="text-secondary"><?php echo (isset($offer) ? $offer : ''); ?></p>

                <!-- <p>&nbsp;</p> -->

                <!-- <h4><i class="fas fa-user"></i> Bio</h4>
                <p><?php echo (isset($offer) ? $offer : ''); ?></p> -->

                <h4 class="mt-6"><i class="fas fa-building"></i> Occupation</h4>
                <p><?php echo (isset($looking_for) ? $looking_for : ''); ?></p>

                <h4 class="mt-6"><i class="fas fa-running"></i> Physical</h4>
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


                <h4 class="mt-6"><i class="fas fa-glass-cheers"></i> Lifestyle</h4>

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

                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th style="width: 25%">NET WORTH</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Under $500K</td>
                        
                    </tr>
                    </tbody>
                </table>




            </div>
        </div>
    </div>


    

    
<?php get_footer(); ?>


