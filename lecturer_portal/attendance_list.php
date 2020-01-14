

<?php 
session_start();
if(!isset($_GET['coursecode'])){
	header("location:courses_list.php");
}
if(!isset($_SESSION['login_staff']) || empty($_SESSION['login_staff'])){
    header('location:login.php');
}
@include('views/layout/header.php');
include('Classes/DB.php');
?>
<script>
$(document).on("click", ".open-Delete", function () {
                                  var myValue = $(this).data('id');
                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to remove this student from the database!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, remove!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                  	var vals = myValue;
                                               $.ajax ({
                                                      type : 'GET',
                                                      url: "upload.php",
                                                      data: { Valuedel: vals},
                                                      success: function(result) {
                                                      if(result=="ok"){
                                                                    swal({title: "Deleted!", text: "Student has been deleted from the database.", type: "success"},
                                                          function(){ 
                                                                          location.reload();
                                                                          }
                                                                      );                               	                        
                                                                 }

                                                       }
                                                  }); } else {
	                                                           swal("Cancelled", "This user is safe :)", "error");
                                                          }
                                         });
                                       
                                       });



</script>
    <div class="container-fluid ">
        <div class="container ">
            <div class="row cdvfdfd">
                <div class="col-lg-12 col-md-12 login-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-4 log-det">
                            <div class="small-logo">
                                <!-- <i aria-hidden="true" class="fab fa-asymmetrik"></i> Style Login -->
                                <a href="../index.html"><img src="assets/images/logo.jpg"></a>
                            </div>
                            <!-- <p class="dfmn">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra ut dui in dictum. </p>
                             -->
                            <br>
                            
            
                                <div class="input-group center">
                                    
                                </div>
                            <div class="" id="data-matric">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i aria-hidden="true" class="fa fa-asterisk"></i></span>
                                    </div>
                                    <input type="text" class="form-control" pattern=".{9,}" name="matricno" id="matric" placeholder="Search" aria-label="Matricno" aria-describedby="basic-addon1" onblur="getStudentInfo(); getFees()" required>
                                </div>
                                
                                <!-- <input type="hidden" name="fullname" id="fullname" /> -->

                            <table class="table table-bordered">
                               <tr>
                                    <thead> 
                                        <th>S/N</th>
                                       <th>Matric Number</th> 
                                     
                                        <?php 
										
										
                                        $a=1;
                                        $var = DB::getInstance()::fetch_all_attendee($_GET['coursecode']);
										$count_date = count($var);
                                        foreach($var as $key){ 
										
                                        ?>
										<th><?php echo $key['date'];?></th>
										<?php }

										?>
										
                                    </thead>
                               </tr>
                                    <tbody>

                               <?php
							   $idtolow = strtolower($_GET['coursecode']);
					
                                $idget = DB::fetch_distinct_name("SELECT id from courses_list where course_code='$idtolow'");
								$idee= $idget->fetch();
								$id = $idee['id'];
                                $query_person = DB::fetch_distinct_name("SELECT matric_no from courses_offered where course_id = '$id'");
                                while($row = $query_person->fetch()){
                                    echo "<tr>";
                                    echo "<td>{$a}</td>";
                                    echo "<td>{$row['matric_no']}</td>";
                                    $query = DB::fetch_distinct_name("SELECT DISTINCT date from attendance_list where course_code = 'csc308' ");
                               while($rows = $query->fetch()){
                                   $query2 = DB::fetch_distinct_name("SELECT * from attendance_list where date = '{$rows['date']}' and matric_no = '{$row['matric_no']}' ");
                                if($query2->rowCount()==1){
                                    echo "<td><img src='../img/mark.png' alt='mark' width='20px' height='20px'></td>";
                                }   else{
                                    echo "<td class='glyphicon glyphicon-times'>X</td>";
                                }
                               }
                                    echo "</tr>";
                                    $a++;
                                }
                                ?>


                                    </tbody>



                                
                                </table>
                                
                               
                                
                                
                                </table>

                                
                                <button class="btn btn-success" onClick="window.print()">PRINT LIST</button>
                                <!--<div class="input-group mb-3" id="phone-container" style="display:none">-->
                                <!--    <div class="input-group-prepend">-->
                                <!--        <span class="input-group-text" id="basic-addon1"><i aria-hidden="true" class="fa fa-phone-square"></i></span>-->
                                <!--    </div>-->
                                <!--    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" aria-label="Phone number" aria-describedby="basic-addon1" required>-->
                                <!--</div>-->


                                <div class="input-group mb-3" id="fee-container" style="display:none">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-renren"></i></span>
                                </div>
                                    <select class="form-control" name="feeid" id="fees" onchange="showAllowSplit(this.value)" aria-label="Service to Pay for" required aria-describedby="basic-addon1">
                                        <!-- <option selected>-- SELECT FEE --</option> -->
                                        
                                    </select>
                                </div>


                                <!--<div class="input-group mb-3" id="service-container" style="display:none">-->
                                <!--<div class="input-group-prepend">-->
                                <!--    <span class="input-group-text" id="basic-addon1"><i class="fa fa-renren"></i></span>-->
                                <!--</div>-->
                                <!--    <select class="form-control" id="feessplit" onchange="getSplitAmount()" aria-label="Service to Pay for" aria-describedby="basic-addon1">-->
                                        
                                        
                                <!--    </select>-->
                                <!--</div>-->
                                
                                
                                
                                
                                
                                

                                <div class="input-group mb-3" id="total-container" style="display:none">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₦</span>
                                    </div>
                                    <input type="text" readonly class="form-control" id="setamount" placeholder="Amount" aria-label="Amount" aria-describedby="basic-addon1">
                                </div>
                                
                                
                                
                                <!--<div class="input-group mb-3" id="phone-container">-->
                                <!--    <div class="input-group-prepend">-->
                                <!--        <span class="input-group-text" id="basic-addon1"><i aria-hidden="true" class="fa fa-asterisk"></i></span>-->
                                <!--    </div>-->
                                <!--    <input type="text" class="form-control" name="revenue-code" id="revenue-code" placeholder="Revenue Code" aria-label="Revenue Code" aria-describedby="basic-addon1" required>-->
                                <!--</div>-->


                                <input type="hidden" name="revenuecodea" id="revenue-code" />
                                <input type="hidden" name="descript" id="descript" />
                                <input type="hidden" name="amounttosenda" id="dsetamount" />

                                <center>
                                    <div id="msg" style="margin-bottom:20px; color:crimson; font-weight: bold; display:none">
                                       <span style=""></span>
                                    </div>
                                </center>

                               
                                
                                  
                            </div>
                    </form>
                            
                            
                            
                    

                        </div>
                    <div class="col-lg-4 col-md-6 box-de" style="background-image:url('../www.osustech.edu.ng/payments/assets/makepay.png') !important; background-repeat: no-repeat; background-attachment: fixed; background-position: center;">
                           <div class="inn-cover">
                               <div class="ditk-inf">
                                   <div class="small-logo">
                                <!-- <i aria-hidden="true" class="fab fa-asymmetrik"></i> Style Login -->
                            </div>
							<img src="#" style="border-radius:40px"/>
                                    <h2 id="oya" class="w-100">USER</h2>
                                    
                                    <a href="#">
                                    <button type="button" class="btn btn-outline-light"><strong></strong> <i aria-hidden="true" class="fa fa-envelope-o"></i>Welcome <?php echo $_SESSION['login_staff_name'];  ?></button>
                                    </a>
                                </div>
                                 <div class="foter-credit">
                                 <a href="index.php" style="font-weight:bold">HOME</a>  
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

        <!-- Modal for Successful Confirmation -->
<div id="confirmedModal" class="modal hide fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4><span id="anymsg" name="anymsg"></span></h4>	
				
				<a href="https://esimportal.osustech.edu.ng/"><button class="btn btn-success" data-dismiss="modal"><span>Continue to Portal</span> <i class="material-icons">&#xE5C8;</i></button></a>
			</div>
		</div>
	</div>
</div>  

</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>

<script src="../assets/js/script.js"></script>
 <script src="script/sweetalert.min.js"></script>
 <script src="js/plugins.js"></script>
    <link rel="stylesheet" type="text/css" href="script/sweetalert.css">
<script>
       

    function getFees(){
        
        var matricno=$("#matric").val();
        var studentid = 'studentid='+ matricno;
        $("#fees-container").show();
        $.ajax
        ({
            type: "POST",
            url: "../getFees.php",
            data: studentid,
            cache: false,
            success: function(feesd)
            {
            $("#fees").html(feesd);
            
            } 
        });


    };function numberWithCommas(number) {
                var parts = number.toString().split(".");
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return parts.join(".");
            }

    function showAllowSplit(){
        
            var fee_id= $("#fees").val();
            var feeid = 'feeid='+ fee_id;
            // alert("Welcome");
           // $("#getamount").val(30000);
           $("#service-container").show();

            $.ajax
            ({
            type: "POST",
            url: "../fetchSplitAmount.php",
            data: feeid,
            cache: false,
            success: function(data) {
                var result = $.parseJSON(data);
                $("#total-container").show();
                var famount = numberWithCommas(result.amount);
                $('#setamount').val(famount);
                $('#dsetamount').val(result.amount);
                $('#revenue-code').val(result.revenue_code);
                $('#descript').val(result.descript);



                // $("#getamount").val(amount);
                
                // $("#setamount").val(total);
                $('#button').removeAttr('disabled');
            } 
            });
    }
        


    // function getSplitAmount(){
        
    //         var split_amt= $("#feessplit").val();
    //         var total =  parseInt(split_amt);
            // $("#total-container").show();
            // alert("Welcome");
           // $("#getamount").val(30000);
           
            // $("#setamount").val(total);
            // $('#button').removeAttr('disabled');

           
    // }
        


    //Add a JQuery click listener to our search button.
    function getStudentInfo() {
        
        //If the search button is clicked,
        //get the student data that is being search for
        //from the search_box.
        var studentid = $('#matric').val().trim();
        // alert("Weldone bro");
     
        //Carry out a GET Ajax request using JQuery
        $.ajax({
            //The URL of the PHP file that searches MySQL.
            url: '../studentdetails.php',
            data: {
                matricno: studentid
            },
            success: function(returnData){
                
                //remove any previous search results.
                $('#level').val('');
                $('#faculty').val('');
                //Parse the JSON that we got back from search.php
                var results = JSON.parse(returnData);
                //Loop through our Students Data array and append their
                //names to our search results div.
               

                $.each(results, function(key, value){
                    // yes! debug is true! Smile Proxy 010010
                    // alert(value.faculty);
                    $('#level').val(value.level + "Level");
                    $('#fullname').val(value.firstname + " "+ value.lastname);
                    $('#faculty').val("FACULTY OF "+value.faculty);
                    
                });
                $('#faculty-container').show();
                $('#level-container').show();
                $('#fullname-container').show();
                $('#email-container').show();
                $('#phone-container').show();
                $("#fee-container").show();
                $("#msg").hide();
                //If no studentid match the name that was searched for, display a
                //message saying that no results were found.
                if(results.length == 0){
                    $('#level').val('');
                    $('#faculty').val('');
                    $('#fullname-container').hide();
                    $('#level-container').hide();
                    $('#faculty-container').hide();
                    $('#email-container').hide();
                    // $('#phone-container').hide();
                    $("#fee-container").hide();
                    $("#msg").show();
                    $('#msg').html('<i class="fa fa-warning"></i> Record not found!');
                    $("#button").attr("disabled", "disabled");
                   
                }
            }
        });
    };
</script>








<!-- Mirrored from payments.osustech.edu.ng/make/pay by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2019 16:57:27 GMT -->
</html>
