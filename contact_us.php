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
 

    <style>

        .carousel-item img{
            height:80vh;
        }

        #contact .row img {
            width: 100%;
        }

        #contact {
            box-shadow: 1px 1px 2px black,
                0 0 25px orangered,
                0 0 5px darkblue;
            padding: 3.5rem;
            background-color: rgb(211, 211, 211, 0.7);
        }


        #contact .row p {
            font-size: 1.3rem;
            margin: 0.5rem;
            font-weight: bolder;
            font-family: var(--roboto);
        }

        #contact .row h3 {
            font-size: 2.5rem;
            color: orangered;
            text-shadow: 2px 2px 4px #000000;
            font-weight: bolder;
            font-family: var(--abril);
        }

        #contact .row h4 {
            font-size: 1.5rem;
            color: tomato;
            margin-top: 1.2rem;
            margin-bottom: 0px;
            font-weight: bolder;
            font-family: var(--sriracha);
        }

      
        .title-map h3 {
            text-align: center;
            font-size: 3rem;
            background-color: tomato;
            margin-bottom: 1rem;
            padding: 2rem;
            text-shadow: 2px 2px 4px #000000;
            color: white;
            font-family: var(--abril);
        }

        .location {
            padding-top: 3rem;
            text-align: center;
            height: ;
        }

        .location a {
            text-decoration: none;
            color: tomato;
            font-size: 1.5rem;
        }

        .location a:hover {
            text-decoration: none;
            color: orangered;
            text-shadow: 2px 2px 4px #000000;
        }
         .location span {
            color: var(--btn-red);

        }
        .location p{
            margin:50px;
            font-size: 1.1rem;
            color: var(--title-dark);
            font-family: var(--Libre);
        }

        #map_canvas iframe {
            width: 600px;
            height: 450px;
        }

        #map_canvas{
            position : static;
        }


        @media only screen and (max-width: 769px) {
            #map_canvas iframe {
                width: 350px;
                height: 450px;
            }

             .location {
                position : static;
                height: 1100px;
            }
        }
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
            <p>Contact Us</p>
    </div>

        <br><br>
    <section id="contact" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="./assets/contact-img.jpg" alt="out">
                </div>
                <div class="col-md-6 text-left">
                    <h3>Fun_Snacks</h3>
                    <p>(905172D)</p>
                    <p>20, Jalan 7/1, Serdang Jaya, Seri Kembangan, Selangor.(Office)</p>

                    <h4>OFFICE No:</h4>
                    <p>03-1234 5566/012-411 9219</p>

                    <h4>FAX No :</h4>
                    <p>03-1234 5566</p>

                    <h4>EMAIL :</h4>
                    <p>wearefunsnacks@gmail.com</p>

                    <h4>Business Hours:</h4>
                    <p>Monday - Friday : 10.00a.m. - 6.00p.m.</p>
                    <p> Saturday : 10.00a.m. - 4.00p.m.</p>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7968.543928495288!2d101.713567!3d3.021449!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdcaa43353c227%3A0x4e811b580192f169!2s23%2C%20Jalan%207%2F1%2C%20Serdang%20Jaya%2C%2043300%20Seri%20Kembangan%2C%20Selangor!5e0!3m2!1szh-CN!2smy!4v1613898615829!5m2!1szh-CN!2smy" 
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <iframe src="https://www.google.com/maps/embed?pb=!4v1613898996541!6m8!1m7!1se2nsZSvzcORtad9_eGSUgA!2m2!1d3.01452372592796!2d101.7394439708906!3f278.9622036530888!4f-18.340948042531267!5f0.7820865974627469" 
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>    
     
                <br>
                <p>We do not have a <span>local physical store</span>. <br> If you have any questions, you can contact our customer service or come to our office. </p>
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
