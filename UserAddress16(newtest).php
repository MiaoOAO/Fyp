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
		$resultStatus = mysqli_query($conn, "SELECT * FROM delivery_info WHERE u_id = $userID AND d_status = 0");
		$row = mysqli_fetch_array($resultStatus);
		$check = $row["u_id"];

		if($check == null)  // shipStatus = 1 (the all payment have been settle), shipStatus = null (haven't fill the shipment infomation)
		{
		?>
			<h1>Choose your shipment way</h1>
			<body>
				<form action="UserShipProcess17(test).php" method="post">
					<table>
						<th>Delivery Company</th>
						<th>Address</th>
						<th>State</th>
                        <th>Zip</th>
						<tr>
							<td>
								<select name="company">
									<option value="jnt">JNT (RM5.00)</option>
									<option value="poslaju">POS_LAJU (RM6.00)</option>
									<option value="citylink">CITYLINK (RM6.00)</option>
									<option value="gdex">GDex (RM7.00)</option>
									<option value="ninjavan">NinjaVan (RM8.00)</option>
								</select><br>
							</td>
							<td><input type="text" name="address"></td>
							<td><select name="city">
									<optio value="Terengganu">Terengganu</optio>
									<option value="Selangor">Selangor</option>
									<option value="Sarawak">Sarawak</option>
									<option value="Perlis">Perlis</option>
									<option value="Perak">Perak</option>
                                    <option value="Penang">Penang</option>
                                    <option value="Pahang">Pahang</option>
                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option value="Malacca">Malacca</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Johor">Johor</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                    <option value="Putrajaya">Putrajaya</option>
								</select><br></td>
                            <td><input type="number" name="poscode"></td>
                        
						</tr>
					</table>
					<input type="submit" name="submit" value="Submit">
				</form>
			</body>
		<?php
		}	

		else    
		{
        $resultStatus = mysqli_query($conn, "SELECT * FROM delivery_info WHERE u_id = $userID");
        $row = mysqli_fetch_array($resultStatus);

        $courier = $row["d_company"];
        $address = $row["d_address"];
        $code = $row["d_code"];
        $city = $row["d_city"];
        
        ?>
        <table border="1">
        <h1>You Have Already Fill The Shipment Information Before</h1>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Postcode</th>
			<th>Courier Selected</th>
            <th>City</th>
            <th colspan="2">Action</th>
		</tr>

        <tr>
            <td><?php echo $username ?></td>
            <td><?php echo $address ?></td>
            <td><?php echo $code ?></td>
            <td><?php echo $courier ?></td>
            <th><?php echo $city ?></th>
            <td><a href="UserAddressUpdate16.1.php">UPDATE</a></td>
            <td><a href="#">DELETE</a></td>
        </tr>
        </table>

        <?php
			//print_r($_COOKIE['shipment_status']);
			?>
			<body><a href='UserPayInfo18(test).php'>Click here to pay</a></body>
			<?php
		}
	?>
</html>