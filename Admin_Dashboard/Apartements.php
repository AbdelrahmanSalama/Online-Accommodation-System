<?php
    session_start();    
    $databasepath = '../DB/dataBase.class.php';
    include 'includes/header.php'; 
    include '../DB/DataBase.class.php';
    require_once("../Classes/Admin.php");
    $master = new Admin();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Where2find</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
	<?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #f05f42;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>WHERE2FIND</span></div>
                </a>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="../index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="users.php"><i class="fas fa-tachometer-alt"></i><span>Users</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="hotels.php"><i class="fas fa-tachometer-alt"></i><span>Hotels</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Apartements.php"><i class="fas fa-tachometer-alt"></i><span>Apartements</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button" style="background-color: #f05f40;"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow" role="presentation">   
                                <?php
                                    require_once '../Classes/User.php';
                                    $user2 = new User();
                                        if($_SESSION['ID'])
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
                                                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="../signin.php">SIGN IN</a></li>';
                                        }
                                
                                //echo $data[0]['Fname'].' '.$data[0]['Lname'];
                                ?>
                            </li>
                    </ul>
            </div>
            </nav>

        
        
            <div class="container-fluid">
            <div class="box-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Available</th>
                        <th>Number Of Rooms</th>
                    </thead>
                <tbody>
                  <?php
                  $master = new Admin();
                  $normalUsers = $master->getApart();
                  foreach($normalUsers as $row)
                  {
                    echo "
                        <tr>
                            <td>
                            ". $row['name']."
                            </td>
                            <td>
                            ". $row['availability']."
                            </td>
                            <td>
                                <button class='btn btn-danger btn-sm  btn-flat' data-id='".$row['name']."'>
                                    <i class='fa fa-trash'></i>
                                    <a style='text-decoration: none;color:white;'class ='no_link'
                                        href='hotels_delete.php?action=delete&name=".$row['name']."'>
                                        DELETE
                                    </a>
                                </button>
                            </td>
                        </tr>
                        ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        
      



            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <a style="text-decoration: none;" href="AddHOTEL.php">
                                <div class="row align-items-center no-gutters">
                                    <div  href="index.php" class="col mr-2">
                                        
                                        <div class="text-uppercase text-primary font-weight-bold text-L mb-1">
                                            <span>ADD Apartement</span></div>

                                        <div class="text-dark font-weight-bold h1 mb-0">
                                        <span>
                                            
                                        </span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <a style="text-decoration: none;" href="hotels_edit.php">
                                <div class="row align-items-center no-gutters">
                                    <div  href="index.php" class="col mr-2">
                                        
                                        <div class="text-uppercase text-warning font-weight-bold text-L mb-1">
                                            <span>UPDATE Apartement</span></div>

                                        <div class="text-dark font-weight-bold h1 mb-0">
                                        <span>
                                            
                                        </span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
 
                </div>
            </div>
        </div>
        
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <?php include 'includes/scripts.php'; ?>
<script>

$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('ID');
    getRow(ID);
  });
});

</script>
</body>