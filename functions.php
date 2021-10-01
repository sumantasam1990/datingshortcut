<?php
/**
 * Datingshortcut functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Datingshortcut
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'datingshortcut_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function datingshortcut_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Datingshortcut, use a find and replace
		 * to change 'datingshortcut' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'datingshortcut', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'datingshortcut' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'datingshortcut_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'datingshortcut_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function datingshortcut_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'datingshortcut_content_width', 640 );
}
add_action( 'after_setup_theme', 'datingshortcut_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function datingshortcut_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'datingshortcut' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'datingshortcut' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'datingshortcut_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function datingshortcut_scripts() {
	wp_enqueue_style( 'datingshortcut-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'datingshortcut-style', 'rtl', 'replace' );

	wp_enqueue_script( 'datingshortcut-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'datingshortcut_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// -----------------------------------Sumanta---------------------------------------------------------------------------------

// function add_theme_codes() {

//  wp_enqueue_style( 'style', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', 'all');


// }
// add_action( 'wp_enqueue_scripts', 'add_theme_codes' );


// function add_theme_js() {
// 	wp_enqueue_script( 'script', 'https://cdn.jsdelivr.net/npm/flatpickr', true);
// }
// add_action( 'wp_footer', 'add_theme_js' );

add_filter( 'show_admin_bar', '__return_false' );


add_action("after_switch_theme", "mytheme_create_extra_table");

function mytheme_create_extra_table(){
    global $wpdb;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = $wpdb->prefix . "booking";  //get the database table prefix to create my new table
	$table_insta = $wpdb->prefix . "insta_photos";
	$table_payment = $wpdb->prefix . "ds_payment";
	$table_video_verify = $wpdb->prefix . "video_verify";

    $sql = "CREATE TABLE $table_name (
		`book_id` int(11) NOT NULL AUTO_INCREMENT,
		`book_from_id` int(11) NOT NULL,
		`book_to_id` int(11) NOT NULL,
		`book_date` date NOT NULL,
		`book_time` varchar(50) NOT NULL,
		`book_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
		`book_status` enum('0','1','2') NOT NULL DEFAULT '0',
		`book_pay_status` enum('0','1') NOT NULL DEFAULT '0',
		PRIMARY KEY (book_id)
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='booking table';";

	$sql2 = "CREATE TABLE $table_insta (
		`insta_id` int(11) NOT NULL AUTO_INCREMENT,
		`insta_user_id` int(11) NOT NULL,
		`insta_url` text NOT NULL,
		`insta_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
		PRIMARY KEY (insta_id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='insta photo store table';";

	$sql3 = "CREATE TABLE $table_payment (
		`payid` int(11) NOT NULL AUTO_INCREMENT,
		`book_pay_id` int(11) NOT NULL,
		`source_type` varchar(255) NULL,
		`card_brand` varchar(255) NULL,
		`last_four` varchar(255) NULL,
		`exp_month` varchar(255) NULL,
		`exp_year` varchar(255) NULL,
		`fingerprint` text NULL,
		`card_type` varchar(255) NULL,
		`order_id` varchar(255) NULL,
		`amount` varchar(255) NULL,
		`currency` varchar(10) NULL,
		`status` varchar(255) NULL,
		`pay_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
		PRIMARY KEY (payid)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='payment store table';";


$sql4 = "CREATE TABLE $table_video_verify (
	`vf_id` int(11) NOT NULL AUTO_INCREMENT,
	`vf_user_id` int(11) NOT NULL,
	`vf_url` text NOT NULL,
	`vf_status` int(11) NOT NULL DEFAULT 0,
	`pay_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (vf_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Video verify store table';";


    dbDelta( $sql );
	dbDelta( $sql2 );
	dbDelta( $sql3 );
	dbDelta( $sql4 );
}


function registration_form( $username, $password, $email, $first_name, $last_name, $location, $age, $sex ) {

	echo '
	
	<h4 class=" text-center" style="text-transform: uppercase;">Registration</h4>
	<p class="mb-4 text-center text-secondary" >Meet new members every day and made money on the process</p>
	
	<input type="hidden" name="txt_fname">
	<input type="hidden" name="txt_lname">

	<div class="col-6">
	<div class="form-group mb-2">
	<label class="mb-2">Username </label>
		<input type="text" id="username" required name="txt_username" class="form-control p-4" placeholder="Username should be unique">
		
	</div>
	</div>

	<div class="col-6">
	<div class="form-group mb-2">
	<label class="mb-2">Password</label>
		<input type="password" required id="psw" name="txt_pass" class="form-control p-4" placeholder="Minimum 6 charecters">
	</div>
	</div>

	<div class="col-6">
	<div class="form-group mb-2">
	<label class="mb-2">Location</label>
		<input type="text" required id="location_reg" name="txt_location" class="form-control p-4" placeholder="Type your city">
	</div>
	</div>

	<div class="col-6">
	<div class="form-group mb-2">
		<label class="mb-2">Age</label>
		<input type="text" required name="txt_age" class="form-control p-4" placeholder="Eg. 20">
	</div>
	</div>

	<div class="col-12">
	<div class="form-group mb-2">
	<label class="mb-2">Email</label>
		<input type="email" required name="txt_email" class="form-control p-4" placeholder="Eg. john@example.com">
	</div>
	</div>

	

	<div class="d-grid gap-2 col-6 mx-auto ">
		<button type="submit" name="submit" class="btn btn-primary btn-lg mt-4">Next</button>

		
	</div>

	<div class="text-center">
		
		<p style="font-size: 12px;" class="mt-3">By clicking Next I certify that I’m at least 18 years old and agree to the Secret Benefits <a class=" btn-link" href="">terms</a> and <a class=" btn-link" href="">privacy policy</a>.</p>

	</div>



	';

	//<a class="text-center btn btn-link text-danger mt-6" href="'.home_url(). '/login">Already have an account?</a>
}

function registration_validation( $username, $password, $email, $first_name, $last_name, $location, $age, $sex )  {
	global $reg_errors;
	$reg_errors = new WP_Error;

	if ( empty( $username ) || empty( $password ) || empty( $email ) || empty( $location ) || empty( $age ) || empty( $sex ) ) {
		$reg_errors->add('field', 'Required form field is missing');
	}

	if ( 4 > strlen( $username ) ) {
		$reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
	}

	if ( username_exists( $username ) )
    	$reg_errors->add('user_name', 'Sorry, that username already exists!');

	if ( ! validate_username( $username ) ) {
		$reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
	}

	if ( 6 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 6' );
    }

	if ( !is_email( $email ) ) {
		$reg_errors->add( 'email_invalid', 'Email is not valid' );
	}

	if ( email_exists( $email ) ) {
		$reg_errors->add( 'email', 'Email Already in use' );
	}

	// display errors
	if ( is_wp_error( $reg_errors ) ) {
 
		foreach ( $reg_errors->get_error_messages() as $error ) {
		 
			echo '<div class="alert alert-danger">';
			echo '<strong>ERROR</strong>:';
			echo $error . '<br/>';
			echo '</div>';
			 
		}
	 
	}

}

function complete_registration() {
    global $reg_errors, $username, $password, $email, $first_name, $last_name, $location, $age, $sex;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        'location'      =>   $location,
        'age'           =>   $age,
		'sex'           =>   $sex,
        );
        $user_idd = wp_insert_user( $userdata );

		update_user_meta($user_idd, 'age', sanitize_text_field($age));
		update_user_meta($user_idd, 'location', sanitize_text_field($location));
		update_user_meta($user_idd, 'sex', sanitize_text_field($sex));
        
		//echo "<script>window.location='quickstart?q=next&c=".$user_idd."'</script>";
		echo "<script>window.location='?reg=".$user_idd."'</script>";
    }
}

function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['txt_username'],
        $_POST['txt_pass'],
        $_POST['txt_email'],
        $_POST['txt_fname'],
        $_POST['txt_lname'],
        $_POST['txt_location'],
        $_POST['txt_age'],
		$_POST['hd_sex']
        );
         
        // sanitize user form input
        global $username, $password, $email, $first_name, $last_name, $location, $age, $sex;
        $username   =   sanitize_user( $_POST['txt_username'] );
        $password   =   esc_attr( $_POST['txt_pass'] );
        $email      =   sanitize_email( $_POST['txt_email'] );
        $first_name =   sanitize_text_field( $_POST['txt_fname'] );
        $last_name  =   sanitize_text_field( $_POST['txt_lname'] );
        $location   =   sanitize_text_field( $_POST['txt_location'] );
        $age        =   sanitize_text_field( $_POST['txt_age'] );
		$sex        =   sanitize_text_field( $_POST['hd_sex'] );
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $email,
        $first_name,
        $last_name,
        $location,
        $age,
		$sex
        );
    }
 
    registration_form(
        $username,
        $password,
        $email,
        $first_name,
        $last_name,
        $location,
        $age,
		$sex
        );
}

// Register a new shortcode: [cr_custom_registration]
add_shortcode( 'ds_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [hook]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}














// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

register_nav_menu('main-menu', 'Main menu');

// call custom elementor widget
require_once('elementor-custom-widget/my-widgets.php');

//dynamic menu loggedin user name

function give_profile_name($atts){
    $user=wp_get_current_user();
    $name=$user->user_login; 
    return $name;
}

add_shortcode('profile_name', 'give_profile_name');

add_filter( 'wp_nav_menu_objects', 'my_dynamic_menu_items' );
function my_dynamic_menu_items( $menu_items ) {
    foreach ( $menu_items as $menu_item ) {
        if ( '#profile_name#' == $menu_item->title ) {
            global $shortcode_tags;
            if ( isset( $shortcode_tags['profile_name'] ) ) {
                // Or do_shortcode(), if you must.
                $menu_item->title = give_profile_name( $shortcode_tags['profile_name'] );
            }    
        }
    }

    return $menu_items;
} 

//ajax booking
function bookTime() {

    global $wpdb;
	$curUserID = get_current_user_id();

	$table_book = $wpdb->prefix . "booking";
	$datee = $_POST['ds_date'];
	$idd = $_POST['ds_id'];

	$arr = [];
	$sql = "SELECT book_time FROM $table_book WHERE (book_from_id = '$idd' OR book_to_id = '$idd') AND book_date = '$datee'";
    $results = $wpdb->get_results($sql);

	//checking logged in user booked or not
	$sql2 = "SELECT book_time FROM $table_book WHERE (book_from_id = '$idd' OR book_to_id = '$idd') AND (book_from_id = '$curUserID' OR book_to_id = '$curUserID') AND book_date = '$datee'";
    $results2 = $wpdb->get_results($sql2);

	foreach($results as $res) {
		$arr[] = $res->book_time;
	}


	if(count($results2) == 0) {
	?>

		<script>
			function display_time(str) {
				document.getElementById("pay_square").style.display = "block";
			}
		</script>


	<div class="btn-group" role="group" aria-label="Basic radio toggle button group">


		<input onclick="display_time(this.value)" type="radio" class="btn-check" name="book_rad" id="btnradio1" autocomplete="off" <?php echo (in_array('11:00 AM', $arr) ? 'disabled' : ''); ?> value="11:00 AM">
		<label class="btn btn-outline-dark" for="btnradio1">11:00 AM <span style="font-size: 13px; color: #fff; font-weight: bold;"><?php echo (in_array('11:00 AM', $arr) ? 'Booked' : ''); ?></span></label>

		<input onclick="display_time(this.value)" type="radio" class="btn-check" name="book_rad" id="btnradio2" autocomplete="off" <?php echo (in_array('01:30 PM', $arr) ? 'disabled' : ''); ?> value="01:30 PM">
		<label class="btn btn-outline-dark" for="btnradio2">01:30 PM <span style="font-size: 13px; color: #fff; font-weight: bold;"><?php echo (in_array('01:30 PM', $arr) ? 'Booked' : ''); ?></span></label>

		<input onclick="display_time(this.value)" type="radio" class="btn-check" name="book_rad" id="btnradio3" autocomplete="off" <?php echo (in_array('04:00 PM', $arr) ? 'disabled' : ''); ?> value="04:00 PM">
		<label class="btn btn-outline-dark" for="btnradio3">04:00 PM <span style="font-size: 13px; color: #fff; font-weight: bold;"><?php echo (in_array('04:00 PM', $arr) ? 'Booked' : ''); ?></span></label>

		<input onclick="display_time(this.value)" type="radio" class="btn-check" name="book_rad" id="btnradio4" autocomplete="off" <?php echo (in_array('06:30 PM', $arr) ? 'disabled' : ''); ?> value="06:30 PM">
		<label class="btn btn-outline-dark" for="btnradio4">06:30 PM <span style="font-size: 13px; color: #fff; font-weight: bold;"><?php echo (in_array('06:30 PM', $arr) ? 'Booked' : ''); ?></span></label>

		<input onclick="display_time(this)" type="radio" class="btn-check" name="book_rad" id="btnradio5" autocomplete="off" <?php echo (in_array('09:00 PM', $arr) ? 'disabled' : ''); ?> value="09:00 PM">
		<label class="btn btn-outline-dark" for="btnradio5">09:00 PM <span style="font-size: 13px; color: #fff; font-weight: bold;"><?php echo (in_array('09:00 PM', $arr) ? 'Booked' : ''); ?></span></label>
		

	</div>

	<div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-danger btn-lg" name="book_confirm">Next</button>
            <p style="font-size: 12px;">You will not be charged if your booking will be cancel by <?php echo ($loggedin_user->display_name); ?></p>
        </div>

	<?php 
	} else {
		echo "<p style='color: #ff4757;'>You already have booking on this date.</p>";
	}
   
    die();
}
add_action('wp_ajax_bookTime', 'bookTime');
add_action('wp_ajax_nopriv_bookTime', 'bookTime');


//ajax payment

function payment_ds() {
	global $wp_session;
	global $wpdb;
	$book_id = $_POST['book_id'];

	//get price
	$table_book = $wpdb->prefix . "booking";
	$sql = "select book_to_id from $table_book where book_id = $book_id";
    $results = $wpdb->get_results($sql);

	$my_price = get_user_meta($results[0]->book_to_id, 'my_price', true);

	$intprice = (int)$my_price;

	if($book_id != '') {
		$url = "https://connect.squareupsandbox.com/v2/payments";
		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Bearer EAAAEN-fQ6D9uy7odPoFR9VMD2kJ17XEUhUtHj843RRhTIL1N4o6zaP4XWmn9qpH';
		$data = array (
			'idempotency_key' => uniqid(),
			'source_id' => $_POST['nonce'],
			'amount_money' => array(
				'amount' => $intprice,
				'currency' => "USD"
			)
		);

		$post = json_encode($data);
	
		$x = curl_init($url);
		curl_setopt($x, CURLOPT_HTTPHEADER, true);
		curl_setopt($x, CURLOPT_POST, true);
		curl_setopt($x, CURLOPT_POSTFIELDS, $post);
		curl_setopt($x, CURLOPT_HTTPHEADER, $header);
		curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
		$y = curl_exec($x);
		$res = json_decode($y);
		// get data 
		$payid = $res->payment->id;
		$status = $res->payment->status;
		$source_type = $res->payment->source_type;
		$card_brand = $res->payment->card_details->card->card_brand;
		$last_four = $res->payment->card_details->card->last_4;
		$exp_month = $res->payment->card_details->card->exp_month;
		$exp_year = $res->payment->card_details->card->exp_year;
		$fingerprint = $res->payment->card_details->card->fingerprint;
		$card_type = $res->payment->card_details->card->card_type;
		$order_id = $res->payment->order_id;
		$amount = $res->payment->amount_money->amount;
		$currency = $res->payment->amount_money->currency;

		

		

		if($payid != '' && $status == "COMPLETED") {
			//insert into payment table
		$table_payment = $wpdb->prefix."ds_payment";
		$wpdb->insert($table_payment, array(
			'payid'  => $payid,
			'source_type'  => $source_type,
			'card_brand'  => $card_brand,
			'last_four'  => $last_four,
			'exp_month'  => $exp_month,
			'exp_year'  => $exp_year,
			'fingerprint'  => $fingerprint,
			'card_type'  => $card_type,
			'order_id'  => $order_id,
			'amount'  => $amount,
			'currency'  => $currency,
			'status' => $status,
			'book_pay_id' => $book_id,
		));

			$data = [ 'book_pay_status' => 1 ];
			$where = [ 'book_id' => $book_id ];
			$wpdb->update( $wpdb->prefix . 'booking', $data, $where );
			//setcookie('_wp_dsdbpcookie',  '', time()-31556926, '/');
			//$_SESSION['_wp_dsdbpcookie'] = "";
			echo "Your payment has been successfull.";
		} else {
			echo "Payment error. Please try again later.";
		}
	} else {
		echo "Payment error. Book ID is null. Try again.";
	}
	
}

add_action('wp_ajax_payment_ds', 'payment_ds');
add_action('wp_ajax_nopriv_payment_ds', 'payment_ds');


//----------------------------------admin part -----------------------------------

function sports_bench_team_admin_menu() {
	//global $team_page;
	global $wpdb;

	add_menu_page( __( 'Verification', 'profile-verification' ), __( 'Verification', 'profile-verification' ), 'edit_posts', 'add_data', 'sports_bench_teams_form_page_handler', 'dashicons-groups', 16 ) ;
   }
   add_action( 'admin_menu', 'sports_bench_team_admin_menu' );
   
   function sports_bench_teams_form_page_handler() {
	   global $wpdb;

	   
		if(isset($_GET['q'])) {
			$table_book = $wpdb->prefix . 'video_verify';
			$wpdb->update( $table_book, array('vf_status' => $_GET['q']), array('vf_id' => $_GET['v']) );
			echo '<script>window.location.href="admin.php?page=add_data"</script>';
		} else {
			//
		}

	$tablename = $wpdb->prefix . "video_verify";
	$usertablename = $wpdb->prefix . "users";
	$sql = "SELECT t1.*,t2.* FROM $tablename t1 LEFT JOIN $usertablename t2 on(t1.vf_user_id=t2.ID) ORDER BY vf_status ASC";
    $results = $wpdb->get_results($sql);

	?>
 <h1>Users Verifications</h1>
<table class="wp-list-table widefat fixed striped table-view-list posts">
  <thead>
    <tr>
      <th>Username</th>
      <th>Display Name</th>
      <th>Video</th>
      <th>Status</th>
	  <th>Action</th>
    </tr>
  </thead>
  <tbody>
	  <?php foreach($results as $res) { ?>
    <tr>
      <td><?php echo $res->user_login ?></td>
      <td><?php echo $res->display_name ?></td>
      <td>
	  <video controls>
		<source src="<?php echo $res->vf_url; ?>" type="video/mp4">
		Your browser does not support HTML video.
	  </video>

		</td>
      <td>
		  <?php 
			if($res->vf_status == 0) {
				echo '<strong>Pending</strong>';
			} elseif($res->vf_status == 1) {
				echo '<strong>Approved</strong>';
			} else {
				echo "<strong>Rejected</strong>";
			}
		  ?>
	  </td>
	  <td>
		  <select class="" onchange="changeStatus(this.value, '<?php echo $res->vf_id; ?>');">
		  	  <option <?php echo ($res->vf_status == 0 ? 'selected' : ''); ?> value="0">Pending</option>
			  <option <?php echo ($res->vf_status == 1 ? 'selected' : ''); ?> value="1">Approve</option>
			  <option <?php echo ($res->vf_status == 2 ? 'selected' : ''); ?> value="2">Reject</option>
		  </select>
	  </td>

    </tr>
	<?php } ?>
	
    
  </tbody>
</table>

<script>

function changeStatus(str, str2) {
	window.location.href='admin.php?page=<?php echo $_GET['page']; ?>&q=' + str + '&v=' + str2;
}

</script>
	<?php 

   }


    // booking form insert
function booking() {
	global $wp_session;
	global $wpdb;
	$curUserID = get_current_user_id();
	$table_book = $wpdb->prefix . "booking";

	if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['book_confirm']) ) {

		$userid = get_user_by('login', get_query_var('author_name'));
		$curUserID = get_current_user_id();
	
		$wpdb->insert($table_book, array(
			'book_from_id'  => $curUserID,
			'book_to_id'    => $userid->ID,
			'book_date'     => $_POST['hd_date'],
			'book_time'     => $_POST['book_rad']
		));
	
		
		//$wp_session['_wp_dsdbpcookie'] = $wpdb->insert_id;
		//setcookie('_wp_dsdbpcookie',  $wpdb->insert_id, time()+31556926, '/');
		//wp_redirect(home_url("booking-success"));
		//wp_redirect(home_url("payment"));
		echo "<script>window.location.href='".home_url("payment")."?q=".$wpdb->insert_id."'</script>";
		
		//wp_redirect(home_url("/payment/?q=sddsd7878HJHHu&v=".md5('jjkffjkfHJBHJBHJ^#$@!#$').uniqid()."&s=".$wpdb->insert_id."&g=jkjkkjkIJBUIIUB5646huihuBNIBN"));
		exit();
	}
}

add_action( "ds_booking_now", "booking" );


// add_action('template_redirect', 'hooker');
// function hooker(){
//     //I load just before selecting and rendering the template to screen
// 	wp_redirect(home_url("/"));
//     exit(); 
// }