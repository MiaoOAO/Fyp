<?php 
	include("Backendheader_loginCheck.php"); 
?>

<!-------------------------------------------------------------------------------->

<html>
<head>
	<meta charset="utf-8">
	<title>Shop cart</title>

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
		/** 
			.ship-address h1{
				text-align: center;
			}

			.ship-address table {
				margin-top:3rem;
				width:100%;
				border-collapse: collapse

			}

			.ship-address th{
				height: 70px;
				text-align: center;
				background-color: #F39C12 ;
				color: white;
				font-size: 22px;
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

		*/

		th,td{
			padding: 15px;
			text-align: left;
			font-family:var(--Open);
		}

		tr:nth-child(even) {background-color: #f2f2f2;}

		th {
			height: 70px;
			text-align: center;
			background-color: var(--title-dark) ;
			color: white;
			font-size: 22px;
			font-family:var(--Fraunces);
		}

		.container{
			margin-top:6rem;
		}

		.cart-detail h1{
			text-align: center;
			font-weight: 300;
			font-size: 42px;
			color: var(--title-red);
			letter-spacing: -2px;
            margin: 2rem auto;
			font-family:var(--Libre);
			text-shadow: 2px 2px var(--title-dark);
		
			
		}

		.cart-detail table{
			overflow-x:auto;
			background:rgb(248, 249, 249, 0.5);

		}

		.pay-detail{
			margin-top:3rem;
		}

		.pay-detail h2{
			font-weight: 300;
			font-size: 32px;
			color: var(--title-red);
			letter-spacing: -2px;
            margin: 1rem auto;
			font-family:var(--Libre);
			text-shadow: 2px 2px var(--title-dark);
		}

		.pay-method{
			padding-top:2rem;
			background-color: rgb(250, 219, 216);
			width:100%;
			height:600px;
		
		
		}
		.pay-method form{
			margin-top:3rem;
			
		}

		.pay-method h2{
			font-weight: 300;
			font-size: 32px;
			color: var(--title-red);
			letter-spacing: -2px;
            margin: 1rem auto;
			font-family:var(--Libre);
			text-shadow: 2px 2px var(--white);
		}

		.pay-method p {
			margin-left: 12px ;
			font-family:var(--Open);
		}

		.pay-method h5 {
			margin-left: 12px ;
			font-family:var(--Fraunces);
		}

		.pay-method input[type=radio]{
			margin-left: 12px ;
			margin-top:12px;
		
		}
		
		.pay-method input[type=text]{
			margin-bottom: 1rem ;
			width:342px;
		}

		.pay-method input[type=submit]{
			background-color: var(--btn-red);
		    color: var(--q);
		    padding: 12px 20px;
		    border-radius: 4px;
            border-radius: 21px;
			width:100%;
			margin-top:1rem;
		}


		</style>

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


	<!-- background image -->
    <div class="bg-image">
        <img src="./assets/9.jpg" alt="">
    </div>  

	<!-- icon bar-->
    <div class="icon-bar">
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
    </div>

    <!-- up button-->
    <div class="up" style="position: fixed; bottom: 0; right: 0; z-index: 1;">
        <a href="#"><img src="https://img.icons8.com/clouds/100/000000/up.png"></a>
    </div>
    
    <!-- header -->
    <?php include("header.php"); ?>
	
	<body>




		<div class="container cart-detail"> 
            <div class="row col-md-12 ">
				<h1>Total money here, please fill your payment information.</h1>
			
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
			</div>
		</div>

		<div class="container pay-detail"> 
            <div class="row col-md-12 ">
				<table border="1">
					<h2>Order Details</h2>
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
								//$total_item = $_COOKIE['total_item'];
								//$productPrice = $_COOKIE['total_price'];
								$shipment_way = $row['d_company'];
								$shipment_price = $row['d_price'];
								$totalPriceship = $shipment_price + $totalPrice;

								echo "<tr>";
								echo "<td>".$totalItem."</td>";
								echo "<td> RM ".$totalPrice."</td>";
								echo "<td>".$shipment_way."</td>";
								echo "<td> RM ".$shipment_price."</td>";
								echo "<td> RM ".$totalPriceship."</td>";
								echo "<td>".$shipment_address."</td>";
								echo "<td>".$shipment_state."</td>";
								echo "</tr>";
						?>
				</table>
			</div>
		</div>

		<div class="container pay-method"> 
            <div class="row">				
				<div class="col-md-12 ">
					<div class="col-md-8">
						<h2>Select Payment method</h2>
							
							<div class="payway">
								<input type="radio" name="payway" value="credit" onClick="hideB()" checked>Credit/ Debit card
								<input type="radio" name="payway" value="bank" onClick="hideA()">Bank Receipt
							</div>
							<form action="UserPayInfoWay19(test).php" method="post" id="A" style="position: absolute">

								<h5>Name on card</h5><input type="text" name="payuser"><br>
								<h5>Card Number</h5><input type="text" name="payaccount"><br>
								<h5>Expiry Date</h5><input type="text" name="receiveuser"><br>
								<h5>Card Security Code</h5><input type="text" name="receiveaccount"><br>
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
								<h5>Bank holder name: </h5><input type="text" name="payuser"><br>
								<h5>Reference/ note: </h5><input type="text" name="payaccount"><br>
								<h5>Please upload your bank receipt photo here: </h5><input type="file" name="image"/><br>
								<input type="submit" value="Submit"> 
							</form>
								<?php
					//		    }
							?>
					</div>

					
				</div>
			</div>
		</div>

		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
