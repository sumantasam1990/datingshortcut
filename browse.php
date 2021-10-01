<?php 
/* Template Name: Custom Browse */ 


$number      = 24; // Update this according to your needs. Users perpage  
$paged       = (get_query_var('paged')) ? get_query_var('paged') : 1;  
$offset      = ($paged - 1) * $number;  
$users       = get_users();  
$args = array(
    'role' => 'um_hunters',
    'offset' => $offset,
    'number' => $number,
);
$query       = get_users($args);  
$total_users = count($users);  
$total_query = count($query);  
$total_pages = intval($total_users / $number) + 1;  



?>
     
<?php get_header(); ?>

    <div class="container mt-6 mb-4">
        
        <div class="row">

            <?php 
            foreach($query as $q){
            $user = get_userdata($q->ID);
            $metaID = get_user_meta($user->ID, 'avatar_user', true);
            $attachment_url = wp_get_attachment_url($metaID);
            ?>
            <div class="col-md-2">
            <a href="<?php echo home_url() ?>/profile/<?php echo $user->user_login; ?>"><div class="card">
                    
                    <?php if(empty($attachment_url)) { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="card-img-top" alt="profile photo">
                    <?php } else { ?> 
                        <img src="<?php echo $attachment_url; ?>" class="card-img-top" alt="profile photo">
                    <?php } ?>
                    <div class="card-body">
                        <p class="text-success card-subtitle mb-2" style="font-size: 13px; font-weight: bold;"><i class="fas fa-check-circle"></i> Verified</p>
                        <h4 style="text-transform: capitalize; font-size: 16px;"> <?php echo $user->first_name . ' ' . $user->last_name; ?> <span style="color: #EB4990;">25</span></h4>
                        
                        <p class="text-secondary" style="font-size: 14px;">New York, USA</p>
                        <div class="card-btn">
                            <!-- <button style="border-radius: 50px; width: 50px; height: 50px;" class="btn btn-outline-danger" type="button"><i class="far fa-heart"></i></button> -->
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary" type="button"><i class="far fa-calendar-alt"></i> Book Now</button>
                            </div>
                            
                        </div>
                        
                    </div>
                </div></a>
            </div>
            <?php } ?>
            
            
            


        </div>
        <div class="row">
            <div class="col-md-12">
            <?php
            if ($total_users > $total_query) {
            ?>
            <nav aria-label="Page navigation example">
            <div id="pagination" class="clearfix">  
            
            
            <?php
            $current_page = max(1, get_query_var('paged'));  
            echo paginate_links(array(  
                    'base' => get_pagenum_link(1) . '%_%',  
                    'format' => 'page/%#%/',  
                    'current' => $current_page,  
                    'total' => $total_pages,  
                    'prev_next'    => true,  
                    'type'         => 'list',  
                ));  
            ?>
            
            </div>  
            </nav>
            <?php } ?>
            </div>
        
        </div>
    </div>

    
<?php get_footer(); ?>
