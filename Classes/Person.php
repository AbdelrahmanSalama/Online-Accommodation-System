<?php 
	/**
	* 
	*/
	if(!isset($databasepath))
		require_once('./DB/dataBase.class.php');
	else
		require_once('../DB/dataBase.class.php');
	class Person

	{
    	protected $fname;
    	protected $lname;
  		protected $email;
    	protected $password;
    	protected $compassword;
    	protected $type;

        function __construct()
        {
            
        }
    	public function signUp($fname,$lname,$email,$password,$compassword)
    	{
    		$validationErorrs = array();
    		$connect = database::singleton('localhost', 'online_paying','root','');
    		$connect->setTable('users');
    		$password = sha1($password);
    		$compassword = sha1($compassword);
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
	            if($password != $compassword)
	            {

	                $validationErorrs["password"] = "Your Confirmation password not equal password";
	                $flag = 0;
	            }
		        if($flag==1)
		        {
		        	$connect->insert(array('fname','lname','email','password'),
		                    array($fname,$lname,$email,$password));
		        	echo "User Created Successfuly";
		        }
		        else
		        {
		        	echo "<pre>";
	            	print_r($validationErorrs);
	            	echo "</pre>";
		        }
		      
		}		
    	public function setData()
        {
	        $this->fname = $_SESSION['Fname'];
	        $this->lname  = $_SESSION['Lname'];
	        $this->Email     = $_SESSION['email'];
	        $this->type  = $_SESSION['Type'];
    	}


		function logOut()
		{
        	session_unset(); 
        	session_destroy(); 
        	header("location:login.php");
    	}
    	function editprofile($arr1,$arr2,$arr3,$arr4)
	    {	
	    	$connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('users');
	    	$connect->update($arr1,$arr2,$arr3,$arr4);
	    }	
	}