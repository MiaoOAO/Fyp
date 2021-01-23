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

	<?php //Get the product id from UserProductList11.php
		if(isset($_GET["pid"]))
		{
			$pid = $_GET["pid"];

			$result = mysqli_query($conn, "SELECT * FROM productlist WHERE id = '$pid' ");
			$row = mysqli_fetch_array($result);
		}
	?>


<html>
	<head></head>

	<body>
		<h1>Product Detail</h1>

	<!-- 
		<?php //(不能run, 之后再看) echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>'?>
	-->
		<br>Product Name : <?php echo $row["s_name"] ?>
		<br>Product Price : <?php echo $row["s_price"]  ?>
		<br>Product Stock : <?php echo $row["s_quantity"] ?>
		<br>Origin : <?php echo $row["s_country"] ?>
		<br>Information : <?php echo $row["s_info"] ?>
			

		<h1>Your Order Detail</h1>

		<form name="" method="post" action="" enctype="multipart/form-data">
			<p>Quantity:<input type="text" name="user_qty"></p>
			<p><input type="submit" name="orderbtn" value="Add to Cart">
		</form>

        <div id="commentBox" style="height:auto; border:1px solid black; margin:20px">
            <h2>Comment</h2>

            <div id="commentBoxInside" style="margin:5px">
                <?php
                    $sql = "SELECT * FROM comment WHERE p_id = $pid;";
                    $result = mysqli_query($conn, $sql);//result is a PHP array

                    $num_rows = mysqli_num_rows($result);
                    //echo $num_rows;

                    
                    
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $comment_userid = $row["user_id"];
                        $com = $row["comment"];
                        $t = $row["time"];
                        ?>
                            <div style="border:1px solid black; padding:5px; margin:5px; height:150px">
                            <h4>    <?php echo $comment_userid; ?> </h4>
                                <?php echo $com; ?>
                            </div>
                        <?php
                    }
                ?>
            </div>

            <br><hr>

            <form name="" method="post" action="" enctype="multipart/form-data" style="margin:5px">
                <textarea rows="4" cols="50" name="comment" style="width:100%; padding:10px; font-size:25px"></textarea>
                <p><input type="submit" name="submitCom" value="Add Comment" style="float:right">
            </form>
            <br><br>
        </div>


	</body>
</html>

<?php

	if(isset($_POST["orderbtn"])) 	
	{
		$pid = $row["id"];
		$userid = $userID;
		$cqty = $_POST["user_qty"];  

		$balance = $row["s_quantity"] - $cqty; //$balance = total product qty in stock - user enter qty 


		if($balance >= 0) // True, if product stocks enough
		{
			$conn->query("INSERT INTO usercart (product_id, user_id, qty) VALUES ('$pid', '$userid', '$cqty')");
			
			//$cartArray = array($pid, $userid, $cqty);
			//$_SESSION['shop-cart'] = $cartArray;
			
			header("Location:UserViewCart13(test).php");

			//之后才需要, after payment needed this line
			//mysqli_query($conn, "UPDATE product SET product_stock= $balance where product_code = '$pid'");// update product table	
		}

		else // False, if product stocks not enough
		{
			?>
				<script>
				alert("Your quantity is more than the stock that we have. Please change.");
				</script>
			<?php	
		}
		
    }
    
    if(isset($_POST["submitCom"])) 	
	{
        $comment = $_POST["comment"];
        $userid = $userID;

        if($comment == NULL)
        {
            ?>
                <script>
                    alert("Comment cannot be null ! ");
                </script>
            <?php
        }

        else
        {
            if($userID == NULL)
            {
                ?>
                    <script>
                        alert("If you want to leave a comment. Please Login or register as a member, thank you.");
                    </script>
                <?php
            }
    
            else
            {
                $conn->query("INSERT INTO comment (user_id, p_id, comment) VALUES ('$username', '$pid', '$comment')");

                ?>
                    <script>
                        alert("Thanks for your feedback. Comment was uploaded, please refreah the page manually.");
                    </script>
                <?php
            }
        }

    }

?>