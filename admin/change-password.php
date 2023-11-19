<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	date_default_timezone_set('America/Lima'); // change according timezone
	$currentTime = date('d-m-Y h:i:s A', time());


	if (isset($_POST['submit'])) {
		$sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['password']) . "' && username='" . $_SESSION['alogin'] . "'");
		$num = mysqli_fetch_array($sql);
		if ($num > 0) {
			$con = mysqli_query($con, "update admin set password='" . md5($_POST['newpassword']) . "', updationDate='$currentTime' where username='" . $_SESSION['alogin'] . "'");
			$_SESSION['msg'] = "Password Changed Successfully !!";
		} else {
			$_SESSION['msg'] = "Old Password not match !!";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Actualizar Contraseña</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script type="text/javascript">
			function valid() {
				if (document.chngpwd.password.value == "") {
					alert("Current Password Filed is Empty !!");
					document.chngpwd.password.focus();
					return false;
				} else if (document.chngpwd.newpassword.value == "") {
					alert("New Password Filed is Empty !!");
					document.chngpwd.newpassword.focus();
					return false;
				} else if (document.chngpwd.confirmpassword.value == "") {
					alert("Confirm Password Filed is Empty !!");
					document.chngpwd.confirmpassword.focus();
					return false;
				} else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
					alert("Password and Confirm Password Field do not match  !!");
					document.chngpwd.confirmpassword.focus();
					return false;
				}
				return true;
			}
		</script>
	</head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">PreBIO</a>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminOrdersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administrar pedidos
            </a>
            <div class="dropdown-menu" aria-labelledby="adminOrdersDropdown">
                <a class="dropdown-item" href="todays-orders.php">Pedidos de hoy</a>
                <a class="dropdown-item" href="pending-orders.php">Pedidos pendientes</a>
                <a class="dropdown-item" href="delivered-orders.php">Pedidos entregados</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage-users.php">Administrar usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category.php">Crear Categoria</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="subcategory.php">Sub Categoria</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="insert-product.php">Insertar Producto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage-products.php">Administrar Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="user-logs.php">Usuarios Registros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Cerrar Sesión</a>
        </li>
    </ul>
</nav>


	<body>
	<?php //include('include/navbar.php'); ?>
		<?php //include('include/header.php'); ?>

		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php //include('include/sidebar.php'); ?>
					<div class="span9">
						<div class="content">

							<div class="module">
								<div class="module-head">
									<h3>Admin | Cambiar contraseña</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>
									<br />

									<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">

										<div class="control-group">
											<label class="control-label" for="basicinput">Contraseña actual</label>
											<div class="controls">
												<input type="password" placeholder="Ingresa tu contraseña actual" name="password" class="span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Nueva contraseña</label>
											<div class="controls">
												<input type="password" placeholder="Ingresa tu nueva contraseña" name="newpassword" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Confirma contraseña nueva</label>
											<div class="controls">
												<input type="password" placeholder="Confirma tu contraseña nueva" name="confirmpassword" class="span8 tip" required>
											</div>
										</div>






										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Guardar</button>
											</div>
										</div>
									</form>
								</div>
							</div>



						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

		<?php include('include/footer.php'); ?>

		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	</body>
<?php } ?>