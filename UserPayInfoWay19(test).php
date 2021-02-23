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
<head> 
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

		.output{
			top:100px;
		}
		.output p{
			margin-top:200px;
		}

	</style>
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

	<div class="container output"> 
        <div class="row col-md-12 ">
			<?php

				$payWay = "credit";
				$payUser = $_POST['payuser'];
				$cardNum = $_POST['cardnumber'];
				$cardDate = $_POST['carddate'];
				$securityCode = $_POST['securityCode'];
				$payStatus = false;

				$numbers = range (1,1000000); 
				shuffle ($numbers); 
				$num=1; 
				$result = array_slice($numbers,0,$num); 
				$pay_random = $result[0];

				if($payUser == "" ||$cardDate == "" || $cardNum == "" || $securityCode == "")
				{
					echo "<p>You must fill the blanks.</p>";
				}

				else
				{
				//	$sql = "INSERT INTO payment_info (pay_user, receive_user, pay_account, receive_account, pay_way, pay_status, pay_random)
				//	VALUES ('".$payUser."', '".$receiveUser."', ".$payAccount.",".$receiveAccount.",'".$payWay."','".$payStatus."',".$pay_random.");";
				//$conn->query("INSERT INTO payment_info (pay_user, receive_user, pay_account, receive_account, pay_way, pay_status, pay_random) VALUES ('$payUser', '$receiveUser', $payAccount, $receiveAccount, '$payWay', '$payStatus', $pay_random)");
				$sql = "INSERT INTO payment_info (pay_user, card_num, card_date, security_code, pay_way, pay_status, pay_random) VALUES ('$payUser', '$cardNum', '$cardDate', $securityCode, '$payWay', '$payStatus', $pay_random)";
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
		</div>
	</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
