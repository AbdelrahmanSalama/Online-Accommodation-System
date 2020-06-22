<?php
	require_once('DB/dataBase.class.php');
	class Book 
	{   
      //attributes 
		private $checkIn ; 
		private $checkOut ; 
		private $no_Guests ;
		private $no_Rooms ;
		private $Book_id ;
		private $name;
     //methods 
		function getBook()
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('booking');
            return $connect->select('*', array('user_id'), array(6));
        }
}