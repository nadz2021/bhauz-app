<?php
include ("layouts/header.php");
$account = new Accounts();
$item = new Items();
$excess = new Excess();


if(isset($_POST['submit'])){  
  $id             = $_POST['account_id'];
  $room_price     = $_POST['room_price'];
  $excess_amount  = $_POST['excess_amount'];
  $deposit        = $_POST['deposit'];
  $date_started   = $_POST['date_started'];
  $total_amount   = $room_price + $excess_amount;
  $status         = 'C';
  $account->insertSetupAccount($room_price, $excess_amount, $total_amount, $deposit, $status, $date_started, $id);
  header("Location: accounts__info.php?acc_id=".$id);  	
}
else if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $room->deleteRoomInfo($id);
  header("Location: rooms.php");  	
}
else {
  $item_list             = $item->getItems();
  
  $id                    = $_GET['acc_id'];

  $account_info          = $account->getAccountInfo($id);    
  $account_id            = $account_info[0]['account_id__c'];
  $name                  = $account_info[0]['name__c'];
  $room_number           = $account_info[0]['room_number__c'];
  $actual_room_price     = $account_info[0]['room_price__c'];
  $room_price            = $account_info[0]['price__c'];
  $excess_amount         = $account_info[0]['excess_amount__c'];
  $total_amount          = $account_info[0]['total_amount__c'];

  $total                 = $excess->totalAddonByAccountID($id);
  $actual_excess_amount  = $total[0]['total'];
  $actual_excess_amount  = ($actual_excess_amount=='' ? 0 : $actual_excess_amount);
  $item_list_account     = $item->getItemsByAccountID($id);

  
  

}

?>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->    
    <?php include ("layouts/sidebarmenu.php"); ?>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
      <?php include ("layouts/navbar.php"); ?>  
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">              
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                <form method="POST" action="">
                  <input name="account_id" type="hidden" value="<?php echo $account_id; ?>">
                  <div class="mdc-layout-grid">
                    <h6 class="card-title">Account Information</h6>                    
                      <div class="mdc-layout-grid__inner">                        
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="name" class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $name; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Boarder Name</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="room_number" class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $room_number; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Room Number</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $actual_room_price; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Actual Room Price</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="room_price" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $room_price; ?>" onchange=sumValues()>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Modified Room Price</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input type="text" class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $actual_excess_amount; ?>" onchange=sumValues()>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Actual Excess Amount</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input type="text" name="excess_amount" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $excess_amount; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Excess Amount</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $actual_room_price+$actual_excess_amount; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Actual Total Amount</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="deposit" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Deposit/Advance Amount</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="date_started" class="mdc-text-field__input" type="date" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Date Started</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button name="submit" type="submit" class="mdc-button mdc-button--raised w-100 mdc-ripple-upgraded">
                                Update
                            </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button type="submit" name="delete" class="mdc-button mdc-button--raised filled-button--secondary w-100 mdc-ripple-upgraded" onclick="return confirm('Are you sure you want to delete?');">
                              Delete
                            </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <a href="rooms.php" class="mdc-button mdc-button--raised filled-button--light w-100 mdc-ripple-upgraded">
                            Back
                            </a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>  
          </div>

          <div class="mdc-layout-grid">              
            <div class="mdc-card p-0">
              <div class="d-flex justify-content-between my-3 px-1">                
                <div class="p-2 bd-highlight">
                  <h6 class="card-title">Account Addon Charges</h6>
                </div>                
              </div>
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Item</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(count($item_list_account)!=null) {
                      foreach ($item_list_account as $row) { ?>
                    <tr>
                      <td class="text-left"><?php echo $row['item__c']; ?></td>
                      <td><?php echo $row['price__c']; ?></td>
                      <td><a href="addon__edit.php?acc_id=<?php echo $account_id; ?>&item_id=<?php echo $row['id__c']; ?>&action=remove" class="mdc-button mdc-button--raised filled-button--danger">Remove</a></td>                      
                    </tr>                   
                  <?php } 
                  }
                   else { ?>
                      <td colspan="3"><h3 class="text-center">No items found...</h3></td>
                  <?php } ?>                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid">              
            <div class="mdc-card p-0">
              <div class="d-flex justify-content-between my-3 px-1">                
                <div class="p-2 bd-highlight">
                  <h6 class="card-title">List of Other Charges</h6>
                </div>                
              </div>
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Item</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(count($item_list)!=null) {
                      foreach ($item_list as $row) { ?>
                    <tr>
                      <td class="text-left"><?php echo $row['item__c']; ?></td>
                      <td><?php echo $row['price__c']; ?></td>
                      <td><a href="addon__edit.php?acc_id=<?php echo $account_id; ?>&item_id=<?php echo $row['id__c']; ?>&action=add" class="mdc-button mdc-button--raised filled-button--info">Add</a></td>                      
                    </tr>                   
                  <?php } 
                  }
                   else { ?>
                      <td colspan="3"><h3 class="text-center">No items found...</h3></td>
                  <?php } ?>                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          
        </main>
        <!-- partial:partials/_footer.html -->
        
        <?php include ("layouts/footer.php"); ?>