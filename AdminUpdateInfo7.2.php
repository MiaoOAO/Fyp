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
<head>

</head>
<body>
		
		<h1>Update Admin Profile</h1>

		<form name="" method="post" enctype="multipart/form-data" action="">

			<p>ID: <input type="text" name="id" value="<?php echo $rowID["id"]; ?>"  disabled>

			<p>Name: <input type="text" name="name" value="<?php echo $rowID["username"];  ?>">

			<p>Currenly Password: <input type="number" name="password" step="any"></p>

            <p>New Password: <input type="number" name="passwordNew" step="any"></p>

			<p>Email: <input type="email" name="email" value="<?php echo $rowID["email"]; ?>"/></p>
					
			<p><input type="submit" name="savebtn" value="Update Profile">

		</form>
	

</body>
</html>

<?php
    if(isset($_POST["savebtn"]))
    {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $Npassword = $_POST["passwordNew"];
        $email = $_POST["email"];

        if($password == $rowID["password"])
        {
            $sql = "UPDATE admin SET username = '$name', password = '$Npassword', email = '$email' WHERE id = '$adminID' ";
            $connectsql = mysqli_query($conn, $sql);

            if($connectsql == 1)
            {
                echo "Your Profile Has Been Update Successfully.";
            }

        }

        else
        {
            echo "The Password Your Enter Are Difference With Currently Password, Please Try Again!";
        }

        
    }
?>