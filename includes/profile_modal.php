<?php
    session_start();
    ini_set('display_errors', 1);//this for show errs
    error_reporting(~0);// the same target
    $databasepath = '../DB/dataBase.class.php';
    include "../classes/user.php";
    if($_SERVER['REQUEST_METHOD'] === 'POST')
      {
        if(isset($_POST['update']))
        {
          $whereEmail= $_POST['email'];
          $username = $_POST['username'];
          $password = sha1($_POST['password']);
          $email = $_POST['email'];
          $masterUser = new user();
          $masterUser->editprofile(
            array('username', 'password','Email'),
            array($username,$password,$email), 
            array('Email'),
            array($whereEmail));
        }
      }//end of if
?>
<?php include 'header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-box-body">
      <p class="login-box-msg">Update Your Info</p>

      <form action="" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="password" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="update"><i class="fa fa-pencil"></i> Edit USER</button>
            </div>
          </div>
      </form>
      <br>
    </div>
</div>
  
<!--?php include 'includes/scripts.php' ?-->
</body>
</html>