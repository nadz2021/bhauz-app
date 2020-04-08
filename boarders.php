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
                      <th>Date Started</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-left">Mario Speedwagon</td>
                      <td>202-555-0167</td>
                      <td>extrefbefore@pintaresfacilconsapolin.com</td>
                      <td>October 3, 2019</td>
                      <td>
                      <a href="boarders__edit.php" class="mdc-button mdc-button--raised filled-button--info">View</a>
                      <a href="boarders__account.php" class="mdc-button mdc-button--raised filled-button--secondary">Account</a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">Petey Cruiser</td>
                      <td>202-555-0164</td>
                      <td>jeslam.elsh@urfadegerkaybi.com</td>
                      <td>November 2, 2019</td>
                      <td>
                        <a href="boarders__edit.php" class="mdc-button mdc-button--raised filled-button--info">View</a>                        
                        <a href="boarders__account.php" class="mdc-button mdc-button--raised filled-button--secondary">Account</a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">Anna Sthesia</td>
                      <td>202-555-0144</td>
                      <td>kincaid.kyion@aallaa.org</td>
                      <td>December 10, 2019</td>
                      <td>
                        <a href="boarders__edit.php" class="mdc-button mdc-button--raised filled-button--info">View</a>
                        <a href="boarders__account.php" class="mdc-button mdc-button--raised filled-button--secondary">Account</a>
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