<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Datingshortcut
 */

?>


<!-- <div class="container-fluid section-two" id="nice">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-12 h-100">
                    <div class="flex">
                        <h2 class="title">Florida state 2,389,451 members.</h2>
                        <div class="row mt-6 footer">
                            <div class="col-md-4">
                                <h4>Abount us</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                            <div class="col-md-4">
                                <h4>Our mission</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                            <div class="col-md-4">
                                <h4>Our offer</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                        </div>
                        <div class="row mt-6">
                            <div class="col-12">
                                <p class="text-white-50">&copy; 2021 Datingshortcut. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

$("#register_start_modal_btn").click(function() {
    $('#register_start_modal').modal('show');

    $("#username").val("")
    $("#psw").val("")
});

$(".login_modal_btn").click(function() {
    $('#login_modal').modal('show');
});


function loginwithusernameDiv() {
        $("#login_username").slideToggle()
    }


// $(window).on('load', function() {
//     $('#register_start_modal').modal('show');

//     $("#username").val("")
//     $("#psw").val("")
// });

function hideModal(str) {

    if(str == "Man") {
        $("#man_txt").html('<a href="#" class=" btn-link">attractive women</a> for $100 only!');
    } else {
        $("#man_txt").html("<span style='color: #E2C17B;'>wealthy</span> & successful men for free!");
        
    }
    $("#im").val(str)
    $("#register_start_modal").modal("hide");
    $("#message_cmn").modal("hide")
    $("#register_middle_modal").modal("show");
}

<?php if(isset($_GET['reg'])) { ?>

    $(window).on('load', function() {
        $('#register_last_modal').modal('show');
    });

<?php } ?>

<?php if(isset($_GET['act']) && isset($_GET['too2'])) { ?>

$(window).on('load', function() {
    $('#register_middle_modal').modal('show');
});

<?php } ?>

</script>

<script>
  
</script>

<script>
    $(".booknow").flatpickr({
        //enableTime: true,
        disable: ["2021-09-05", "2021-09-18", "2021-09-24", new Date(2025, 4, 9) ],
        dateFormat: "Y-m-d",
        minDate: '<?php echo date('Y-m-d', strtotime(' +1 day')); ?>', // from tomorrow
        maxDate: new Date().fp_incr(14), // 14 days from now

        onChange: function(selectedDates, dateStr, instance) {
            $("#hd_book_dt").val(dateStr)
            $("#book_date_time").html("Selected date: " + dateStr)
            $("#book_time_modal").modal("show")
            $("#selected_data").html(moment(dateStr).format('dddd, MMM Do'))
            $("#hd_date").val(dateStr)
            ajaxSubmit()
            
        },
    });

    function ajaxSubmit() {
    var newCustomerForm = jQuery("#hd_date").val();
    var newCustomerForm2 = jQuery("#hd_login_id").val();
    console.log(newCustomerForm + newCustomerForm2)
    jQuery.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php",
        data: { action : 'bookTime', ds_date: newCustomerForm, ds_id: newCustomerForm2},
        
        success: function(data){
            jQuery("#book_time_modal").modal("show");
            jQuery("#feedback").html(data);
        }
    });

    return false;
}


    $(".datepicker").flatpickr({
        //enableTime: true,
        dateFormat: "Y-m-d",
        mode: "range",
        
        onChange: function(selectedDates, dateStr, instance) {
            // $("#hd_book_dt").val(dateStr)
            // $("#book_date_time").html("Selected date: " + dateStr)
            // $("#book_time_modal").modal("show")
            // $("#selected_data").html(moment(dateStr).format('dddd, MMM Do'))
            // $("#hd_date").val(dateStr)
            
        },
    });

   
    


</script>

<script>
    function callMsgModal() {
        $('#message_cmn').modal('show')
    }

    function startUploadProfile() {
        $('#avatar_user').trigger('click'); 
    }

    function uploadProfilePhoto() {
        $('#quick_upload').trigger('click'); 
    }

    function startUploadVideo() {
        $('#uploadfile').trigger('click');
    }

    function onchangeVideoUpload() {
      $('#uploadfile_btn').trigger('click');
    }

    
    // multiple select box 
    jQuery('option').mousedown(function(e) {
      e.preventDefault();
      jQuery(this).toggleClass('selected');
    
      jQuery(this).prop('selected', !jQuery(this).prop('selected'));
      return false;
    });
    

</script>


<script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 18,
      max: 99,
      values: [ 18, 99 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        $( "#amount_hd" ).val( ui.values[ 0 ] + "," + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );
      $( "#amount_hd" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
      "," + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>


<?php wp_footer(); ?>

<!-- register Modal 1 -->
<div class="modal fade" id="register_start_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content modal-bg">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center" style="height: 400px;">
        
        <h4 class="display-6 " style="font-weight: bold; color: #000;">What's your gender?</h4>
        <div class="flex_modal">
        <a onclick="hideModal('Man')" id="man" class="btn btn-primary btn-lg mb-3" style="color: #fff;" href="#">I'm a Man</a>
        <a onclick="hideModal('Woman')" id="woman" class="btn btn-danger btn-lg mb-3" style="color: #fff;" href="#">I'm a Woman</a>
        </div>
        
      </div>

      <!-- <div style="padding: 10px; " class=" text-center" style="justify-content: center !important;">
        <button type="button" id="" class="btn btn-link mt-4 login_modal_btn">Already have an account? Login</button>
      </div> -->
     
    </div>
  </div>
</div>


<!-- register Modal 2 -->
<div class="modal fade" id="register_middle_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div style="padding: 5px;">
            <button style="float: right;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
<!--      <div class="modal-header">-->
<!--         -->
<!--      </div>-->
      <div class="modal-body text-left" style="padding: inherit !important;">

      <div class="container-fluid boxx">
          <div class="row text-center">
              <div class="col-12">
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="" style="width: 100px; margin-top: -10px;" alt="logo">
              </div>
          </div>


        <form class="mt-2 row" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	    <input type="hidden" id="im" name="hd_sex" value="<?php echo (isset($_GET['hd_sex']) ? $_GET['hd_sex'] : ''); ?>" required>
            <?php echo do_shortcode('[ds_custom_registration]'); ?>


        </form>

      </div>

      </div>
    </div>
  </div>
</div>



<!-- register Modal 3 -->
<div class="modal fade" id="register_last_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body text-left">
      
        <h4 class="text-center mb-2 display-6" style="font-weight: bold; text-transform: capitalize;">Would you like to receive paid invitations from other users?</h4> <hr>

        <div class="mt-4 mb-2" style="padding: 20px;">
        <p class="text-dark" style="font-size: 20px;"><i class="fas fa-heart"></i> Increase your chances of finding more matches.</p>
        <p class="text-dark" style="font-size: 20px;"><i class="fas fa-hand-holding-usd"></i> Get paid for the effort and time take to prepare for a date.</p>
        <p class="text-dark" style="font-size: 20px;"><i class="fas fa-hand-holding-medical"></i> We will take care of all the coordination.</p>

        </div>

        <div style="padding-left: 20px; padding-right: 20px;">
        <a class="btn btn-primary btn-lg login_modal_btn " href="?"><i class="fas fa-users"></i> Yes add me to that group</a>
        <a class="btn btn-danger btn-lg" style="float: right;" href="?">No thanks</a>
        </div>
        
        
      </div>
    </div>
  </div>
</div>







<!-- message Modal -->
<div class="modal fade" id="message_cmn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body text-center">
      

        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i style="font-size: 34px;" class="fas fa-exclamation-triangle bi flex-shrink-0 me-2"></i>
        <div>
            <?php echo $_GET['e'] ?>
        </div>
        </div>

        <div class="d-grid gap-2 mt-4">
        <a onclick="hideModal()" id="man" class="btn btn-danger btn-lg mb-3" style="color: #fff;" href="#">OK</a>
        <!-- <a id="woman" class="btn btn-danger btn-lg mb-3" style="color: #fff;" href="#">I'm a Woman</a> -->
        </div>
        
      </div>
     
    </div>
  </div>
</div>

<script>
<?php if(isset($_GET['phone'])) { ?>

$(window).on('load', function() {
    $('#login_modal').modal('show');
});

<?php } ?>
</script>

<!-- login Modal 2 -->
<div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
    
      <!-- <div class="modal-header">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
      </div> -->
      <div class="modal-body text-left" style="background: #182C61; color: #fff; padding: inherit !important;">
          
      <div class="container-fluid">
          <!-- <div class="row text-center">
              <div class="col-12">
              <img src="<?php //echo get_template_directory_uri(); ?>/images/logo.png" class="" style="width: 100px;" alt="logo">
              </div>
          </div> -->
          <div class="row">
            
            <div class="col-8" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/pexels-andrea-piacquadio-842546.jpg') !important; background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
            <div class="col-4">

            <button style="color: #fff; float: right; margin-top: 10px; border: none; background: transparent;" type="button" data-bs-dismiss="modal" aria-label="Close"><i style="font-size: 22px;" class="fas fa-times"></i></button> 
            
            <div class="login" style="padding: 20px; margin-top: 30px;">

            <h4 class="text-white display-6">Datingshortcut</h4>
            <p class="mb-4">Meet new members everyday and made money on the process.</p>
                
                <?php if(isset($_GET['e'])): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                    
                    <i style="font-size: 34px;" class="fas fa-exclamation-triangle bi flex-shrink-0 me-2"></i>
                    <div>
                        <?php echo $_GET['e'] ?>
                    </div>
                    </div>
                <?php endif; ?>
                <form action="login" method="post" class="login_form">
                  <input type="hidden" name="hd_too" value="<?php echo $_GET['too']; ?>">
                    <div class="text-center">
                        <?php 
                        if(isset($_GET['er'])) {
                            echo "<p>Your login code is wrong.</p>";
                        }
                        ?>
                    </div>
                <!-- <input type="hidden" name="login_nonce" value="<?php //echo wp_create_nonce('login_nonce'); ?>" /> -->
                <input type="hidden" name="zero" value="<?php echo $_GET['o']; ?>" />
                <input type="hidden" name="phone" value="<?php echo $_GET['phone']; ?>" />

                <div class="form-group mb-4">
                <?php if(!isset($_GET['step'])) { ?>
                    <div class="row">
                        <div class="col-4">
                        <select name="country_code" required class="form-control">
                            
                        <option data-countryCode="GB" value="44">UK (+44)</option>
	<option Selected data-countryCode="US" value="1">USA (+1)</option>
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
                        <div class="col-8">
                        <input type="text" required name="user_login" class="form-control p-4" placeholder="Your phone number">
                        </div>
                    </div>
                    

                    <?php } else { ?>
                        <input type="text" required name="user_login" class="form-control p-4 mb-2" placeholder="Your phone number without country code" value="<?php echo $_GET['phone']; ?>">

                        <input type="number" required name="otp" class="form-control p-4" placeholder="Enter 4 digits code">
                        <?php } ?>
                </div>

                   
                    

                    <div class="d-grid gap-2">

                    <?php if(!isset($_GET['step'])) { ?>
                        <button type="submit" name="log_verify" class="btn btn-primary btn-lg mt-4">Login</button>

                        <?php } else { ?>
                            <button type="submit" name="login_now" class="btn btn-primary btn-lg mt-4">Verify</button>
                            <?php } ?>

                        
                    </div>
                    </form>
                        <div class="text-center mt-4 mb-4">
                            <a onclick="loginwithusernameDiv()" class="text-center text-secondary " style="font-weight: 600;" href="#"><i class="fas fa-long-arrow-alt-right"></i> Login with email/username and password</a>
                        </div>

                    <div id="login_username" style="display: none;">
                    <form action="login" method="post">
                        <div class="form-group mb-4">
                            <input required type="text" name="log" class="form-control p-4" placeholder="Email Or Username">
                        </div> 
                        <div class="form-group">
                            <input required type="password" name="pwd" class="form-control p-4" placeholder="Password">
                        </div>

                        <div class="d-grid gap-2">

                            <button type="submit" name="login_user_pass" class="btn btn-success btn-lg mt-4">Login</button>
                        
                        </div>

                    </form>
                    </div>

                    

                    <div class="text-center">
                        <!-- <a id="register_start_modal_btn" class="text-center text-light mt-2" href="#">Don't have an account? Signup here</a> -->

                        <p class="mt-3"><a class="text-center text-secondary mt-4" href="">Forgot your password?</a></p>


                        <p style="font-size: 12px;" class="mt-6">By clicking login you agree to our <a class=" btn-link" href="">terms</a> and <a class=" btn-link" href="">privacy policy</a>.</p>

                    </div>

                    
                
            </div>

            </div>
          </div>
        
      </div>
        
      </div>
    </div>
  </div>
</div>



</body>
</html>
