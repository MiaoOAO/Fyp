<?php 
	include("Backendheader_loginCheck.php"); 
?>

<!-------------------------------------------------------------------------------->

<html>
<head>
	<meta charset="utf-8">
	<title>Shipment</title>

		<meta name=”viewport” content=”width=device-width, initial-scale=1″ />

		<!-- Bootstrap CDN -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	

		<!--Font Awesome SDN-->
		<script src="https://kit.fontawesome.com/5953284528.js" crossorigin="anonymous"></script>

		<!--Slick Slider-->
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

		<!--Custom Stylesheet -->
		<link rel="stylesheet" href="./css/style,footer,header,navbar.css">
		<link rel="stylesheet" href="./css/allPages-style.css">

		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

		<style>

			.ship-address{
				margin:150px auto;
		
			} 

			.ship-address h1{
				text-align: center;
				font-weight: 300;
				font-size: 52px;
				color: var(--title-red);
				letter-spacing: -2px;
            	margin-top: 1rem;
            	font-family:var(--Libre);
			}

			.ship-address table {
				margin-top:3rem;
				width:100%;
				border-collapse: collapse;
				background:rgb(248, 249, 249, 0.5);
			}

			.ship-address th{
				height: 70px;
				text-align: center;
				background-color: var(--title-dark) ;
				color: white;
				font-size: 22px;
				font-family:var(--Fraunces);
			}

			.ship-address th,td{
				padding: 15px;
			}

			tr:hover {
				background-color:#FDEDEC;
			}

			.pay{
				border: 1px solid black;
				margin: 1rem;	
				background-color: #E8DAEF;
			}

			.pay a{
				margin: 2rem;
				color: black;
			}

			.pay-btn button{
				background-color: var(--btn-red);
				color: white;
				border: none;
				padding: 10px 20px;
            	border-radius: 4px;
            	border-radius: 21px;
				float:right;
				margin:10px 5px;
			}
		


		</style>

</head>

	<!-- background image -->
    <div class="bg-image">
        <img src="./assets/9.jpg" alt="">
    </div>  

    <!-- icon bar-->
    <div class="icon-bar">
        <a href="https://www.facebook.com/FunSnack-116986147094140/?ref=page_internal" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="mailto:wearefunsnacks@gmail.com" target="_blank" class="youtube"><i class="fa fa-envelope"></i></a>
        <a href="https://www.instagram.com/wearefunsnacks/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
    </div>

    <!-- up button-->
    <div class="up" style="position: fixed; bottom: 0; right: 0; z-index: 1;">
        <a href="#"><img src="https://img.icons8.com/clouds/100/000000/up.png"></a>
    </div>

	
	<?php include("header.php"); ?>


	<div class="container ship-address"> 
		<h1></h1>
            <div class="row col-md-12 ">


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
						<td><?php echo $city ?></td>
						<td><a href="UserAddressUpdate16.1.php">UPDATE</a></td>
						<td><a href="#">DELETE</a></td>
					</tr>
					</table>

					<?php
						//print_r($_COOKIE['shipment_status']);
						?>
						<div class="pay-btn">
							<button type="button" ><a href='UserPayInfo18(test).php'>Click here to pay</a></button>
						</div>
						<?php
					}
				?>
			
			</div>
	</div>

<!-- Footer -->
<?php include("footer.php"); ?>

</html>


<!--JS (from bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>