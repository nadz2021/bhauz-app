<?php
include ("layouts/header.php"); 
$item = new Items();
$item_list = $item->getItems();
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
                  <h6 class="card-title">Addon Item List</h6>
                </div>
                <div class="p-2">
                  <a class="mdc-button mdc-button--raised filled-button--success" href="items__add.php">ADD ITEM</a>
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
                      <td><a href="items__edit.php?id=<?php echo $row['id__c']; ?>" class="mdc-button mdc-button--raised filled-button--info">View</a></td>
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