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
			.output-sucess{
				font-size: 2rem;
				font-family:var(--Montserrat);
				top: 50%;
			}

			.output-sucess span{
				color: var(--title-red);
			}
		</style>


	</head>

<!-- background image -->
    <div class="bg-image">
        <img src="./assets/9.jpg" alt="">
    </div>  

	<div class="container output-sucess"> 
        <div class="row col-md-12 ">
			<?php

			$sql = "UPDATE payment_info SET pay_status=1 WHERE pay_id = ".$_COOKIE['pay_id'].";";
			$result = mysqli_query($conn, $sql);

			if($result){
				echo "PAYMENT HAVE PROCESS ><span> SUCESSFULLY! </span> THANK YOU! HAVE A NICE DAY!!";
				echo "<a href='UserOrderLastProcess21(test).php'>Click here to see order information.</a>";
				
			}else{
				echo "You have to pay first!";
			}
			?>	
		</div>	
	</div>


</html>
<!--JS (from bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>