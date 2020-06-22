<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
         include'../includes/conn.php' ; 
         $conn = $pdo->open();

       

  class Book 
  {   
      //attributes 
      
      private $checkIn ; 
      private $checkOut ; 
      private $no_Guests ;
      private $no_Rooms ;
      private $Book_id ;
     //methods 
     function addBooking($checkIn,$checkOut,$no_Guests,$no_Rooms)
     {    
         if ((isset($_POST['book']))) {
        
          //take name 
         $checkIn = $_POST["checkin"];
         //take msg
         $checkOut = $_POST["checkOut"];  
         //take mail
         $no_Rooms = $_POST["rooms"];
        /* if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
         $emailErr = "Invalid email format"; 
         } */    
         $no_Guests = $_POST["guests"];
         } 
         // check if name only contains letters and whitespace
        try { 
         $sql = "INSERT INTO booking (no_guests,no_rooms, Check_out,Check_in)
         VALUES ('$no_Guests','$no_Rooms','$checkOut','$checkIn')";
          $GLOBALS['conn']->exec($sql);
          }
          catch(PDOException $e)
           {
    echo $sql . "<br>" . $e->getMessage();
           }
  } }
    
        ?>
    </body>
</html>
