<?php 
/* Template Name: Appointments */ 

global $wpdb;

$curUserID = get_current_user_id();
$sex = get_user_meta($curUserID, 'sex', true);
$today = date("Y-m-d");
$table_book = $wpdb->prefix . "booking";
$table_users = $wpdb->prefix . "users";

//if($sex == "Woman") {
    $sql = "SELECT * FROM $table_book WHERE (book_to_id = '$curUserID' AND book_date > '$today') OR (book_from_id = '$curUserID' AND book_date > '$today')";
    $results = $wpdb->get_results($sql);
//} else {
    // $sql = "SELECT t1.*,t2.* FROM $table_book t1 LEFT JOIN $table_users t2 ON(t1.book_to_id = t2.ID) WHERE t1.book_from_id = '$curUserID' AND t1.book_date > '$today'";
    // $results = $wpdb->get_results($sql);
//}

if(isset($_GET['search_date'])) {
    $search_query = $wpdb->escape($_GET['q']);
        $sql = "SELECT * FROM $table_book WHERE (book_to_id = '$curUserID' AND book_date = '$search_query') OR (book_from_id = '$curUserID' AND book_date = '$search_query')";
        $results = $wpdb->get_results($sql);
}

if(isset($_GET['r'])) {
    $updated = $wpdb->update( $table_book, array('book_status' => '1'), array('book_id' => $_GET['r']) );
 
    if ( false === $updated ) {
        // There was an error.
    } else {
        wp_redirect(home_url("appointments"));
        exit();
    }

}

if(isset($_GET['a'])) {
    $updated = $wpdb->update( $table_book, array('book_status' => '2'), array('book_id' => $_GET['a']) );
 
    if ( false === $updated ) {
        // There was an error.
    } else {
        wp_redirect(home_url("appointments"));
        exit();
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
    
<?php get_header(); ?>

    <div class="container mt-6 mb-4">
        <div class="row">
            <div class="col-4">
                <p><i class="fas fa-calendar-alt"></i> Select a date to filter your booking</p>
            <form class="d-flex" style="width: 100%; " class="mb-4" action="" method="GET">
            
            <input style="border-top-left-radius: 16px !important; border-bottom-left-radius: 16px !important; border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important; font-weight: bold; box-shadow: 0 1px 4px 2px #00000014; border: 0; padding: 12px !important; background: #FFF; color: #444;" type="search" name="q" class="form-control datepicker mt-3" placeholder="Search with date" value="<?php echo (isset($_GET['q']) ? $_GET['q'] : date('Y-m-d')); ?>">
            <button style="width: 50px;
    
    margin-top: 14px;
    border-radius: 0px;" type="submit" name="search_date" class="btn btn-dark btn-sm"><i class="fas fa-search"></i></button>
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
            <div class="col-md-6">

            <div class="card mb-3" style="min-height: 330px !important;">
                <div class="row g-0">
                    <div class="col-md-5">

                    <?php if($result->book_status < 2 && $result->book_to_id == $curUserID) { ?>
                        <?php if(empty($attachment_url)) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/blur.png" class="img-fluid" style="min-height: 330px; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } else { ?> 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blur.png" class="img-fluid " style="min-height: 330px; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } ?>
                    
                        <?php } else { ?>
                            <?php if(empty($attachment_url)) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="img-fluid" style="min-height: 330px; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } else { ?> 
                            <img src="<?php echo $attachment_url; ?>" class="img-fluid " style="min-height: 330px; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-bottom-left-radius: 16px;" alt="profile photo">
                        <?php } ?>
                        <?php } ?>




                    
                    </div>
                    <div class="col-md-7">
                    <div class="card-body">

                        <h5 class="card-title">
                            <?php echo $result->book_id; ?>
                            <?php echo ( $result->book_status == 2 ? $user->display_name : $user->user_login ); ?> , <?php echo $age; ?>
                        </h5>
                        <p class="card-text"><?php echo $location; ?></p>
                        <p class="card-text"><small class="text-success">Booking Date: <br /> <span style="font-weight: bold;"><?php echo date('l jS \of F Y', strtotime($result->book_date)); ?></span></small></p>
                        <p class="card-text"><small class="text-primary">Booking Time: <br /> <span style="font-weight: bold;"><?php echo $result->book_time; ?></span></small></p>


                        <?php 
                        if($result->book_to_id == $curUserID) {
                         
                            if($result->book_status == 0) {
                        ?>
                        <h6 class="mb-3">You will get <span style="font-weight: bold;">$150</span> after finish this date.</h6>
                        
                        <div class="d-grid gap-2">
                        <a onclick="return confirm('You need to pay us $10 if you reject this person. But if you do not want to pay us $10, we will ban your account for a week.')" class="btn btn-outline-danger btn-lg" href="?r=<?php echo $result->book_id; ?>&id=<?php echo md5($user->user_login); ?>"> Reject </a>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-success btn-lg" href="?a=<?php echo $result->book_id; ?>&id=<?php echo md5($user->user_login); ?>"> Accept </a>
                        </div>

                        <?php } elseif($result->book_status == 2) { ?>
                            <p class="text-dark" style="text-transform: capitalize; line-height: 22px;"><i class="fas fa-check-circle"></i> Congradulations! Best of luck for your date.</p>

                            <div class="row">
                                
                                <label>Secret code*</label>
                                <div class="col-6">
                                    <input class="form-control" type="number" required name="sec_code" placeholder="Your secret code">
                                </div>
                                <div class="col-6">
                                    <button type="submit" name="sec_code_btn" class="btn btn-success btn-sm">Verify Code</button>
                                </div>
                                <small>Note: You will get your secret code from the guy/girls you're going to date.</small>
                                
                            </div>
                        <!-- <a class="btn btn-primary btn-sm" href="<?php echo home_url() ?>/review/<?php echo $user->user_login; ?>"><i class="fas fa-star-half-alt"></i> Give a review </a> -->
                        <?php } else { ?>
                            <p class="text-danger" style="text-transform: uppercase;"><i class="fas fa-times-circle"></i> Rejected</p>
                            <?php } ?>
                        <?php
                         } else {
                            if($result->book_status == 0) {
                        ?>
                        <p class="text-warning" style="text-transform: uppercase;"><i class="fas fa-hourglass-half"></i> Your offer is Pending.</p>
                        <?php } elseif($result->book_status == 1) { ?>
                            <p class="text-danger" style="text-transform: uppercase;"><i class="fas fa-times-circle"></i> You have been Rejected.</p>
                            <?php } else { ?>
                                <p class="text-dark" style="text-transform: capitalize; line-height: 22px;"><i class="fas fa-check-circle"></i> Congradulations! Your offer has been accepted.</p>
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

    
<?php get_footer(); ?>