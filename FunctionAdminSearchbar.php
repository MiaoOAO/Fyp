<!DOCTYPE html>

<?php 
    include("DataConnection1.php"); 
    ob_start();
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
	<input type="submit" name="logout" value="Logout"></input>
    <input type="submit" name="main" value="Main Page"></input>
	</form>


<?php

	if(isset($_POST["logout"]))
	{
	session_destroy();
	echo 'You have been logged out. <a href="AdminLogin7.php">Go back</a>';
    }
    
    if(isset($_POST["main"]))
	{
        header("Location: AdminAction7.1.php");
	}

?>


<!-------------------------------------------------------------------------------->

<html>
<head></head>
<body>

    <form action="" method="post" style="margin-left:10px; margin-top:5px;">
        <input name="searchbar" type="text" placeholder="Type here" style="width:95%">
        <input name="search" type="submit" value="Search" style="width:80px">
    </form>

    <?php
    
    if(isset($_POST["search"]))
    {
        $search = $_POST["searchbar"];

        if($search == NULL)
        {
            ?>
                <script>
                    alert("Search cannot be NULL!");
                </script>
            <?php
        }

        else
        {
            $_SESSION["search"] = $search;
            header("Location: FunctionAdminSearchbarForm.php"); //这边自己改你要link的address
            ob_end_flush();
        }
    }
    ?>

</body>
</html>





