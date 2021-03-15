<?php 
	include("DataConnection1.php"); 
	session_start();

	if(isset( $_SESSION [ 'aname' ]) && ! empty ( $_SESSION [ 'aname' ])) 
	{
    ?> 
    <div style="background-color: rgba(201, 76, 76, 0.3); border:3px solid black; font-size:30px;text-align: center; padding:10px; position:fixed;width:100%; z-index:999">
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
    <title>ADD PRODUCT</title>
    <link rel="stylesheet" href="AddProduct.css">

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br><br><br><br>
                <div class="center">
               
                <form name="" method="post" enctype="multipart/form-data" action="">

                    <p>ID: <input type="text" name="product_id"></p>

                    <p>Name: <input type="text" name="product_name"></p>

                    <p>Price: <input type="number" name="product_price" step="any"></p>

                    <p>Quantity: <input type="number" name="product_quantity"/></p>

                    <p>Country: 
                                <select name="product_country">
                                    <option value="Malaysia">Malaysia </option>
                                    <option value="Japan">Japan </option>
                                    <option value="China">China </option>
                                    <option value="Indonesia">Indonesia </option>
                                    <option value="Thailand">Thailand </option>
                                    <option value="Others">Others</option>
                                </select>
                    </p>

                    <p>Flavor: 
                                <select name="product_flavor">
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
                    <input type="date" name="production_date">
                    </p>

                    <p>Expiry Date: 
                                <select name="product_expiry">
                                    <option value="0-3">0-3</option>
                                    <option value="3-6">3-6</option>
                                    <option value="6-12">6-12</option>
                                    <option value="12-18">12-18</option>
                                    <option value="More than 2 years">More than 2 years</option>
                                </select>
                    </p>


                    <p>More Information: 
                    <br>
                        <textarea name="product_info" rows="4" cols="50"></textarea>
                    </p>

                    <p> Select image to upload:<input type="file" name="image"/></p>

                    <input type="submit" name="submit" value="ADD PRODUCT"/>
                </form>
            </div>
              <br><br><br>         
            </div>              
        </div>
    </div> 
</body>

</html>
<!--Bootstrap CDN-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>


<?php

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
        $production = $_POST["production_date"];
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
                $insert = $conn->query("INSERT INTO productlist (s_id, s_name, s_price, s_quantity, s_country, s_flavor, s_certification, s_production, s_expiry, s_info, image, created) VALUES ('$sid', '$sname', $sprice, $squantity, '$scountry','$flavor','$certification','$production', '$expiry', '$sinfo', '$imgContent', '$dataTime')");
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
