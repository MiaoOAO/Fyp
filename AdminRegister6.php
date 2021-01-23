<?php include("DataConnection1.php"); ?>

<html>
<head>

</head>
<body>
		
		<h1>Admin Registration Page</h1>

        <form action="AdminRegister6.php" method="post">
            Username: <input type="text" name="admin_username"><br>
            password: <input type="password" name="admin_password"><br>
            Confirm Admin Password: <input type="password" name="admin_cfm_password"><br>
            Email: <input type="email" name="admin_email"><br>
            <input type="submit" name="submit" value="CONFIRM">
	   </form>

	

</body>
</html>

    <?php

        if (isset($_POST["submit"])) 	
        {
            $ausername = $_POST["admin_username"];
            $apassword = $_POST["admin_password"];
            $acfmpassword = $_POST["admin_cfm_password"];
            $aemail = $_POST["admin_email"];
            date_default_timezone_set("Asia/Kuala_Lumpur"); //set for malaysia time zone
            $dataTime = date("Y-m-d H:i:s");

            if($apassword != $acfmpassword)
                {
                    ?>
                    <script>
                        alert("Password are not same, please try again!!");
                    </script>
                   <?php
                }

            else if($ausername == null || $apassword == null)
            {
                ?>
                <script>
                    alert("Please fill in full infomation!!");
                </script>
                <?php
            }

            else
            {
                $result = mysqli_query($conn,"SELECT * from admin where username = '$ausername' ");
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
                    $sql = "INSERT INTO admin (username, password, email, register_time) VALUES ('$ausername', '$apassword', '$aemail', '$dataTime');";
                    mysqli_query($conn, $sql)
    
                    ?>
                        <script>
                            alert("Your has been successful register as admin user.");
                        </script>
                    <?php
                        
                        header("Location: AdminLogin7.php");
                }
            }

            
        }

