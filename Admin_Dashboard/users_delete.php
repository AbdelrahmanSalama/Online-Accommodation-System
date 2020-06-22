<?php
    session_start();
    ini_set('display_errors', 1);//this for show errs
    error_reporting(~0);// the same target
    $databasepath = '../DB/dataBase.class.php';
    require_once("../classes/admin.php") ;
    print_r($_GET);
    if(isset($_GET['action']) && $_GET['action']=="delete"){
      $masterUser = new Admin();
      $masterUser->DeleteUser($_GET['Email']);
      header('location:users.php');// a
    }
    
?>