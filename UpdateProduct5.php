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
        <?php

		   if(isset($_GET["mid"]))
			{
			$pcode = $_GET["mid"];

			$result = mysqli_query($conn, "SELECT * FROM productlist WHERE s_id = '$pcode' ");
			$row = mysqli_fetch_assoc($result);
			}
	    ?>


		
		<h1>Update Product Detail</h1>

		<form name="updatefrm" method="post" enctype="multipart/form-data" action="">

			<p>ID: <input type="text" name="product_id" value="<?php echo $row["s_id"]; ?>"  disabled>

			<p>Name: <input type="text" name="product_name" value="<?php echo $row["s_name"];  ?>">

			<p>Price: <input type="number" name="product_price" step="any" value="<?php echo $row["s_price"]; ?>"></p>

			<p>Quantity: <input type="number" name="product_quantity" value="<?php echo $row["s_quantity"]; ?>"/></p>

            <label>Country: </label>
                        <select name="product_country">
                            <option value="<?php echo $row["s_country"]; ?>"><?php echo $row["s_country"]; ?></option>
                            <option value="Malaysia">Malaysia </option>
                            <option value="Japan">Japan </option>
                            <option value="China">China </option>
                            <option value="Indonesia">Indonesia </option>
                            <option value="Thailand">Thailand </option>
                            <option value="Others">Others</option>
                        </select>
    
    <br>

            <p>Flavor: 
                        <select name="product_flavor">
                            <option value="<?php echo $row["s_flavor"]; ?>"><?php echo $row["s_flavor"]; ?></option>
                            <option value="Sour">Sour</option>
                            <option value="Sweet">Sweet</option>
                            <option value="Bitter">Bitter</option>
                            <option value="Hot">Spicy/ hot</option>
                            <option value="Others">Others</option>
                        </select>
            </p>

            <p>Halal/ Non Halal Certifications
            <br>
            <input type="radio" id="h" name="certification" value="Halal">
            <label for="h">Halal</label><br>
            <input type="radio" id="nh" name="certification" value="Non-Halal">
            <label for="nh">Non-Halal</label>
            </p>

            <p>Production Date:
            <input type="date" name="production_date" value="<?php echo $row["s_production"]; ?>">
            </p>

            <p>Expiry Date: 
                        <select name="product_expiry">
                            <option value="<?php echo $row["s_expiry"]; ?>"><?php echo $row["s_expiry"]; ?></option>
                            <option value="0-3">0-3</option>
                            <option value="3-6">3-6</option>
                            <option value="6-12">6-12</option>
                            <option value="12-18">12-18</option>
                            <option value="More than 2 years">More than 2 years</option>
                        </select>
            </p>

            <label>More Information: </label>
            <textarea name="product_info" rows="4" cols="50"><?php echo $row["s_info"]; ?></textarea>

            <p> Select image to upload:
            
            <input type="file" name="image"></p>
					
			<p><input type="submit" name="savebtn" value="Update Product">

		</form>
	

</body>
</html>

    <?php

        if (isset($_POST["savebtn"])) 	
        {
            $sname = $_POST["product_name"];
            $sprice = $_POST["product_price"];
            $squantity = $_POST["product_quantity"];
            $scountry = $_POST["product_country"];
            $sinfo = $_POST["product_info"];
            $check = getimagesize($_FILES["image"]["tmp_name"]); //image upload
            date_default_timezone_set("Asia/Kuala_Lumpur"); //set for malaysia time zone
            $dataTime = date("Y-m-d H:i:s");

            if($check !== false)
            {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
    
                $sql = "UPDATE productlist SET s_name = '$sname', s_price = '$sprice', s_quantity = $squantity, s_country = '$scountry', s_info = '$sinfo', image = '$imgContent' WHERE s_id = '$pcode' ";

    
                    if(mysqli_query($conn, $sql))
                    {
                        ?>
                            <script type="text/javascript">
                                alert("File updated successfully.");
                            </script>
                        <?php

                        header("location:ProductDetails3.php"); //redirect user back to productlist.php
                    }
    
                    else
                    {
                        ?>
                            <script>
                                alert("File upload failed, please try again.");
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


    