<?php include("DataConnection1.php"); ?>

<html>
<head>

</head>
<body>
		
		<h1>User Registration Page</h1>

        <form action="UserRegister9.php" method="post">
            Username: <input type="text" name="user_username"><br>
            password: <input type="password" name="user_password"><br>
            Confirm Admin Password: <input type="password" name="user_cfm_password"><br>
            Email: <input type="email" name="user_email"><br>
            Contact number:<input type="tel" name="user_phone" pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" placeholder = "eg:0123456789" ><br>
            <input type="submit" name="submit" value="CONFIRM">
	   </form>

	

</body>
</html>
    <h2>ghrthh hhe </h2>

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

