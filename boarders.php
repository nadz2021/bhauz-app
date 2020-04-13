<?php
include ("layouts/header.php"); 
$boarders_list = getBoarderList();
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
                  <h6 class="card-title">Boarder List</h6>
                </div>
                <div class="p-2">
                  <a class="mdc-button mdc-button--raised filled-button--success" href="boarders__add.php">ADD</a>
                </div>
              </div>
              
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Full Name</th>
                      <th>Contact Number</th>
                      <th>Email Address</th>
                      <th>Date Of Birth</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($boarders_list as $row) { ?>
                    <tr>
                      <td class="text-left"><?php echo $row['name__c']; ?></td>
                      <td><?php echo $row['contact__c']; ?></td>
                      <td><?php echo $row['email__c']; ?></td>
                      <td><?php echo $row['dob__c']; ?></td>
                      <td>
                      <a href="boarders__edit.php?b_id=<?php echo $row['id__c']; ?>" class="mdc-button mdc-button--raised filled-button--info">View</a>
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