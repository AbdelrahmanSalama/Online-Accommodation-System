<?php
//header("location:/SW-Project/login.php");
//include "/SW-Project/Classes/User.php";
//$test= new User();
//print_r($test->test());

include "../DB/dataBase.class.php";
$connect = new dataBase("localhost","online_paying","root","");
$connect->setTable('user');
            
//$con->setTable("user");
//print_r($con->select());hwa eh el by7sl da lool azay ??
// m4 3aref xD