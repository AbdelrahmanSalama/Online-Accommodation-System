<?php
/**
* 
*/
	require_once("Person.php");
	class Admin extends Person 
	{

		function CountUsers()
		{
			$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('users');
            return $connect->getCount();
		}
		function getNormalUsers()
        {
        	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('users');
           	return $connect->select('*', array('type'), array(0));
        }
        function gethotels()
        {
        	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
           	return $connect->select('*', array('Availability'), array(1));
        }
        function gethotelsid($NAME)
        {
        	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
           	return $connect->select('*', array('name'), array($NAME));
        }
        function getApart()
        {
        	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('apartments');
           	return $connect->select('*', array('Availability'), array(1));
        }
        function getApartsid($NAME)
        {
        	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('apartments');
           	return $connect->select('*', array('name'), array($NAME));
        }
        function counthotels()
        {
        	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
           	return $connect->getCount();
        }
        function countapartements()
        {
        	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('apartments');
           	return $connect->getCount();
        }
        public function AddUser($fname,$lname,$email,$password)
    	{
    		$validationErorrs = array();
    		$connect = database::singleton('localhost', 'online_paying','root','');
    		$connect->setTable('users');
    		$flag = 1;

	      		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
            	{
                	$validationErorrs["fname"] = "First Name Should be letters only";
                	$flag = 0;
            	}
            	if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
	            {
	                $validationErorrs["lname"] = "Last Name Should be letters only"; 
	                $flag = 0;
	            }
	            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	            {
	                $validationErorrs["email"] = "Email not Valid";
	                $flag = 0;
	            }
		        if($flag==1)
		        {
		        	$connect->insert(array('fname','lname','email','password'),
		                    array($fname,$lname,$email,$password));
		        	$validationErorrs["user"] = "User Created Successfuly";
		        }
		        else
		        {
		        	echo "<pre>";
	            	print_r($validationErorrs);
	            	echo "</pre>";
		        }
		      
		}
		function DeleteUser($email)
	    {
	    	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('users');
            $connect->delete(array('Email'), array($email));
	    }
	    public function AddHotel($Name,$Availability,$no_rooms)
    	{
    		$validationErorrs = array();
    		$connect = database::singleton('localhost', 'online_paying','root','');
    		$connect->setTable('hotels');
    		$flag = 1;

	      		/*if ($Availability!=1 || $Availability!=0) 
            	{
                	$validationErorrs["availability"] = "First Name Should be letters only";
                	$flag = 0;
            	}*/
		        if($flag==1)
		        {
		        	$connect->insert(array('name','availability','rooms_no'),
		                    array($Name,$Availability,$no_rooms));
		        	$validationErorrs["hotel"] = "hotel Added Successfuly";
		        }
		        else
		        {
		        	echo "<pre>";
	            	print_r($validationErorrs);
	            	echo "</pre>";
		        }
		      
		}	
	    function DeleteHotel($name)
	    {
	    	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
            $connect->delete(array('name'), array($name));
	    }	
	    function UpdateHotel($arr1,$arr2,$arr3,$arr4)
	    {	
	    	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
	    	$connect->update($arr1,$arr2,$arr3,$arr4);
	    }	
	}
