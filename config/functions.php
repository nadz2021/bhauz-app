<?php 
include ("class/DBController.php");
include ("class/Accounts.php");
include ("class/Bills.php");
include ("class/Boarders.php");
include ("class/Excess.php");
include ("class/Items.php");
include ("class/Payments.php");
include ("class/Rooms.php");
$base_url = '//127.0.0.1/edsa-bhauz-app/';

function isLogin() {
	if($_SESSION['isLogin'] != 1) {
		header("location:index.php");
	}
}

function getBoarderList() {
	$boarder = new Boarders();
	$results = $boarder->getBoarders();
	return $results;
}

function calculateFirstBill($total_amount,$date_started,$id) {
	$bills 		= new Bills();
	$first_day 	= intval(date('d', strtotime($date_started)));
	
	$lastDateOfThisMonth =strtotime('last day of this month') ;
	$lastDay = date('Y-m-d', $lastDateOfThisMonth);
	
	if($first_day>1) { // check if day start at day 1
		$last_day 		= intVal(date('d', $lastDateOfThisMonth));
		$rate_per_day 	= $total_amount / $last_day;
		$number_of_days	= $last_day - $first_day;
		$total_amount 	= $rate_per_day * $number_of_days;
	}

	$bills->createBill($id,0,$total_amount,$total_amount,$total_amount,$date_started,$lastDay,'N');
}

function processedLead($vlead){
	$vlead['created_at'] = date("Y-m-d H:i:s");
	foreach ($vlead as $key => $value) {
		$row[$key] = $key;
		if(is_string($value)) {
			$vlead[$key] = '"'.$value.'"';  
		}
	}
	$row        = implode(',',$row); // get the table column names
	$values     = implode(',',$vlead); // get the value in every column
	$microsite  = new Leads();	
	$result     = $microsite->insertLeadData($row,$values);

	if(empty($result)){
		return true;
	}
	else {
		//Store the Error message here..
		$GLOBALS['strSqlExecutionResult'] = $result;
		return false;
	}
}

?>