<!DOCTYPE html>
<html>
<head>
    <title>ADD PRODUCT</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    .card-product {
        display: flex;
        flex-wrap: wrap;
        margin-left:13%;
        margin-right: 13%;
        left: 50%;
        right: 50%;
        text-align: center;


    }
    
    .ctn {
        background:rgb(248, 249, 249 );
        padding: 1%;
        
    }
    .btn{
        padding: 2%;
        flex-grow:1;
        flex-basis:16%;
        width: 250px;
        background:rgb(253, 237, 236 );
        border: 1px solid black;
        border-radius: 10px 10px;
    }

    .btn:hover{
        background-color: rgb(245, 183, 177);
        color: white;
        font-weight: bold;
        border: 1px solid orange;
        font-style: italic;   
    }

    .ctn h5 {
        text-align: center;
        height:50px;
    }
    .ctn h6 {
        text-align: center;
        color:red;
    }

    .product-image{
        max-width: 100%;

    }

    .product-info{
        margin-top: auto;
    }

    .product-recommend{
            width:100%;
            height:400px;
            margin-top:200px;
            margin-bottom: 100px;
            border: 1px solid black;
            position:static;
    }

    .product-recommend h2{
        margin-top:10px;
    }

    .box-one{
        position: absolute;
        left: 38%;
        top: 70px;
        color:black ;
        background-color:red ;
    }

    .box-two{
        position: absolute;
        left: 20%;
        top:110px;
    }

    .box-three{
        position: absolute;
        left: 61%;
        top:150px;
    }

    .box-one img{
        
        width:250px;
        height:250px;
    }
    .box-two img{
       
        width:200px;
        height:200px;
    }

    .box-three img{
        
        width:150px;
        height:150px;
        
    }



    

    @media only screen and (min-width: 200px) and (max-width: 800px){
    .card-product {
        flex: 1 21%;
        margin-left:50px;
        margin-right: 50px;

    }

    }

    @media (max-width: 920px) {
    .product-card {
        flex: 1 21%;
        margin-left:130px;
        margin-right: 1px;
    }
    }

    @media (max-width: 600px) {
    .product-card {
        flex: 1 46%;
        margin-left:150px;
        margin-right: 150px;
    }
    }
    </style>

</head>

<body>
    <br><br><br><br><br><br>
    <br><br><br>
    <div class="product-recommend">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Best Sellers</h2>
                        <div class="box-one">
                            <img src="assets/7.jpg">
                            <h3>TOP 1</h3>
                        </div>
                        <div class="box-two">
                            <img src="assets/5.jpg" >
                            <h3>TOP 2</h3>
                        </div>
                        <div class="box-three">
                            <img src="assets/6.jpg" >
                            <h3>TOP 3</h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

    <div class ="card-product">
                   
                    <?php                     

                    include("DataConnection1.php");

                    $res = mysqli_query($conn,"select * from productlist");
                    
                    while($row=mysqli_fetch_array($res))
                    {
                        ?>	
                    
                        <div class="ctn">               <?php //这行是给格子的用法 ?>
                            <button type="button" class="btn" onclick="location.href='UserAddProduct12(test).php?pid=<?php echo $p_id;?>'">
                                <div class="product-image text-center">
                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';?>
                                </div>
                                <div class="product-info">
                                    <h5><?php echo $row["s_name"]?></h5>
                                    <h6>RM<?php echo $row["s_price"]?></h6>
                                </div>
                            </button> 
                        </div>		
                        <?php
                    } 
                    ?>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>