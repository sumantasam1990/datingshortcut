<?php
/* Template Name: Custom Notifications */


global $current_user;
global $wpdb;

$loggedin_user = wp_get_current_user();


//get booking notification


$curUserID = get_current_user_id();
$sex = get_user_meta($curUserID, 'sex', true);
$today = date("Y-m-d");
$table_book = $wpdb->prefix . "booking";
$table_payment = $wpdb->prefix . "ds_payment";

$sql = "SELECT t1.*,t2.* FROM $table_book t1 LEFT JOIN $table_payment t2 on (t1.book_id = t2.book_pay_id) WHERE t1.book_pay_status = '1' AND ((t1.book_to_id = '$curUserID' AND t1.book_date > '$today') OR (t1.book_from_id = '$curUserID' AND t1.book_date > '$today'))";
$results = $wpdb->get_results($sql);




 get_header();

 ?>
<style>
    img {
        border-radius: 8px;
    }
</style>
<div class="container mt-6">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h2 class="elementor-heading-title elementor-size-default mb-4">Notifications</h2>
            <hr />

            <ul style="margin: 0; padding: 0;">


            <?php
            foreach( $results as $result ) {

                // get users account info
                if($result->book_to_id == $curUserID) {
                    $user = get_user_by('id', $result->book_from_id);

                    $metaID = get_user_meta($result->book_from_id, 'avatar_user', true);
                    $attachment_url = wp_get_attachment_url($metaID);
                    $location = get_user_meta($result->book_from_id, 'location', true);
                    $age = get_user_meta($result->book_from_id, 'age', true);
                } else {
//        $user = get_user_by('id', $result->book_to_id);
//
//        $metaID = get_user_meta($result->book_to_id, 'avatar_user', true);
//        $attachment_url = wp_get_attachment_url($metaID);
//        $location = get_user_meta($result->book_to_id, 'location', true);
//        $age = get_user_meta($result->book_to_id, 'age', true);
                }


                //end--------------------

                ?>
                <?php
                if($user->user_login) {
                    ?>
                    <li style="list-style: none; margin-bottom: 40px;" class="fs-6 fw-light">
                        <?php if($result->book_status < 2 && $result->book_to_id == $curUserID) { ?>
                            <?php if(empty($attachment_url) || $user->photo_status == 0 || $user->photo_status == 1) { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blur.png" class="img-fluid" style="height: 50px; width: 50px; object-fit: cover; " alt="profile photo">
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blur.png" class="img-fluid " style="height: 50px; width: 50px; object-fit: cover; " alt="profile photo">
                            <?php } ?>

                        <?php } else { ?>
                            <?php if(empty($attachment_url) || $user->photo_status == 0 || $user->photo_status == 1) { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="img-fluid" style="height: 50px; width: 50px; object-fit: cover; " alt="profile photo">
                            <?php } else { ?>
                                <img src="<?php echo $attachment_url; ?>" class="img-fluid " style="height: 50px; width: 50px; object-fit: cover;" alt="profile photo">
                            <?php } ?>
                        <?php } ?>
                        <a style="color: #000;" href="<?php echo home_url() . '/appointments'; ?>"> You have a <span class="fw-bold">new booking</span> from <span class="fw-bold"><?php echo ( $result->book_status == 2 ? $user->display_name : $user->user_login ); ?></span></a>.

                        <p class="text-black-50" style="margin-left: 55px; margin-top: -10px; font-size: 12px;">
                            <small class=" ds_e_name_book_date" style="font-size: <?php echo $settings['book_date_fontsize']; ?>; color: <?php echo $settings['book_date_name_color']; ?>">Booking on
                                <span style="font-weight: bold;">
                                    <?php echo date('l jS \of F Y', strtotime($result->book_date)); ?> @ <span class="ds-text-typo-book-time"><?php echo $result->book_time; ?></span>
                                </span>
                            </small>
                        </p>





                    </li>
                    <?php
                }
                ?>
                <?php
            }
            ?>
            </ul>
        </div>
        <div class="col-3"></div>

    </div>
</div>





<?php get_footer(); ?>
