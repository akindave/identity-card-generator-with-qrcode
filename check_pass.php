<?php

include('authentications/studentAuth.php');

if(isset($_GET['pass']) && isset($_GET['mat'])){
    $varpass = $_GET['pass'];
    $varmat = $_GET['mat'];
    $total = $_GET['total'];
	$receiver = $_SESSION['seller'];


$amount = StudentAuth::fetch_user_wallet("matric_no","student_information",$varmat);
if($amount<$total){
	DB::getInstance()->query_two("insert into transaction_log(payee,receiver,amount,status)VALUES('{$varmat}','{$receiver}','{$total}','failed')");
	//$_SESSION['bal'] = $amount;
	echo "no";
}else{
		$get_reciever_wallet = StudentAuth::fetch_user_wallet("id","seller_table",$receiver);
		$newval = $amount - $total;
		$receiver_newval = $get_reciever_wallet + $total;

		$load_amount = StudentAuth::update("student_information",$newval,$varmat,"matric_no");
		$load_receiver = StudentAuth::update("seller_table",$receiver_newval,$receiver,'id');
if($load_amount){
	$go = DB::getInstance()->query_two("insert into transaction_log(payee,receiver,amount,status)VALUES('{$varmat}','{$receiver}','{$total}','success')");
    if($go){
		echo "yes";
	}
}else{
	DB::getInstance()->query_two("insert into transaction_log(payee,receiver,amount,status)VALUES('{$varmat}','{$receiver}','{$total}','failed')");
    echo "cant";
}
}
}
?>
