
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel de administración | Registro de usuarios</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
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

<?php //include('include\navbar.php'); ?>
<?php //include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php //include('include/sidebar.php');?>				
			<div class="span11">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Administrar usuarios</h3>
							</div>
							<div class="module-body table">
	
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th> Correo electrónico del usuario</th>
											<th>IP de usuario</th>
											<th>Hora de inicio de sesión</th>
											<th>Hora de cerrar sesión</th>
											<th>Estado </th>
											
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from userlog");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['userEmail']);?></td>
											<td><?php echo htmlentities($row['userip']);?></td>
											<td> <?php echo htmlentities($row['loginTime']);?></td>
											<td><?php echo htmlentities($row['logout']); ?></td>
										<td><?php $st=$row['status'];

if($st==1)
{
	echo "Exitoso";
}
else
{
	echo "Fallido";
}
										 ?></td>
											
											
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>