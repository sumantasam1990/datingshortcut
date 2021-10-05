<?php 
/* Template Name: Custom Get Verified */ 


global $wpdb;
$loggedin_user = wp_get_current_user();

//get video and status
$tablename = $wpdb->prefix . "video_verify";
$usertablename = $wpdb->prefix . "users";
$sql = "SELECT t1.*,t2.* FROM $tablename t1 LEFT JOIN $usertablename t2 on(t1.vf_user_id=t2.ID) WHERE vf_user_id = '".$loggedin_user->ID."'";
$results = $wpdb->get_results($sql);

// change profile photo upload script
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    // These files need to be included as dependencies when on the front end.
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    // Let WordPress handle the upload.
    $img_id = media_handle_upload( 'verify_video', 0 );
    

    if ( is_wp_error( $img_id ) ) {
      echo $img_id->get_error_message();
    } else {
      update_user_meta( $loggedin_user->ID, 'verify_video', $img_id );
      $metaID = get_user_meta($loggedin_user->ID, 'verify_video', true);
      $attachment_url = wp_get_attachment_url($metaID);

      $tablename = $wpdb->prefix . "video_verify";
      if(count($results) > 0) {
        $wpdb->update($tablename, array(
            'vf_url' => $attachment_url,
        ), array(
            'vf_user_id' => $loggedin_user->ID,
        ));
      } else {
        $wpdb->insert($tablename, array(
            'vf_user_id' => $loggedin_user->ID,
            'vf_url' => $attachment_url,
        ));
      }
      
      wp_redirect(home_url("verified"));
      exit();
    }
}

?>
     
<?php get_header(); ?>

    <div class="container mt-6">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6 text-center">
                <div class="alert alert-info">
                <?php echo (isset($_GET['e']) ? $_GET['e'] : ''); ?>
                </div>
                
                <h4><i class="fas fa-check-circle"></i> Get Verified</h4>

                <?php if($results[0]->vf_status == 2 || $results[0]->vf_status == 0){ ?>
                <form class="mt-4" action="" method="post" enctype="multipart/form-data">
                    <input onchange="onchangeVideoUpload()" type="file" accept=".mp4,.avi,.mov" required id="uploadfile" name="verify_video" style="display: none;">
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button onclick="startUploadVideo();" type="button" class="btn btn-danger btn-lg"><i class="fas fa-video"></i> Select Video</button>
                    <div id="video_placeholder"></div>
                    <input type="submit" class="btn btn-danger btn-lg" id="uploadfile_btn" value="Start Uploading" style="display: none;">
                    </div>
                    <input name="action" type="hidden" id="action" value="update-user" />
                </form>
                <?php } ?>

                <div class="ratio ratio-16x9 mt-4 mb-4">
                <video controls>
                <source src="<?php echo $results[0]->vf_url; ?>" type="video/mp4">
                Your browser does not support HTML video.
                </video>

                </div>

                <p><?php 
                if($results[0]->vf_status == 0) {
                    echo "<p class='text-dark'><i class='fas fa-hourglass-half'></i> Thank you for uploaded your video for verification. We will approve you if everything is good.</p>";
                } elseif($results[0]->vf_status == 1) {
                    echo "<p class='text-success'><i class='fas fa-check-circle'></i> Your verification has been approved.</p>";
                } else {
                    echo "<p class='text-danger'><i class='fas fa-times-circle'></i> Your verification has been Rejected. Please re-upload your video.</p>";
                }
                ?></p>

            </div>
            <div class="col-3">

            </div>
        </div>
    </div>
    
<?php get_footer(); ?>
