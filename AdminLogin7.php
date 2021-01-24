<?php include("DataConnection1.php");
session_start(); ?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href="AdminLogin.css">
</head>



	<body>
    <h2>Admin Login</h2>
    <form name="loginForm" method="post" action="AdminLogin7.php"  >
        <br><br><br>
        <table align="center" width="350" height="250" bgcolor="white">

        <td>
        <div class="container">
    <label for="admin_name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="admin_username" required>

    <label for="admin_password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="admin_password" required>
        
    <button type="submit" class = "button" weight= "50%" align="center" name="submit" value="Login">Login</button>

  </div></td>
  

           
		</form>

	</body>
</html>

<?php
    //reference from -->  https://makitweb.com/create-simple-login-page-with-php-and-mysql/
    if(isset($_POST['submit']))
    {

        $uname = mysqli_real_escape_string($conn, $_POST['admin_username']);
        $password = mysqli_real_escape_string($conn, $_POST['admin_password']);

        if ($uname != "" && $password != ""){

            $sql_query = "select count(*) as cntUser from admin where username='".$uname."' and password='".$password."'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if($count > 0)
            {
                $_SESSION['aname'] = $uname;
                header('Location: AdminAction7.1.php');
            }

            else
            {
                echo "Invalid username and password";
            }

        }

    }

?>