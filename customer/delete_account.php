<?php
	if(!isset($_SESSION['customer_email'])){
		echo "<script>window.open('../checkout.php','_self')</script>";
	}
	else{
?>

<br>

<h2 style="text-align:center; ">Do you really want to DELETE your account?</h2>

<form action="" method="post">

<br>
<input type="submit" name="yes" value="Yes I want" class="btn btn-danger"/> 
<input type="submit" name="no" value="No I was Joking" class="btn btn-danger"/>


</form>

<?php 
include("includes/db.php"); 

	$user = $_SESSION['customer_email']; 
	
	if(isset($_POST['yes'])){
	
	$cus_image = "select * from customers where customer_email='$user'";
	$run_cus_image = mysqli_query($con, $cus_image);
	$cus_image_link = mysqli_fetch_array($run_cus_image);
	$file = $cus_image_link['customer_image'];
	$file_link = "customer_images/{$file}";


	if( file_exists($file_link)){
		unlink($file_link);
	}
	
	$delete_customer = "delete from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con,$delete_customer); 
	session_destroy(); 
	
	echo "<script>alert('We are really sorry, your account has been deleted!')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
	}
	if(isset($_POST['no'])){
	
	echo "<script>alert('oh! do not joke again!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}
	


?>

	<?php } ?>