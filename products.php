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
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
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
                    <a href="UserProductList11(test).php"><img src="./assets/7.jpg" class="d-block w-100 h-5" ></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assets/6.jpg" class="d-block w-100" >
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assets/8.jpg" class="d-block w-100" >
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
    <footer id="footer" class="page-footer font-small stylish-color-dark pt-4">
        <div class="container text-center text-md-left">
            <div class="row col-md-12">
                <div class="col-md-4 mx-auto">
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Logo(name)</h3>
                    <p>We are provide a variety of snacks and drinks from different countries for you to buy.<br><br>
                    MALAYSIA</p>
                </div>
                <!--<hr class="clearfix w-100 d-md-none">-->
                <div class="col-md-3 mx-auto">
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--<hr class="clearfix w-100 d-md-none">-->
                <div class="col-md-5 mx-auto">    
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Contact Us</h3>
                    <h6><i class="fas fa-map-marker-alt"></i> : ---
                    </h6>
                    <h6><i class="fas fa-phone"></i> : 03- ---- ----/012- --- ----</h6>
                    <h6><i class="far fa-envelope"></i> : <a
                            href="mailto:josephsim0501@gmail.com">---</a></h6><br>
                    <h3 class="font-weight-bold text-uppercase mt-3 mb-4">Business Hours</h3>
                    <h6> Monday - Friday : 10.00a.m. - 6.00p.m.<br>
                        Saturday : 10.00a.m. - 4.00p.m.<br>
                        Sunday & P.Holiday : Closed </h6>
                    <br>
                </div>
                <hr class="clearfix w-100 d-md-none">
            </div>
        </div>
        <!-- Social buttons -->
        <div class="social-btn">
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/cotton/64/000000/facebook.png" />
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/cotton/64/000000/twitter.png" />
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/cotton/64/000000/instagram-new.png" />
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <img src="https://img.icons8.com/doodle/48/000000/gmail.png" />
                    </a>
                </li>
            </ul>
        </div>
        <!-- Social buttons -->

</footer>


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
