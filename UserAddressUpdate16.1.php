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
<head></head>
			<h1>Address Information Update</h1>
			<body>
				<form action="" method="post">
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
</html>		

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

        $sql = "UPDATE delivery_info SET d_company = '$company', d_address = '$address', d_city = '$city', d_code = $code, d_price = $shipmentPrice WHERE u_id = '$userID' ";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            ?>
            <script type="text/javascript">
                alert("Address Information updated successfully.");
            </script>
            <?php

            header("location:UserAddress16(newtest).php");
        }
		
	}

	?>
