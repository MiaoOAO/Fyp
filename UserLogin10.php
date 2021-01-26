<?php include("DataConnection1.php");
session_start(); ?>

<html>
<head>

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


    </style>

    <title>Login in to User Page</title>


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
        <div class="container text-center text-md-left">
            <div class="row col-md-12">
                <h2>User Login</h2>
                    <form action="UserLogin10.php" method="post">
                        User name:<input type="text" name="user_username"><br>
                        User password:<input type="password" name="user_password"><br>
                        <input type="submit" class = "button" name="submit" value="Login">
                    </form>
            </div>
        </div>
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


 <!--JS (from bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                offset: 150,
                duration: 1000
            });
        </script>