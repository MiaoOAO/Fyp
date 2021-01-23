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


<?php

	$payWay = "credit";
	$payUser = $_POST['payuser'];
	$payAccount = $_POST['payaccount'];
	$receiveUser = $_POST['receiveuser'];
	$receiveAccount = $_POST['receiveaccount'];
	$payStatus = false;

	$numbers = range (1,1000000); 
	shuffle ($numbers); 
	$num=1; 
	$result = array_slice($numbers,0,$num); 
	$pay_random = $result[0];

	if($payUser == "" ||$payAccount == "" || $receiveUser == "" || $receiveAccount == "")
	{
		echo "You must fill the blanks.";
	}

	else
	{
	//	$sql = "INSERT INTO payment_info (pay_user, receive_user, pay_account, receive_account, pay_way, pay_status, pay_random)
	//	VALUES ('".$payUser."', '".$receiveUser."', ".$payAccount.",".$receiveAccount.",'".$payWay."','".$payStatus."',".$pay_random.");";
    //$conn->query("INSERT INTO payment_info (pay_user, receive_user, pay_account, receive_account, pay_way, pay_status, pay_random) VALUES ('$payUser', '$receiveUser', $payAccount, $receiveAccount, '$payWay', '$payStatus', $pay_random)");
    $sql = "INSERT INTO payment_info (pay_user, receive_user, pay_account, receive_account, pay_way, pay_status, pay_random) VALUES ('$payUser', '$receiveUser', $payAccount, $receiveAccount, '$payWay', '$payStatus', $pay_random)";
    $resultInfo = mysqli_query($conn, $sql);

		if($resultInfo == 1)
		{
			$select_sql = "SELECT pay_id FROM payment_info WHERE pay_random = ".$pay_random.";";
			$select_result = mysqli_query($conn, $select_sql);

			if($select_result){
				while ($row = mysqli_fetch_assoc($select_result))
				{
					$pay_id=$row["pay_id"];
					setcookie('pay_id',$pay_id);
				}
			}
			setcookie('pay_way',$payWay);
		}
		header("location:UserPayMoney20(test).php");
	}
?>