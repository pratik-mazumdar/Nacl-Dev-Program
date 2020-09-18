<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nacl - Submit Game</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $this->security->get_csrf_hash(); ?>">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    <!-- header-start -->   
   <?php require_once 'header.php'?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Submit Your Game</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <p>Refresh page if you are having problem submiting the game.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="game_zip" class="filepond" name="game" type="file" multiple accept=".apk"> 
                            </div>
                            <div class="col-sm-6">
                                <input id="thumbnail" class="filepond" name="thumbnail" type="file" multiple accept="image/png,image/jpeg,image/jpg">   
                            </div>
                        </div>
                        <form class="form-contact contact_form"  enctype="multipart/form-data" action="upload_game" method="post" id="contactForm" novalidate="novalidate">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                     
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="title" id="title" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your game title'" placeholder="Enter your game title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="price" id="price" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter price in USD'" placeholder="Enter Price in USD">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder=" Enter Description"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            
                        <p>By clicking submit you agree to our <a class="text-primary"  href="<?=base_url();?>/things_to_know">terms and conditions</a></p>
                        <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@nacl.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
    <?= require_once 'footer.php'?>
    
        <!-- JS here -->
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/ajax-form.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scrollIt.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/nice-select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/gijgo.min.js"></script>
    
        <!--contact js-->
        <script src="<?php echo base_url(); ?>assets/js/contact.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/mail-script.js"></script>
    
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    
        <!-- file pond script-->
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
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
             }});            
        </script>
        <script src="<?php echo base_url(); ?>assets/js/filepond.js"></script>
    </body>
    
    </html>