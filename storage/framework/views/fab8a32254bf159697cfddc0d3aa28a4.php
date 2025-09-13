<!-- This is main configuration File -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Meta Tags -->
      <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
      <!-- Favicon -->
      <link rel="icon" type="image/png" href="<?php echo e(asset('frontend/assets/uploads/favicon.png')); ?>" >
      <!-- Stylesheets -->
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/font-awesome.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl.carousel.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl.theme.default.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/jquery.bxslider.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/magnific-popup.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/rating.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/spacing.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap-touch-slider.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/animate.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/tree-menu.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/select2.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/responsive.css')); ?>">
      <title><?php echo $__env->yieldContent('title'); ?></title>
      <meta name="keywords" content="online fashion store, garments shop, online garments">
      <meta name="description" content="ecommerce php project with mysql database">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
      <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script>
   </head>
   <body>


<!-- start header -->
      
  <?php echo $__env->make('Client_layout.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <!-- end header -->

      <!-- start content -->

      <?php echo $__env->yieldContent('content'); ?>
     <!-- end content -->

      <!-- start footer --> 
     <?php echo $__env->make('Client_layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <!-- end footer -->

      <a href="#" class="scrollup">
      <i class="fa fa-angle-up"></i>
      </a>
      <script src="<?php echo e(asset('frontend/assets/js/jquery-2.2.4.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/bootstrap.min.js')); ?>"></script>
      <script src="https://js.stripe.com/v2/"></script>
      <script src="<?php echo e(asset('frontend/assets/js/megamenu.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/owl.carousel.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/owl.animate.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/jquery.bxslider.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/jquery.magnific-popup.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/rating.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/jquery.touchSwipe.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/bootstrap-touch-slider.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/select2.full.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/assets/js/custom.js')); ?>"></script>
      <script>
         function confirmDelete()
         {
             return confirm("Sure you want to delete this data?");
         }
         $(document).ready(function () {
         	advFieldsStatus = $('#advFieldsStatus').val();
         
         	$('#paypal_form').hide();
         	$('#stripe_form').hide();
         	$('#bank_form').hide();
         
                $('#advFieldsStatus').on('change',function() {
                    advFieldsStatus = $('#advFieldsStatus').val();
                    if ( advFieldsStatus == '' ) {
                    	$('#paypal_form').hide();
         			$('#stripe_form').hide();
         			$('#bank_form').hide();
                    } else if ( advFieldsStatus == 'PayPal' ) {
                       	$('#paypal_form').show();
         			$('#stripe_form').hide();
         			$('#bank_form').hide();
                    } else if ( advFieldsStatus == 'Stripe' ) {
                       	$('#paypal_form').hide();
         			$('#stripe_form').show();
         			$('#bank_form').hide();
                    } else if ( advFieldsStatus == 'Bank Deposit' ) {
                    	$('#paypal_form').hide();
         			$('#stripe_form').hide();
         			$('#bank_form').show();
                    }
                });
         });
         
         
         $(document).on('submit', '#stripe_form', function () {
                // createToken returns immediately - the supplied callback submits the form if there are no errors
                $('#submit-button').prop("disabled", true);
                $("#msg-container").hide();
                Stripe.card.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                    // name: $('.card-holder-name').val()
                }, stripeResponseHandler);
                return false;
            });
            Stripe.setPublishableKey('pk_test_0SwMWadgu8DwmEcPdUPRsZ7b');
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('#submit-button').prop("disabled", false);
                    $("#msg-container").html('<div style="color: red;border: 1px solid;margin: 10px 0px;padding: 5px;"><strong>Error:</strong> ' + response.error.message + '</div>');
                    $("#msg-container").show();
                } else {
                    var form$ = $("#stripe_form");
                    var token = response['id'];
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    form$.get(0).submit();
                }
            }
      </script>
      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
         var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
         (function(){
         var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
         s1.async=true;
         s1.src='https://embed.tawk.to/5ae370d7227d3d7edc24cb96/default';
         s1.charset='UTF-8';
         s1.setAttribute('crossorigin','*');
         s0.parentNode.insertBefore(s1,s0);
         })();
      </script>
      <!--End of Tawk.to Script-->
   </body>
</html><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views/Client_layout/master.blade.php ENDPATH**/ ?>