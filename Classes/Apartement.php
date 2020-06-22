<?php
    /**
    * 
    */
    require_once('Accomdation.php');
    class Apartement extends Accomdation 
    {   
        

        public function getHotelInfoById($id)
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('apartments');
            $data = $connect->select('*',array('id'), array($id) );
            return $data ;
        }
        public function updatehotelroom($rooms_no)
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('apartments');
            $data = $connect->select('*',array('rooms_no'), array($rooms_no) );
            return $data ;
        }
        function getapartements()
        {
            $connect = database::singleton('localhost', 'online_paying','root','');
            $connect->setTable('apartments');
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