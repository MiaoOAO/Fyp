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
	//payment过后要用到
    //$conn->query("UPDATE delivery_info SET d_status = 1 WHERE u_id = $userID");
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

	<script language="Javascript">
		function hideA()
		{

			document.getElementById("A").style.visibility="hidden";
			document.getElementById("B").style.visibility="visible";    

		}

		function hideB()
		{
			document.getElementById("B").style.visibility="hidden";
			document.getElementById("A").style.visibility="visible";

		}
	</script>

</head>
<h1>Total money here, please fill your payment information.</h1>
<body>
	
		<?php
/*			if(isset($_COOKIE['pay_way']))            记得把这些comment回复，需要用到
			{
				echo "You have fill the payment information.";
				?>
				<br><a href='UserPayMoney20(test).php'>Click here to continue</a>
				<?php
			}

			else
			{
*/


			?>
			<table border="1">

<tr>
	<th>Product Name</th>
	<th>Product Price</th>
	<th>Quantity</th>
</tr>

<?php
	$totalPrice = 0;
	$totalItem = 0;
	$p_info = 0;
	
if(isset($_SESSION['shop-cart']) || isset($_GET["user"]) || isset($_SESSION['uid']))
{

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
				echo "<td>".$qty."</td>";
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
	
		<td>
			<?php
				echo "".$totalItem."   Items. ";
				echo "Totol prize: ".$totalPrice." MYR";
			?>
		</td>
	</tr>

	</table>

	<?php
}

?>
			<table border="1">
			<h3>Order Details</h3>
				<tr>
					<th>Total Products Order</th>
					<th>Total Products Price</th>
					<th>Courier Selected</th>
					<th>Delivery Fee</th>
					<th>Total All</th>
					<th>Address</th>
					<th>State</th>
				</tr>
			<?php
			$resultStatus = mysqli_query($conn, "SELECT * FROM delivery_info WHERE u_id = $userID AND d_status = 0");
			$row = mysqli_fetch_array($resultStatus);

		
				$shipment_address = $row['d_address'];
				$shipment_state = $row['d_city'];
				$total_item = $_COOKIE['total_item'];
				$productPrice = $_COOKIE['total_price'];
				$shipment_way = $row['d_company'];
				$shipment_price = $row['d_price'];
				$totalPrice = $shipment_price + $productPrice;

				echo "<tr>";
				echo "<td>".$total_item."</td>";
				echo "<td> RM ".$productPrice."</td>";
				echo "<td>".$shipment_way."</td>";
				echo "<td> RM ".$shipment_price."</td>";
				echo "<td> RM ".$totalPrice."</td>";
				echo "<td>".$shipment_address."</td>";
				echo "<td>".$shipment_state."</td>";
				echo "</tr>";

			?>
			</table>

    

			<br>
			<h2>Select Payment method</h2>

			<input type="radio" name="payway" value="credit" onClick="hideB()" checked>Credit/ Debit card
			<input type="radio" name="payway" value="bank" onClick="hideA()">Bank Receipt<br>
            

			<form action="UserPayInfoWay19(test).php" method="post" id="A" style="position: absolute">

            Name on card<input type="text" name="payuser"><br>
			Card Number<input type="text" name="payaccount"><br>
			Expiry Date<input type="text" name="receiveuser"><br>
			Card Security Code <input type="text" name="receiveaccount"><br>
			<input type="submit" value="Submit"> 
            <!--
				<table border = '1'>
					<tr>
						<th>Pay user</th>
						<th>Pay account</th>
						<th>Receive user</th>
						<th>Receive account</th>
					</tr>
					<tr>
						<th><input type="text" name="payuser"></th>
						<th><input type="text" name="payaccount"></th>
						<th><input type="text" name="receiveuser"></th>
						<th><input type="text" name="receiveaccount"></th>
					</tr>
				</table>		
				<input type="submit" value="Submit"> 
			-->
			</form>

			<form id="B" style="position: absolute; visibility:hidden" method="post">
				Bank holder name: <input type="text" name="payuser"><br>
				Reference/ note: <input type="text" name="payaccount"><br>
				Please upload your bank receipt photo here:<input type="file" name="image"/><br>
				<input type="submit" value="Submit"> 
			</form>
		    <?php
//		    }
		?>

</body>
</html>

