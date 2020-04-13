<?php 
include ("class/DBController.php");
include ("class/Accounts.php");
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


/*********************************************
	[+]For Session Token[+]
**********************************************/
function generateRandomString($length = 10)  {
	return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
	
function getToken() {
	$token = generateRandomString();
	$_SESSION['token'] = $token;
	return $token;
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