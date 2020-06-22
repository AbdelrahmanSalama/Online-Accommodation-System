<?php   
    session_start();
    include 'includes/header.php'; 
    include 'includes/scripts.php';
    
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Admin_dashboard/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="Admin_dashboard/assets/fonts/fontawesome-all.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WHERE2FIND</title>
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
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: #f05f40;">
            <div class="container"><a class="navbar-brand" href="index.php" style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">WHERE 2 FIND</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <form class="form-inline mr-auto" target="_self" style="margin-right: 198px;margin-left: 259px;">
                        <div class="form-group" style="margin-right: -9px;margin-left: 3px;padding-right: 0;"><label for="search-field"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" style="margin-left: 16px;font-family: 'Open Sans', sans-serif;"></div>
                    </form>
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);">
                            <a class="nav-link" href="index.php" style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">
                                HOME
                            </a>
                        </li>
                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);">
                            <?php
                            require_once 'Classes/User.php';
                            $user2 = new User();
                            if($_SESSION['ID'])
                        {
                            $user =$_SESSION['ID']; 
                            $data=$user2->getUserInfoById2($_SESSION['ID']);
                            echo'
        
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span style="color:white;font-family: "Open Sans", sans-serif;" class="d-none d-lg-inline mr-2 text-white-600 ">'.$data[0]['Fname'].' '.$data[0]['Lname'].'</span></a>
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
                                <li class="nav-item" role="presentation"><a style="color:white;font-family: "Open Sans" class="nav-link js-scroll-trigger" href="signin.php">SIGN IN</a></li>';
                        }
                            ?>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="projects-horizontal">
        <div class="container">
            <div class="intro" style="margin-bottom: -20;">
                <h2 class="text-center">HOTELS</h2>
            </div>
            <div class="row projects">
            <?php
                require_once 'Classes/Hotels.php';
                $hotel = new Hotels();
                $data = $hotel->getHotels();
                $counter = 1;
                foreach($data as $row)
                
                {
                    // hwa el link dah bt3 el book now wla b3d lma dost 3leh
                    //da el bylist mn el db 
                    // t3ala cubrid_disconnect(conn_identifier)
                    echo "
                    <div class='col-sm-6 item'>
                        <div class='row'>
                            <div class='col-md-12 col-lg-5'>

                                <a href='booking.php/'><img class='img-fluid' src='assets/img/hotel".$counter.".jpg'></a>
                                
                            </div>
                                <div class='col'>
                                    <h3 class='name'>
                                    ".$row['name']."
                                    </h3>
                                    <p class='description' style='margin-bottom: 10PX;'>Available Rooms :".$row['rooms_no']." </p><a class='btn btn-primary border rounded' role='button' href='booking.php?bookingId=". $row['ID']. "'>BOOK NOW!</a>
                                </div>
                        </div>
                    </div>

                    ";
                    $counter = $counter +1;
                }
 
            ?>
            
                
            </div>
        </div>
    </div>
    <div class="footer-dark" style="background-color: #f05f40;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item" style="color: rgb(255,255,255);">
                        <h3>Catogeries</h3>
                        <ul>
                            <li><a href="#">Hotels</a></li>
                            <li><a href="#">Appartament</a></li>
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
</body>

</html>