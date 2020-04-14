<?php
include ("layouts/header.php");
$account  = new Accounts();
$payment  = new Payments();
$bills    = new Bills();

if(isset($_POST['submit'])){  
  $id       = $_POST['account_id'];
  $amount   = $_POST['payment'];
  $result = $payment->insertPayment($id, $amount);
  if($result>0) {
    $latest_bill = $bills->getLatestBillByAccountID($id);
    $balance =  $latest_bill[0]['bill_total_amount'] - $amount;
    $status =   $latest_bill[0]['status__c'];
    if($balance<1) {
      $status = 'P';
    }
    $bills->updateBillInfo($balance,$status,$latest_bill[0]['bill_id']);
  }
  header("Location: payments.php");
}
else {
  $id                    = $_GET['acc_id'];

  $account_info          = $account->getAccountInfo($id);    
  $account_id            = $account_info[0]['account_id__c'];
  $name                  = $account_info[0]['name__c'];
  $room_number           = $account_info[0]['room_number__c'];
  $actual_room_price     = $account_info[0]['room_price__c'];
  $room_price            = $account_info[0]['price__c'];
  $excess_amount         = $account_info[0]['excess_amount__c'];
  $total_amount          = $account_info[0]['total_amount__c'];
  $deposit               = $account_info[0]['deposit__c'];
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
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="room_price" class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $room_price; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Room Price</label>
                          </div>
                        </div>                        
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input type="text" name="excess_amount" class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $excess_amount; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Excess Amount</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $total_amount; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Total Amount</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="deposit" class="mdc-text-field__input" id="text-field-hero-input" disabled value="<?php echo $deposit; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Deposit/Advance Amount</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="payment" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Amount Paid</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button name="submit" type="submit" class="mdc-button mdc-button--raised w-100 mdc-ripple-upgraded">
                                Confirm
                            </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <a href="payments__create.php" class="mdc-button mdc-button--raised filled-button--light w-100 mdc-ripple-upgraded">
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
        </main>
        <!-- partial:partials/_footer.html -->
        
        <?php include ("layouts/footer.php"); ?>