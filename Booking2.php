<?php 	
	session_start();
	include 'includes/header.php'; 
	include 'includes/scripts.php';
    require_once 'Classes/User.php';
    require_once 'Classes/hotels.php';
    $user2 = new User();
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="colorlib-booking-7/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="colorlib-booking-7/css/style.css" />
	<link rel="stylesheet" href="Admin_dashboard/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="Admin_dashboard/assets/fonts/fontawesome-all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
	<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a style="color: #f05f40;" class="navbar-brand js-scroll-trigger" href="index.php">Where2find</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation">
                        <?php
                        if(isset($_SESSION['ID']))
                        {
                            $user =$_SESSION['ID']; 
                            $data=$user2->getUserInfoById2($_SESSION['ID']);
                            echo'
        
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-white-600 ">'.$data[0]['Fname'].' '.$data[0]['Lname'].'</span></a>
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
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form method="POST">
							 <div class="col-md-8"> 
							
							<div class="col-md-2">
								<div class="form-group">
									<input class="form-control" type="text" name="guests" required>
									<span style="color: #f05f40;" class="form-label">Guests</span>
								</div>
							</div>

							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input class="form-control" type="date" name="checkin" required>
									<span style="color: #f05f40;" class="form-label">Check In</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input class="form-control" type="date" name="checkOut" required>
									<span style="color: #f05f40;" class="form-label">Check out</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-btn">
									<button style="background-color: #f05f40;" formaction="" class="submit-btn" name="book">Book</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
	/*require_once ('classes/book.php');
	$books = new book();
    $data = $books->getbook();
    foreach($data as $row)
    {
    	 echo $data['ID'];
    }
   	*/

    if(isset($_GET['bookingId']))
    { 
    	$hotelid=$_GET['bookingId'];
    }
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    if(isset($_POST['book']))
	    { 

	      $user = new user() ;
	      $user->addBooking2($hotelid ,$_POST['checkin'],$_POST["checkOut"],$_SESSION['ID']);
	    }
	}
?>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>