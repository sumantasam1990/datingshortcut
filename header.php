<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Datingshortcut
 */
global $current_user;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto&family=Nunito:wght@400;600;700&display=swap'); */
        /* font-family: 'Roboto', sans-serif;
        font-family: 'Nunito', sans-serif; */

        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500;600;700&display=swap');

        html,
        body {
            height: 100%;
            /* background-color: #fff !important; */
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
        
        h1,h2,h3,h4,h5,h6 {
          font-family: 'Montserrat Alternates', sans-serif;
          color: #34495e;
        }
        .logo {
            width: 200px;
        }
        #olws-dynamic-btn {
          /* display: none !important; */
        }
        .btn,a {
          border-radius: 10px;
          text-decoration: none;
          font-family: 'Montserrat Alternates', sans-serif;
        }
        .header {
            height: 100vh;
            background-image: url('<?php echo get_template_directory_uri(); ?>/images/romantic.jpg') !important;
            background-position: bottom center;
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.7);
        }
        .box {
            /* padding: 20px; */
            border: 1px solid #eee;
            
            border-radius: 10px;
            box-shadow: 0px 1px 7px 6px #eee;
            background-color: #fff;
            padding-top: 30px;
            padding-bottom: 60px;
            padding-left: 20px;
            padding-right: 20px;

        }
        label {
            font-weight: 500;
            font-family: 'Montserrat Alternates', sans-serif;
        }
        .form-control {
            padding: 8px !important;
            border-radius: 10px !important;
            /* font-family: 'Montserrat Alternates', sans-serif; */
        }
        .flex {
            width: 70%;
            height: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .title {
            font-size: 2.4rem;
            color: #fff !important;
            text-align: center;
        }
        .btn-date {
            text-transform: uppercase;
        }
        .section {
            padding: 20px;
            position: relative;
        }
        .section p {
            font-weight: 600;
        }
        .heading {
            font-weight: bold;
        }
        .icon {
            color: #5352ed;
            font-size: 3rem;
        }
        .mt-6 {
            margin-top: 60px;
        }
        .section .card {
            padding: 20px;
            text-align: center;
            box-shadow: 1px 1px 3px 2px #eee;
            border-radius: 10px;
        }
        .section .absolute-img {
            position: absolute;
            z-index: 1000;
            bottom: 0;
            left: 0;
        }
        .cta {
            height: 450px;
            background: #5352ed;
            padding: 20px;
            color: #fff;
            font-family: 'Montserrat Alternates', sans-serif;
        }
        .cta h2 {
          color: #fff;
        }
        .cta h5 {
          color: #fff;
        }
        .cta .card {
            box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.5);
            
        }
        .parallax {
            background: url('<?php echo get_template_directory_uri(); ?>/images/2.jpg');
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            height: 400px;
            box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.5);
        }
        .section-two {
            background: #5352ed;
            height: 450px;
        }
        .footer h4{
            color: #fff;
        }
        .footer p{
            color: rgb(206, 206, 206);
        }
        .p-4 {
          padding: 10px !important;
          border-radius: 10px !important;
        }
        .btn-link {
          text-decoration: none !important;
          color: #CA00B2 !important;
        }
        .btn-primary{
          /* background-color: #5714FF; */
          background-color: #6EC1E3;
          border: none !important;
          color: #fff !important;

        }
        .btn-danger {
          /* background-color: #CA00B2 !important; */
          background-color: #EC75CC !important;
          border: none !important;
          color: #fff !important;
        }
        .btn-info {
          border: none !important;
          background-color: #8A3AB9;
          color: #fff !important;
          font-weight: 700;
        }
        .btn-info:hover {
          border: none !important;
          background-color: #8A3AB9;
          color: #fff !important;
          font-weight: 700;
        }
        .btn-info:active {
          border: none !important;
          background-color: #8A3AB9;
          color: #fff !important;
          font-weight: 700;
        }
        .btn-outline-light {
          color: #fff !important;
        }
        .btn-primary:hover {
          /* background-color: #5714FF; */
          background-color: #6EC1E3;
          border: none !important;
          color: #fff !important;

        }
        .modal-header {
          border: none !important;
        }
        .modal-content {
          border-radius: 20px !important;
        }
        .modal-sm {
          max-width: 420px;
          padding: 30px;
        }
        .btn-sm {
          padding: 8px;
        }
        .dropnav .dropdown-menu {
          padding: 10px !important;
          width: 320px;
          box-shadow: 0 0 20px #1113;
          border-radius: 16px;
          margin-top: 60px !important;
          margin-right: -60px !important;
          border: none !important;
          position: absolute;
          top: 0;
          left: -220px; 
        }

        .dropnav .dropdown-menu li a {
          padding: 10px;
        }
        .dropdown-item {
          background-color: inherit !important;
        }

        th {
          color: #717171 !important;
          font-weight: normal;
        }
        .bg-danger {
          background-color: #CA00B2 !important;
        }
        .img-thumbnail {
          border-radius: 16px !important;
        }
        .card {
          border-radius: 16px;
          border: none;
          margin-bottom: 60px;
        }
        .card-img-top {
          border-radius: 16px !important;
        }
        .card-btn{
          display: flex;
          flex-wrap: wrap;
          align-content: center;
          justify-content: space-between;
          align-items: center;
          
        }
        .text-success {
          color: #17BB9B !important;
        }
        .btn-success {
          background-color: #17BB9B !important;
          border: none !important;
        }

        .dropdown li a {
          color: #34495e !important;
        }
        .navbar {
          padding-top: 0rem;
          padding-bottom: 0rem;
        }
        .profile-photo {
          width: 200px;
          height: 200px;
          object-fit: cover;
          border-radius: 16px;
        }

        .page-numbers {
          list-style: none;
          display: flex;
          justify-content: end;
        }
        .page-numbers li {
          float: left;
          margin-right: 2px;
        }

        
        #pagination .page-numbers > li > a,
        #pagination .page-numbers > li > span {
            background-color: #000;
            border-right: 1px solid #222;
            padding: 10px 15px;
            font-weight: bold;
            color: #FFFFFF;
            border-radius: 5px;
        }

        #pagination .page-numbers .current {
            background-color: #eee;
            border-color: #eee;
            color: #000;
            
        }
        .card-img-top {
          width: 300px !important;
          height: 200px !important;
          object-fit: cover;
        }
        .img-thumbnail {
          max-width: 400px !important;
          max-height: 300px !important;
          object-fit: cover;
        }
        .pro_img {
          position: relative;
        }
        .image {
          display: block;
          width: 100%;
          height: auto;
        }

        .overlay {
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          height: 100%;
          width: 100%;
          opacity: 0;
          transition: .5s ease;
          background-color: #222222;
          border-radius: 16px;
        }

        .pro_img:hover .overlay {
          opacity: 0.8;
        }

        .text {
          color: white;
          font-size: 20px;
          position: absolute;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          text-align: center;
        }
        .elementor-icon-box-description {
          color: #636363 !important;
        }
        .modal-bg {
          /* height: 400px; */
          /* background-image: url('<?php echo get_template_directory_uri(); ?>/images/2.jpg'); */
          background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("<?php echo get_template_directory_uri(); ?>/images/2.jpg");
          /* background-position: -60%; */
          background-size: cover;
          background-repeat: no-repeat;
          
          
          /* margin: 0 auto; */
        }
        .flex_modal {
          display: flex;
          align-items: center;
          flex-direction: row;
          flex-wrap: nowrap;
          align-content: center;
          justify-content: space-around;
          height: 100%;
        }
        .ihs-country-code {
          height: 42px;
          /* border: none !important; */
          border-top-left-radius: 10px !important;
          border-bottom-left-radius: 10px !important;
        }
        .ihs-otp-btn {
          border-radius: 16px;
        }
        .btn-check:disabled+.btn, .btn-check[disabled]+.btn {
          background: gray !important;
        }
        .book_now_sec {
          padding: 20px;
          border: 2px solid #000;
          border-radius: 16px;
          width: 100%;
        }


    </style>

</head>

<body <?php body_class(); ?> onload='<?php echo (isset($_GET['e']) ? 'callMsgModal()' : ''); ?>' >

<?php 
wp_body_open(); 
if($user_ID && !is_front_page()) {
?>


<nav class="navbar navbar-expand-lg navbar-dark" style=" background: #191E23; border-bottom: 1px solid #EAEAEA;">
  <div class="container">
    <a class="navbar-brand" href="<?php echo home_url() ?>/browse"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" style="width: 50px;" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'nav-item',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
       

      <!-- <form class="d-flex" style="width: 22%; ">
      <input style="border-radius: 25px !important; font-weight: bold; box-shadow: 0 1px 4px 2px #00000014; border: 0; padding: 12px !important; background: #2f363d; color: #f2f2f2;" type="search" name="q" class="form-control" placeholder="🔎 Search by city" value="🔎 New York, NY, USA">
      </form> -->

      <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'container' => false,
                'menu_class' => 'nav-item',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-lg-0 dropnav %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>

      
      
    </div>
  </div>
</nav>
<?php } ?>