<?php 
	include("BackendHeader.php"); 
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

		.comment {
			background-color: rgb(33, 47, 60 ,0.1);
			margin-bottom:20px;
		}

		#commentBox h2{
			color:var(--title-dark);
			font-family:var(--Libre);
		}

		#commentBox{
			background-color: var(--white);
		}

		#commentBox input[type="submit"]{
			background-color: var(--btn-red);
		    color: var(--q);
		    padding: 12px 20px;
		    border-radius: 4px;
            border-radius: 21px;
			width:50%;
			margin-top:5px;
		}
		.adv h2{
			float:right;
			text-align: center;
            color: orangered;
            text-shadow: 2px 2px 4px #000000;
            font-family: var(--abril);
            font-size:2.3rem;
		}

    </style>

	</head>

	 <title>PRODUCT DETAILS</title>
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

	<body>

		
<!-- header -->
<?php include("header.php"); ?>



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
							<br>
							<span><?php echo $row["s_country"] ?></span>
							<h1><?php echo $row["s_name"] ?></h1>
							<p>Product Stock : <?php echo $row["s_quantity"] ?></p>
						</div>
						<div class="product-configuration">
							<div class="info">
								<p><?php echo "Product Flavor : " . $row["s_flavor"] ?></p>
								<p><?php echo "Halal Certification : " . $row["s_certification"] ?></p>
								<p></p><?php echo "Production Date : " . $row["s_production"] ?></p>
								<p><?php echo "Expiry Period : " . $row["s_expiry"] . " Months" ?></p>
								<p><?php echo "Product Description : " . $row["s_info"] ?></p>
							</div>
							<h5>RM <?php echo $row["s_price"]  ?></h5>

							<form class="ADD-product" method="post" action="" enctype="multipart/form-data">
								<p>Quantity<br><button type="button" id="minus" class="btn btn-danger btn-number" onclick="decrease()"style="margin-top:0px;">-</button> <input type="text" name="user_qty" id="user_qty" placeholder="" value="0">  <button type="button" id="plus" class="btn btn-success btn-number" onclick="increase()" style="float:right; background-color:green;margin-top:0px;">+</button> </p>
								<p><input type="submit" name="orderbtn" value="ADD TO CART">
							</form>
							
							<script>
								var textBox = document.getElementById("user_qty");

								function increase(){
									var a = 1;							
									textBox.value++;
								}    


								function decrease(){
									if(textBox.value <= 0)
									alert("Quantity cannot be negative!");
									
									else
									textBox.value--;
								}    
								
								</script>
						</div>
					</div>		
				</div>
			</div>
		</div>
		<div class="container comment"> 
			<div class="row col-md-12 text-center">
				<div class="col-md-8">
					<div id="commentBox" style="height:auto; border:1px solid black; margin:20px">
						<br><h2>Comment</h2>

						<div id="commentBoxInside" style="margin:5px">
							<?php
								$sql = "SELECT * FROM comment WHERE p_id = $pid;";
								$result = mysqli_query($conn, $sql);//result is a PHP array

								$num_rows = mysqli_num_rows($result);
								//echo $num_rows;

								
								while ($rowComment = mysqli_fetch_assoc($result))
								{
									$comment_userid = $rowComment["user_id"];
									$com = $rowComment["comment"];
									$t = $rowComment["time"];
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
							<textarea rows="4" cols="50" name="comment" style="width:100%; padding:10px; font-size:1.1rem"></textarea>
							<p><input type="submit" name="submitCom" value="Add Comment" style="float:right">
						</form>
						<br><br>
					</div>
				</div>	
				<div class="col-md-4 center">
					<div class ="card-product-recommend">
						<div class="adv">
							<h2>Other Products</h2>	
						</div>	
						<?php  
						
						
						$s = $_SESSION["search"];
						$res = mysqli_query($conn,"SELECT * FROM productlist WHERE s_name LIKE '%$s%';");
						$row = 0;	
							while(($row=mysqli_fetch_array($res)) && ($times<3))
							{
								$p_id = $row["id"];$times++;
								?>	
								
								<div class="ctn">               <?php //这行是给格子的用法 ?>
								<a href='UserAddProduct12(test).php?pid=<?php echo $p_id;?>'>
									<button type="button" class="btn" onclick="/* href='UserProductDetail.php?pid=<?php echo $p_id;?>'*/ ">
										<div class="product-image text-center">
											<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';?>
										</div>
										<div class="product-info">
											<h5><?php echo $row["s_name"]?></h5>
											<h6>RM<?php echo $row["s_price"]?></h6>
										</div>
									</button> 
								</a>
								</div>		
								<?php
							} 

							if($p_id == NULL)
							{
								echo "SORRY, PRODUCT CANNOT FOUND!";
							}
						
						?>
    				</div>

				</div>
			</div>
		</div>

	</body>
</html>

<?php

	if(isset($_POST["orderbtn"])) 	
	{
		$pid = $row["id"];
		$userid = $userID;
		$cqty = $_POST["user_qty"];  

		$balance = $row["s_quantity"] - $cqty; //$balance = total product qty in stock - user enter qty 

		if($cqty <= 0)
		{
			alert("Product quantity cannot be zero or null!");
		}
		
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

<!-- Footer -->
<?php include("footer.php"); ?>


 <!--JS (from bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                offset: 150,
                duration: 1000
            });
        </script>