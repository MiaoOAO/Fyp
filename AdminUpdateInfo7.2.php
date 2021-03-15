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
<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="AdminUpdateInfo.css">
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
<div class="center">
		<h2>Update Admin Profile</h2>
		<form name="" method="post" enctype="multipart/form-data" action="">

			<p>ID: <input type="text" name="id" value="<?php echo $rowID["id"]; ?>"  disabled></p>

			<p>Name: <input type="text" name="name" value="<?php echo $rowID["username"];  ?>"></p>

			<p>Currenly Password: <input type="number" name="password" step="any"></p>

            <p>New Password: <input type="number" name="passwordNew" step="any"></p>

			<p>Email: <input type="email" name="email" value="<?php echo $rowID["email"]; ?>"/></p>
					
			<p><input type="submit" name="savebtn" value="Update Profile"></p>

		</form>
	
</div>
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