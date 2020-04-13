<?php 

class Payments {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function checkRoomNumberExist($room_number) {
    $sql = "SELECT * FROM rooms__c where room_number__c='$room_number'";
    $results = $this->db_handle->runBaseQuery($sql);
    return $results;
  }

  function getRooms() {
    $sql = "SELECT * FROM rooms__c";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }
  function getRoomInfo($id) {
    $sql = "SELECT * FROM rooms__c where id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function insertRoom($room_number,$room_type,$price) {
    $query = "INSERT INTO rooms__c(room_number__c,room_type__c,price__c) VALUES (?, ?, ?)";
    $paramType = "ssi";
    $paramValue = array(
      $room_number,$room_type,$price
    );
    
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
  }

  function updateRoomInfo($room_number,$room_type,$price,$id) {
    $query = "UPDATE rooms__c SET room_number__c = ?, room_type__c = ?, price__c = ? WHERE  id__c = ?";
    $paramType = "ssii";
    $paramValue = array(
      $room_number,$room_type,$price,$id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }

  function deleteRoomInfo($id) {
    $query = "DELETE FROM rooms__c WHERE id__c = ?";
    $paramType = "i";
    $paramValue = array(
      $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }   
  
}
?>