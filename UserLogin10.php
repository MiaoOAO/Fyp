<?php include("DataConnection1.php");
session_start(); ?>

<html>
<head>

<title>Login in to User Page</title>


</head>

	<body>
    <h2>User Login</h2>
		<form action="UserLogin10.php" method="post">
 			User name:<input type="text" name="user_username"><br>
			User password:<input type="password" name="user_password"><br>
			<input type="submit" class = "button" name="submit" value="Login">
		</form>

	</body>
</html>

<?php
    //reference from -->  https://makitweb.com/create-simple-login-page-with-php-and-mysql/
    if(isset($_POST['submit']))
    {

        $uname = mysqli_real_escape_string($conn, $_POST['user_username']);
        $password = mysqli_real_escape_string($conn, $_POST['user_password']);

        if ($uname != "" && $password != "")
        {

            $sql_query = "select count(*) as cntUser from user where username='".$uname."' and password='".$password."'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if($count > 0)
            {
                $_SESSION['uname'] = $uname;
                header('Location: main.php');
            }

            else
            {
                echo "Invalid username and password";
            }

        }

    }

?>