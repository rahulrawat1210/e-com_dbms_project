<?php
	if(!isset($_SESSION['customer_email'])){
		echo "<script>window.open('../checkout.php','_self')</script>";
	}
	else{
?>


<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>Your Orders details:</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Product (S)</th>
		<th>Quantity</th>
		<th>Total Amount</th>
		<th>Invoice No</th>
		<th>Order Date</th>
		<th>Status</th>
	</tr>
	<?php 
	include("includes/db.php");

	$email = $_SESSION['customer_email'];
	$find_c = "select * from customers where customer_email='$email'";
	$run_c = mysqli_query($con, $find_c);
	$c =mysqli_fetch_array($run_c);
	$cust_id = $c['customer_id'];

	
	$get_order = "select * from orders";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		$c_id = $row_order['c_id'];
		if($c_id == $cust_id){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$amt = $row_order['amount'];
		$pro_id = $row_order['p_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status = $row_order['status'];
		$i++;
		
		$get_pro = "select * from products where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td>
		<?php echo $pro_title;?>
		<img src="../admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50" />
		</td>
		<td><?php echo $qty;?></td>
		<td><?php echo $amt;?></td>
		<td><?php echo $invoice_no;?></td>
		<td><?php echo $order_date;?></td>
		<td><?php echo $status;?></td>
	
	</tr>
	<?php }} ?>
</table>

	<?php } ?>