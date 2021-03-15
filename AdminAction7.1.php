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


</body>
</html>
