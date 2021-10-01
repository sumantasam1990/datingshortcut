<?php 
/* Template Name: Custom Booking Success */ 



?>
    
<?php get_header(); ?>

    <!-- <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-12 h-100">
                <div class="flex">
                    <img src="<?php //echo get_template_directory_uri(); ?>/images/2.jpg" class="img-fluid image card-img-top mb-4">
                    <h2 class="display-6 text-center"><i class="fas fa-check"></i> Your Booking has been Successful.</h2>
                   
                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                        <a class="btn btn-primary btn-lg" href="<?php //echo home_url() ?>/appointments"><i class="fas fa-calendar-check"></i> Future Dates</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <?php
    while ( have_posts() ) :
        the_post();

        the_content();

    endwhile; // End of the loop.
?>
    
<?php get_footer(); ?>


