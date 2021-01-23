<?php include("DataConnection1.php");
session_start(); ?>


<html>
<head>

<title>Login in to Admin Page</title>


</head>

	<body>
    <h2>Admin Login</h2>
		<form action="AdminLogin7.php" method="post">
 			User name:<input type="text" name="admin_username"><br>
			User password:<input type="password" name="admin_password"><br>
			<input type="submit" class = "button" name="submit" value="Login">
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