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

		//$_SESSION['uid'] = $userID;
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

<!DOCTYPE html>
<html>
<head>
	<title>All fees of shipment.</title>
</head>
<body>

	<?php
	$unitPrice  = 0.0;

	if(isset($_POST["submit"]))
	{
		$address = $_POST["address"];
		$city = $_POST["city"];
		$code = $_POST["poscode"];
		$company = $_POST["company"];

		if($company == "jnt")
		{
			$unitPrice = 5;
			setcookie("shipment_way", $company);
		}    

		if($company == "poslaju")
		{
			$unitPrice = 6;
			setcookie("shipment_way", $company);
		}

		if($company == "citylink")
		{
			$unitPrice = 6;
			setcookie("shipment_way", $company);
		}

		if($company == "gdex")
		{
			$unitPrice = 7;
			setcookie("shipment_way", $company);
		}

		if($company == "ninjavan")
		{
			$unitPrice = 8;
			setcookie("shipment_way", $company);
		}
		

		$totalItem = $_COOKIE['total_item'];
		$shipmentPrice = $unitPrice;

		$shipStatus = 0;

		$numbers = range (1,1000000); 
		shuffle ($numbers); 
		$getrandom = array_slice($numbers,0,1); 
		$d_random = $getrandom[0];
	
	    $sql = ("INSERT INTO delivery_info (d_company, d_address, d_city, d_code, d_price, d_random, u_id) VALUES ('$company', '$address', '$city', $code, $shipmentPrice, $d_random, $userID)");
        $result = mysqli_query($conn, $sql);
/*
		if($result){
			setcookie('shipment_price',$shipmentPrice);
			setcookie('shipment_address',$orignLocation);
			setcookie('shipment_state',$targetLocation);
			$select_sql = "SELECT d_id FROM delivery_info WHERE d_random = ".$d_random.";";
			$select_result = mysqli_query($conn, $select_sql);

			if($select_result){
				while ($row = mysqli_fetch_assoc($select_result)){
					//var_dump($row);
					$d_id = $row["d_id"];
					setcookie('d_id',$d_id);
					//setcookie('shipment_status', true);
					//print_r($_COOKIE['shipment_status']);
				}
			}
		}
*/		
	}
	header("location:UserpayInfo18(test).php");
	?>
</body>
</html>