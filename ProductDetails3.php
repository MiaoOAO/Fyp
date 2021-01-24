<?php 
	include("DataConnection1.php"); 
	session_start();

	if(isset( $_SESSION [ 'aname' ]) && ! empty ( $_SESSION [ 'aname' ])) 
	{
    ?> 
    <div style="background-color: rgba(201, 76, 76, 0.3); border:3px solid black; font-size:30px; padding:10px">
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
</head>
<body>
<div class="sidebar">
<h1>ADMIN ACTION</h1>
  <a href="AdminAction7.1.php">MAIN MENU</a>

  <a href="AddProduct2.php">INSERT NEW PRODUCT</a>
  <a href="ProductDetails3.php">PRODUCTS LIST</a>
  <a href="FunctionAdminSearchbarForm.php">SEARCH PRODUCTS BY NAME</a>
  <a href="AdminUpdateInfo7.2.php">UPDATE PROFILE</a>
</div>
	<div class="table ">
  
	<table align="center" table border="1" width="750px">

			<tr>
      <th>PRODUCT ID</th>
				<th>PRODUCT NAME</th>							
				<th>PRICE</th>
				<th>QUANTITY</th>
        <th>COUNTRY</th>
        <th>FLAVOR</th>
        <th>HALAL/ NON-HALAL</th>
        <th>EXPIRY DATE</th>
        <th>INFORMATION</th>
				<th>IMAGE</th>
        <th colspan="2">Action</th>
			</tr>
</div>
</body>

</html>

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

   include("DataConnection1.php"); 

   $res = mysqli_query($conn,"select * from productlist");
   
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