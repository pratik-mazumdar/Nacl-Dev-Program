
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nacl - <?php echo $title?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/form_assest/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/form_assest/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/form_assest/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/form_assest/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/form_assest/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/form_assest/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/form_assest/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/form_assest/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slicknav.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slick.css">
	
	
<!--===============================================================================================-->
</head>
<body>
	<?php require_once "header.php"?>
	
	<div class="contact1">
	
	<div class="container-contact1">
	
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="<?php echo base_url(); ?>assets/form_assest/images/controller.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" method="post">
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
			<input type="hidden" name="start" value="true">
			<?php if ($error){
				echo '<div class="error text-center">'.$error.'</div>';
			}?>
				<span class="contact1-form-title">
					<?= $title?>
				</span>
				<?php foreach($input_type as $input){
				echo '	<div class="wrap-input1 validate-input" data-validate = "Valid '.$input.' is required">
							<input class="input1" type="text" name="'.$input.'" placeholder="'.$input.'">
							<span class="shadow-input1"></span>
						</div>';
				}
				?>
				



				<div class="container-contact1-form-btn">
					
					<button class="contact1-form-btn">
						<span>
							<?php echo $title?>
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
	
 




<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/form_assest/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/form_assest/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/form_assest/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/form_assest/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/form_assest/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/form_assest/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>
