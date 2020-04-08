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
                  <h6 class="card-title">Room List</h6>
                </div>
                <div class="p-2">
                  <a class="mdc-button mdc-button--raised filled-button--success" href="rooms__add.php">ADD ROOM</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Room Number</th>
                      <th>Room Type</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td class="text-left">101</td>
                      <td>Bed Spacer</td>
                      <td>1500</td>
                      <td>
                        <a href="rooms__edit.php" class="mdc-button mdc-button--raised filled-button--info">View</a>                        
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">102</td>
                      <td>Bed Spacer</td>
                      <td>1500</td>
                      <td>
                        <a href="rooms__edit.php" class="mdc-button mdc-button--raised filled-button--info">View</a>                        
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">201</td>
                      <td>Full Room</td>
                      <td>3500</td>
                      <td>
                        <a href="rooms__edit.php" class="mdc-button mdc-button--raised filled-button--info">View</a>                        
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