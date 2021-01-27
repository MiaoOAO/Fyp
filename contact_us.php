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

    <style>
    </style>

<Main>

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

     <div class="page-title">
            <p>Contact Us</p>
    </div>

        <br><br>
    <section id="contact" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="/assets/4.jpg" alt="out">
                </div>
                <div class="col-md-6 text-left">
                    <h3>WAH HIN PAINT SDN BHD</h3>
                    <p>(905172D)</p>
                    <p>72, JALAN UTAMA 2/12,TAMAN PERINDUSTRIAN PUCHONG UTAMA,47100 PUCHONG, SELANGOR.</p>

                    <h4>OFFICE No:</h4>
                    <p>03-8051 4888/012-455 6376</p>

                    <h4>FAX No :</h4>
                    <p>03-8051 4888</p>

                    <h4>EMAIL :</h4>
                    <p>wahhinpaint@gmail.com</p>

                    <h4>Business Hours:</h4>
                    <p>Monday - Friday : 9.30a.m. - 6.00p.m.</p>
                    <p> Saturday : 9.30a.m. - 4.00p.m.</p>
                    <p>Sunday & P.Holiday : Closed</p>
                </div>
            </div>
        </section>
        <br>
        <div class="title-map" data-aos="flip-up">
            <h3>MAP</h3>
        </div>
        <div class="location" data-aos="fade-up">
            <div id="map_canvas">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.358098978865!2d101.60584011475697!3d2.9978902978166913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb379262c77ff%3A0xb603bc89ea2ff3b1!2sWah%20Hin%20Paint%20Sdn.%20Bhd.!5e0!3m2!1szh-CN!2smy!4v1590072680486!5m2!1szh-CN!2smy"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <br>
                <a href="https://www.google.com/search?q=Wah+Hin+Paint+Sdn.+Bhd&oq=Wah+Hin+Paint+Sdn.+Bhd&aqs=chrome..69i57j35i39j0j69i59l2j69i60j69i61l2.1136j0j7&sourceid=chrome&ie=UTF-8"
                    target="blank">Click
                    here to search Google</a>
                <br>
            </div>
        </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>


    </Main>

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
