<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:login.php');
} else {
	if (isset($_POST['submit'])) {

		mysqli_query($con, "update orders set 	paymentMethod='" . $_POST['paymethod'] . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");
		unset($_SESSION['cart']);
		header('location:order-history.php');
	}
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="MediaCenter, Template, eCommerce">
		<meta name="robots" content="all">

		<title>preBIO| Método de Pago</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/green.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>

	<body class="cnt-home">


		<header class="header-style-1">
			<?php include('includes/top-header.php'); ?>
			<?php include('includes/main-header.php'); ?>
			<?php include('includes/menu-bar.php'); ?>
		</header>
		<div class="breadcrumb">
			<div class="container">
				<div class="breadcrumb-inner">
					<ul class="list-inline list-unstyled">
						<li><a href="home.html">Inicio</a></li>
						<li class='active'>Método de Pago</li>
					</ul>
				</div><!-- /.breadcrumb-inner -->
			</div><!-- /.container -->
		</div><!-- /.breadcrumb -->

		<div class="body-content outer-top-bd">
			<div class="container">
				<div class="checkout-box faq-page inner-bottom-sm">
					<div class="row">
						<div class="col-md-12">
							<h2>Elija un método de pago</h2>
							<div class="panel-group checkout-steps" id="accordion">
								<!-- checkout-step-01  -->
								<!--<div class="panel panel-default checkout-step-01">


		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	         Seleccione tipo de pago
	        </a>
	     </h4>
    </div>


	<div id="collapseOne" class="panel-collapse collapse in">


	    <div class="panel-body">
	    <form name="payment" method="post">
	    <input type="radio" name="paymethod" value="COD" checked="checked"> Contraentrega
	     <input type="radio" name="paymethod" value="Internet Banking"> Banca Internet
	     <input type="radio" name="paymethod" value="Debit / Credit card"> Tarjeta de Crédito/Debito<br /><br />
	     <input type="submit" value="CONTINUAR" name="submit" class="btn btn-primary">
	    	

	    </form>		
		</div>


	</div>
</div>-->
								<div class="panel panel-default checkout-step-01">
									<div class="panel-heading">
										<h4 class="unicase-checkout-title">
											<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
												Seleccione tipo de pago
											</a>
										</h4>
									</div>

									<div id="collapseOne" class="panel-collapse collapse in">
										<div class="panel-body">
											<form name="payment" method="post" id="paymentForm">
												<input type="radio" name="paymethod" id="yape" value="Yape"> Yape
												<input type="radio" name="paymethod" id="debitCreditCard" value="DebitCreditCard"> Tarjeta de Crédito/Débito<br /><br />
												<div id="yapeInfo" style="display:none;">
													<!-- Aquí se mostrará la información de Yape -->
												</div>
												<div id="cardInfo" style="display:none;">
													<!-- Aquí se mostrará la información de la tarjeta -->
												</div>
												<input type="submit" value="CONTINUAR" name="submit" class="btn btn-primary">
											</form>
										</div>
									</div>
								</div>

								<script>
									document.getElementById('yape').addEventListener('change', function() {
										document.getElementById('yapeInfo').style.display = 'block';
										document.getElementById('cardInfo').style.display = 'none';
										document.getElementById('yapeInfo').innerHTML = `

            <div id="qrImage" class="secure-payment">

    
		<div style="text-align: center; margin-top: 15px; font-size: 14px;">
        
    </div>
          	
				<center>
				
				Escanee el QR, pague el monto del producto y coloque su DNI en el mensaje, en un plazo no mayor a 4 horas, validaremos la compra. 
				<img src="img/pagosizi/qrizipay.jpg" alt="QR Code" style="max-width:400px;"><br>
				Al realizar el pago, acepta nuestros <a href="URL_DE_TUS_TERMINOS" target="_blank" style="color: #4CAF50; text-decoration: none;">Términos y Condiciones</a>.
				</center>
            </div>`;
									});

									document.getElementById('debitCreditCard').addEventListener('change', function() {
										document.getElementById('cardInfo').style.display = 'block';
										document.getElementById('yapeInfo').style.display = 'none';
										document.getElementById('cardInfo').innerHTML = `
            <div>
                <label for="cardNumber">Número de Tarjeta:</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9123 4567"><br>
                <label for="cardHolder">Titular de la Tarjeta:</label>
                <input type="text" id="cardHolder" name="cardHolder" placeholder="Nombre Apellido"><br>
                <label for="expiryDate">Fecha de Vencimiento:</label>
                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/AA"><br>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="123"><br>
            </div>`;
									});

									function showQR() {
										var qrImage = document.getElementById('qrImage');
										qrImage.style.display = 'block';
									}
								</script>




							</div><!-- /.checkout-steps -->
						</div>
					</div><!-- /.row -->
				</div><!-- /.checkout-box -->
				<!-- ============================================== BRANDS CAROUSEL ============================================== -->
				<?php echo include('includes/brands-slider.php'); ?>
				<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
			</div><!-- /.container -->
		</div><!-- /.body-content -->
		<?php include('includes/footer.php'); ?>
		<script src="assets/js/jquery-1.11.1.min.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<script src="assets/js/echo.min.js"></script>
		<script src="assets/js/jquery.easing-1.3.min.js"></script>
		<script src="assets/js/bootstrap-slider.min.js"></script>
		<script src="assets/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/scripts.js"></script>

		<!-- For demo purposes – can be removed on production -->

		<script src="switchstylesheet/switchstylesheet.js"></script>

		<script>
			$(document).ready(function() {
				$(".changecolor").switchstylesheet({
					seperator: "color"
				});
				$('.show-theme-options').click(function() {
					$(this).parent().toggleClass('open');
					return false;
				});
			});

			$(window).bind("load", function() {
				$('.show-theme-options').delay(2000).trigger('click');
			});
		</script>
		<!-- For demo purposes – can be removed on production : End -->



	</body>

	</html>
<?php } ?>