<?php 
	include("DataConnection1.php"); 
	session_start();

	if(isset( $_SESSION [ 'aname' ]) && ! empty ( $_SESSION [ 'aname' ])) 
	{
		echo  "Status : Log \n Admin name: " . $_SESSION [ 'aname' ];
		
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

	<form method="post" action="">
	<input type="submit" name="logout" value="logout"></input>
	</form>

<?php

	if(isset($_POST["logout"]))
	{
	session_destroy();
	echo 'You have been logged out. <a href="AdminLogin7.php">Go back</a>';
	}

?>

<!-------------------------------------------------------------------------------->

<html>
<head></head>
<body>
    <h1>ADMIN ACTION</h1>
    <a href='AddProduct2.php'>1. INSERT NEW PRODUCT</a>
    <br><br>
    <a href="ProductDetails3.php">2. PRODUCTS LIST</a>
    <br><br>
	<a href="FunctionAdminSearchbar.php">3. PRODUCTS LIST BY SEARCH</a>
	<br><br>
    <a href="AdminUpdateInfo7.2.php">4. UPDATE PROFILE</a>
</body>
</html>
