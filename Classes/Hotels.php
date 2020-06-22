<?php
    /**
    * 
    */
    require_once('Accomdation.php');
    class Hotels extends Accomdation 
    {   
        

        public function getHotelInfoById($id)
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
            $data = $connect->select('*',array('id'), array($id) );
            return $data ;
        }
        public function updatehotelroom($rooms_no,$ID)
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
            $connect->update(array('rooms_no'), array($rooms_no) ,array('ID'), array($ID));
        }
        function getHotels()
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('hotels');
            return $connect->select('*', array('availability'), array(1));
        }

        function deleteReview($DB)
        {   
            $delete = $DB->Delete_Data('review', $data = array('id'=> '1'));        
            if ( $delete  )  
                echo 'The Data Is deleted ';
            else              
                echo 'Erorr';
        }

    }