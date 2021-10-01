<?php 
/* Template Name: DS Payment */ 

global $wpdb;
global $wp_session;

?>

<?php get_header(); ?>
<script
      type="text/javascript"
      src="https://sandbox.web.squarecdn.com/v1/square.js"
    ></script>
        <?php if(isset($_GET['q']) && $_GET['q'] != '') { ?>
        <div class="container">
        <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
          
          <div class="flex">
            <h2>Pay Now </h2>
          <form id="payment-form" class="mt-3 mb-2">
            <div id="card-container"></div>
            <div class="d-grid gap-2">
              <input type="hidden" id="ds_book_id" value="<?php echo $_GET['q']; ?>">
              <button id="card-button" type="button" class="btn btn-success">Pay Now</button>
            </div>
            
          </form>
          <div id="payment-status-container" class="mt-4 mb-2"></div>
          <div id="payment-status-container2" class="mb-4"></div>
          </div>

          

          </div>
          <div class="col-3">
            
          </div>
      </div>
        </div>
        <?php } else { ?>
          <p>Booking failed. Please try again later.</p>
          <?php } ?>

        
        <?php
    while ( have_posts() ) :
        the_post();

        the_content();

    endwhile; // End of the loop.
?>
      
    
  
  <!-- Configure the Web Payments SDK and Card payment method -->
  <script type="text/javascript">
    async function main() {
      const APPLICATION_ID = 'sandbox-sq0idb-9i6-NIgQ1smPe0b1HUAIXg';
      const LOCATION_ID = 'LF6WECFJYG1AZ';

      const payments = Square.payments(APPLICATION_ID, LOCATION_ID);
      const card = await payments.card();
      await card.attach('#card-container');

      async function eventHandler(event) {
        event.preventDefault();

        try {
          const result = await card.tokenize();
          if (result.status === 'OK') {
            console.log(`Payment token is ${result.token}`);
            // send ajax-------------
            var newCustomerForm2 = jQuery("#ds_book_id").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php",
                data: { action : 'payment_ds', nonce: result.token, book_id: newCustomerForm2},
                
                success: function(data){
                  jQuery("#payment-status-container").html(data);
                  jQuery("#payment-status-container2").html("It will automatically redirect you after 3 seconds. Please do not close your browser or tab.");
                    setTimeout(function(){ 
                      window.location.href="booking-success";
                    }, 3000);
                    
                    
                }
            });

            return false;
            // ajax end------------------
          }
        } catch (e) {
          console.error(e);
        }
      };

      const cardButton = document.getElementById('card-button');
      cardButton.addEventListener('click', eventHandler);
    }

    main();
  </script>
</body>


    
<?php get_footer(); ?>




