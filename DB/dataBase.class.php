<?php

    ini_set('display_errors', 1);//this for show errs
    error_reporting(~0);// the same target
    class dataBase
    {
        /* start of props */
        private $dsn;// this var to define data source name
        private $dataBaseName;// data base name 
        private $user;// user name to login to data base
        private $pass;// password for database
        private $option;// option of data base
        public  $con;// this var for connection
        public $curQuery;// this for put query on it and execute
        private $curTable;// to make active table to run methods
        private $tables;
        public static $connection;
        /* end of props */

        /* start of methods */
        private function __construct($serverName, $dbName, $userName,$password)
        {
            $this->dataBaseName = $dbName;// set database name
            $this->dsn          = "mysql:host=$serverName;dbname=$this->dataBaseName";// make data source name
            $this->user         = $userName;// set user name
            $this->pass         = $password;// setpassword not using sha1
            $this->option       = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);// make our option and make it friendly with arabic
            if( version_compare(PHP_VERSION, '5.3.6', '<') )
                if( defined('PDO::MYSQL_ATTR_INIT_COMMAND') )
                    $options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';    
                else
                    $this->dsn .= ';charset= utf8' /*. DB_ENCODING */;    
            $this->connect();//try to connect to database
            $this->refreashTables();// load tables from databases

        }//end of construct
        public static function singleton($serverName, $dbName, $userName,$password)
        {
            if(!isset(self::$connection))
                {
                    self::$connection = new database($serverName, $dbName, $userName,$password);
                }
            return self::$connection;
        }
        public function connect()
        {
            try
            {
                $this->con = new PDO($this->dsn, $this->user, $this->pass, $this->option);// make new connection with database
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// set errMod to show all errors
                return true;// you can use true and false to make sure it is connected suc.
            }
            catch(PDOException $e)
            {
                echo "falid to connect " . $e->getMessage();//catch all errors and display message
                return false;// return false if not connect
            }//end of catch
        }//end of connect function

        public function refreashTables()
        {
            
            $this->curQuery = 'show Tables'; // to get all tables
            $this->tables   = $this->executeQuery(false, true); // set all tables in table varible
        }//end of refreshTables function

        public function select($select = "*", $whereIn = array(), $whereEq = array(), $get = true)
        {
            $where = $this->whereFormat($whereIn);// set where query as string to mk new sql
            $this->curQuery = "SELECT $select FROM $this->curTable WHERE $where"; // set current query fo select syntax
            $fin = $this->mkInsertArray($whereIn, $whereEq); //set values in [key => value] array to execute it
            if($get){return $this->executeQuery(false, true, $fin);}//if we pass parameter get true => return data
        }//end of mkQuery
// XXXXXXXXXXXXXXXXXXXXXXX
        /*public function selectWithOperator($select = "*", $whereIn = array(), $operators = array(),$whereEq = array()){
            $where = $this->whereFormatWithOperators($whereIn, $operators);// set where query as string to mk new sql
            $this->curQuery = "SELECT $select FROM $this->curTable WHERE $where"; // set current query fo select syntax
            $fin = $this->mkInsertArray($whereIn, $whereEq); //set values in [key => value] array to execute it
            return $this->executeQuery(false, true, $fin);
        }*/

        public function executeQuery($getCount = false, $get = false, $data = array()){
            try{
                $stmt = $this->con->prepare($this->curQuery);//try to mk prepare statement
                if((int)sizeof($data) != 0){$stmt->execute($data);}//if we pass data he execute it
                else{$stmt->execute();}// else execute without array
                if($getCount){return $stmt->rowCount();}// if you execute query for count only set it true
                if($get){return $stmt->fetchAll();}// get data if you set get true
            }catch(PDOException $e){
                echo  $e->getMessage();// if not suc. to execute query get error massege 
            }//end of catch
        }//end of executeQuery

        public function getCount(){
            $this->select();//this make select all for active table
            return $this->executeQuery(true);// and execute curQuery and return value
        }//end of getCountFromTable

        public function delete($whereIn = array(), $whereEq = array()){
            $where = $this->whereFormat($whereIn);// set where format var1 = :var1 AND .....
            $fin = $this->mkInsertArray($whereIn, $whereEq);// mk insert array as shown 
            $this->curQuery = "DELETE FROM $this->curTable WHERE $where";// delete where condition true
            $this->executeQuery(false, false, $fin);// and execute it
        }//end of delete

        public function update($setIn, $setEq ,$whereIn = array(), $whereEq= array())
        {
            $set = $this->whereFormat($setIn, ' ,');// set where format and set sep. ' ,' (replace it AND -> ,)
            $where = $this->whereFormat($whereIn);// set where format
            $fin = $this->mkInsertArray($setIn, $setEq);//mk insert array as shown
            $fin = $this->mkInsertArray($whereIn, $whereEq, $fin);// we pass fin[Array] to add new values//error_reporting(0);
            $this->curQuery = "UPDATE $this->curTable SET $set WHERE $where";// set current query with UPDATE syntax
            $this->executeQuery(false, false, $fin);// execute qur. with array of data
        }//end of update function

        
        public function whereFormat($whereArr, $seb = ' AND'){
            if((int)sizeof($whereArr) == 0)return '1';//if no condition (Array is Empty) return 1 "No Condition set"
            $str = '';
            for($i = 0 ; $i<(int)sizeof($whereArr); $i++)
                $str .= $whereArr[$i] . ' = :' . $whereArr[$i] . $seb . ' ';// make string as where format
            $str = chop($str, $seb);// remove last sep.
            return $str;// return gen. str
        }// end of whereFormat function

        public function whereFormatWithOperators($whereArr, $operators = array(), $seb = ' AND'){
            if((int)sizeof($whereArr) == 0)return '1';//if no condition (Array is Empty) return 1 "No Condition set"
            $str = '';
            for($i = 0 ; $i<(int)sizeof($whereArr); $i++)
                $str .= $whereArr[$i] . $operators[$i] .' :' . $whereArr[$i] . $seb . ' ';// make string as where format
            $str = chop($str, $seb);// remove last sep.
            return $str;// return gen. str
        }// end of whereFormat function
        
        public function setTable($tableName)
        {
            $this->curTable = $this->dataBaseName . "." . $tableName;// set active table
        }//end of setTable

        public function toString($array)
        {
            $str = "(";
            foreach($array as $arr)
                $str .= $arr." ,";
            $str = chop($str , " ,");
            $str .=" )";
            return $str;
        }//end of toString
        
        /*
        public function lsDB()
        {
            echo $this->dsn . " " . $this->user . " " . $this->pass . " " . $this-> option[0];// ls options and config data
            //this function for test your database config 
        }//end of lsBB function
        
        public function getTableName()
        {
            return $this->curTable;// return active table
        }//end of getTableName
        //end of methods 

        public function sql($qur){// this function for test sql only "quick"
            $this->curQuery = $qur;// set sql
            $this->executeQuery();// execute qur
        }//end of sql function */
        
         function insert($cols, $vals){
            $val = $this->insertFormat($cols);// this will edited soon ISA*/
            $col = $this->toString($cols);// this to make cols as sql syntax
            $this->curQuery = "INSERT INTO $this->curTable $col VALUES $val\n" ;// make current query insert mode
            $all = $this->mkInsertArray($cols, $vals);// mk insert array as shown
            $this->executeQuery(false, false, $all);// execute qurey and pass data
        }// end of insert function

         function mkInsertArray($arrCols , $arrVals, $tragS = array()){
            $targ = $tragS;// set passed array and set new values 
                for($i = 0; $i < (int)sizeof($arrCols); $i++)
                    $targ[':' . $arrCols[$i]] = $arrVals[$i];// make array [key=>value]
                    
            return $targ;
        }// end of mkInsertArray function

         function insertFormat($array, $brac = true ){
            $str = ($brac)? '( ':'';
            for($i = 0;$i < (int)sizeof($array); $i++)
                $str .= ':' . $array[$i] . ', ';
            $str = chop($str , " ,");
            $str .= ($brac)? ') ':'';
            return $str;
        }// end of insertFormat function

        /*public function setSqlQur($myQur){
                $this->con->exec($myQur);
        }//end of setSqlQur function

        public function isDatabase($databaseName){
            $stmt = $this->con->prepare('SHOW DATABASES');
            $stmt->execute();
            $allDatabases = $stmt->fetchAll();
            for($i = 0; $i<sizeof($allDatabases);$i++){
                if($allDatabases[$i][0] == $databaseName)
                    return true;
            }
            return false;
        }//end of function isDatabase
        public function getLastId(){
            $this->curQuery = "SELECT  MAX(id) AS max FROM $this->curTable";
            return $this->executeQuery(false, true);
        }

        public function whereFormatWithQusetionMark($array){
            $str = '';
            if((int)sizeof($array)>0){
                for($i = 0; $i< sizeof($array);$i++){
                    $str .= $array[$i] . '=?' . 'AND ';
                }//end of for
            }//end of if
            return chop($str, "AND ");
        }
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXxXxXxXxXxX
        public function getMaxValueByColumnName($colName, $arrayCol = array(), $arrayEq = array())
        {
            $whereFormatAsString = $this->whereFormatWithQusetionMark($arrayCol);
            $this->curQuery = "SELECT MAX($colName) AS max FROM $this->curTable WHERE $whereFormatAsString";
            return $this->executeQuery(false, true, $arrayEq);
        }//end of function getMaxValueByColumnName*/
}//end of class data base

