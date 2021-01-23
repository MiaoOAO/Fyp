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

$sql = "UPDATE payment_info SET pay_status=1 WHERE pay_id = ".$_COOKIE['pay_id'].";";
$result = mysqli_query($conn, $sql);

if($result){
	echo "<br>";
    echo "<br>";
    echo "PAYMENT HAVE PROCESS SUCESSFULLY! THANK YOU! HAVE A NICE DAY!!";
	echo "<a href='UserOrderLastProcess21(test).php'>Click here to see order information.</a>";
}else{
	echo "You have to pay first!";
}


?>