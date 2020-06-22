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

       

  class Payments 
  {   
      //attributes 
      
      private $Card_Num ; 
      private $Password ; 
      private $Expier_Date ;
      
     //methods 
     function addPyment($Card_Num,$Password,$Expier_Date)
     {    
         if ((isset($_POST['confirm']))) {
        
         //take name 
         $Card_Num = $_POST["cardNumber"];
         //take msg
         $Password = $_POST["password"];  
         //take mail
         $Expier_Date = $_POST["cardExpiry"];   
         } 
         // check if name only contains letters and whitespace
        try { 
         $sql = "INSERT INTO payments (Card_Number,Card_Password,Expired_DATE)
         VALUES ('$Card_Num','$Password','$Expier_Date')";
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
