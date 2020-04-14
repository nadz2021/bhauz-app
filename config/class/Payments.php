<?php 

class Payments {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function getPayments() {
    $sql = "SELECT payments__c.id__c, payments__c.account_no__c, boarders__c.name__c, payments__c.amount__c, payments__c.date_paid__c FROM payments__c INNER JOIN accounts__c ON payments__c.account_no__c = accounts__c.id__c
    INNER JOIN boarders__c ON accounts__c.boarder_id__c = boarders__c.id__c ORDER BY payments__c.date_paid__c DESC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getPaymentInfo($id) {
    $sql = "SELECT payments__c.id__c, payments__c.account_no__c, boarders__c.name__c, payments__c.amount__c, payments__c.date_paid__c FROM payments__c INNER JOIN accounts__c ON payments__c.account_no__c = accounts__c.id__c
    INNER JOIN boarders__c ON accounts__c.boarder_id__c = boarders__c.id__c WHERE payments__c.id__c=$id ORDER BY payments__c.date_paid__c DESC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getPaymentListByAccountID($id) {
    $sql = "SELECT payments__c.id__c, payments__c.amount__c, payments__c.date_paid__c FROM payments__c  WHERE payments__c.account_no__c=$id ORDER BY payments__c.date_paid__c DESC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }
  
  function insertPayment($id, $payment) {
    $query = "INSERT INTO payments__c(account_no__c,amount__c) VALUES (?, ?)";
    $paramType = "is";
    $paramValue = array(
      $id, $payment
    );
    
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
  }  
  function updatePaymentInfo($amount,$id) {
    $query = "UPDATE payments__c SET amount__c = ? WHERE  id__c = ?";
    $paramType = "ii";
    $paramValue = array(
      $amount,$id
    );
    
    $this->db_handle->insert($query, $paramType, $paramValue);
  }

}
?>