<?php include("DataConnection1.php"); ?>

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
        input[type=submit]{
            background-color:var(--btn-red);
		    color:var(--q);
		    padding: 12px 20px;
		    border-radius: 4px;
		    width: 100%;
            border-radius: 21px;
            margin-bottom:15px;
        }

        .register h1{
            text-align: center;
            color:var(--title-red);
            margin-bottom:20px;
            
        }

        .register:hover{
        background-color: rgb(254, 242, 242 ,0.3);
        
        }

        .register{
        background-color: rgb(33, 47, 60 ,0.1);
        border-radius: 21px;
    
        }

        label{
            color:var(--title-dark);
            font-size: 20px;
        }

        .link{
            text-align: center;
        }
        .invalid-feedback{
            font-size: 15px;
        }

    </style>

</head>

    <!-- background image -->
    <div class="bg-image">
        <img src="./assets/9.jpg" alt="">
    </div>  

   <!-- icon bar-->
    <div class="icon-bar">
        <a href="https://www.facebook.com/FunSnack-116986147094140/?ref=page_internal" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="mailto:wearefunsnacks@gmail.com" target="_blank" class="youtube"><i class="fa fa-envelope"></i></a>
        <a href="https://www.instagram.com/wearefunsnacks/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
    </div>

    <!-- up button-->
    <div class="up" style="position: fixed; bottom: 0; right: 0; z-index: 1;">
        <a href="#"><img src="https://img.icons8.com/clouds/100/000000/up.png"></a>
    </div>

    <title>Registration User Account</title>

<!-- header -->
    <?php include("header.php"); ?>


<body>

    <br><br>
    <br><br>
    <br><br>
		
	<div class="container text-center text-md-left">
        <div class="row col-md-12">
            <div class="col-md-6  p-lg-5 mx-auto my-4 register" data-aos="fade-left">

		    <h1>User Registration</h1>

            <form action="UserRegister9.php" method="post">
                    <div class="form-group">
                        <label >Username</label>
                        <input type="text" name="user_username" class="form-control"  placeholder="Enter a user name..." required>
                    </div>

                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" name="user_password" class="form-control"  placeholder="Enter your password..."  required>
                    </div>
                    <div class="form-group">
                        <label >Confirm Password</label>
                        <input type="password" name="user_cfm_password" class="form-control"  placeholder="Enter your password again..."  required>
                    </div>

                    <div class="form-group">
                        <label >Email address</label>
                        <input type="email" name="user_email" class="form-control" placeholder="Enter your email address..."  required>
                    </div>

                    <div class="form-group">
                        <label > Contact Number</label>
                        <input type="tel" name="user_phone" class="form-control"  pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" placeholder="eg:0123456789"  required>
                    </div>


                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input is-invalid" type="checkbox" required>
                        <label class="form-check-label" for="invalidCheck3">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                        </div>
                    </div>
                <input type="submit" name="submit" value="CONFIRM">
                    <div class="link">
                        <label >Already have an account ? <a href="UserLogin10.php">Sign in</a>.</label>
                    </div>
            </form>
        </div>
    </div>      

	
</body>
</html>
    

    <?php

        if(isset($_POST["submit"])) 	
        {
            $uusername = $_POST["user_username"];
            $upassword = $_POST["user_password"];
            $ucfmpassword = $_POST["user_cfm_password"];
            $uemail = $_POST["user_email"];
            $uphone = $_POST["user_phone"];
            date_default_timezone_set("Asia/Kuala_Lumpur"); //set for malaysia time zone
            $dataTime = date("Y-m-d H:i:s");

            if($upassword != $ucfmpassword)
                {
                    ?>
                    <script>
                        alert("Password are not same, please try again!!");
                    </script>
                    <?php
                }

            else if($uusername == null || $upassword == null)
            {
                ?>
                <script>
                    alert("Please fill in full infomation!!");
                </script>
                <?php
            }

            else
            {
                $result = mysqli_query($conn, "SELECT * from user where username = '$uusername' ");
                $count = mysqli_num_rows($result);
    
                if($count != 0)
                {
                    ?>
                    <script>
                        alert("This username has been used, please try other.");
                    </script>
                    <?php
                }
        
                else
                {
                    $sql = "INSERT INTO user (username, password, email, phone, register_time) VALUES ('$uusername', '$upassword', '$uemail', '$uphone', '$dataTime');";
                    mysqli_query($conn, $sql)
    
                    ?>
                        <script>
                            alert("Your has been successful register as user.");
                        </script>
                    <?php

                    header("Location: UserLogin10.php");
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

