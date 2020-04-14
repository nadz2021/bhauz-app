<?php
include ("layouts/header.php");
$account  = new Accounts();
$payment  = new Payments();

if(isset($_POST['submit'])){  
  $id       = $_POST['payment_id'];
  $amount   = $_POST['payment'];
  $payment->updatePaymentInfo($amount,$id);
  header("Location: payments.php");  	
}
else {
  $id                    = $_GET['id'];
  $payment_info          = $payment->getPaymentInfo($id);    
  $payment_id            = $payment_info[0]['id__c'];
  $name                  = $payment_info[0]['name__c'];
  $amount                = $payment_info[0]['amount__c'];
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
                <input name="payment_id" type="hidden" value="<?php echo $payment_id; ?>">
                  <div class="mdc-layout-grid">
                    <h6 class="card-title">Payment Information</h6>                    
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
                            <input name="payment" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $amount; ?>">
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