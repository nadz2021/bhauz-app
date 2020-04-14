<?php
include ("layouts/header.php"); 
$accounts   = new Accounts();
$bills      = new Bills();

$lastDateOfThisMonth =strtotime('last day of this month') ;
$lastDay = date('Y-m-d', $lastDateOfThisMonth);
$active_accounts = $accounts->getAccounts();
foreach ($active_accounts as $row) {
    $account_id = $row['account_id__c'];
    $bill_ungenerated = $bills->checkBillDateExist($account_id,$lastDay);
    if($bill_ungenerated==null) {

        $latest_bill = $bills->getLatestBillByAccountID($account_id);
        // map the previous bill to new bill
        $balance        = $latest_bill[0]['balance__c'] + $latest_bill[0]['account_total_amount'];
        $bill_end       = $lastDay;
        $bill_start     = $latest_bill[0]['bill_ended__c'];
        $current_bill   = $latest_bill[0]['account_total_amount'];
        $previous_bill  = $latest_bill[0]['balance__c'];
        $status         = 'N';
        $total_amount   = $latest_bill[0]['balance__c'] + $latest_bill[0]['account_total_amount'];

        $bills->createBill($account_id,$previous_bill,$current_bill,$total_amount,$balance,$bill_start,$bill_end,'N');
        if($previous_bill>0) {
            $bills->updateBillInfo($previous_bill,'T',$latest_bill[0]['bill_id']);
        }
    }    
}
header("Location: bills.php");

?>
