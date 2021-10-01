<?php 
global $wpdb;
$curUserID = get_current_user_id();
$loggedin_user = get_user_by('slug', get_query_var('author_name'));
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


// booking form insert

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['book_confirm']) ) {

    $userid = get_user_by('login', get_query_var('author_name'));
    $curUserID = get_current_user_id();

    $wpdb->insert($table_book, array(
        'book_from_id'  => $curUserID,
        'book_to_id'    => $userid->ID,
        'book_date'     => $_POST['hd_date'],
        'book_time'     => $_POST['book_rad']
    ));

    
    setcookie('_wp_dsdbpcookie',  $wpdb->insert_id, time()+31556926, '/');
    //wp_redirect(home_url("booking-success"));
    wp_redirect(home_url("payment"));
    
    //wp_redirect(home_url("/payment/?q=sddsd7878HJHHu&v=".md5('jjkffjkfHJBHJBHJ^#$@!#$').uniqid()."&s=".$wpdb->insert_id."&g=jkjkkjkIJBUIIUB5646huihuBNIBN"));
    exit();
}



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

                <div class="row">

                    <div class="col-md-8">

                    <h4 style="font-weight: bold; text-transform: capitalize;" class="display-6"> <?php echo ($loggedin_user->user_login); ?> <span style="color: #888; font-size: 14px;"><?php echo (isset($sex) ? $sex : ''); ?></span></h4>

<p class="text-secondary"><?php echo (isset($tagline) ? $tagline : ''); ?></p>
<p class="text-secondary"> <?php echo (isset($location) ? $location : ''); ?></p>
<p class="text-secondary"><?php echo (isset($offer) ? $offer : ''); ?></p>



<!-- <h4><i class="fas fa-user"></i> Bio</h4>
<p><?php //echo (isset($offer) ? $offer : ''); ?></p> -->

<h4 class="mt-4"><i class="fas fa-building"></i> Occupation</h4>
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
        <td><?php echo (isset($net_worth) ? $net_worth : ''); ?></td>
        
    </tr>
    </tbody>
</table>

                    </div>

                    <div class="col-md-4">

                    
                    <div class="book_now_sec">
                    <h4 class="text-left">Want to go date with <?php echo ($loggedin_user->user_login); ?>? <br> <br> Book <?php echo ($loggedin_user->user_login); ?> for <span style="font-weight: bold;">two hours</span> only on $<?php echo $my_price; ?>.</h4>


                    <label id="book_date_time"></label>

                    <form action="" method="post">
                        <div class="d-grid gap-2">
                            <?php if ( is_user_logged_in() ) { ?>
                                <?php if($my_price != '' && $my_price > '0') { ?>
                            <a id="book_sub" href="javascript:void(0)" class="btn btn-danger btn-lg booknow"><i class="fas fa-calendar-alt"></i> Send Invitation</a>
                            <?php } ?>
                            <?php } else { ?>
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


    <?php 
    if ( is_user_logged_in() ) {
    //if($sex == 'Woman' && $sex_cur_user != 'Woman') { 
        ?>
    <section class="container-fluid" style="position: fixed; bottom: 0; background: #FBFBFB; color: #888; padding: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Want to go date with <?php echo ($loggedin_user->user_login); ?>? Book <?php echo ($loggedin_user->user_login); ?> for <span style="font-weight: bold;">two hours</span> only on $<?php echo $my_price; ?>.</p>
                </div>
                <div class="col-md-6 text-right">

                        <label id="book_date_time"></label>
                        
                        
                        
                        <form action="" method="post">
                        <?php if($my_price != '' && $my_price > '0') { ?>
                        <a id="book_sub" href="javascript:void(0)" style="float: right; margin-top: -20px;" class="btn btn-danger btn-lg booknow"><i class="fas fa-calendar-alt"></i> Send Invitation</a>
                            <?php } ?>
                            <input type="hidden" id="hd_book_dt" name="book_dt">
                            <button style="float: right; display: none; margin-top: -20px;" type="submit" class="btn btn-danger btn-lg nextbooked">Next <i class="fas fa-long-arrow-alt-right"></i></button>
                        </form>
                        
                    
                    

                </div>
            </div>
        </div>
        
    </section>
    <?php } ?>

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

    
<?php get_footer(); ?>



