<?php include ("layouts/header.php"); ?>
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
                      <th class="text-left">Account Number</th>
                      <th>Full Name</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td class="text-left">1</td>
                      <td>Mario Speedwagon</td>
                      <td>1500</td>
                      <td>03-01-2020</td>
                      <td>
                        <a href="payments__update.php" class="mdc-button mdc-button--raised filled-button--info">View</a>                        
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">2</td>
                      <td>Petey Cruiser</td>
                      <td>700</td>
                      <td>03-03-2020</td>
                      <td>
                        <a href="payments__update.php" class="mdc-button mdc-button--raised filled-button--info">View</a>                        
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">3</td>
                      <td>Anna Sthesia</td>
                      <td>3500</td>
                      <td>03-26-2020</td>
                      <td>
                        <a href="payments__update.php" class="mdc-button mdc-button--raised filled-button--info">View</a>                        
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include ("layouts/footer.php"); ?>