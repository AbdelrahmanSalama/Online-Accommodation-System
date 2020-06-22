<?php
    /**
    * 
    */
    require_once('Person.php');
    class User extends Person 
    {   
        function logIn($email, $password)
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('users');
            $password = sha1($password);
            $allData = $connect->select("*", array('email', 'password'),array($email, $password));
            if(sizeof($allData) > 0)
            {
                $_SESSION['ID']             = $allData[0]['ID'];
                $_SESSION['fname']             = $allData[0]['fname'];
                $_SESSION['lname']             = $allData[0]['lname'];
                $_SESSION['Email']             = $allData[0]['Email'];
                if($allData[0]['Type']==1)
                {   
                    $_SESSION['type'] = "Admin";
                    header("location:Admin_Dashboard/home.php");
                }
                else
                {
                    $_SESSION['type'] = "user";
                    header("location:index.php");
                }
            }
            else
            {
                echo "Email Or Passwrod incorrect";
            }
        }
        public function getUserInfoById($email)
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('users');
            $data = $connect->select('*',array('email'), array($email) );
            return $data ;
        }
        public function getUserInfoById2($id)
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('users');
            $data = $connect->select('*',array('id'), array($id) );
            return $data ;
        }
        function addReview($DB)
        {
            $add = $DB->AddData($data=array('$UserID','$PlaceID','$Review'), $coulmn=array('UserID','PlaceID','Review'),"review");
            if ($add)
            {
                echo 'the adding is done';
            }   
            else 
            {
                echo 'Erorr';
            }
        }
        function deleteReview($DB)
        {   
            $delete = $DB->Delete_Data('review', $data = array('id'=> '1'));        
            if ( $delete  )  
                echo 'The Data Is deleted ';
            else              
                echo 'Erorr';
        }
        function addBooking2($ID,$checkIn,$checkOut,$userid)
        {    
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('booking');
            $connect->insert(
            array('hotel_id','Check_out','Check_in','user_id'),
            array($ID,$checkOut,$checkIn,$userid));
        }
        function addBooking($ID,$checkIn,$checkOut,$no_Guests,$no_Rooms,$userid)
        {    
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('booking');
            $connect->insert(
            array('hotel_id','no_guests','no_rooms','Check_out','Check_in','user_id'),
            array($ID,$no_Guests,$no_Rooms,$checkOut,$checkIn,$userid));
        } 

        function addPayment($Card_Num,$Password,$Expier_Date,$booking,$user)
        {    
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('payments');
            $connect->insert(
                array('Card_Number','CV_Code','Expired_DATE','BOOKING_ID','USER_ID'),
                array($Card_Num,$Password,$Expier_Date,$booking,$user));
        }
        function addPayment2($Card_Num,$Password,$Expier_Date)
        {    
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('payments');
            $connect->insert(
                array('Card_Number','CV_Code','Expired_DATE'),
                array($Card_Num,$Password,$Expier_Date));
        }  
    }