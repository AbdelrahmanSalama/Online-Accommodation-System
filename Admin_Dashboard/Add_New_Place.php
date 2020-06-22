<?php include 'Places.php'; 


if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        if(isset($_POST['Add']))
        {
          $Add = new Places() ;
          $Add->addPlace($_POST["name"],$_POST["City"],$_POST["district"],$_POST["price"]);
        }
      }//end of if



?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-box-body">
      <p class="login-box-msg">Add New Place</p>

      <form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" placeholder="Name" required>
            <span class="glyphicon glyphicon-text-size form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="City" placeholder="City" required>
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="district" placeholder="District" required>
            <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="price" placeholder="Price" required>
            <span class="glyphicon glyphicon-usd form-control-feedback"></span>
          </div>
         <div class="types">
             <div class="col-4"><p class='gen'>Type</p></div>
                <div class="col-4">
                  <input id="gen1" type="radio"  name="hotel" value="male" checked/>
                  <label for="gen1" class="col-11">Hotel</label>
                </div>
              <div class="col-4">
                  <input id="gen2" type="radio" class="col-1" name="apartment" value="female"/>
                  <label for="gen2" class="col-11">Apartment</label>
              </div>
          </div>
  
          <hr>
          <div class="row">
          <div class="col-xs-4">
          <button type="submit" formaction="Add_New_Place.php" class="btn btn-primary btn-block btn-flat" name="Add">Add Place</button>
            </div>
          </div>
      </form>
      <br>
      <a href="home.php" class="fa fa-home"> Home </a>
    </div>
</div>
  
<?php include 'includes/scripts.php' ?>
</body>
</html>