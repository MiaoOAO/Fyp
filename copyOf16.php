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

<html>
	<head>
		<meta charset="utf-8">
		<title>Shipment</title>
	</head>

	<?php
		if(isset($_COOKIE['shipment_status']))
		{
			?>
			<h1>You have already fill the shipment information</h1>

				<body>
					<a href='UserPayInfo18(test).php'>Click here to pay</a>
				</body>
			<?php  
		}

		else
		{
			?>
			<h1>Choose your shipment way</h1>
			<body>
				<form action="UserShipProcess17(test).php" method="post">
					<table>
						<th>Delivery Company</th>
						<th>Orign Location</th>
						<th>Target Location</th>
						<tr>
							<td>
								<select name="company">
									<option value="">Choose Delivery Courier</option>
									<option value="jnt">JNT (RM5.00)</option>
									<option value="poslaju">POS_LAJU (RM6.00)</option>
									<option value="citylink">CITYLINK (RM6.00)</option>
									<option value="gdex">GDex (RM7.00)</option>
									<option value="ninjavan">NinjaVan (RM8.00)</option>
								</select><br>
							</td>
							<td><input type="text" name="orgn_location"></td>
							<td><input type="text" name="trgt_location"></td>
						</tr>
					</table>
					<input type="submit" name="submit" value="Submit">
				</form>
			</body>
			<?php
		}
	?>
</html>