<?php 
	include("DataConnection1.php"); 
	session_start();

	if(isset( $_SESSION [ 'uname' ]) && ! empty ( $_SESSION [ 'uname' ])) 
	{
		
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
	<title>Order Record</title>

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
		.order-record{
			margin: 200px auto;
			
		}

		.order-record h1{
			text-align: center;
			font-weight: 300;
			font-size: 52px;
			color: var(--title-red);
			letter-spacing: -2px;
            margin-top: 1rem;
            font-family:var(--Libre);
			
		}
		.order-record table{
			margin-top:3rem;
			width:100%;
			border-collapse: collapse;
			background:rgb(248, 249, 249, 0.5);
			margin-bottom:100px;

		}

		.order-record th{
			height: 70px;
			text-align: center;
			background-color: var(--title-dark) ;
			color: white;
			font-size: 22px;
			font-family:var(--Fraunces);
		}

		td{
			padding: 15px;
			font-family:var(--Open);
			font-size: 16px;
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
 
<body>

		<div class="container order-record"> 
			<h1>View your order history here.</h1>
            <div class="row col-md-12 ">
				<?php
				$sqlRecord = "SELECT * FROM orderdetailrecord_info WHERE u_id = $userID";
				$connectRecord = mysqli_query($conn, $sqlRecord);
				

				?>
				<table border='1'>
					<tr>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Quantity</th>
						<th>Order ID</th>
					</tr>
			
				<?php
					while($rowRecord = mysqli_fetch_array($connectRecord))
					{
						$getProductlistID = $rowRecord['p_id'];

						$sqlProductlist = "SELECT * FROM productlist WHERE id = $getProductlistID";
						$connectProductlist = mysqli_query($conn, $sqlProductlist);
						$rowProductlist = mysqli_fetch_array($connectProductlist);
						
						echo "<tr>";
						echo "<td>".$rowProductlist['s_name']."</td>";
						echo "<td> RM ".$rowProductlist['s_price']."</td>";
						echo "<td>".$rowRecord['p_num']."</td>";
						echo "<td>".$rowRecord['o_id']."</td>";
						echo "</tr>";
					}

				?>
				

				</table>
					<?php
				?>
			</div>
		</div>		

	</body>
<!-- Footer -->
        <?php include("footer.php"); ?>


	</html>


<!--JS (from bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>