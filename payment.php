<?php
    session_start();
    ini_set('display_errors', 1);//this for show errs
    error_reporting(~0);// the same target
?>

<head>
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
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(40,45,50);">
            <div class="container"><a class="navbar-brand" href="index.php" style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">WHERE 2 FIND</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);"><a class="nav-link" href="index.php" style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">HOME</a></li>
                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);">
                            <?php
                        require_once 'Classes/User.php';
                        $user2 = new User();
                        if(isset($_SESSION['ID']))
                        {
                            $user =$_SESSION['ID']; 
                            $data=$user2->getUserInfoById2($_SESSION['ID']);
                            $userid = $data[0]['ID'];
                            echo'
        
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span style="color: rgb(255,255,255);font-family: "Open Sans", sans-serif;" class="d-none d-lg-inline mr-2 text-gray-600 ">'.$data[0]['Fname'].' '.$data[0]['Lname'].'</span></a>
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
                                <li  class="nav-item" role="presentation"><a style="color: rgb(255,255,255);font-family: "Open Sans", sans-serif;" class="nav-link js-scroll-trigger" href="signin.php">SIGN IN</a></li>';
                        }
                        
                        //echo $data[0]['Fname'].' '.$data[0]['Lname'];
                        ?>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="row .payment-dialog-row">
        <div class="col-12 col-md-4 offset-md-4">
            <div class="card credit-card-box">
                <div class="card-header">
                    <h3><span class="panel-title-text">Payment Details </span><img class="img-fluid panel-title-image" src="assets/img/accepted_cards.png"></h3>
                </div>
                <div class="card-body">
                    <form id="payment-form" method="post">
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group"  ><label for="cardNumber" >Card number </label>
                                    <div class="input-group"><input name="cardNumber" class="form-control" type="tel" id="cardNumber" required="" placeholder="Valid Card Number">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-credit-card"></i></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-7">
                                <div class="form-group"><label for="cardExpiry"><span>expiration </span><span>EXP </span> date</label><input class="form-control" name="cardExpiry" type="tel" id="cardExpiry" required="" placeholder="MM / YY"></div>
                            </div>
                            <div class="col-5 pull-right">
                                <div class="form-group"><label for="cardCVC">cv code</label><input name="cardCVC" class="form-control" type="tel" id="cardCVC" required="" placeholder="CVC"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12"><button class="btn btn-success btn-block btn-lg" name ="confirm" type="submit">Start Subscription</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Catogeries</h3>
                        <ul>
                            <li><a href="#">Hotels</a></li>
                            <li><a href="#">Appartament</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>WHERE 2 FIND</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2019</p>
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
    <?php
    $user = new user() ; 
    //$user->addPayment2($x,$x,$x); 
    if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        if(isset($_POST['confirm']))
        { 
          $user->addPayment($_POST["cardNumber"], $_POST["cardCVC"],$_POST["cardExpiry"],$userid,$userid);
        }
      }//end of if*/
    ?>
</body>

