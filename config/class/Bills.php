<?php 

class Bills {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function getBills() {
    $sql = "SELECT bills__c.id__c, accounts__c.id__c as account_id__c, name__c, room_number__c, accounts__c.room_price__c as price__c, bills__c.previous_bill__c, bills__c.current_bill__c, bills__c.total_amount__c, bills__c.balance__c, bills__c.status__c, bills__c.date_created__c FROM accounts__c INNER JOIN boarders__c ON accounts__c.boarder_id__c= boarders__c.id__c INNER JOIN rooms__c ON accounts__c.room_id__c = rooms__c.id__c INNER JOIN bills__c ON accounts__c.id__c = bills__c.account_id__c ORDER BY bills__c.date_created__c  DESC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function checkBillDateExist($id,$end_day) {
    $sql = "SELECT accounts__c.id__c as account_id__c FROM accounts__c JOIN bills__c ON accounts__c.id__c = bills__c.account_id__c WHERE accounts__c.status__c='C' and accounts__c.id__c=$id and bills__c.bill_ended__c='$end_day' ";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getLatestBillByAccountID($id) {
    $sql = "SELECT bills__c.id__c as bill_id, bills__c.account_id__c as account_id__c, accounts__c.total_amount__c as account_total_amount, bills__c.total_amount__c as bill_total_amount, bills__c.balance__c, bills__c.bill_ended__c, bills__c.status__c FROM accounts__c INNER JOIN bills__c ON accounts__c.id__c = bills__c.account_id__c where bills__c.account_id__c=$id ORDER BY bills__c.date_created__c DESC LIMIT 1";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getBillListByAccountID($id) {
    $sql = "SELECT * FROM bills__c where bills__c.account_id__c=$id ORDER BY bills__c.date_created__c DESC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getBillInfo($id) {
    $sql = "SELECT bills__c.id__c, accounts__c.id__c as account_id__c, name__c, room_number__c, accounts__c.room_price__c as price__c, bills__c.previous_bill__c, bills__c.current_bill__c, bills__c.total_amount__c, bills__c.balance__c, bills__c.status__c, bills__c.date_created__c FROM accounts__c INNER JOIN boarders__c ON accounts__c.boarder_id__c= boarders__c.id__c INNER JOIN rooms__c ON accounts__c.room_id__c = rooms__c.id__c INNER JOIN bills__c ON accounts__c.id__c = bills__c.account_id__c WHERE bills__c.id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function createBill($account_id,$prev_bill,$curr_bill,$total_amount,$balance,$date_started,$lastDay,$status) {
    $query = "INSERT INTO bills__c(account_id__c, previous_bill__c, current_bill__c, total_amount__c, balance__c, bill_started__c, bill_ended__c, status__c) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";    
    $paramType = "isssssss";
    $paramValue = array(
        $account_id,$prev_bill,$curr_bill,$total_amount,$balance,$date_started,$lastDay,$status
    );
    
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
  }

  function updateBillInfo($balance,$status,$id) {
    $query = "UPDATE bills__c SET balance__c = ?, status__c = ? WHERE id__c = ? ";
    $paramType = "ssi";
    $paramValue = array(
      $balance,$status,$id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }
  
  function deleteBillInfo($id) {
    $query = "DELETE FROM bills__c WHERE id__c = ?";
    $paramType = "i";
    $paramValue = array(
      $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }   
  
}
?>