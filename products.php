<!DOCTYPE html>

<?php 
    include("BackendHeader.php"); 
?>

<html>
<head>
    <title>PRODUCT</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <meta name=”viewport” content=”width=device-width, initial-scale=1″ />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <!--Font Awesome SDN-->
    <script src="https://kit.fontawesome.com/5953284528.js" crossorigin="anonymous"></script>

    <!--Slick Slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- -->
    <link rel="stylesheet" href="./css/style,footer,header,navbar.css">
    <link rel="stylesheet" href="./css/allPages-style.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>

        .carousel-item img{
            height:80vh;
        }
        
        .search{
            margin-bottom:30px;
        }

        .search input[name="search"]{
            background-color:var(--btn-red);
		    color:var(--q);
		    padding: 12px 20px;
		    border-radius: 4px;
            border-radius: 21px;
        }

        .search input[name="show"]{
            background-color:var(--title-red);
		    color:var(--q);
		    padding: 12px 20px;
		    border-radius: 4px;
            border-radius: 21px;
        }
        .search input[name="searchbar"]{
            background-color:var(--title-light);
		    color:var(--title-dark);
		    padding: 12px 20px;
		    border-radius: 4px;
            border-radius: 21px;
        }
    </style>

</head>

    
<body>
    
    <!-- background image -->
    <div class="bg-image">
        <img src="./assets/9.jpg" alt="">
    </div>  

    <!-- icon bar-->
    <div class="icon-bar">
        <a href="https://www.facebook.com/FunSnack-116986147094140/?ref=page_internal" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="mailto:wearefunsnacks@gmail.com" target="_blank" class="youtube"><i class="fa fa-envelope"></i></a>
        <a href="https://www.instagram.com/wearefunsnacks/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
    </div>

    <!-- up button-->
    <div class="up" style="position: fixed; bottom: 0; right: 0; z-index: 1;">
        <a href="#"><img src="https://img.icons8.com/clouds/100/000000/up.png"></a>
    </div>


<!-- header -->
<?php include("header.php"); ?>


    <div id="AllcarouselExampleCaptions">
        
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="products.php"><img src="./assets/slide-2.jpg" class="d-block w-100" ></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Snacks and Drinks?</h5>
                        <p>Collect from different countries to you choice.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href="features.php"><img src="./assets/slide-3.png" class="d-block w-100" ></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>What About Us?</h5>
                        <p>A Online Procurement Service Platform.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href="about-us.php"><img src="./assets/slide-5.jpg" class="d-block w-100" ></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Features?</h5>
                        <p>Product come from MALAYSIA, CHINA, TAIWAN, JAPAN, KOREA, HONG KONG, etc</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="page-title">
            <p>Product</p>
    </div>
 
    <div class="product-recommend">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Recommend</h2>
                    <br>
                        <div class="box-one">
                            <img src="assets/product/Crab_Chips_KOREAN.jpg">
                            <h3>TOP 1</h3>
                        </div>
                        <div class="box-two">
                            <img src="assets/product/Lay'sBBQ_MALAYSIA.jpg" >
                            <h3>TOP 2</h3>
                        </div>
                        <div class="box-three">
                            <img src="assets/product/muji_chocolate_strawberries_japan.jpg" >
                            <h3>TOP 3</h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search bar -->
        <div class="search">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <form action="" method="post">
                            <input name="searchbar" type="search" placeholder="Searching by name...">
                            <input name="search" type="submit" value="Search">
                            <input name="show" type="submit" value="Show All">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- search bar -->

    <!-- -------------------Search bar 从这行开始------------------ -->

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
            header("Location: products.php"); //这边自己改你要link的address
            ob_end_flush();
        }
    }

    if(isset($_POST["show"]))
    {
        unset($_SESSION["search"]);
        header("Location: products.php");
    }    
    ?>
    <!-- --------------------------------------------------------------- -->

</body>

</html>

    <div class ="card-product">
                <?php  
                /*
                    if(isset($_POST["search"]))
                    {
                        $s = $_SESSION["search"];
                        $res = mysqli_query($conn,"SELECT * FROM productlist WHERE s_name LIKE '%$s%';");
                    }

                    else if(isset($_POST["show"]))
                    {
                        $res = mysqli_query($conn,"select * from productlist");
                    }

                    else
                    {
                        $res = mysqli_query($conn,"select * from productlist");
                    }
                */
                
                $s = $_SESSION["search"];
                $res = mysqli_query($conn,"SELECT * FROM productlist WHERE s_name LIKE '%$s%';");

                    while($row=mysqli_fetch_array($res))
                    {
                        $p_id = $row["id"];
                        ?>	
                
                        <div class="ctn">               <?php //这行是给格子的用法 ?>
                        <a href='UserAddProduct12(test).php?pid=<?php echo $p_id;?>'>
                            <button type="button" class="btn" onclick="/* href='UserProductDetail.php?pid=<?php echo $p_id;?>'*/ ">
                                <div class="product-image text-center">
                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';?>
                                </div>
                                <div class="product-info">
                                    <h5><?php echo $row["s_name"]?></h5>
                                    <h6>RM<?php echo $row["s_price"]?></h6>
                                </div>
                            </button> 
                        </a>
                        </div>		
                        <?php
                    } 

                    if($p_id == NULL)
                    {
                        echo "SORRY, PRODUCT CANNOT FOUND!";
                    }
                
                ?>
    </div>
<br><br><br><br><br><br>

    <!-- Footer -->
    <?php include("footer.php"); ?>


<!--JS (from bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                offset: 150,
                duration: 1000
            });
        </script>
