<?php 
	include("DataConnection1.php"); 
	session_start();
    error_reporting(E_ERROR | E_PARSE); // use for hide warning
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
    <title>Product Details</title>
    <link rel="stylesheet" href="ProductDetails.css">

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

<div class="container search">
        <div class="row">
            <div class="col-md-12">

            <form action="" method="post" style="margin-top:80px ; padding: 30px">
                    <input name="searchbar" type="text" placeholder="Searching by name..." style="width:80%; margin:20px 0 20px 10%">
                    <input name="search" type="submit" value="Search" style="">
                    <input name="show" type="submit" value="Show All" style="">
                </form>

    <?php
    
    if(isset($_POST["search"]))
    {
        $search = $_POST["searchbar"];

        if($search == NULL)
        {
            ?>
                <script>
                    alert("Search cannot be NULL!");
                </script>
            <?php
        }

        else
        {
            $_SESSION["search"] = $search;
            header("Location: FunctionAdminSearchbarForm.php"); //这边自己改你要link的address
            ob_end_flush();
        }
    }

    if(isset($_POST["show"]))
    {
        unset($_SESSION["search"]);
        header("Location: FunctionAdminSearchbarForm.php");
    }    
    ?>
	<div class="table2">
                <table align="center" table border="1" width="750px">
                    <tr>
                        <th>PRODUCT ID</th>
                        <th>PRODUCT NAME</th>							
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>COUNTRY</th>
                        <th>FLAVOR</th>
                        <th>HALAL/ NON-HALAL</th>
                        <th>PRODUCTION DATE</th>
                        <th>EXPIRY DATE</th>
                        <th>INFORMATION</th>
                        <th>IMAGE</th>
                        <th colspan="2">Action</th>
                    </tr>
               </div>
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

<script type="text/javascript">

function confirmation()
{
	var txt;
	var r = confirm("ARE YOU SURE?");
	if(r == true)
	{alert("DELETE SUCCESSFUL");
	var col = document.getElementById("del");
	 col.deleteCell(-1);}
    
	else
	{alert("CANCELLED");}
}

</script>


<?php

	$s = $_SESSION["search"];

   $res = mysqli_query($conn,"SELECT * FROM productlist WHERE s_name LIKE '%$s%';");
   
   while($row = mysqli_fetch_array($res))
   {
    ?>		
                                        <?php //这行是给row column list的用法 ?>
        <tr>                        
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["s_name"]?></td>
            <td><?php echo $row["s_price"]?></td>
            <td><?php echo $row["s_quantity"]?></td>
            <td><?php echo $row["s_country"]?></td>
            <td><?php echo $row["s_flavor"]?></td>
            <td><?php echo $row["s_certification"]?></td>
            <td><?php echo $row["s_production"]?></td>
            <td><?php echo $row["s_expiry"]?></td>
            <td><?php echo $row["s_info"]?></td>
            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';?></td>

            <?php $getID = $row["s_id"]; ?>

            <td><a href="UpdateProduct5.php?mid=<?php echo $getID ?> ">Edit / Update</a></td>
            <td><a href="ProductDetails3.php?mid=<?php echo $getID ?>" onclick="return confirmation();">Delete</a></td>
        </tr>
	<?php
   } 


?>


<?php

if (isset($_GET["mid"])) 
{
	$delete = $_GET["mid"];

	mysqli_query($conn, "DELETE from productlist where s_id = '$delete' ");
	header("location:ProductDetails3.php");
}

?>