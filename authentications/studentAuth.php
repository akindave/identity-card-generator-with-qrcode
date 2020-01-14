<?php
include('Classes/DB.php');
//$db = DB::get_instance();
session_start();
class StudentAuth{
    //global $db
  public $matric,$surname;
    
    public static function get_this_user_with($matric,$surname){
        $do = new self();
        //you can get the result here
            $do->matric=$matric;
            $do->surname=$surname;
          $_SESSION['detailmat']=$do->arr=$matric;
          $_SESSION['detailsur']=$do->arr=$surname;
        if($do->check_if_they_exist()){
        $do->fetch_the_three_info($do->matric,$do->surname);
        }else{
            echo "Can't Find a Student With This information. ";
        }
        
    }
    public function check_if_they_exist(){
         
       $result = DB::getInstance()->query_this("select matric_no,fullname from student_information where matric_no='{$this->matric}' and fullname='{$this->surname}'");
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function update($table,$amount,$matric,$action){
         
       $result = DB::getInstance()->query_this("UPDATE {$table} SET amount = '{$amount}' where {$action} = '{$matric}'");
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public static function fetch_user_wallet($identity,$where,$matric){
        $result = DB::getInstance()->fetch_all($where,$identity,$matric);
        
            
            return $result['amount'];
        
    }

    public function fetch_the_three_info($matric,$surname){
       
             $result = DB::getInstance()->query_this("select matric_no,fullname from student_information where matric_no='{$matric}'");
               if($result){
                   echo "<span style='color:red; font-weight:bold'>";
                   echo "<u>CARD DETAILS</u><br/>";
                   echo "Bearer's Name: ".strtoupper($surname)."<br/>";
                   echo '</span>';
                   echo "Confirm Password:<input class='form-control' type='password' id='confirm_pass'><br/>";
                   echo "<input class='form-control' type='hidden' id='matt' value='$matric'><br/>";
                   echo "<div id='loading'></div>";
                   echo "<button class='btn btn-success' onClick='fina()'>Continue with payment</button>";
                   
               }else{
                   
               }
                
        }
               
        
        
       
    
    
    public static function display_table_of_student(){
        
       return $arr = array($_SESSION['detailmat'],$_SESSION['detailsur']);
//        if(!empty($re->matric) && !empty($re-surname)){
//            $detail_array= array($re->matric,$re->surname);
//            return $detail_array;
//        }
        
    }

    public static function insert_this(){
        if(isset($_SESSION['allist'])){
        foreach($_SESSION['allist'] as $key=>$value){
            $firstval = $value[0];
            $secondval = $value[1];
            
       $result = DB::getInstance()->query_two("insert library_list(matric_no,name)VALUES('{$firstval}','{$secondval}')");
            if($result){
                unset($_SESSION['allist']);
                return true;
            }else{
                return false;
            }
        }
    }else{
            echo "Opss!! Nothing to Insert";
        }
    }
    
    
}
?>