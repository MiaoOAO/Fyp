<?php 
	include("DataConnection1.php"); // database sql connection 

	session_start(); 

	if(isset($_POST["logout"]))
	{
	session_destroy();
	echo 'You have been logged out. <a href="UserLogin10.php">Go back</a>';
	}

?>

<!DOCTYPE html>

<html>


<head>
    <meta name=”viewport” content=”width=device-width, initial-scale=1″ />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 

    <!--Font Awesome SDN-->
    <script src="https://kit.fontawesome.com/5953284528.js" crossorigin="anonymous"></script>

    <!--Slick Slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <!--Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style,footer,header,navbar.css">
    <link rel="stylesheet" href="./css/allPages-style.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./css/contactus.css">

     <title>ABOUT US</title>
    <style>
        .carousel-item img{
            height:80vh;
        }
    </style>

<Main>

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
            <p>About Us</p>
    </div>

        <br><br>

    <div class="container">

           
            <section class="about">
            <h2><span>WHAT IS FUN_SNACKS?<br><br></span>
                THE</h2>
            <p>
                Online procurement service platform!<br>Collector variety of snacks and drinks from different countries for your to buy.
            </p>
            
            </section>

                <section class="card" data-aos="fade-right">
                    <img src="./assets/Quality_Assurance.png" alt="">
                    <div>
                        <h3>Quality Assurance</h3>
                        <p>We are selling authentic products and all the snacks and drinks we sell is through the public praise. Genuine guarantee, fake one lose four.</p>
                        <a href="product.php" class="btn">Shop Now</a>
                    </div>
                </section>

                <section class="card" data-aos="fade-left">
                    <img src="./assets/product-detail.jpg" alt="">
                    <div>
                        <h3>Product Details</h3>
                        <p>We are provide a complete detailed information of the product includes the production date, expiration date, country/region of production, flavor and product packaging size.</p>
                        <a href="product.php" class="btn">Shop Now</a>
                    </div>
                </section>

                <section class="card" data-aos="fade-right">
                    <img src="./assets/delivery.gif" alt="">
                    <div>
                        <h3>Delivery Services</h3>
                        <p>
                            You do not need to worry about issues such as driving to the supermarket, this is because our website has provided delivery service for your.
                        </p>
                        <a href="product.php" class="btn">Shop Now</a>
                    </div>
                </section>



                <section class="card" data-aos="fade-left">
                    <img src="./assets/Returns.jpg" alt="">
                    <div>
                        <h3>Product Returns</h3>
                        <p>We provide a 14 days product return policy. If the package was damaged during the express delivery process you can contact our customer service within 14 days. Need to comply with T&C.</p>
                        <a href="contact_us.php" class="btn">Contact Now</a>
                    </div>
                </section>



                <section class="card" data-aos="fade-right">
                    <img src="./assets/customer_service.gif" alt="">
                    <div>
                        <h3>Provide Advice</h3>
                        <p>Our products range from classic to popular, and there are local or overseas products from different countries. If you don’t know which snack is suitable for your taste, please contact us and we will advise you.</p>
                        <a href="contact_us.php" class="btn">Contact Now</a>
                    </div>
                </section>
</Main>

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