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

	<?php //Get the product id from UserProductList11.php
		if(isset($_GET["pid"]))
		{
			$pid = $_GET["pid"];

			$result = mysqli_query($conn, "SELECT * FROM productlist WHERE id = '$pid' ");
			$row = mysqli_fetch_array($result);
		}
	?>


<html>
	<head>

	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	
	<style>

		.product{
			width:100vw;
			height:100vh;
			margin: 0 auto;
			padding: ;
			

		}

		.left-column img{
		width: 100%;
		height:70vh;
		position: ;
	
		}

		.right-column{
			padding-left: 2rem;
			padding-right: 1rem;

		}

		.product-description {
			border-bottom: 1px solid #E1E8EE;
			margin-bottom: 20px;
		}
		.product-description span {
			font-size: 12px;
			color: #358ED7;
			letter-spacing: 1px;
			text-transform: uppercase;
			text-decoration: none;
			
		}
		.product-description h1 {
			font-weight: 300;
			font-size: 52px;
			color: #43484D;
			letter-spacing: -2px;
			margin-top: 1rem;
		}
		.product-description p {
			font-size: 16px;
			font-weight: 300;
			color: #86939E;
			line-height: 24px;
			margin-top: 1rem;
			text-transform: uppercase;
		}

		.product-configuration .info{
			min-height: 200px;
		}

		.product-configuration p {
			font-size: 18px;
			font-weight: 100;
			color: #34495E;
			line-height: 24px;
			margin-top: 1rem;
		}

		.product-configuration h5{
			margin-top: 1rem;
			font-size: 26px;
			font-weight: 300;
			color: #43474D;
			margin-right: 20px;
		}
		.product-configuration form p{
			text-transform: uppercase;
			font-size: 16px;
			
		}
		.product-configuration input[type=submit]{
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			width: 187px;
		}

	</style>

	</head>

	<body>
		
		<div class="container product"> 
            <div class="row col-md-12">
                <div class="col-md-6 text-left">
					<div class="left-column">
						<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" />';?>
					</div>
				</div>
				<div class="col-md-6 text-left">
					<div class="right-column">
						<div class="product-description">
							<span><?php echo $row["s_country"] ?></span>
							<h1><?php echo $row["s_name"] ?></h1>
							<p>Product Stock : <?php echo $row["s_quantity"] ?></p>
						</div>
						<div class="product-configuration">
							<div class="info">
								<p><?php echo $row["s_info"] ?></p>
							</div>
							<h5>RM <?php echo $row["s_price"]  ?></h5>

							<form class="ADD-product" name="" method="post" action="" enctype="multipart/form-data">
								<p>Quantity<br><input type="text" name="user_qty" placeholder=""></p>
								<p><input type="submit" name="orderbtn" value="ADD TO CART">
							</form>
						</div>
					</div>
				</div>

				<div id="commentBox" style="height:auto; border:1px solid black; margin:20px">
            <h2>Comment</h2>

            <div id="commentBoxInside" style="margin:5px">
                <?php
                    $sql = "SELECT * FROM comment WHERE p_id = $pid;";
                    $result = mysqli_query($conn, $sql);//result is a PHP array

                    $num_rows = mysqli_num_rows($result);
                    //echo $num_rows;

                    
                    
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $comment_userid = $row["user_id"];
                        $com = $row["comment"];
                        $t = $row["time"];
                        ?>
                            <div style="border:1px solid black; padding:5px; margin:5px; height:150px">
                            <h4>    <?php echo $comment_userid; ?> </h4>
                                <?php echo $com; ?>
                            </div>
                        <?php
                    }
                ?>
            </div>

            <br><hr>

            <form name="" method="post" action="" enctype="multipart/form-data" style="margin:5px">
                <textarea rows="4" cols="50" name="comment" style="width:100%; padding:10px; font-size:25px"></textarea>
                <p><input type="submit" name="submitCom" value="Add Comment" style="float:right">
            </form>
            <br><br>
        </div>

			</div>
		</div>

 


<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>


		<h1>Product Detail</h1>

	<!-- 
		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>'?>
	-->
		<br>Product Name : <?php echo $row["s_name"] ?>
		<br>Product Price : <?php echo $row["s_price"]  ?>
		<br>Product Stock : <?php echo $row["s_quantity"] ?>
		<br>Origin : <?php echo $row["s_country"] ?>
		<br>Information : <?php echo $row["s_info"] ?>
			

		<h1>Your Order Detail</h1>

		<form name="" method="post" action="" enctype="multipart/form-data">
			<p>Quantity:<input type="text" name="user_qty"></p>
			<p><input type="submit" name="orderbtn" value="Add to Cart">
		</form>
		
	</body>
</html>

<?php

	if(isset($_POST["orderbtn"])) 	
	{
		$pid = $row["id"];
		$userid = $userID;
		$cqty = $_POST["user_qty"];  

		$balance = $row["s_quantity"] - $cqty; //$balance = total product qty in stock - user enter qty 


		if($balance >= 0) // True, if product stocks enough
		{
			$conn->query("INSERT INTO usercart (product_id, user_id, qty) VALUES ('$pid', '$userid', '$cqty')");
			
			//$cartArray = array($pid, $userid, $cqty);
			//$_SESSION['shop-cart'] = $cartArray;
			
			header("Location:UserViewCart13(test).php");

			//之后才需要, after payment needed this line
			//mysqli_query($conn, "UPDATE product SET product_stock= $balance where product_code = '$pid'");// update product table	
		}

		else // False, if product stocks not enough
		{
			?>
				<script>
				alert("Your quantity is more than the stock that we have. Please change.");
				</script>
			<?php	
		}
		
	}

	if(isset($_POST["submitCom"])) 	
	{
        $comment = $_POST["comment"];
        $userid = $userID;

        if($comment == NULL)
        {
            ?>
                <script>
                    alert("Comment cannot be null ! ");
                </script>
            <?php
        }

        else
        {
            if($userID == NULL)
            {
                ?>
                    <script>
                        alert("If you want to leave a comment. Please Login or register as a member, thank you.");
                    </script>
                <?php
            }
    
            else
            {
                $conn->query("INSERT INTO comment (user_id, p_id, comment) VALUES ('$username', '$pid', '$comment')");

                ?>
                    <script>
                        alert("Thanks for your feedback. Comment was uploaded, please refreah the page manually.");
                    </script>
                <?php
            }
        }

    }

?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>