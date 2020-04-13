<?php 

class Boarders {    
  private $db_handle;
    
  function __construct() {
    $this->db_handle = new DBController();
  }    

  function checkNameExistByName($name) {
    $sql = "SELECT * FROM boarders__c where name__c='$name'";
    $results = $this->db_handle->runBaseQuery($sql);
    return $results;
  }

  function getBoarders() {
    $sql = "SELECT * FROM boarders__c ORDER BY boarders__c.name__c ASC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }
  function getBoarderInfo($id) {
    $sql = "SELECT * FROM boarders__c where id__c=$id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function insertBoarder($name,$address,$contact,$email,$dob,$education,$occupation,$emergency_contact_person,$emergency_contact_number,$relationship) {
    $query = "INSERT INTO boarders__c(name__c,address__c,contact__c,email__c,dob__c,education__c,occupation__c,emergency_contact_person__c,emergency_contact_number__c,relationship__c) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $paramType = "ssisssssis";
    $paramValue = array(
      $name,
      $address,
      $contact,
      $email,
      $dob,
      $education,
      $occupation,
      $emergency_contact_person,
      $emergency_contact_number,
      $relationship
    );
    
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
  }

  function updateBoarderInfo($name,$address,$contact,$email,$dob,$education,$occupation,$emergency_contact_person,$emergency_contact_number,$relationship,$b_id) {
    $query = "UPDATE boarders__c SET name__c = ?, address__c = ?, contact__c = ?, email__c = ?, dob__c = ?, education__c = ?, occupation__c = ?, emergency_contact_person__c = ?, emergency_contact_number__c = ?, relationship__c = ? WHERE  id__c = ?";
    $paramType = "ssisssssisi";
    $paramValue = array(
      $name,
      $address,
      $contact,
      $email,
      $dob,
      $education,
      $occupation,
      $emergency_contact_person,
      $emergency_contact_number,
      $relationship,
      $b_id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }

  function deleteBoarderInfo($id) {
    $query = "DELETE FROM boarders__c WHERE id__c = ?";
    $paramType = "i";
    $paramValue = array(
      $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
  }   
  












  function getDefaultRuleSetsByPathName($path_name) {
    $sql = "SELECT rules.rule_id as id FROM rules INNER JOIN rules_set on rules_set.id = rules.rule_set_id INNER JOIN rule_set_lp on rule_set_lp.rule_set_id = rules_set.id INNER JOIN page on page.id = rule_set_lp.page_id WHERE rules.fieldname_id=1 and page.page_name='".$path_name."' and rules_set.deleted!='Y' and rules.deleted!='Y' and page.deleted!='Y' ";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getThePriorityRuleById($id) {
    $sql = "SELECT rules.id as id, assignbrand.ratio as ratio, assignbrand.status as current_ratio,  assignbrand.assignBrand_id as assignbrand_id,  rules.rule_id as rid, imprint.imprint_name as imprint_name,  fieldname.name as fieldname, fieldname.microsite_fieldname as micrositefieldname, assignbrand.imprint_id as imprint_id FROM assignbrand  INNER JOIN rules  on rules.rule_id = assignbrand.rule_id  INNER JOIN imprint  on assignbrand.imprint_id = imprint.imprint_id  INNER JOIN fieldname  on fieldname.fieldname_id = rules.fieldname_id where assignbrand.rule_id =$id and assignbrand.locked=0 and assignbrand.status>0 and rules.deleted!='Y' and imprint.deleted!='Y' and fieldname.deleted!='Y' limit 1";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getFieldValuesSetById($id) {
    $sql = "SELECT fieldvalue.salesforcevalue as sfvalue from fieldvalueset  INNER JOIN fieldvalue  on fieldvalueset.fieldvalue_id = fieldvalue.fieldvalue_id  WHERE fieldvalueset.rule_id=$id and fieldvalue.deleted!='Y'";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function updateBrandRatioByRuleSet($current_ratio, $rule_id, $imprint_id) {
    $query = "UPDATE assignbrand SET status = ? WHERE rule_id = ? and imprint_id = ? ";
    $paramType = "iii";
    $paramValue = array(
      $current_ratio, $rule_id, $imprint_id
    );
    
    $this->db_handle->update($query, $paramType, $paramValue);
  }

  function checkBrandRatioIsZeroById($id) {
    $sql = "SELECT * from assignbrand where status!=0 and rule_id =$id and locked=0";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function getAssignBrandById($id) {
    $sql = "SELECT * from assignbrand where rule_id =$id ";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function resetBrandRatioById($ratio, $rule_id, $imprint_id) {
    $query = "UPDATE assignbrand SET status = ? WHERE rule_id = ? and imprint_id = ? ";
    $paramType = "iii";
    $paramValue = array(
      $ratio, $rule_id, $imprint_id
    );
    
    $this->db_handle->update($query, $paramType, $paramValue);
  }

  function insertLeadData($row, $values) {
    $sql = "INSERT INTO leads($row)  VALUES ($values)";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
  }

  function insertLIPData($request,$response,$status,$brand_name) {
    $query = "INSERT INTO response(request,response,status,brand_name) VALUES (?, ?, ?, ?)";
    $paramType = "ssss";
    $paramValue = array(
      $request,
      $response,
      $status,
      $brand_name
    );
    
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
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