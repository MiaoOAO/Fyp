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

<!DOCTYPE html>
<html>
<head>
	<title>Order information</title>
</head>
<body>
	<?php

    $u_id = $userID;
    
    $sqla = "SELECT * FROM delivery_info WHERE u_id = $u_id";
    $get = mysqli_query($conn, $sqla);
    $row = mysqli_fetch_array($get);

    $d_id = $row['d_id'];
    //print_r($d_id);
    
	$pay_id = $_COOKIE['pay_id'];
	$p_info = 1;
    //echo $p_info;
    $o_date = date("Y-m-d H:i:s");
    date_default_timezone_set("Asia/Kuala_Lumpur");
	$o_id = 0;
	//echo gettype($o_date);

	$sql = "INSERT INTO order_info (u_id, d_id, o_date, pay_id) VALUES(".$u_id.",".$d_id.",'".$o_date."',".$pay_id.");";
	$insert_result = mysqli_query($conn, $sql);

	if($insert_result){
		$select_sql = "SELECT o_id FROM order_info WHERE pay_id = ".$pay_id.";";
		$select_result = mysqli_query($conn, $select_sql);
		if($select_result){
			while($row = mysqli_fetch_assoc($select_result)){
				$o_id=$row["o_id"];
				//setcookie('o_id',$o_id);
			}
		}
	}
	
	$selectUserCart = "SELECT * FROM usercart WHERE user_id = $userID";
	$getUserCart = mysqli_query($conn, $selectUserCart);
	//$UserCartRow = mysqli_fetch_array($getUserCart);


	//print_r($ProductListRow['id']);

	while($UserCartRow = mysqli_fetch_assoc($getUserCart))
	{
		$getProductID = $UserCartRow['product_id'];
		$getProductqty = $UserCartRow['qty'];
		
		//print_r($getProductID);

		$insertRecord = ("INSERT INTO orderDetailRecord_info (o_id, u_id, p_id, p_num) VALUES ($o_id, $u_id, $getProductID, $getProductqty)");
		mysqli_query($conn, $insertRecord);

		$selectProductList = "SELECT * FROM productlist WHERE id = $getProductID";
		$getProductList = mysqli_query($conn, $selectProductList);
		$ProductListRow = mysqli_fetch_array($getProductList);

		$stockLeft = $ProductListRow['s_quantity'] - $UserCartRow['qty'];
		$updateProductList = "UPDATE productlist SET s_quantity = $stockLeft WHERE id = $getProductID;";
		mysqli_query($conn, $updateProductList);

		mysqli_query($conn, "DELETE from usercart where product_id = $getProductID");

		header('location:UserOrderRecord22(test).php');
	}


		?>
	</body>
	</html>