<?php
include ("layouts/header.php"); 
$payment = new Payments();
$payment_list = $payment->getPayments();
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
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">              
            <div class="mdc-card p-0">
              <div class="d-flex justify-content-between my-3 px-1">                
                <div class="p-2 bd-highlight">
                  <h6 class="card-title">Payment List</h6>
                </div>
                <div class="p-2">
                  <a class="mdc-button mdc-button--raised filled-button--success" href="payments__create.php">CREATE PAYMENT</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Full Name</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(count($payment_list)!=null) {
                      foreach ($payment_list as $row) { ?>
                    <tr>
                      <td class="text-left"><?php echo $row['name__c']; ?></td>
                      <td><?php echo $row['amount__c']; ?></td>
                      <td><?php echo $row['date_paid__c']; ?></td>
                    </tr>                   
                  <?php } 
                  }
                   else { ?>
                      <td colspan="3"><h3 class="text-center">No payments found...</h3></td>
                  <?php } ?>            
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include ("layouts/footer.php"); ?>