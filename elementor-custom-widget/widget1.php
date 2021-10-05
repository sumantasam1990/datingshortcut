<?php
namespace Elementor;

class My_Widget_1 extends Widget_Base {
	
	public function get_name() {
		return 'DSAllUsers';
	}
	
	public function get_title() {
		return 'DS All users';
	}
	
	public function get_icon() {
		return 'fas fa-users';
	}
	
	public function get_categories() {
		return [ 'basic' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'ds' ),
                
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'ds' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor' ),
			]
		);

        // $this->add_control(
		// 	'Require_Logged_In',
		// 	[
		// 		'label' => __( 'Require Logged In?', 'elementor' ),
		// 		'type' => Controls_Manager::SWITCHER,
		// 		'label_on' => __( 'Yes', 'your-plugin' ),
		// 		'label_off' => __( 'No', 'your-plugin' ),
		// 		'return_value' => 'yes',
		// 		'default' => 'yes',
		// 	]
		// );

		// $this->add_control(
		// 	'link',
		// 	[
		// 		'label' => __( 'Link', 'elementor' ),
		// 		'type' => Controls_Manager::URL,
		// 		'placeholder' => __( 'https://your-link.com', 'elementor' ),
		// 		'default' => [
		// 			'url' => '',
		// 		]
		// 	]
		// );

		$this->end_controls_section();
	}
	
	protected function render() {
        $settings = $this->get_settings_for_display();

        global $wpdb;
        $loggedin_user = get_current_user_id();
        $datewith = get_user_meta($loggedin_user, 'datewith', true);
        $number      = 24;
        $paged       = (get_query_var('paged')) ? get_query_var('paged') : 1;  
        $offset      = ($paged - 1) * $number;  
        $users       = get_users();  
        if(isset($_GET['q'])) {
            $args = array(
                'role' => '',
                'offset' => $offset,
                'number' => $number,
                //'search' => '*' . $_GET['q'] . '*',
                'meta_query' => array(
                    'relation' => 'OR',
                        array(
                            'key'     => 'location',
                            'value'   => $_GET['q'],
                             'compare' => 'LIKE'
                        ),
                        array(
                            'key'     => 'first_name',
                            'value'   => $_GET['q'],
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key'     => 'nickname',
                            'value'   => $_GET['q'],
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key'     => 'sex',
                            'value'   => $datewith,
                            'compare' => '='
                        ),
                )
            );
        } elseif(isset($_GET['filter_btn'])) {
            $args = array(
                'role' => '',
                'offset' => $offset,
                'number' => $number,
                'meta_query' => array(
                    'relation' => 'AND',
                        array(
                            'key'     => 'age',
                            'value'   => $_GET['amount_hd'],
                             'compare' => 'BETWEEN'
                        ),

                        array(
                            'key'     => 'offe_r',
                            'value'   => $_GET['eth'],
                             'compare' => 'IN'
                        ),

                        array(
                            'key'     => 'sex',
                            'value'   => $datewith,
                            'compare' => '='
                        ),
                    ),

                // 'meta_key' => $_GET['filt'],
                // 'orderby' => 'meta_value',
                // 'order' => $_GET['order']
                
            );
        } else {
            $args = array(
                'role' => '',
                'offset' => $offset,
                'number' => $number,
                'meta_query' => array(
                    'relation' => 'AND',
                        array(
                            'key'     => 'sex',
                            'value'   => $datewith,
                            'compare' => '='
                        ),
                        
                    ),
                
            );
        }
        
        $query       = get_users($args);  
        $total_users = count($users);  
        $total_query = count($query);  
        $total_pages = intval($total_users / $number) + 1;  

        
		?>

<div class=" mt-3 mb-4">
        
        <div class="row">
            <div class="col-12 text-left mb-3">
                <h4><?php echo $settings['title']; ?></h4>
            </div>
            <?php 
            foreach($query as $q){
            $user = get_userdata($q->ID);
            $metaID = get_user_meta($user->ID, 'avatar_user', true);
            $attachment_url = wp_get_attachment_url($metaID);

            $location = get_user_meta($user->ID, 'location', true);
            $age = get_user_meta($user->ID, 'age', true);
            ?>
            <div class="col-xxl-2 col-md-2 col-xl-2 col-lg-2 col-6">
            <a href="<?php echo home_url() ?>/profile/<?php echo $user->user_login; ?>"><div class="card">
                    
                    <?php 
                    $table_name = $wpdb->prefix . "video_verify";
                    $sql = "select * from $table_name where vf_user_id = '".$user->ID."' and vf_status = '1'";
                    $results = $wpdb->get_results($sql);
                    if(count($results) > 0):
                    ?>
                    <div class="ribbon ribbon-top-right">
                        <span><i class="fas fa-check-circle"></i> Verified</span>
                    </div>
                    <!-- <div class="badge bg-success verified-badge">
                    <i class="fas fa-check-circle"></i> Verified
                    </div> -->
                    <?php endif; ?>

                    <?php if(empty($attachment_url)) { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/user.svg" class="card-img-top" alt="profile photo">
                    <?php } else { ?> 
                        <img src="<?php echo $attachment_url; ?>" class="card-img-top" alt="profile photo">
                    <?php } ?>
                    <div class="card-body">
                        <!-- <p class="text-success card-subtitle mb-2" style="font-size: 13px; font-weight: bold;"><i class="fas fa-check-circle"></i> Verified</p> -->
                        <h4 style="text-transform: capitalize; font-size: 16px;"> <?php echo $user->user_login; ?> <span style="color: #EB4990;"><?php echo $age; ?></span></h4>
                        
                        <p class="text-secondary" style="font-size: 14px;"><?php echo $location; ?></p>
                        <div class="card-btn">
                           
                            
                            
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


        <?php
		 

	}
	
	protected function _content_template() {

    }
	
	
}