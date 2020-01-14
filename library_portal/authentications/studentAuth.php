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
        $do->fetch_the_three_info();
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
    public function fetch_the_three_info(){
        if(isset($_SESSION['allist'])){
            if(in_array(self::display_table_of_student(),$_SESSION['allist'])){
                echo "Scan Already";
            }else{
                $result = DB::getInstance()->query_two("select matric_no,fullname from student_information where matric_no='{$this->matric}' and fullname='{$this->surname}'");
        
        while($row=$result->fetch()){
             echo '<button type="button" class="btn btn-danger btn-md btn-round" font-size:17px; background: rgba(230, 230, 230, 0.075); color: #e91e63; border:2px solid #e91e63" ><i aria-hidden="true" class=""></i><span style="color:black; font-weight:bold">Full Name:  </span>'.$row["fullname"].'<br>
            <span style="color:black; font-weight:bold">Matric No: </span>'.$row["matric_no"].'<br>
            <span style="color:black; font-weight:bold">Marked for: </span>Library Attendance<br>
            </button>';
             echo '<button type="button" class="btn btn-info" onClick="getList()">Mark Attendance</button>';
            }}
        }else{
             $result = DB::getInstance()->query_two("select matric_no,fullname from student_information where matric_no='{$this->matric}' and fullname='{$this->surname}'");
           
                while($row=$result->fetch()){
             echo '<button type="button" class="btn btn-danger btn-md btn-round" font-size:17px; background: rgba(230, 230, 230, 0.075); color: #e91e63; border:2px solid #e91e63" ><i aria-hidden="true" class=""></i><span style="color:black; font-weight:bold">Full Name:  </span>'.$row["fullname"].'<br>
            <span style="color:black; font-weight:bold">Matric No: </span>'.$row["matric_no"].'<br>
            <span style="color:black; font-weight:bold">Marked for: </span>Library Attendance<br>
            </button>';
        }
                echo '<button type="button" class="btn btn-info" onClick="getList(this)">Mark Attendance</button>';
        
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






