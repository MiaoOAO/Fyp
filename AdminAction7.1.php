<?php 
	include("DataConnection1.php"); 
	session_start();

	if(isset( $_SESSION [ 'aname' ]) && ! empty ( $_SESSION [ 'aname' ])) 
	{
    ?> 
    <div style="background-color: rgba(201, 76, 76, 0.3); border:3px solid black; font-size:30px; padding:10px">
      <?php
        echo  "Welcome, " . $_SESSION [ 'aname' ];
      ?>

      <form method="post" action="" style="float:right">
        <input type="submit" name="logout" value="logout" style="font-size:20px"></input>
      </form>

      </div>
    <?php

		$adminname = $_SESSION [ 'aname' ]; 
		$resultadminID = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$adminname' ");
		$rowID = mysqli_fetch_array($resultadminID);
		$adminID = $rowID["id"];

        $_SESSION['aid'] = $adminID;
        
        if($adminID == NULL)
        {
            header("Location: AdminLogin7.php");
        }
	} 

	else 
	{
		echo  "你还没有登录，<a href='AdminLogin7.php'>请登录</a>" ;
		header("Location: AdminLogin7.php");
	} 

?>



<?php
	if(isset($_POST["logout"]))
	{
  session_destroy();
  ?>
    <script type="text/javascript">
      alert("You have been logged out.");
      window.location.href="AdminLogin7.php";
    </script>
  <?php
  //header("Location: AdminLogin7.php");
	}
?>

<!-------------------------------------------------------------------------------->

<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="AdminAction.css">
</head>
<body>

<div class="sidebar">
<h1>ADMIN ACTION</h1>
<a href="AdminAction7.1.php">MAIN MENU</a>

  <a href="AddProduct2.php">INSERT NEW PRODUCT</a>
  <a href="ProductDetails3.php">PRODUCTS LIST</a>
  <a href="FunctionAdminSearchbarForm.php">SEARCH PRODUCTS BY NAME</a>
  <a href="AdminManageUsers.php">MANAGE USERS ACCOUNT</a> 
  <a href="AdminUpdateInfo7.2.php">UPDATE PROFILE</a>

</div>

<div class="title-map" data-aos="flip-up">
            <h3>COMPANY LOCATION</h3>
        </div>
        <div class="location" data-aos="fade-up">
            <div id="map_canvas">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7968.543928495288!2d101.713567!3d3.021449!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdcaa43353c227%3A0x4e811b580192f169!2s23%2C%20Jalan%207%2F1%2C%20Serdang%20Jaya%2C%2043300%20Seri%20Kembangan%2C%20Selangor!5e0!3m2!1szh-CN!2smy!4v1613898615829!5m2!1szh-CN!2smy" 
              width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <iframe src="https://www.google.com/maps/embed?pb=!4v1613898996541!6m8!1m7!1se2nsZSvzcORtad9_eGSUgA!2m2!1d3.01452372592796!2d101.7394439708906!3f278.9622036530888!4f-18.340948042531267!5f0.7820865974627469" 
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>    
     
            </div>
        </div>

<!-- Social buttons -->
<div class="social-btn">
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/FunSnack-116986147094140/?ref=page_internal" target="_blank">
                        <img src="https://img.icons8.com/cotton/64/000000/facebook.png" />
                    </a> 
                </li>
                <li class="list-inline-item">
                    <a href="https://www.instagram.com/wearefunsnacks/" target="_blank">
                        <img src="https://img.icons8.com/cotton/64/000000/instagram-new.png" />
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="mailto:wearefunsnacks@gmail.com" target="_blank">
                        <img src="https://img.icons8.com/doodle/48/000000/gmail.png" />
                    </a>
                </li>
            </ul>
        </div>
        <!-- Social buttons -->

</body>
</html>
