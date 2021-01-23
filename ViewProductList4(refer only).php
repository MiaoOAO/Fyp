<!DOCTYPE html>
<html>
<head>
    <title>ADD PRODUCT</title>
    
    <style>
        .ctn h1 {
            text-align: center;
        }
        
        .ctn ul li {
            border: 1px solid black;
            width: 450px;
            height: 450px;
            color: black;
            display: inline-block;
            margin: 50px;
        }
        
        .ctn ul li:hover {
            border: 6px solid orange;
            font-style: italic;
            text-decoration: underline;
            border-radius: 10px 10px;
        }
        
        .ctn ul li p button {
            margin-left: 280px;
        }
        
        .ctn ul li button:hover {
            background-color: pink;
            width: 60px;
            height: 20px;
            border-radius: 10px;
        }
        
        .ctn ul li img {
            width: 450px;
            height: 373px;
        }
        
        .ctn ul li p {
            font-weight: bold;
            text-align: center;
        }
        
        .ctn ul li img:hover {
            opacity: 0.5;
        }
        
        .ctn ul li:hover {
            background-color: black;
            color: white;
            font-weight: bold;
        }
    </style>

</head>

<body>
</body>

</html>


<?php

  include("DataConnection1.php");



   $res = mysqli_query($conn,"select * from productlist");
   
   while($row=mysqli_fetch_array($res))
   {
    ?>	

    <div class="ctn">               <?php //这行是给格子的用法 ?>
        <ul>
            <li>
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';?>
                <p><?php echo $row["s_name"]?><br><br>RM<?php echo $row["s_price"]?><button>VIEW</button></p>
            </li>
        </ul>
    </div>		
	<?php
   } 


?>
