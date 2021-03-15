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
  <a href="AdminManageUsers.php">MANAGE USERS ACCOUNT</a> 
  <a href="AdminUpdateInfo7.2.php">UPDATE PROFILE</a>
</div>
	<div class="table ">
  <br>
	<table align="center" table border="1" width="750px">

	<tr>
        <th>USER ID</th>
        <th>USER NAME</th>							
        <th>PASSWORD</th>
        <th>EMAIL</th>
        <th>CONTACT NUMBER</th>
        <th>REGISTER DATE</th>
        <th>Action</th>
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

   $res = mysqli_query($conn,"select * from user");
   
   while($row = mysqli_fetch_array($res))
   {
    ?>		
                                        <?php //这行是给row column list的用法 ?>
                                        <tr>                        
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["username"]?></td>
            <td><?php echo $row["password"]?></td>
            <td><?php echo $row["email"]?></td>
            <td><?php echo $row["phone"]?></td>
            <td><?php echo $row["register_time"]?></td>
       
            <?php $getID = $row["id"]; ?>

            <td><a href="AdminManageUsers.php?mid=<?php echo $getID ?>" onclick="return confirmation();">Delete</a></td>
        </tr>
	<?php
   } 


?>


<?php

if (isset($_GET["mid"])) 
{
	$delete = $_GET["mid"];

	mysqli_query($conn, "DELETE from user where id = '$delete' ");
	header("location:AdminManageUsers.php");
}

?>