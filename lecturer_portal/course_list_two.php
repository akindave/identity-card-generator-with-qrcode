<?php @include('views/layout/header.php'); 
include('Classes/DB.php');  
    session_start();
?>
    <div class="container-fluid ">
        <div class="container ">
            <div class="row cdvfdfd">
                <div class="col-lg-10 col-md-12 login-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 log-det">
                            <div class="small-logo">
                                <!-- <i aria-hidden="true" class="fab fa-asymmetrik"></i> Style Login -->
                                <a href="index.html"><img src="assets/images/logo.jpg"></a>
                            </div>
                            <!-- <p class="dfmn">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra ut dui in dictum. </p>
                             -->
                            <br>
            <form action="#" method="POST">
                            <div class="text-box-cont" id="data-matric">
                                <?php 
    
                                    $var = DB::getInstance()->fetch_all_course($_SESSION['login_staff']);
                                        foreach($var as $key){ ?>

                                <div class="input-group center">
                                    <a href="attendance_list.php?coursecode=<?php echo str_replace(" ","",$key['course_code']);?>" class=" btn-block "><button type="button" class="btn btn-danger btn-md btn-round" style="font-size:20px; background: rgba(230, 230, 230, 0.075); color: #e91e63; border:2px solid #e91e63"><i aria-hidden="true" class="fa fa-book"></i><?php echo $key['course_code'];?></button></a>
                                </div>
                                <?php }
                                
                                ?>
<!--
                                <div class="input-group center">
                                    <a href="make/paytranscript.html" class=" btn-block"><button type="button" class="btn btn-default btn-md btn-round" style=" font-size:20px; background: rgba(230, 230, 230, 0.075) !important; color:#000000f2; border:2px solid #000000f2;" ><i aria-hidden="true" class="fa fa-book"></i>CSC 302</button></a>
                                </div> 
                                
                                <div class="input-group center">
                                    <a href="pay/verify.html" class=" btn-block "><button type="button" class="btn btn-primary btn-md btn-round" style="font-size:20px; background: rgba(230, 230, 230, 0.075) !important; color:#3f51b5; border:2px solid #3f51b5"><i aria-hidden="true" class="fa fa-book"></i>CSC 303</button></a>
                                </div> 
                                 <div class="input-group center">
                                    <a href="pay/verify.html" class=" btn-block "><button type="button" class="btn btn-primary btn-md btn-round" style="font-size:20px; background: rgba(230, 230, 230, 0.075) !important; color:#3f51b5; border:2px solid #3f51b5"><i aria-hidden="true" class="fa fa-book"></i>CSC 304</button></a>
                                </div> 
-->
                                
                                
<!--
                                <div class="input-group center">
                                    <a href="payment/receipts.html" class=" btn-block "><button type="button" class="btn btn-danger btn-md btn-round" style="font-size:20px; background: rgba(230, 230, 230, 0.075) !important; color: #ff6e40; border:2px solid #ff6e40"><i aria-hidden="true" class="fa fa-print"></i> Print Receipt </button></a>
                                </div> 
                                
                                <div class="input-group center">
                                    <a href="#" class=" btn-block"><button type="button"  disabled class="btn btn-success btn-md btn-round" style="font-size:20px; background: rgba(230, 230, 230, 0.075) !important; color:#009688; border:2px solid #009688" ><i aria-hidden="true" class="fa fa-bookmark-o"></i> Payment History </button></a>
                                </div> 
-->
                                
                                <!-- <div class="row">
                                    <p class="forget-p">Don't have an account? <span>Sign Up Now</span></p>
                                </div> -->
                                  
                            </div>
                    </form>
                            
                            
                            
                    

                        </div>
                        <?php include('sidebar.php'); ?>
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
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>


<script>


    function getFees(){
        
        var matricno=$("#matric").val();
        var studentid = 'studentid='+ matricno;
        $("#fees-container").show();
        $.ajax
        ({
            type: "POST",
            url: "getFees.php",
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
            url: "fetchSplitAmount.php",
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








<!-- Mirrored from payments.osustech.edu.ng/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2019 16:56:50 GMT -->
</html>
