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

	foreach($_COOKIE as $key => $value)
	{
		setcookie($key, null);
	}

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

			.shop-cart{
				margin:100px auto;
			}

			.shop-cart h1{
				text-align: center;
				font-weight: 300;
				font-size: 52px;
				color: var(--title-red);
				letter-spacing: -2px;
            	margin-top: 1rem;
            	font-family:var(--Libre);
			}

			.shop-cart table {
				margin-top:3rem;
				width:100%;
				border-collapse: collapse;
				background:rgb(248, 249, 249, 0.5);

			}

			.shop-cart th{
				height: 70px;
				text-align: center;
				background-color: var(--title-dark) ;
				color: white;
				font-size: 22px;
				font-family:var(--Fraunces);
			}

			.shop-cart th,td{
				padding: 15px;
				font-family:var(--Open);
			}

			tr:hover {
				background-color:#FDEDEC;
			}

			.one,.two{
				border: 1px solid black;
				margin: 1rem;	
				background-color:var(--btn-red);;
			}

			.one a,.two a{
				margin: 2rem;
				color: var(--white);
			}

			.clear{
            background-color:var(--pink-light);
            color:var(--title-dark);
            padding: 6px 20px;
            border-radius: 4px;
            border-radius: 21px;
			width: auto;
			margin-top:10px;
			float: right;
			}
		
			.total-price{
				float: right;
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


	<body>

	
<!-- header -->
    <div id="headerNav">
        <nav class="navbar navbar-expand-lg navbar-light" >
            <a class="navbar-brand" href="main.php"><span style="color:rgb(11, 211, 238); text-decoration:overline black; font-size: 40px; font-family:Jazz LET, fantasy ;">F<span style="color: rgba(233, 76, 76, 0.959)">u</span>n_Snacks
            <!--img test--><img src="https://img2.pngio.com/bar-chocolate-snack-sweet-icon-cartoon-snacks-png-512_512.png" width="100px" height="100px"></span>
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarNav" >
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="features.php">FEATURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.php">ABOUT US </a>
                    </li>

                    <li class="nav-item dropdown">
                        
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SHOPPING CART</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                </ul>

    <?php
        if(isset( $_SESSION [ 'uname' ]) && ! empty ( $_SESSION [ 'uname' ])) 
        {
            ?>
            <div class="nav-link" style="color: deeppink;"><?php echo $_SESSION [ 'uname' ]; ?>  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
            </svg></div>
            <?php
            //echo  "Status : Log \n Username: " . $_SESSION [ 'uname' ];
            
            $username = $_SESSION [ 'uname' ]; 
            $resultuserID = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
            $rowID = mysqli_fetch_array($resultuserID);
            $userID = $rowID["id"];

            $_SESSION['uid'] = $userID;

            
            ?> <!-- Show logout button if user logging -->
            
                <form method="post" action="" class="logout-btn">
                <input type="submit" name="logout" value="logout"></input>
                </form>

                
            <?php
        } 

        else
        {
    ?>         
                <a class="nav-link user-login" href="UserLogin10.php" style="color: deeppink;">LOGIN <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
          </svg></a>

                <h2>|</h2>

                <a class="nav-link user-register" href="UserRegister9.php">REGISTER <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
          </svg></a>
    <?php
        }
    ?>
            </div>
        </nav>
</div>


	<div class="container shop-cart"> 
		<h1>View your shop cart here.</h1>
            <div class="row col-md-12 ">
				


				<?php
				error_reporting(E_ERROR | E_PARSE);

					$totalPrice = 0;
					$totalItem = 0;
					$p_info = 0;
				
					$resultStatus = mysqli_query($conn, "SELECT * FROM usercart WHERE user_id = $userID AND status = 0");
					$row = mysqli_fetch_array($resultStatus);
					$check = $row['user_id'];

				if($check == null)
				{
					echo "The shop cart is empty!";
					?>
						<br><br>
						<a href='UserProductList11(test).php'>Back to Products List</a>
					<?php
				}

				else if(isset($_SESSION['shop-cart']) || isset($_GET["user"]) || isset($_SESSION['uid']))
				{
					?>
					<table border="1">

					<tr><th>Product</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<!--<th>Detail</th>-->
						<th>Counts</th>
						<th>Delete from Cart</th>
					</tr>
					<?php

						//	print_r($_SESSION['shop-cart']);
						//	$p_id = $_SESSION['shop-cart'][0]; //product id
						//	$u_id = $_SESSION['shop-cart'][1]; //user id
						//	$goods_num = $_SESSION['shop-cart'][2]; //user order qty of product

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
								echo '<td align="center">
									<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"></td>';
								echo "<td>".$p_name."</td>";
								echo "<td> RM ".$p_price."</td>";
								//echo "<td>".$p_descr."</td>";
								echo "<td>".$qty."</td>";
								?>
								<td><a href='UserDelCArt14(test).php?delCartID=<?php echo $cart_id; ?>'>Delete</a></td>
								<?php
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
					</table>	
				
					<div class="container"> 
            			<div class="row col-md-12 ">
						
								<div class="clear">
									<a href='UserDelAllCart15(test).php?delAllCartID=<?php echo $pr_id; ?>'>Clear cart</a>
								</div>
							</div>	
							<div class="total-price">	
								<?php
										echo "".$totalItem."   Items. ";
										echo "Total price: ".$totalPrice." MYR";
									?>
							</div>
						</div>	
					</div>


					<?php
				}
				
				?>
				<div class="container"> 
            		<div class="row col-md-12 ">
						<div class="one">
							<a href='UserAddress16(newtest).php'>Next To Shipment</a>
						</div>
						<div class="two">
							<a href='products.php' >Back to Products List</a>	
						</div>
					</div>	
				</div>

		</div>
	</div>

	</body>

	
<!-- Footer -->
    <footer id="footer" class="page-footer font-small stylish-color-dark pt-4">
        <div class="container text-center text-md-left">
            <div class="row col-md-12">
                <div class="col-md-4 mx-auto">
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Logo(name)</h3>
                    <p>We are provide a variety of snacks and drinks from different countries for you to buy.<br><br>
                    MALAYSIA</p>
                </div>
                <!--<hr class="clearfix w-100 d-md-none">-->
                <div class="col-md-3 mx-auto">
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--<hr class="clearfix w-100 d-md-none">-->
                <div class="col-md-5 mx-auto">    
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Contact Us</h3>
                    <h6><i class="fas fa-map-marker-alt"></i> : ---
                    </h6>
                    <h6><i class="fas fa-phone"></i> : 03- ---- ----/012- --- ----</h6>
                    <h6><i class="far fa-envelope"></i> : <a
                            href="mailto:josephsim0501@gmail.com">---</a></h6><br>
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Business Hours</h3>
                    <h6> Monday - Friday : 10.00a.m. - 6.00p.m.<br>
                        Saturday : 10.00a.m. - 4.00p.m.<br>
                        Sunday & P.Holiday : Closed </h6>
                    <br>
                </div>
                <hr class="clearfix w-100 d-md-none">
            </div>
        </div>
        <!-- Social buttons -->
        <div class="social-btn">
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/cotton/64/000000/facebook.png" />
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/cotton/64/000000/twitter.png" />
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/cotton/64/000000/instagram-new.png" />
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/doodle/48/000000/gmail.png" />
                    </a>
                </li>
            </ul>
        </div>
        <!-- Social buttons -->

</footer>


</html>

<!--JS (from bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>