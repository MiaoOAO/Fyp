<?php 
	include("DataConnection1.php"); // database sql connection 

	session_start(); 

	if(isset( $_SESSION [ 'uname' ]) && ! empty ( $_SESSION [ 'uname' ])) 
	{
		echo  "Status : Log \n Username: " . $_SESSION [ 'uname' ];
		
		$username = $_SESSION [ 'uname' ]; 
		$resultuserID = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
		$rowID = mysqli_fetch_array($resultuserID);
		$userID = $rowID["id"];

		$_SESSION['uid'] = $userID;

		
		?> <!-- Show logout button if user logging -->
			<form method="post" action="">
			<input type="submit" name="logout" value="logout"></input>
			</form>
		<?php
	} 

	else 
	{
		echo "You haven't login yet !";
		?>
            <br><a href='UserLogin10.php'>LOGIN</a>
        <?php
	} 


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
	<meta charset="utf-8">
	<title>Product information</title>
	<style>
	.button {
		background-color: #4CAF50;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		align-self:right;
		float: right;
	}
	.table{
	border-style:solid;
	border-color:#98bf21;
	align-self: center;
	align-items: center;
	width: "10%";
	}
	.body{font-family:Arial,Helvetica,sans-serif;font-size:20px;}
	a:link {color:#000000;}      /* 未访问链接*/
	a:visited {color:#4CAF50;}  /* 已访问链接 */
	a:hover {color:#4CAF50;}  /* 鼠标移动到链接上 */
	a:active {color:#0000FF;}  /* 鼠标点击时 */

	</style>
</head>
	<h2 align='center'>Welcome! You can buy your own product here.</h2>
<body class="body">
	<table border="1" class="table"  align='center'>
    	<tr>
        	<th align='center' width="10%">Product Name</th>
        	<th align='center' width="10%">Product Price</th>
        	<th align='center' width="10%">Product Inventory</th>
        	<th align='center' width="10%">Product Description</th>
        	<th align='center' width="10%">Product Image</th>
        	<th align='center' width="10%">Add to Cart</th>
    	</tr>
	
	<?php


		// Check connection
		if (mysqli_connect_errno()){
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}

		$sql = "SELECT * FROM productlist;";
		$result = mysqli_query($conn, $sql);//result is a PHP array

		$num_rows = mysqli_num_rows($result);
		//echo $num_rows;

        
        
		while ($row = mysqli_fetch_assoc($result)){
			$p_id = $row["id"];
			$p_name = $row["s_name"];
			$p_price = $row["s_price"];
            $p_inventory = $row["s_quantity"];
			$p_descr = $row["s_info"];

	/*		
			$select_sql = "SELECT p_inventory FROM stock_info WHERE p_id = ".$p_id.";";

			$select_result=mysqli_query($conn, $select_sql);
            $select_num_rows=mysqli_num_rows($result);
            
            if($select_num_rows)
            {
                while($select_rows = mysqli_fetch_array($select_result))
                {
					$p_inventory=$select_rows["s_quantity"];
				}
            }

            else
            {
				echo "not fetch";
			}
    */
			
			
			echo "<tr>";
			echo "<td align='center'>".$p_name."</td>";
			echo "<td align='center'>".$p_price."</td>";
			echo "<td align='center'>".$p_inventory."</td>";
			echo "<td align='center'>".$p_descr."</td>";
            echo '<td align="center">
            <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200">
            </td>';

            ?>
            <td><a align='center' href='UserAddProduct12(test).php?pid=<?php echo $p_id;?>'>View More</a></td>

            <?php

			echo "</tr>";
			
		}
		mysqli_close($conn);
    ?>
	</table>
	<br><br>
	<a  align='right' href='UserViewCart13(test).php?user=<?php echo $username ?>'>Enough adding, click here to shopcart.</a>
	<br><br><br>

</body>
</html>