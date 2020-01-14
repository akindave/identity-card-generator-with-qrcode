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
                $result = DB::getInstance()->query_two("select matric_no,fullname,pictures from student_information where matric_no='{$this->matric}' and fullname='{$this->surname}'");
        
        while($row=$result->fetch()){
             echo '<p><img style="border-radius:30px" class="img-rounded " width="120px" heigth="120px" src="../student_image/'.$row["pictures"].'"/></p>';
             echo '<button type="button" class="btn btn-danger btn-md btn-round" font-size:17px; background: rgba(230, 230, 230, 0.075); color: #e91e63; border:2px solid #e91e63" ><i aria-hidden="true" class=""></i><span style="color:black; font-weight:bold">Full Name:  </span>'.$row["fullname"].'<br>
            <span style="color:black; font-weight:bold">Matric No: </span>'.$row["matric_no"].'<br>
            <span style="color:black; font-weight:bold">Course Marked for: </span>'.$_SESSION["coursecode"].'<br>
            </button>';
             echo '<button type="button" class="btn btn-info" onClick="getList()">Mark Attendance</button>';
            }}
        }else{
             $result = DB::getInstance()->query_two("select matric_no,fullname,pictures from student_information where matric_no='{$this->matric}' and fullname='{$this->surname}'");
           
                while($row=$result->fetch()){
            echo '<p><img style="border-radius:30px" width="120px" heigth="120px" src="../student_image/'.$row["pictures"].'"/></p>';
             echo '<button type="button" class="btn btn-danger btn-md btn-round" font-size:17px; background: rgba(230, 230, 230, 0.075); color: #e91e63; border:2px solid #e91e63" ><i aria-hidden="true" class=""></i><span style="color:black; font-weight:bold">Full Name:  </span>'.$row["fullname"].'<br>
            <span style="color:black; font-weight:bold">Matric No: </span>'.$row["matric_no"].'<br>
            <span style="color:black; font-weight:bold">Course Marked for: </span>'.$_SESSION["coursecode"].'<br>
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
    public static function delete_something($id){
		$result = DB::getInstance()->query_two("DELETE FROM attendance_list WHERE id='$id'");
		if($result){
			echo "ok";
		}else{
			echo "no";
		}
		
	}
	
    public static function insert_this(){
		$date = date("Y-M-D");
        if(isset($_SESSION['allist'])){
        foreach($_SESSION['allist'] as $key=>$value){
            $firstval = $value[0];
            $secondval = $value[1];
            $course_code = $_SESSION['coursecode'];
       $result = DB::getInstance()->query_two("insert attendance_list(date,matric_no,course_code,fullname)VALUES('{$date}','{$firstval}','{$course_code}','{$secondval}')");
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