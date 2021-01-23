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

	foreach($_COOKIE as $key => $value)
	{
		setcookie($key, null);
	}

	echo 'You have been logged out. <a href="UserLogin10.php">Go back</a>';
	}

?>

<!-------------------------------------------------------------------------------->


<html>
	<head>
		<meta charset="utf-8">
		<title>Shop cart</title>
	</head>

	<h1>View your shop cart here.</h1>

	<body>

		<?php
		error_reporting(E_ERROR | E_PARSE);

			$totalPrice = 0;
			$totalItem = 0;
			$p_info = 0;
		
			$resultStatus = mysqli_query($conn, "SELECT * FROM usercart WHERE user_id = $userID AND status = 0");
			$row = mysqli_fetch_array($resultStatus);
			$check = $row['user_id'];

		if($check == null)
		{
			echo "The shop cart is empty!";
			?>
				<br><br>
				<a href='UserProductList11(test).php'>Back to Products List</a>
			<?php
		}

		else if(isset($_SESSION['shop-cart']) || isset($_GET["user"]) || isset($_SESSION['uid']))
		{
			?>
			<table border="1">

			<tr>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Product Description</th>
				<th>Counts</th>
				<th>Delete from Cart</th>
			</tr>
			<?php

				//	print_r($_SESSION['shop-cart']);
				//	$p_id = $_SESSION['shop-cart'][0]; //product id
				//	$u_id = $_SESSION['shop-cart'][1]; //user id
				//	$goods_num = $_SESSION['shop-cart'][2]; //user order qty of product

				$sql_usercart = "SELECT * FROM usercart WHERE user_id =".$userID.";"; //get the userId from usercart
				$result0 = mysqli_query($conn, $sql_usercart);

				while ($row0 = mysqli_fetch_assoc($result0))
				{
					$pr_id = $row0["product_id"];
					$qty = $row0["qty"];
					$cart_id = $row0["s_id"];
					//print_r($pr_id);
				

					$sql = "SELECT * FROM productlist WHERE id =".$pr_id.";"; // get the productID from productlist
					$result=mysqli_query($conn, $sql);//result is a PHP array


					while ($row = mysqli_fetch_assoc($result))
					{
						$p_name = $row["s_name"];
						$p_price = $row["s_price"];
						//$p_inventory=$row["p_inventory"];
						$p_descr = $row["s_info"];


						echo "<tr>";
						echo "<td>".$p_name."</td>";
						echo "<td> RM ".$p_price."</td>";
						echo "<td>".$p_descr."</td>";
						echo "<td>".$qty."</td>";
						?>
						<td><a href='UserDelCArt14(test).php?delCartID=<?php echo $cart_id; ?>'>Delete</a></td>
						<?php
						echo "</tr>";

						$singlePrice = $p_price * $qty;
						$totalPrice = $totalPrice + $singlePrice;
						$totalItem = $totalItem + $qty;
						
						setcookie("total_item",$totalItem);
						setcookie("total_price",$totalPrice);
					}
		        }
				
				//echo $p_info;
				//setcookie('p_info',$p_info);
		    ?>

			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><a href='UserDelAllCart15(test).php?delAllCartID=<?php echo $pr_id; ?>'>Clear cart</a></td>
				<td>
					<?php
						echo "".$totalItem."   Items. ";
						echo "Totol prize: ".$totalPrice." MYR";
					?>
				</td>
			</tr>

		    </table>

			<br>
			<a href='UserAddress16(newtest).php'>Next To Shipment</a>
			<br>
			<br><br>
			<a href='UserProductList11(test).php'>Back to Products List</a>
			<?php
		}
		
		?>

	</body>
</html>