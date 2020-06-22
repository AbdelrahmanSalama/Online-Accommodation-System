<?php 
	/**
	* 
	*/
	if(!isset($databasepath))
		require_once('./DB/dataBase.class.php');
	else
		require_once('../DB/dataBase.class.php');
	class Accomdation

	{
    	protected $name;
    	protected $availability;
  		protected $rooms_no;

        function __construct()
        {
            
        }
    
    	public function setData()
        {
	        $this->name = $_SESSION['name'];
	        $this->availability  = $_SESSION['availability'];
	        $this->Email     = $_SESSION['email'];
	        $this->rooms_no  = $_SESSION['rooms_no'];
    	}

	}