<?php 
session_start(); 

if(!isset($_SESSION['user_emails'])){
	
	echo "<script>window.open('login.php?not_authorised=You are not Authorised!','_self')</script>";
}
else {

?>

<!DOCTYPE> 

<html>
	<head>
		<title>This is Delivery Panel</title> 

		<meta charset="utf-8"> 
    <meta name="viewport" content="width=1000px, initial-scale=1">	 
	<link rel="stylesheet" href="styles/style.css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	

	</head>


<body background="images/RootZ.jpg"> 

	<div class="main_wrapper">
	
	
		<div id="header"></div>
		
		<nav id="sidebar">
		<div class="sidebar-header">
		<h3 >Manage Content</h3>
		</div>	
			<!-- <a href="index.php?insert_product">Insert New Product</a>
			<a href="index.php?view_products">View All Products</a>
			
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cats">View All Categories</a>
			
			<a href="index.php?insert_brand">Insert New Brand</a>
			<a href="index.php?view_brands">View All Brands</a>
			 -->
			<a href="index.php?view_customers">View Customers</a>
		
			<a href="index.php?view_orders">View Orders</a>
			<!--<a href="index.php?view_payments">View Payments</a>-->
			<a href="logout.php">Logout</a>
		
		</nav>
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); 
		
		}
		if(isset($_GET['view_orders'])){
		
		include("view_orders.php"); 
		
		}
		if(isset($_GET['confirm_orders'])){
			include("complete_order.php"); 
		}
		?>
		</div>
	</div>
</body>
</html>

<?php } ?>

<?php 

echo "<script>
$(document).ready(function() {
	var height = Math.max($('#left').height(), $('#sidebar').height());
	$('#left').height(height);
	$('#sidebar').height(height);
})</script>";

?>