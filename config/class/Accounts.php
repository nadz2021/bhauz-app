<?php 

class Accounts {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function getAccounts() {
    $sql = "SELECT accounts__c.id__c as account_id__c, name__c, room_number__c, rooms__c.price__c as room_price__c, accounts__c.room_price__c as price__c, excess_amount__c, total_amount__c, deposit__c, accounts__c.date_start__c as date_start__c FROM accounts__c INNER JOIN boarders__c ON accounts__c.boarder_id__c= boarders__c.id__c INNER JOIN rooms__c ON accounts__c.room_id__c = rooms__c.id__c WHERE accounts__c.status__c='C'
    ORDER BY boarders__c.name__c ASC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }
  function getAccountInfo($id) {
    $sql = "SELECT accounts__c.id__c as account_id__c, name__c, room_number__c, rooms__c.price__c as room_price__c, accounts__c.room_price__c as price__c, excess_amount__c, total_amount__c, deposit__c, accounts__c.date_start__c as date_start__c FROM accounts__c INNER JOIN boarders__c ON accounts__c.boarder_id__c= boarders__c.id__c INNER JOIN rooms__c ON accounts__c.room_id__c = rooms__c.id__c WHERE accounts__c.id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getAccountInfoByBoarderID($id) {
    $sql = "SELECT accounts__c.id__c as account_id__c, name__c, room_number__c, rooms__c.price__c as room_price__c, accounts__c.room_price__c as price__c, excess_amount__c, total_amount__c, deposit__c, accounts__c.date_start__c as date_start__c FROM accounts__c INNER JOIN boarders__c ON accounts__c.boarder_id__c= boarders__c.id__c INNER JOIN rooms__c ON accounts__c.room_id__c = rooms__c.id__c WHERE boarders__c.id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function insertAccount($b_id,$r_id) {
    $query = "INSERT INTO accounts__c(boarder_id__c,room_id__c) VALUES (?, ?)";
    $paramType = "ii";
    $paramValue = array(
        $b_id,$r_id
    );
    
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
  }

  function updateAccountInfo($item,$price,$id) {
    $query = "UPDATE accounts__c SET item__c = ?, price__c = ? WHERE  id__c = ?";
    $paramType = "sii";
    $paramValue = array(
        $item,$price,$id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }
  
  function insertSetupAccount($room_price, $excess_amount, $total_amount, $deposit, $status, $date_started, $id) {
    $query = "UPDATE accounts__c SET room_price__c = ?, excess_amount__c = ?, total_amount__c = ?, deposit__c = ?, status__c = ?, date_start__c = ? WHERE  id__c = ?";    
    $paramType = "iiiissi";
    $paramValue = array(
      $room_price, $excess_amount, $total_amount, $deposit, $status, $date_started, $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }

  function deleteAccountInfo($id) {
    $query = "DELETE FROM accounts__c WHERE id__c = ?";
    $paramType = "i";
    $paramValue = array(
      $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }   
  
}
?>