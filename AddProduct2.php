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

<!DOCTYPE html>
<html>
<head>
    <title>ADD PRODUCT</title>
    

</head>
<body>


<form name="" method="post" enctype="multipart/form-data" action="">

    <p>ID: <input type="text" name="product_id"></p>

    <p>Name: <input type="text" name="product_name"></p>

    <p>Price: <input type="number" name="product_price" step="any"></p>

    <p>Quantity: <input type="number" name="product_quantity"/></p>

    <label>Country: </label>
                        <select name="product_country">
                            <option value="Malaysia">Malaysia </option>
                            <option value="Japan">Japan </option>
                            <option value="China">China </option>
                            <option value="Indonesia">Indonesia </option>
                            <option value="Thailand">Thailand </option>
                            <option value="Others">Others</option>
                        </select>

    <br><br>

    <label>Flavor: </label>
                        <select name="product_flavor">
                            <option value="Sour">Sour</option>
                            <option value="Sweet">Sweet</option>
                            <option value="Bitter">Bitter</option>
                            <option value="Hot">Spicy/ hot</option>
                            <option value="Others">Others</option>
                        </select>
    
    <br><br>

    <label>Halal/ Non Halal Certifications</label>
    <br>
    <input type="radio" id="h" name="certification" value="Halal">
    <label for="h">Halal</label><br>
    <input type="radio" id="nh" name="certification" value="Non-Halal">
    <label for="nh">Non-Halal</label>

    <br><br>

    <label>Expiry Date: </label>
                        <select name="product_expiry">
                            <option value="0-3">0-3</option>
                            <option value="3-6">3-6</option>
                            <option value="6-12">6-12</option>
                            <option value="12-18">12-18</option>
                            <option value="More than 2 years">More than 2 years</option>
                        </select>
    <br>
    <br>

    <label>More Information: </label>
        <textarea name="product_info" rows="4" cols="50"></textarea>


   <p> Select image to upload:<input type="file" name="image"/></p>

    <input type="submit" name="submit" value="ADD PRODUCT"/>
</form>

</body>

</html>


<?php
include("DataConnection1.php");

error_reporting(E_ERROR | E_PARSE); // use for hide warning

    if(isset($_POST["submit"])) 
    {
        $sid = $_POST["product_id"];
        $sname = $_POST["product_name"];
        $sprice = $_POST["product_price"];
        $squantity = $_POST["product_quantity"];
        $scountry = $_POST["product_country"];
        $flavor = $_POST["product_flavor"];
        $certification = $_POST["certification"];
        $expiry = $_POST["product_expiry"];
        $sinfo = $_POST["product_info"];
        $check = getimagesize($_FILES["image"]["tmp_name"]); //image upload
        date_default_timezone_set("Asia/Kuala_Lumpur"); //set for malaysia time zone
        $dataTime = date("Y-m-d H:i:s");

        //print_r($_FILES);    <-- 可以用来check photo file的array
        


        if($check !== false)
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

                /*
                * Insert image data into database
                */
                
            // Check connection
            if($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = mysqli_query($conn,"SELECT * from productlist where s_id = '$sid'");
            $count = mysqli_num_rows($result);

            if ($count != 0)
            {
                ?>
                    <script>
                        alert("The product code is already in use. Please change.");
                    </script>
                <?php
            }

            else
            {
                $insert = $conn->query("INSERT INTO productlist (s_id, s_name, s_price, s_quantity, s_country, s_flavor, s_certification, s_expiry, s_info, image, created) VALUES ('$sid', '$sname', $sprice, $squantity, '$scountry','$flavor','$certification', '$expiry', '$sinfo', '$imgContent', '$dataTime')");
            }

                if($insert)
                {
                    echo "File uploaded successfully."; //暂时
                    print_r($_FILES);

                    ?>
                        <script type="text/javascript">
                            alert("File uploaded successfully, <?php echo "$sname saved."?>");
                        </script>
                    <?php
                }

                else
                {
                    ?>
                        <script>
                            alert("File upload failed, maybe file type not suitable, please try again.");
                        </script>
                    <?php
                    
                } 
        }

        else
        {
            ?>
                <script>
                    alert("Please select an image file to upload.");
                </script>
            <?php
        }

    }

?>
