<?php 
	include("DataConnection1.php"); 
	session_start();

	if(isset( $_SESSION [ 'uname' ]) && ! empty ( $_SESSION [ 'uname' ])) 
	{
		echo  "Status : Log \n Username: " . $_SESSION [ 'uname' ];
		
		$username = $_SESSION [ 'uname' ]; 
		$resultuserID = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
		$rowID = mysqli_fetch_array($resultuserID);
		$userID = $rowID["id"];

		$_SESSION['uid'] = $userID;
	} 

	else 
	{
		echo  "你还没有登录，<a href='UserLogin10.php'>请登录</a>" ;
		header("Location: UserLogin10.php");
	} 

?>

	<form method="post" action="">
	<input type="submit" name="logout" value="logout"></input>
	</form>

<?php

	if(isset($_POST["logout"]))
	{
	session_destroy();
	echo 'You have been logged out. <a href="UserLogin10.php">Go back</a>';
	}

?>

<!-------------------------------------------------------------------------------->

	<?php //Get the product id from UserProductList11.php
		if(isset($_GET["pid"]))
		{
			$pid = $_GET["pid"];

			$result = mysqli_query($conn, "SELECT * FROM productlist WHERE id = '$pid' ");
			$row = mysqli_fetch_array($result);
		}
	?>


<html>
	<head></head>

	<body>
		<h1>Product Detail</h1>

	 
		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>'?>
	
		<br>Product Name : <?php echo $row["s_name"] ?>
		<br>Product Price : <?php echo $row["s_price"]  ?>
		<br>Product Stock : <?php echo $row["s_quantity"] ?>
		<br>Origin : <?php echo $row["s_country"] ?>
		<br>Information : <?php echo $row["s_info"] ?>
			

		<h1>Your Order Detail</h1>

		<form name="" method="post" action="" enctype="multipart/form-data">
			<p>Quantity:<input type="text" name="user_qty"></p>
			<p><input type="submit" name="orderbtn" value="Add to Cart">
		</form>
		
	</body>
</html>

<?php

	if(isset($_POST["orderbtn"])) 	
	{
		$pid = $row["id"];
		$userid = $userID;
		$cqty = $_POST["user_qty"];  

		$balance = $row["s_quantity"] - $cqty; //$balance = total product qty in stock - user enter qty 


		if($balance >= 0) // True, if product stocks enough
		{
			$conn->query("INSERT INTO usercart (product_id, user_id, qty) VALUES ('$pid', '$userid', '$cqty')");
			
			//$cartArray = array($pid, $userid, $cqty);
			//$_SESSION['shop-cart'] = $cartArray;
			
			header("Location:UserViewCart13(test).php");

			//之后才需要, after payment needed this line
			//mysqli_query($conn, "UPDATE product SET product_stock= $balance where product_code = '$pid'");// update product table	
		}

		else // False, if product stocks not enough
		{
			?>
				<script>
				alert("Your quantity is more than the stock that we have. Please change.");
				</script>
			<?php	
		}
		
	}

?>