<?php 


if(!isset($_SESSION['user_emails'])){
	
	echo "<script>window.open('login.php?not_authorised=You are not Authorised!','_self')</script>";
}
else {

?>


<table width="795" align="center" class="bg-blueviolet"> 

	
	<tr align="center">
		<td colspan="6"><h2>View all orders to be delivered here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Customer<br>Name</th>
		<th>Product (S)</th>
		<th>Contact</th>
		<th>Address</th>
		
	</tr>
	<?php 
	include("includes/db.php");


	$get_email = $_SESSION['user_emails'];
	$get_id = "select d_id from delivery where d_email='$get_email'";
	$run_id = mysqli_query($con, $get_id);
	$del_id_array = mysqli_fetch_array($run_id);
	$del_id = $del_id_array['d_id'];
	
	$get_order = "select * from orders where order_delivery='$del_id' and status='Shipped'";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$amt = $row_order['amount'];
		$curr = $row_order['currency'];
		$status = $row_order['status'];
		$pro_id = $row_order['p_id'];
		$c_id = $row_order['c_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$i++;
		
		$get_pro = "select * from products where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
		
		$get_c = "select * from customers where customer_id='$c_id'";
		$run_c = mysqli_query($con, $get_c); 
		
		$row_c=mysqli_fetch_array($run_c); 
		
		$c_email = $row_c['customer_email'];
		$c_name = $row_c['customer_name'];
		$c_contact = $row_c['customer_contact'];
		$c_address = $row_c['customer_address'];
	
	?>
	<tr align="left">
		<td><?php echo $i;?></td>
		<td><?php echo $c_name;?></td>
		<td>
		<?php echo $pro_title;?><br>
		<img src="../admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50" />
		</td>
		<td><?php echo $c_contact;?></td>
		<td><?php echo $c_address;?></td>

	</tr>
	<?php } ?>
</table>

<?php } ?>