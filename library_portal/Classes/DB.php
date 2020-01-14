<?php

class DB{
	public static $_instance=NULL;
    private $conn,
	$_query,
	$_error=false,
	$_results,
	$_count=0;
    

    private $host = "localhost";
    private $username = "root";
    private $password = ""; 
    private $db = "multipurpose_idcard";

    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            
            file_put_contents('PDOErrors.txt', $ex->getMessage()."--".date("d/M/Y"),FILE_APPEND);
            die("PLEASE BE PATIENT WE ARE HAVING A SLIGHT ISSUE WITH THE SERVER");

        }
    }
	 public static function getInstance(){
	 	if(!isset(self::$_instance)){
			self::$_instance= new DB();

		}
			return self::$_instance;
		
	}
	public function display($display_msg){
		if(isset($display_msg)){
			echo $display_msg;
		}
	}
    public function query_this($sql){
       $result =  $this->conn->query($sql);
        if($result->rowCount()==1){
                return true;
        }else{
            return false;
        }
        
    }
     public function query_two($sql){
       $result =  $this->conn->query($sql);
       return $result;
        
    }
     public static function fetch_all_info(){
         $nin = new self();
        $result =$nin->conn->query("select * from library_list ");
        $row=array();
        $row[] =$result->fetch();
         return $row;
    }
//	public function query($sql,$param=array()){
//		$this->_error = false;
//		if($this->_query=$this->conn->prepare($sql)){
//			$x=1;
//			if(count($param)){
//				foreach($param as $value){
//					$this->_query->bindValue($x,$value);
//					$x++;
//				}
//			}
//			return $this;
//			$this->_error = false;
//		/*if($this->_query->execute()){
//			
//			$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
//			$this->_count =   $this->_query->rowCount();
//		 }else{
//			$this->_error = true;
//		}*/
//	}
//			//return $this;
//	}
	public  function action($action,$table,$where=array()){
		if(count($where)===3){
			$operators=array('<','>','>=','<=','!=','=');
			$field=$where[0];
			$operator=$where[1];
			$value=$where[2];
			if(in_array($operator, $operators)){
				$sql="{$action} FROM {$table} WHERE {$field} {$operator} ?";
				if(!$this->query($sql,array($value))->error()){
					//$this->_query->execute();
					if($this->_query->execute()){
			
						$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
						$this->_count =   $this->_query->rowCount();
		 
						return $this;
					}
				}
			}
		}
		return false;
	}
	public function get($table,$where){
		return $this->action('SELECT *',$table,$where);
	}
	public function delete($table,$where){
		return $this->action('DELETE',$table,$where);
	}
	public function insert($table,$fields=array()){
		if(count($fields)){
			$keys=array_keys($fields);
			$value= '';
			$x=1;
			foreach($fields as $field){
				$value .='?';
			
			if($x < count($fields)){
				$value .=', ';
			}
				$x++;
			}
		
			@$sql= "INSERT INTO `users_table` (`".implode('` ,`', $keys) ."`) VALUES({$value})";
		
			if(!$this->query($sql,$fields)->error()){
				if($this->_query->execute()){
					return true;
				}else{
					return false;
				}					
			}
		}
		return false;
		
	

	}
	public function results(){
		return $this->_results;
	}
	public function first(){
		return $this->_results[0];
	}
	public function error(){
		return $this->_error;
	}
	public function count(){
		return $this->_count;
	}
	
	}
