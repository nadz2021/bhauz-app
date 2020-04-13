<?php 

class Excess {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function checkItemAddon($acc_id,$item_id) {
    $sql = "SELECT * FROM excess__c where account_id__c=$acc_id and other_charges_id__c=$item_id";
    $results = $this->db_handle->runBaseQuery($sql);
    return $results;
  }

  function addItem($acc_id,$item_id) {
    $price = "(SELECT price__c FROM other_charges__c WHERE id__c=$item_id)";
    $sql = "INSERT INTO excess__c(account_id__c,other_charges_id__c,price__c) VALUES ($acc_id, $item_id, $price)";    
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function totalAddonByAccountID($id) {
    $sql = "SELECT sum(price__c) as total FROM excess__c WHERE account_id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getItemInfo($id) {
    $sql = "SELECT * FROM other_charges__c where id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function deleteItem($acc_id,$item_id) {
    $query = "DELETE FROM excess__c WHERE account_id__c = ? and other_charges_id__c = ?";
    $paramType = "ii";
    $paramValue = array(
        $acc_id,$item_id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }   
  
}
?>