
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$productname=$_POST['productName'];
	$productimage2=$_FILES["productimage2"]["name"];

//dir="productimages";
//unlink($dir.'/'.$pimage);


	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$pid/".$_FILES["productimage2"]["name"]);
	$sql=mysqli_query($con,"update  products set productImage2='$productimage2' where id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrador | Actualizar imagen del producto</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


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
<?php //clude('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php //include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Actualizar imagen del producto 2</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>¡Bien hecho!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>



									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<?php 

$query=mysqli_query($con,"select productName,productImage2 from products where id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>


<div class="control-group">
<label class="control-label" for="basicinput">Nombre del producto</label>
<div class="controls">
<input type="text"    name="productName"  readonly value="<?php echo htmlentities($row['productName']);?>" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Imagen de producto actual 1</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage2']);?>" width="200" height="100"> 
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Imagen de nuevo producto 2</label>
<div class="controls">
<input type="file" name="productimage2" id="productimage2" value="" class="span8 tip" required>
</div>
</div>


<?php } ?>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Actualizar</button>
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