<?php 
	include("BackendHeader.php"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Comatible" content="ie=edge">
    <title>FEATURES</title>

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Font Awesome SDN-->
    <script src="https://kit.fontawesome.com/5953284528.js" crossorigin="anonymous"></script>

    <!--Slick Slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!--Custom Stylesheet-->
    <link rel="stylesheet" href="./css/style,footer,header,navbar.css">
    <link rel="stylesheet" href="./css/allPages-style.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <style>
         
         .carousel-item img{
            height:80vh;
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

   

    <Main>

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
            <p>Features</p>
    </div>
        

        <header class="main-header">
            <h1><span>Key </span>
                Features</h1>
            <p>
                If you want to experience the feeling of going abroad during the pandemic.<br> You can try get local snacks from various countries.</p>
        </header>
    


        <main>
            <section id="one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center ct">
                            <h2>Products</h2>
                        </div>
                        <div class="col-md-4 up">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    </li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/8.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/9.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/8.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3>Our products are come from many country have<br> <span>MALAYSIA, CHINA, TAIWAN, JAPAN, KOREA,
                                    HONG KONG,
                                    , etc.,</span></h3>
                            <h3>
                                <ul><p><u>TYPE</u></P>
                                    <li>Potato chips</li>
                                    <li>Popcorn</li>
                                    <li>Soft drink</li>
                                    <li>Cookie</li>
                                    <li>Candy</li>
                                </ul>
                            </h3>
                            <a href="/products.html"><button type="button" class="btn btn-secondary button"><span> More
                                        Products
                                    </span></button></a>
                        </div>
                    </div>
                </div>

            </section>


            <br><br>

            <div class="container">
                <section class="card" data-aos="fade-left">
                    <img src="./assets/5.jpg " alt="">
                    <div>
                        <h3>Delivery Services</h3>
                        <p>
                        You do not need to worry about issues such as driving to the supermarket, this is because our website has provided delivery service for your.
                        </p>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </section>

                <section class="card" data-aos="fade-right">
                    <img src="./assets/0.jpg" alt="">
                    <div>
                        <h3>About Us</h3>
                        <p>
                        The online procurement service platform, collector variety of snacks and drinks from different countries for your to buy.
                        </p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </section>

                <section class="card" data-aos="fade-left">
                    <img src="./assets/2.jpg" alt="">
                    <div>
                        <h3>Contact Us</h3>
                        <p>
                            We provide 24/7 online help to answer your questions and technical assistance. Please feel free to contact us if you have any questions.
                        </p>
                        <a href="#" class="btn">Contact Now</a>
                    </div>
                </section>
            </div>
            <br><br><br><br><br>

            <section id="brands">
                <div class="container text-center">
                    <div class="col-md-12 text-center">

                        <h2>Brands We Sell</h2>
                    </div>
                    <div class="card-two">
                        <div class="logo">
                            <img src="/assets/logo-dupont.png" alt="">
                            <img src="/assets/logo-mercury.jpg" alt="">
                            <img src="/assets/logo-glasurit.gif" alt="">
                            <img src="/assets/logo-3m.png" alt="">
                            <img src="/assets/logo-alps.jpg" alt="">
                        </div>

                    </div>
                </div>
            </section>


        </Main>

        <!-- Footer -->
        <?php include("footer.php"); ?>

        <!--Bootstrap CDN-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
        <script src="./js/main.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"
            integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"
            integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script>

            
        <script src="./js/footer,header,navber.js"></script>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                offset: 150,
                duration: 1000
            });
        </script>

</body>

</html>