<?php
	if(!isset($_SESSION['customer_email'])){
		echo "<script>window.open('../checkout.php','_self')</script>";
	}
	else{
?>


<h2 style="text-align:center;">Change Your Password</h2>
<form action="" method="post"> 
	
	<table align="center" width="600">
	<tr>
	<td align="right"><b>Enter Current Password:</b></td>
	<td><input type="password" name="current_pass" required class="form-control"></td>
	</tr>
	
	<tr>
	<td align="right"><b>Enter New Password:</b></td>
	<td><input type="password" name="new_pass" required class="form-control"></td>
	</tr>
	
	<tr>
	<td align="right"><b>Enter New Password Again:</b></td>
	<td><input type="password" name="new_pass_again" required class="form-control"></td>
	</tr>
	
	<tr align="center">
	<td colspan="3"><input type="submit" name="change_pass" value="Change Password" class="btn btn-warning"/></td>
	</tr>
	
	</table>


</form>
<?php 

include("includes/db.php"); 


	if(isset($_POST['change_pass'])){
		
		$user = $_SESSION['customer_email']; 
	
		$current_pass = $_POST['current_pass']; 
		$new_pass = $_POST['new_pass']; 
		$new_again = $_POST['new_pass_again']; 
		
		$sel_pass = "select * from customers where customer_pass=aes_encrypt('$current_pass','ecommerce') AND customer_email='$user'";
		
		$run_pass = mysqli_query($con, $sel_pass); 
		
		$check_pass = mysqli_num_rows($run_pass); 
		
		if($check_pass==0){
		
		echo "<script>alert('Your Current Password is wrong!')</script>";
		exit();
		}
		
		if($new_pass!=$new_again){
		
		echo "<script>alert('New password do not match!')</script>";
		exit();
		}
		else {
		
		$update_pass = "update customers set customer_pass=aes_encrypt('$new_pass','ecommerce') where customer_email='$user'";
		
		$run_update = mysqli_query($con, $update_pass); 
		if(!$run_update){
			echo "<script>alert('There is some error in changing password!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
			exit();
		}
		
		echo "<script>alert('Your password was updated succesfully!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		}
	
	}




?>


	<?php } ?>
