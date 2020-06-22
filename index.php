<?php 	
	session_start();
	include 'includes/header.php'; 
	include 'includes/scripts.php';
    
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top">Where2find</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation">
                        <?php
                        require_once 'Classes/User.php';
                        $user2 = new User();
                        if(isset($_SESSION['ID']))
                        {
                            $user =$_SESSION['ID']; 
                            $data=$user2->getUserInfoById2($_SESSION['ID']);
                            echo'
        
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 ">'.$data[0]['Fname'].' '.$data[0]['Lname'].'</span></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </li>';
                        }
                        else
                        {
                            echo ' 
                                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="signin.php">SIGN IN</a></li>';
                        }
                        
                        //echo $data[0]['Fname'].' '.$data[0]['Lname'];
                        ?>
                    </li>
            </div>
        </div>
    </nav>
    <header class="masthead text-center text-white d-flex" style="background-image: url('assets/img/header.jpg');height: 530px;margin: -40px;">
        <div class="container my-auto" style="height: 130px;">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="text-uppercase"><strong>TAKE A REST, CHOOSE YOUR PLACE</strong></h1>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 mx-auto"><a class="btn btn-primary btn-xl js-scroll-trigger" role="button" data-bs-hover-animate="bounce" href="#contact">CONTACT US</a></div>
        </div>
    </header>
    <section id="about" class="bg-primary" style="height: 156px;">
        <div class="container">
            <div class="row">
                <div class="col offset-lg-8 mx-auto text-center" style="margin: -70px;height: 153px;">
                    <h2 class="text-white section-heading">We've got what you need!</h2>
                    <hr class="light my-4"><a class="btn btn-light btn-xl js-scroll-trigger" role="button" data-bs-hover-animate="bounce" href="#portfolio">Get Started!</a></div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="p-0"></section>
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">CATEGORIES </h2>
            </div>
            <?php
            if(isset($_SESSION['ID']))
            {
                echo '
            <div class="row d-xl-flex justify-content-xl-center projects">
                <div class="col-sm-6 col-lg-4 item" style="padding-left: 15;"><a href ="appartements.php"><img class="img-fluid" src="assets/img/desk.jpg"></a>
                    <h3 class="name">APARATMENT</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><a href ="HOTELS.php"><img class="img-fluid" src="assets/img/building.jpg"></a>
                    <h3 class="name">HOTELS</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                </div>
            </div>';
            }
            else
            {
                echo '
                <div class="row">
                <div class="col offset-lg-8 mx-auto text-center" style="margin-top: 0px;height: 10px;">
                    <a class="btn btn-primary btn-xl js-scroll-trigger" role="button" data-bs-hover-animate="bounce" href="signin.php">Sign In To explore</a>
                </div>
                </div>';   
            }
            ?>
        </div>
    </div>
    <section id="contact" style="height: 375px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="my-4">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center"><i class="fa fa-phone fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 mr-auto text-center"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a href="mailto:your-email@your-domain.com">email@example.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-dark" style="background-color: #f05f40;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item" style="color: rgb(255,255,255);">
                        <h3>Catogeries</h3>
                        <ul>
                            <li><a href="#">Hotels</a></li>
                            <li><a href="#">Appartement</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item" style="color: rgb(255,255,255);">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text" style="color: rgb(255,255,255);">
                        <h3>WHERE 2 FIND</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social" style="color: rgb(255,255,255);"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright" style="color: rgb(255,255,255);">Company Name © 2019</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</script>
</body>
