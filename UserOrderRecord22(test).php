<?php 
	include("DataConnection1.php"); 
	session_start();

	if(isset( $_SESSION [ 'uname' ]) && ! empty ( $_SESSION [ 'uname' ])) 
	{
		echo  "Status : Log \n Username: " . $_SESSION [ 'uname' ];
		
		$username = $_SESSION [ 'uname' ]; 
		$resultuserID = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
		$rowID = mysqli_fetch_array($resultuserID);
		$userID = $rowID["id"];

		$_SESSION['uid'] = $userID;
	} 

	else 
	{
		echo  "你还没有登录，<a href='UserLogin10.php'>请登录</a>" ;
		header("Location: UserLogin10.php");
	} 

?>

	<form method="post" action="">
	<input type="submit" name="logout" value="logout"></input>
	</form>

<?php

	if(isset($_POST["logout"]))
	{
	session_destroy();
	echo 'You have been logged out. <a href="UserLogin10.php">Go back</a>';
	}

?>

<!-------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>
<head>
	<title>Order Record</title>
</head>
<body>
	<?php
    $sqlRecord = "SELECT * FROM orderdetailrecord_info WHERE u_id = $userID";
    $connectRecord = mysqli_query($conn, $sqlRecord);
    

    ?>
    <table border='1'>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Order ID</th>
        </tr>
   
    <?php
        while($rowRecord = mysqli_fetch_array($connectRecord))
        {
            $getProductlistID = $rowRecord['p_id'];

            $sqlProductlist = "SELECT * FROM productlist WHERE id = $getProductlistID";
            $connectProductlist = mysqli_query($conn, $sqlProductlist);
            $rowProductlist = mysqli_fetch_array($connectProductlist);
            
            echo "<tr>";
            echo "<td>".$rowProductlist['s_name']."</td>";
            echo "<td> RM ".$rowProductlist['s_price']."</td>";
            echo "<td>".$rowRecord['p_num']."</td>";
            echo "<td>".$rowRecord['o_id']."</td>";
            echo "</tr>";
        }

    ?>
    

    </table>
    <?php


		?>
	</body>
	</html>