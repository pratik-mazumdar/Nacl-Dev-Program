<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AppLab</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $this->security->get_csrf_hash(); ?>">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
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
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="game_zip" class="filepond" name="game" type="file" multiple > 
                            </div>
                            <div class="col-sm-6">
                                <input id="thumbnail" class="filepond" name="thumbnail" type="file" multiple >   
                            </div>
                        </div>
                        <form class="form-contact contact_form"  enctype="multipart/form-data" action="filepond_upload" method="post" id="contactForm" novalidate="novalidate">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                     
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder=" Enter Description"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            
                       
                        <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                Firmament morning sixth subdue darkness
                                creeping gathered divide.
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                    Services
                            </h3>
                            <ul>
                                <li><a href="#">Team management</a></li>
                                <li><a href="#">Collaboration</a></li>
                                <li><a href="#">Todo</a></li>
                                <li><a href="#">Events</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                    Useful Links
                            </h3>
                            <ul>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                    Downloads
                            </h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Download from Apple Store

                                    </a>
                                </li>
                                <li><a href="#">
                                        Download from Play Store
                                    </a>
                                </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->
    
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
            FilePond.parse(document.body);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.setOptions({
                server: {
                    url: 'filepond_upload',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        }
                    },
                    fetch: null,
                    revert: null
                }
            });
            FilePond.create(
                    document.getElementById('game_zip'),{
                        labelIdle: 'Drop your game\'s apk',
                    }
            );
            FilePond.create(
                    document.getElementById('thumbnail'),{
                        labelIdle: 'Drop your game\'s thumbnail',
                    }
            );
                        
        </script>
    </body>
    
    </html>