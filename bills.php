<?php
include ("layouts/header.php"); 
$bills = new Bills();
$bill_list = $bills->getBills();
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
                  <h6 class="card-title">Bill List</h6>
                </div>
                <div class="p-2">
                  <a class="mdc-button mdc-button--raised filled-button--success" href="bills_generate.php">GENERATE BILLS</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Full Name</th>
                      <th>Room Number</th>
                      <th>Room Price</th>
                      <th>Previous Bill</th>
                      <th>Current Bill</th>
                      <th>Bill Amount</th>
                      <th>Balance</th>
                      <th>Status</th>
                      <th>Date Generated</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(count($bill_list)!=null) {
                      foreach ($bill_list as $row) { ?>
                    <tr>
                      <td class="text-left"><?php echo $row['name__c']; ?></td>
                      <td><?php echo $row['room_number__c']; ?></td>
                      <td><?php echo $row['price__c']; ?></td>
                      <td><?php echo $row['previous_bill__c']; ?></td>
                      <td><?php echo $row['current_bill__c']; ?></td>
                      <td><?php echo $row['total_amount__c']; ?></td>
                      <td><?php echo $row['balance__c']; ?></td>
                      <td>
                        <?php if($row['status__c']=='P') { ?>
                          <button class="mdc-button text-button--success mdc-ripple-upgraded">Paid</button>
                        <?php } else if($row['status__c']=='T') { ?>
                          <button class="mdc-button text-button--warning mdc-ripple-upgraded">Unsettled Bill</button>
                        <?php } else  { ?>
                          <button class="mdc-button text-button--danger mdc-ripple-upgraded">Unpaid</button>
                        <?php }?>
                      </td>
                      <td><?php echo $row['date_created__c']; ?></td>                      
                      <td><a href="bills__edit.php?bill_id=<?php echo $row['id__c']; ?>" class="mdc-button mdc-button--raised filled-button--info">View Bill</a></td>
                    </tr>                   
                  <?php } 
                  }
                   else { ?>
                      <td colspan="9"><h3 class="text-center">No bills found...</h3></td>
                  <?php } ?>            
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include ("layouts/footer.php"); ?>