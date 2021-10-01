<?php 
/* Template Name: Custom Register */ 

// global $user_ID;
// global $wpdb;

//  $err = '';
//  $success = '';

//  if($_POST)
//  {

//   $username = $wpdb->escape($_POST['log']);
//   $password = $wpdb->escape($_POST['pwd']);
//   $remember = $wpdb->escape($_POST['remember']);


//   if( $username == "" || $password == "" ) {
//    $err = 'Please don\'t leave the required field.';
//   } else {
//    $user_data = array();
//    $user_data['user_login'] = $username;
//    $user_data['user_password'] = $password;
//    $user_data['remember'] = $remember;
//    $user = wp_signon( $user_data, false );

//    if ( is_wp_error($user) ) {
//     $err = $user->get_error_message();
//     exit();
//    } else {
//     wp_set_current_user( $user->ID, $username );
//     do_action('set_current_user');

//     echo '<script>window.location.href='. get_bloginfo('url') .'</script>';
//     exit();
//    }
//   }
//  }

?>
    
    <?php get_header(); ?>

    <div class="container mb-4">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

            <div class="text-center">
            <img style="width: 200px; margin: 0 auto;" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="" alt="logo">
            </div>
            

            <div class="login">
                <h1 class="text-center">
                100% Free Signup
                </h1>
                <h4 class="text-center mt-4">Meet <span id="man_txt"></span></h4>
                <?php echo do_shortcode('[ds_custom_registration]'); ?>
            </div>

                
            </div>
            <div class="col-md-4"></div>
            
        </div>
    </div>
    


    

    
<?php get_footer(); ?>






