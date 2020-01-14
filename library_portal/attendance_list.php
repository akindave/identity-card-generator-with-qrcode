


<?php @include('views/layout/header.php');
include('Classes/DB.php');
?>
    <div class="container-fluid ">
        <div class="container ">
            <div class="row cdvfdfd">
                <div class="col-lg-10 col-md-12 login-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 log-det">
                            <div class="small-logo">
                                <!-- <i aria-hidden="true" class="fab fa-asymmetrik"></i> Style Login -->
                                <a href="../index.html"><img src="assets/images/logo.jpg"></a>
                            </div>
                            <!-- <p class="dfmn">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra ut dui in dictum. </p>
                             -->
                            <br>
            <form action="#" method="POST">
                                <div class="input-group center">
                                    <a href="student_detail.php" class=" btn-block "><button type="button" class="btn btn-danger btn-md btn-round" style="font-size:20px; background: rgba(230, 230, 230, 0.075); color: #e91e63; border:2px solid black"><i aria-hidden="true" class="fa fa-qrcode"></i>Scan Make Up</button></a>
                                </div>
                            <div class="text-box-cont" id="data-matric">
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
                                       <th>Matric No:</th> 
                                       <th>Name:</th> 
                                       <th>T/D</th> 
                                    </thead>
                                </tr>
                                
                            
                                    <tbody>
                                        <?php 
                                        $a=1;
                                        $var = DB::getInstance()->fetch_all_info();
                                        foreach($var as $key){        
                                        ?>
                                        <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $key['matric_no']?></td>
                                            <td><?php echo $key['name'];?></td>
                                            <td><?php echo $key['date'];?></td>
                                        </tr>
                                       
                                        <?php 
                                            $a++;
                                        }
                                        ?>
                                    </tbody>
                                
                               
                                
                                
                                </table>
                                        
                                

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
                        <div class="col-lg-6 col-md-6 box-de" style="background-image:url('../images/e-payments.png')">
                           <div class="inn-cover">
                               <div class="ditk-inf">
                                   <div class="small-logo">
                                <!-- <i aria-hidden="true" class="fab fa-asymmetrik"></i> Style Login -->
                            </div>
                                    <h2 id="oya" class="w-100">Student List</h2>
                                    <p>Student List f Attendance</p>
                                    <a href="../index.html#">
                                    <button type="button" class="btn btn-outline-light"><strong>Complaint?</strong> <i aria-hidden="true" class="fa fa-envelope-o"></i>Akindave</button>
                                    </a>
                                </div>
                                 <div class="foter-credit">
                                 Developed by : <a href="https://osustech.edu.ng/" style="font-weight:bold">Akindave Technology</a>  
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

<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/script.js"></script>


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