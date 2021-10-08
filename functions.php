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

	?>

        <input type="hidden" name="otpp" value="<?php echo $_GET['o2']; ?>">
	<h4 class=" text-center" style="text-transform: uppercase;">Registration</h4>
	<p class="mb-4 text-center text-secondary" >Meet new members every day and made money on the process</p>
	
<!--	<input type="hidden" name="txt_fname">-->
<!--	<input type="hidden" name="txt_lname">-->

    <div class="col-6">
        <div class="form-group mb-2">
            <label class="mb-2">First Name </label>
            <input type="text" id="fname" required name="txt_fname" value="<?php echo (isset($_GET['txt_fname']) ? $_GET['txt_fname'] : ''); ?>" class="form-control p-4" placeholder="First name">

        </div>
    </div>

    <div class="col-6">
        <div class="form-group mb-2">
            <label class="mb-2">Last Name </label>
            <input type="text" id="lname" required name="txt_lname" value="<?php echo (isset($_GET['txt_lname']) ? $_GET['txt_lname'] : ''); ?>" class="form-control p-4" placeholder="Last name">

        </div>
    </div>

	<div class="col-6">
	<div class="form-group mb-2">
	<label class="mb-2">Username </label>
		<input type="text" id="username" required name="txt_username" value="<?php echo (isset($_GET['txt_username']) ? $_GET['txt_username'] : ''); ?>" class="form-control p-4" placeholder="Username should be unique">
		
	</div>
	</div>

	<div class="col-6">
	<div class="form-group mb-2">
	<label class="mb-2">Password</label>
		<input type="password" required id="psw" name="txt_pass" value="<?php echo (isset($_GET['txt_pass']) ? $_GET['txt_pass'] : ''); ?>" class="form-control p-4" placeholder="Minimum 6 charecters">
	</div>
	</div>

	<div class="col-6">
	<div class="form-group mb-2">
	<label class="mb-2">Location</label>
		<input type="text" required id="location_reg" name="txt_location" value="<?php echo (isset($_GET['txt_location']) ? $_GET['txt_location'] : ''); ?>" class="form-control p-4" placeholder="Type your city">
	</div>
	</div>

	<div class="col-6">
	<div class="form-group mb-4">
		<label class="mb-2">Age</label>
		<input type="text" required name="txt_age" value="<?php echo (isset($_GET['txt_age']) ? $_GET['txt_age'] : ''); ?>" class="form-control p-4" placeholder="Eg. 20">
	</div>
	</div>

	<div class="col-6">
	<div class="form-group mb-4">
	<label class="mb-2">Email</label>
		<input type="email" required name="txt_email" value="<?php echo (isset($_GET['txt_email']) ? $_GET['txt_email'] : ''); ?>" class="form-control p-4" placeholder="Eg. john@example.com">
	</div>
	</div>

    <div class="col-2">
        <div class="form-group mb-2">
            <label class="mb-2">Code</label>
        <select name="country_code" required class="form-control">

            <option data-countryCode="GB" value="44">UK (+44)</option>
            <option data-countryCode="US" selected value="1">USA (+1)</option>
            <optgroup label="Other countries">
                <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                <option data-countryCode="AD" value="376">Andorra (+376)</option>
                <option data-countryCode="AO" value="244">Angola (+244)</option>
                <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                <option data-countryCode="AR" value="54">Argentina (+54)</option>
                <option data-countryCode="AM" value="374">Armenia (+374)</option>
                <option data-countryCode="AW" value="297">Aruba (+297)</option>
                <option data-countryCode="AU" value="61">Australia (+61)</option>
                <option data-countryCode="AT" value="43">Austria (+43)</option>
                <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                <option data-countryCode="BY" value="375">Belarus (+375)</option>
                <option data-countryCode="BE" value="32">Belgium (+32)</option>
                <option data-countryCode="BZ" value="501">Belize (+501)</option>
                <option data-countryCode="BJ" value="229">Benin (+229)</option>
                <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                <option data-countryCode="BW" value="267">Botswana (+267)</option>
                <option data-countryCode="BR" value="55">Brazil (+55)</option>
                <option data-countryCode="BN" value="673">Brunei (+673)</option>
                <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                <option data-countryCode="BI" value="257">Burundi (+257)</option>
                <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                <option data-countryCode="CA" value="1">Canada (+1)</option>
                <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                <option data-countryCode="CL" value="56">Chile (+56)</option>
                <option data-countryCode="CN" value="86">China (+86)</option>
                <option data-countryCode="CO" value="57">Colombia (+57)</option>
                <option data-countryCode="KM" value="269">Comoros (+269)</option>
                <option data-countryCode="CG" value="242">Congo (+242)</option>
                <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                <option data-countryCode="HR" value="385">Croatia (+385)</option>
                <option data-countryCode="CU" value="53">Cuba (+53)</option>
                <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                <option data-countryCode="DK" value="45">Denmark (+45)</option>
                <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                <option data-countryCode="EG" value="20">Egypt (+20)</option>
                <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                <option data-countryCode="EE" value="372">Estonia (+372)</option>
                <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                <option data-countryCode="FI" value="358">Finland (+358)</option>
                <option data-countryCode="FR" value="33">France (+33)</option>
                <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                <option data-countryCode="GA" value="241">Gabon (+241)</option>
                <option data-countryCode="GM" value="220">Gambia (+220)</option>
                <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                <option data-countryCode="DE" value="49">Germany (+49)</option>
                <option data-countryCode="GH" value="233">Ghana (+233)</option>
                <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                <option data-countryCode="GR" value="30">Greece (+30)</option>
                <option data-countryCode="GL" value="299">Greenland (+299)</option>
                <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                <option data-countryCode="GU" value="671">Guam (+671)</option>
                <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                <option data-countryCode="GN" value="224">Guinea (+224)</option>
                <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                <option data-countryCode="GY" value="592">Guyana (+592)</option>
                <option data-countryCode="HT" value="509">Haiti (+509)</option>
                <option data-countryCode="HN" value="504">Honduras (+504)</option>
                <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                <option data-countryCode="HU" value="36">Hungary (+36)</option>
                <option data-countryCode="IS" value="354">Iceland (+354)</option>
                <option data-countryCode="IN" value="91">India (+91)</option>
                <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                <option data-countryCode="IR" value="98">Iran (+98)</option>
                <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                <option data-countryCode="IE" value="353">Ireland (+353)</option>
                <option data-countryCode="IL" value="972">Israel (+972)</option>
                <option data-countryCode="IT" value="39">Italy (+39)</option>
                <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                <option data-countryCode="JP" value="81">Japan (+81)</option>
                <option data-countryCode="JO" value="962">Jordan (+962)</option>
                <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                <option data-countryCode="KE" value="254">Kenya (+254)</option>
                <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                <option data-countryCode="KP" value="850">Korea North (+850)</option>
                <option data-countryCode="KR" value="82">Korea South (+82)</option>
                <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                <option data-countryCode="LA" value="856">Laos (+856)</option>
                <option data-countryCode="LV" value="371">Latvia (+371)</option>
                <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                <option data-countryCode="LR" value="231">Liberia (+231)</option>
                <option data-countryCode="LY" value="218">Libya (+218)</option>
                <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                <option data-countryCode="MO" value="853">Macao (+853)</option>
                <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                <option data-countryCode="MW" value="265">Malawi (+265)</option>
                <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                <option data-countryCode="MV" value="960">Maldives (+960)</option>
                <option data-countryCode="ML" value="223">Mali (+223)</option>
                <option data-countryCode="MT" value="356">Malta (+356)</option>
                <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                <option data-countryCode="MX" value="52">Mexico (+52)</option>
                <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                <option data-countryCode="MD" value="373">Moldova (+373)</option>
                <option data-countryCode="MC" value="377">Monaco (+377)</option>
                <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                <option data-countryCode="MA" value="212">Morocco (+212)</option>
                <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                <option data-countryCode="NA" value="264">Namibia (+264)</option>
                <option data-countryCode="NR" value="674">Nauru (+674)</option>
                <option data-countryCode="NP" value="977">Nepal (+977)</option>
                <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                <option data-countryCode="NE" value="227">Niger (+227)</option>
                <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                <option data-countryCode="NU" value="683">Niue (+683)</option>
                <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                <option data-countryCode="NO" value="47">Norway (+47)</option>
                <option data-countryCode="OM" value="968">Oman (+968)</option>
                <option data-countryCode="PW" value="680">Palau (+680)</option>
                <option data-countryCode="PA" value="507">Panama (+507)</option>
                <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                <option data-countryCode="PE" value="51">Peru (+51)</option>
                <option data-countryCode="PH" value="63">Philippines (+63)</option>
                <option data-countryCode="PL" value="48">Poland (+48)</option>
                <option data-countryCode="PT" value="351">Portugal (+351)</option>
                <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                <option data-countryCode="QA" value="974">Qatar (+974)</option>
                <option data-countryCode="RE" value="262">Reunion (+262)</option>
                <option data-countryCode="RO" value="40">Romania (+40)</option>
                <option data-countryCode="RU" value="7">Russia (+7)</option>
                <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                <option data-countryCode="SM" value="378">San Marino (+378)</option>
                <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                <option data-countryCode="SN" value="221">Senegal (+221)</option>
                <option data-countryCode="CS" value="381">Serbia (+381)</option>
                <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                <option data-countryCode="SG" value="65">Singapore (+65)</option>
                <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                <option data-countryCode="SO" value="252">Somalia (+252)</option>
                <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                <option data-countryCode="ES" value="34">Spain (+34)</option>
                <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                <option data-countryCode="SD" value="249">Sudan (+249)</option>
                <option data-countryCode="SR" value="597">Suriname (+597)</option>
                <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                <option data-countryCode="SE" value="46">Sweden (+46)</option>
                <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                <option data-countryCode="SI" value="963">Syria (+963)</option>
                <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                <option data-countryCode="TH" value="66">Thailand (+66)</option>
                <option data-countryCode="TG" value="228">Togo (+228)</option>
                <option data-countryCode="TO" value="676">Tonga (+676)</option>
                <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                <option data-countryCode="TR" value="90">Turkey (+90)</option>
                <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                <option data-countryCode="UG" value="256">Uganda (+256)</option>
                <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
            </optgroup>

        </select>
        </div>

    </div>
    <div class="col-4">
        <div class="form-group mb-2">
            <label class="mb-2">Phone number</label>
        <input type="text" required name="mob_num" class="form-control p-4" placeholder="Your phone number without country code" value="<?php echo (isset($_GET['too2']) ? $_GET['too2'] : ''); ?>">
        </div>
    </div>
	





	<?php if(isset($_GET['too2']) && isset($_GET['act'])) { ?>
	<div class="col-12">
	<div class="form-group mb-2">
    <label>OTP</label>
    <input type="number" name="verify_code" placeholder="Enter the 6 digits OTP" class="form-control" >
    </div>
</div>
        <?php } ?>

	

	<div class="d-grid gap-2 col-6 mx-auto ">
        <?php if(isset($_GET['act'])) { ?>
		<button type="submit" name="submit" class="btn btn-primary btn-lg mt-4 otp_veri">Next</button>
        <?php } else { ?>
		<button type="submit" name="log_verify" class="btn btn-primary btn-lg mt-4 otp_veri">Verify</button>
        <?php } ?>
		
	</div>

	<div class="text-center">
		
		<p style="font-size: 12px;" class="mt-3">By clicking Next I certify that I’m at least 18 years old and agree to the Secret Benefits <a class=" btn-link" href="">terms</a> and <a class=" btn-link" href="">privacy policy</a>.</p>

	</div>



	<?php

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

        if(isset($_POST['otpp']) == md5($_POST['verify_code'])) {
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
            update_user_meta( $user_idd, 'my_price', sanitize_text_field("70.00") );

            //checking if phone exist
            //$mob = get_user_meta($user_idd, 'mob', true);

            update_user_meta( $user_idd, 'mob', sanitize_text_field('+'.$_POST['mob_num']) );

            //send an email to the admin for notification

            $to = get_option("admin_email");
            $subject = 'You Have A New User On Datingshortcut';
            $body = '<h4>Hello Admin,</h4> <p>You have a new user registered on the Datingshortcut.</p> <p><a href="https://datingshortcut.com/wp-admin">Click here to go the admin panel</a> </p>';
            $headers = array('Content-Type: text/html; charset=UTF-8');

            wp_mail( $to, $subject, $body, $headers );

            //echo "<script>window.location='quickstart?q=next&c=".$user_idd."'</script>";
            echo "<script>window.location='?reg=".$user_idd."'</script>";
        } else {
            echo "<script>alert('You have entered wrong OTP.')</script>";


        }
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

    // mobile verification with OTP

    if(isset($_POST['log_verify'])) {
        global $wpdb;

        $code = rand(100000,999999);
        $id = "AC8f038730211d9c9d98fcd0450d6325cc";
        $token = "09ba537653f4ebe8dd7fdd1d9918b562";
        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/Messages";
        $from = "+18884982510";
        $to = "+".$_POST['country_code'].$_POST['mob_num'];

        $too = $_POST['country_code'] . '-' .$_POST['mob_num'];

        $body = "Your login code is " .$code;
        $data = array (
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );

        $post = http_build_query($data);

        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        curl_close($x);


        $urlGen = home_url("/?act=reg&z=gftyGF56Fsh&o2=" . md5($code) . "&phone2=" . $wpdb->escape($_POST['user_login']) . "&too2=" . $too . "&txt_username=" . $_POST['txt_username'] . "&txt_pass=" . $_POST['txt_pass'] . "&txt_location=" . $_POST['txt_location'] . "&txt_age=" . $_POST['txt_age'] . "&txt_email=" . $_POST['txt_email'] . "&hd_sex=" . $_POST['hd_sex'] . "&txt_fname=" . $_POST['txt_fname'] . "&txt_lname=" . $_POST['txt_lname']);

        echo '<script>window.location.href="'.$urlGen.'"</script>';

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


function add_login_check()
{
    if (is_user_logged_in()) {
        if (is_front_page()){
            wp_redirect('browse');
            exit; 
        }
    }
}

add_action('wp', 'add_login_check');


function add_scriptt() {
	?>


	<script>

    $('document').ready(function() {
		$("#future_alert_modal").modal("show");
    $("#html_confirm").html(`
    <p>None of these people work as Escort Service;
all these profiles are real people, you will pay
directly to our website, and we will secure that
this person attempts to the scheduled date;
remember offering money for sex is illegal.
Please behave politely. We will give you the
chance to show how valuable you are, but Our
website is not responsible for any good or bad
result coming out from this romantic
encounter.</p>
    `);
    $("#confirm_title").html("");
	});



</script>
	<?php 
}

add_action( 'wp_footer', 'add_scriptt' );