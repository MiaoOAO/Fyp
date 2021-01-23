<?php 
	include("DataConnection1.php"); // database sql connection 
    ob_start(); // use for searchbar 
	session_start(); 

	if(isset($_POST["logout"]))
	{
	session_destroy();
	echo 'You have been logged out. <a href="UserLogin10.php">Go back</a>';
	}

?>

<!-------------------------------------------------------------------------------->

<!DOCTYPE html>
<!-- 
    Search:

    incomplete = 还没完成
    test img = 从网络上的图片/ 随便放的图片

-->

<html>

<head>
    <meta name=”viewport” content=”width=device-width, initial-scale=1″ />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        body {
            background-color: papayawhip;
        }
        
        .container {
            max-width: 960px;
        }
        /*
 * Custom translucent site header
 */
        
        .site-header {
            background-color: rgba(0, 0, 0, .85);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            backdrop-filter: saturate(180%) blur(20px);
        }
        
        .site-header a {
            color: #999;
            transition: ease-in-out color .15s;
        }
        
        .site-header a:hover {
            color: #fff;
            text-decoration: none;
        }
        /*
 * Dummy devices (replace them with your own or something else entirely!)
 */
        
        .product-device {
            position: absolute;
            right: 10%;
            bottom: -30%;
            width: 300px;
            height: 540px;
            border-radius: 21px;
            -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
        }
        
        .product-device::before {
            position: absolute;
            top: 10%;
            right: 10px;
            bottom: 10%;
            left: 10px;
            content: "";
            border-radius: 5px;
        }
        
        .product-device-2 {
            top: -25%;
            right: auto;
            bottom: 0;
            left: 5%;
        }
        /*
 * Extra utilities
 */
        
        .flex-equal>* {
            -ms-flex: 1;
            flex: 1;
        }
        
        @media (min-width: 768px) {
            .flex-md-equal>* {
                -ms-flex: 1;
                flex: 1;
            }
        }
        
        .overflow-hidden {
            overflow: hidden;
        }
        /*header css 顶部css*/
        
        #headerNav {
            border: 7px double black;
        }
        
        .nav-link {
            margin: 20px;
        }
        
        .nav-item a:hover {
            font-style: italic;
            font-weight: bolder;
        }
        /*-------------------------------------------------------------------------------------------*/
        /*title image move 图片滑动*/
        
        #carouselExampleCaptions {
            background-color: black;
            margin-left: 15px;
            margin-right: 15px;
            margin-top: 5px;
        }
        
        #carouselExampleCaptions img:hover {
            opacity: 0.7;
        }
        /*headline*/
        
        #headline {
            background-color: rgba(252, 2, 2, 0.5);
        }
        /*footer css*/
        
        footer {
            border: 7px double black;
        }
    </style>
</head>

<body>

    <!--JS (from bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <!-- header -->
    <div id="headerNav">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(235, 243, 204)">
            <a class="navbar-brand" href="#"><span style="color:rgb(11, 211, 238); text-decoration:overline black; font-size: 40px; font-family:Jazz LET, fantasy ;">F<span style="color: rgba(233, 76, 76, 0.959)">u</span>n_Snacks
            <!--img test--><img src="https://img2.pngio.com/bar-chocolate-snack-sweet-icon-cartoon-snacks-png-512_512.png" width="100px" height="100px"></span>
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">HOME <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                      </svg></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
                      </svg></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">LOCATION <svg width="1em" height="1em" viewBox="0 0 14 14" class="bi bi-signpost-split-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 16h2V6h5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.8 2.4A1 1 0 0 0 14 2H9v-.586a1 1 0 0 0-2 0V7H2a1 1 0 0 0-.8.4L.225 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4h5v5z"/>
                      </svg></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT US <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trophy-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
                      </svg></a>
                    </li>

                    <li class="nav-item dropdown">
                        <!-- incomplete -->
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                

<?php
    if(isset( $_SESSION [ 'uname' ]) && ! empty ( $_SESSION [ 'uname' ])) 
    {
        ?>
        <div class="nav-link" style="color: deeppink;"><?php echo $_SESSION [ 'uname' ]; ?>  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
          </svg></div>
        <?php
          //echo  "Status : Log \n Username: " . $_SESSION [ 'uname' ];
        
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
?>        
                <a class="nav-link" href="UserLogin10.php" style="color: deeppink;">LOGIN <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
          </svg></a>

                <h2>|</h2>

                <a class="nav-link" href="UserRegister9.php">REGISTER <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
          </svg></a>
<?php
    }
?>
            </div>

        </nav>
    </div>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

    <form action="" method="post" style="margin-left:10px; margin-top:5px;">
        <input name="searchbar" type="text" placeholder="Type here" style="width:95%">
        <input name="search" type="submit" value="Search" style="width:80px">
    </form>

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
            header("Location: FunctionSearchbarForm.php"); //这边自己改你要link的address
            ob_end_flush();
        }
    }
    ?>
    



    <!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

    <div id="AllcarouselExampleCaptions">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="UserProductList11(test).php"><img src="https://cdn.shopify.com/s/files/1/1083/2612/articles/KitKatCover_1573x.jpg?v=1529430724" class="d-block w-100" width="1000px" height="750px"></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/indeximage-template-crazyoreos-1536866547.jpg" class="d-block w-100" width="1000px" height="750px">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/wh-snacks-week-snack-roundup-1571260658.jpg" class="d-block w-100" width="1000px" height="750px">
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

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center text-dark" style="border: 1px solid black;">
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

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" style="background-color:coral">
            <div class="my-3 py-3">
                <h2 class="display-5">Another headline</h2>
                <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><img src="https://www.jing.fm/clipimg/full/55-555204_country-clipart-international-flag-all-countries-flag-png.png" class="d-block w-100"></div>
        </div>

        <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" style="background-color:mediumseagreen">
            <div class="my-3 p-3">
                <h2 class="display-5">Another headline</h2>
                <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><img src="https://thumbor.thedailymeal.com/psZG-7YiSzXxVgLPYReCDSOcagM=/870x565/https://www.thedailymeal.com/sites/default/files/slideshows/1708012/2085079/iStock-458463905.jpg" class="d-block w-100">
            </div>
        </div>

    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">

        <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" style="background-color:darkturquoise">
            <div class="my-3 p-3">
                <h2 class="display-5">Another headline</h2>
                <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/wh-snacks-week-snack-roundup-1571260658.jpg" class="d-block w-100">
            </div>
        </div>

        <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Another headline</h2>
                <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
        </div>

    </div>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark pt-4" style="background-color:rgb(235, 243, 204)">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                    <!-- Content -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

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
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

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
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

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
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Social buttons -->
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
        <!-- Social buttons -->

    </footer>
    <!-- Footer -->

</body>

</html>


