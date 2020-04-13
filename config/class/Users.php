<?php 

class Users {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function checkUser($user) {
    $sql = "SELECT * from users__c where username__c='$user' and status__c=1";
    $result = $this->db_handle->runBaseQuery($sql);
    if($result==null) {
      $result=0;
    }
    return $result;
  }

  function loginUser($user,$password) {
    $sql = "SELECT * from users__c where username__c='$user' and password__c='$password' ";
    $result = $this->db_handle->runBaseQuery($sql);
    if($result==null) {
      $result=0;
    }
    return $result;
  }

  function deleteAttendanceByDate($attendance_date) {
    $query = "DELETE FROM tbl_attendance WHERE attendance_date = ?";
    $paramType = "s";
    $paramValue = array(
      $attendance_date
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }      
}
?>