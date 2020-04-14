<?php
include ("layouts/header.php"); 
$accounts = new Accounts();
$account_list = $accounts->getAccounts();
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
                  <h6 class="card-title">Account List</h6>
                </div>                
              </div>
              
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Full Name</th>
                      <th>Room Number</th>
                      <th>Room Price</th>
                      <th>Excess Amount</th>
                      <th>Total Amount</th>
                      <th>Date Started</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($account_list as $row) { ?>
                    <tr>
                      <td class="text-left"><?php echo $row['name__c']; ?></td>
                      <td><?php echo $row['room_number__c']; ?></td>
                      <td><?php echo $row['price__c']; ?></td>
                      <td><?php echo $row['excess_amount__c']; ?></td>
                      <td><?php echo $row['total_amount__c']; ?></td>
                      <td><?php echo $row['date_start__c']; ?></td>
                      <td>
                      <a href="payments_create__info.php?acc_id=<?php echo $row['account_id__c']; ?>" class="mdc-button mdc-button--raised filled-button--success">Pay</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include ("layouts/footer.php"); ?>