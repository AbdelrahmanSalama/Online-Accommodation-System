<?php
    session_start();
    ini_set('display_errors', 1);//this for show errs
    error_reporting(~0);// the same target
    $databasepath = '../DB/dataBase.class.php';
    require_once("../classes/admin.php") ;
    //var_dump($_POST);
    if($_SERVER['REQUEST_METHOD'] === 'POST')
      {
        if(isset($_POST['edit']))
        {
          
          $whereEmail= $_POST['email'];
          $fname = $_POST['FNAME'];
          $lname = $_POST['LNAME'];;
          $email = $_POST['email'];

          $password = sha1($_POST['password']);
        } 
          $masterUser = new Admin();
          $masterUser->editprofile(
            array('Fname', 'Lname','email','password'),
             array($fname,$lname,$email,$password), 
             array('email'),
             array($whereEmail));
      }//end of if
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WHERE2FIND</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="../assets/css/Registration-Form-with-Photo.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(40,45,50);">
            <div class="container"><a class="navbar-brand" href="home.php" style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">WHERE 2 FIND</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <?php
                                    require_once '../Classes/User.php';
                                    $user2 = new User();
                                        if($_SESSION['ID'])
                                        {
                                            $user =$_SESSION['ID']; 
                                            $data=$user2->getUserInfoById2($_SESSION['ID']);
                                            echo'
                        
                                                <li class="nav-item" role="presentation" style="color: rgb(255,255,255);"><a class="nav-link" href="HOME.php" style="color: rgb(255,255,255);font-family: "Open Sans", sans-serif;">'.$data[0]['Fname'].' '.$data[0]['Lname'].'</a></li>';
                                        }
                                        else
                                        {
                                            echo ' 
                                                <li class="nav-item" role="presentation" style="color: rgb(255,255,255);"><a class="nav-link" href="index.php" style="color: rgb(255,255,255);font-family: "Open Sans", sans-serif;">HOME</a></li>';
                                        }
                                
                                //echo $data[0]['Fname'].' '.$data[0]['Lname'];
                                ?>
                        
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="register-photo" style="background-color: rgb(240,95,64);">
        <div class="shadow-lg form-container">
            <div class="shadow-lg image-holder" style="width: 299px;height: 490px;"></div>
            <form class="shadow-lg" method="post">
                <h2 class="text-center"><strong>Update</strong> user. </h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="User Email"></div>
                <br>
                <div class="form-group"><input class="form-control" type="text" name="FNAME" placeholder="First Name"></div>
                <div class="form-group"><input class="form-control" type="text" name="LNAME" placeholder="Last Name"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                <div class="form-group">
                </div>
                <button href='users.php' type="submit" class="btn btn-primary btn-block" name="edit" role="button" >Edit</button>
            </form>
        </div>
    </div>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

