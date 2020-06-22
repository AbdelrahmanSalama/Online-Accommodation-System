
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>


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
									<span class="form-label">Guests</span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input class="form-control" type="text" name="rooms" required>
									<span class="form-label">rooms</span>
								</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input class="form-control" type="date" name="checkin" required>
									<span class="form-label">Check In</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input class="form-control" type="date" name="checkOut" required>
									<span class="form-label">Check out</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-btn">
									<button  formaction="Payment.html" class="submit-btn" name="book">Book</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'Book.php'; 


if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        if(isset($_POST['book']))
        { 
          $book = new Book() ;
          $book->addBooking($_POST['checkin'],$_POST["checkOut"],$_POST["rooms"],$_POST["guests"]);
        }
      }//end of if
?>
</body>

</html>