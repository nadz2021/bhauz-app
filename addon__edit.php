<?php
include ("layouts/header.php");
$excess = new Excess();
$item_id = $_GET['item_id'];
$acc_id  = $_GET['acc_id'];
$action  = $_GET['action'];
if($action=='add') {    
  $result = $excess->checkItemAddon($acc_id,$item_id);
  if(count($result[0]) == 0) {
    $excess->addItem($acc_id,$item_id);
  }
    
    
}
else if($action=='remove') {
    $excess->deleteItem($acc_id,$item_id);
}

header("Location: accounts__setup.php?acc_id=".$acc_id);  	
?>