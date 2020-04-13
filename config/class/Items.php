<?php 

class Items {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function getItems() {
    $sql = "SELECT * FROM other_charges__c";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getItemsByAccountID($id) {
    $sql = "SELECT excess__c.other_charges_id__c as id__c, item__c, excess__c.price__c FROM other_charges__c LEFT JOIN excess__c ON other_charges__c.id__c = excess__c.other_charges_id__c WHERE excess__c.account_id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getItemInfo($id) {
    $sql = "SELECT * FROM other_charges__c where id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function insertItem($item,$price) {
    $query = "INSERT INTO other_charges__c(item__c,price__c) VALUES (?, ?)";
    $paramType = "si";
    $paramValue = array(
        $item,$price
    );
    
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
  }

  function updateItemInfo($item,$price,$id) {
    $query = "UPDATE other_charges__c SET item__c = ?, price__c = ? WHERE  id__c = ?";
    $paramType = "sii";
    $paramValue = array(
        $item,$price,$id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }

  function deleteItemInfo($id) {
    $query = "DELETE FROM other_charges__c WHERE id__c = ?";
    $paramType = "i";
    $paramValue = array(
      $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }   
  
}
?>