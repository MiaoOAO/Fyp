<!DOCTYPE html>

<?php 
	include("BackendHeader.php"); 
?>

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

    <style>


    </style>
</head>

    <!--JS (from bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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
                    <a href="UserProductList11(test).php"><img src="./assets/7.jpg" class="d-block w-100" ></a>
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

<div id="q"class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center text-dark" style="border: 1px solid black;" data-aos="fade-up"data-aos-anchor-placement="top-center">
        
        <div id="headline">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Punny headline</h1>
                <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
                <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
        </div>

        <div class="product-device product-device-2 shadow-sm d-none d-md-block"><img src="https://www.pngkey.com/png/full/702-7024199_doughnut-clipart-food-snack-fast-food-cartoon.png" class="d-block w-100"><img src="https://library.kissclipart.com/20180829/aew/kissclipart-snack-icon-png-clipart-french-fries-potato-chip-sn-1d85cee61ec0ec14.png"
                class="d-block w-100"></div>
        <div class="product-device product-device-1 shadow-sm d-none d-md-block"><img src="https://www.pngkey.com/png/full/702-7024199_doughnut-clipart-food-snack-fast-food-cartoon.png" class="d-block w-100"><img src="https://library.kissclipart.com/20180829/aew/kissclipart-snack-icon-png-clipart-french-fries-potato-chip-sn-1d85cee61ec0ec14.png"
                class="d-block w-100"></div>
    </div>
    
    <div id="four-part" class="container text-center text-md-left " data-ride="carousel">
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
            <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" style="background-color:coral" data-aos="fade-down-right" >

                <div class="my-3 py-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-light shadow-sm mx-auto" style="width: 90%; height: 300px; border-radius: 21px 21px 0 0;"><a href="#" target="_blank"><img src="https://www.jing.fm/clipimg/full/55-555204_country-clipart-international-flag-all-countries-flag-png.png"class="d-block w-100 h-100" style= "background-size: cover;" >></a></div>
            </div>

            <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" style="background-color:mediumseagreen" data-aos="fade-down-left">
                <div class="my-3 p-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-dark shadow-sm mx-auto" style="width: 90%; height: 300px; border-radius: 21px 21px 0 0;"><a href="#" target="_blank"><img src="https://thumbor.thedailymeal.com/psZG-7YiSzXxVgLPYReCDSOcagM=/870x565/https://www.thedailymeal.com/sites/default/files/slideshows/1708012/2085079/iStock-458463905.jpg" class="d-block w-100 h-100" style= "background-size: cover;"></a>
                </div>
            </div>
        </div>
    
    
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">

            <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" style="background-color:darkturquoise" data-aos="fade-up-right">
                <div class="my-3 p-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-dark shadow-sm mx-auto" style=" width: 90%; height: 300px;border-radius: 21px 21px 0 0;"><a href="#" target="_blank"><img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/wh-snacks-week-snack-roundup-1571260658.jpg" class="d-block w-100 h-100" style= "background-size: cover;"></a>
                </div>
            </div>

            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" data-aos="fade-up-left">
                <div class="my-3 py-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-light shadow-sm mx-auto" style="width: 90%; height: 300px; border-radius: 21px 21px 0 0;"><a href="#" target="_blank"><img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/wh-snacks-week-snack-roundup-1571260658.jpg" class="d-block w-100 h-100" style= "background-size: cover;"></a></div>
            </div>
        </div>
    </div>
    </div>

<section class="c ">
     <img src="assets/7.jpg" style="width:100%; height:100%;">
</section>

<section class="contact">
            <h2><span>LOOKING FOR A SNACKS?<br><br></span>
                WE</h2>
            <p>
                Don't know which one to choose?<br>Please feel free to contact us to get more new products information
            </p>
            <a href="#"><button type="button" class="btn btn-secondary button"><span>Contact Us
                    </span></button></a>


</section>

<!-- Footer -->
<?php include("footer.php"); ?>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                offset: 150,
                duration: 1000
            });
        </script>
