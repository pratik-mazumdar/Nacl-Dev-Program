<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Nacl - Things to know</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- <link rel="manifest" href="site.webmanifest"> -->
   <!-- Place favicon.ico in the root directory -->

   <!-- CSS here -->
   <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.png">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/themify-icons.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/flaticon.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/gijgo.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/slicknav.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
   <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css"> -->
</head>

<body>
   <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <!-- header-start -->
    <!-- header-start -->
    <?php require_once 'header.php'?>
  <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_1">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>Things to Know</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- /bradcam_area  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  
                  <div class="blog_details">
                     <h2>Things to know before you submit your game</h2>
                    <br>
                    <h5>Pay to win</h5>
                     <p class="excert">
                        Pay to win will not tolerated on our platform. This is the step towards bad practices of Gaming Industries. If your game includes pay to win, this is not the platform you are looking for. 
                     </p>
                     <h5>Flat 10%</h5>
                     <p>
                        10% is our take for every transaction made. This price will be 10% until this platform exists.
                     </p>
                     <h5>What you shouldn’t publish on NACL:</h5>
                     <div class="quote-wrapper">
                        <div class="quotes">
                           1. Content you don’t own or have adequate rights to <br>
                           2. Content that violates the laws of any jurisdiction in which it will be available <br>
                           3. Games that modify customer’s computers in unexpected or harmful ways, such as malware or viruses<br>
                           4. Games that fraudulently attempts to gather sensitive information, such as Nacl credentials or financial data (e.g. credit card information)<br>
                           5. Adult content that isn’t appropriately labeled and age-gated<br>
                           6. Libelous or defamatory statements<br>
                           7. Content that exploits children in any way(Please for the love of god don't do this)<br>
                           8. Adding your own paymet method<br>
                           9. Pay to win
                        </div>
                     </div>
                     <h5>Payout</h5>
                     <p class="excert">
                        If you can't find your country in our payout list. Email me at support@nacl.com, I will add it asap.
                     </p>
                     <h6>Available Countries</h6>
                     <p class="excert">
                        <ul>
                           <li>India</li>
                           <li>United States of America</li>
                           <li>United Kingdom</li>
                        </ul>
                     </p>
                  </div>
               </div>
      
            </div>
            
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

   <?= require_once 'footer.php'?>

   <!-- JS here -->
   <script src="<?= base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/waypoints.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/jquery.counterup.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/scrollIt.js"></script>
   <script src="<?= base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/wow.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/nice-select.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/jquery.slicknav.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/plugins.js"></script>
   <script src="<?= base_url(); ?>assets/js/gijgo.min.js"></script>

   <!--contact js-->

   

   <script src="<?= base_url(); ?>assets/js/main.js"></script>
   <script>
      $('#datepicker').datepicker({
          iconsLibrary: 'fontawesome',
          icons: {
           rightIcon: '<span class="fa fa-caret-down"></span>'
       }
      });
      $('#datepicker2').datepicker({
          iconsLibrary: 'fontawesome',
          icons: {
           rightIcon: '<span class="fa fa-caret-down"></span>'
       }

      });
  </script>
</body>

</html>