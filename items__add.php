<?php
include ("layouts/header.php"); 
$error_msg = '';
$success_msg='';
if(isset($_POST['submit'])){
  $item         = new Items();
  $item_name    = $_POST['item_name'];
  $price        = $_POST['price'];
    
  $item->insertItem($item_name,$price);
  $success_msg ='Data is now added!';
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
                  <form method="post" action="">
                    <div class="mdc-layout-grid">
                    <?php if($error_msg!='') { ?>
                      <h4 class="text-danger text-center"><strong><?php echo $error_msg; ?></strong></h4>
                    <?php } else if($success_msg!='') { ?>  
                      <h4 class="text-success text-center"><strong><?php echo $success_msg; ?></strong></h4>
                    <?php } ?>
                    <h6 class="card-title">Item Information</h6>
                      <div class="mdc-layout-grid__inner">                        
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="item_name" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Item Name</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="price" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Price</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button name="submit" type="submit" class="mdc-button mdc-button--raised w-100 mdc-ripple-upgraded">
                                Add
                            </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <a href="items.php" class="mdc-button mdc-button--raised filled-button--light w-100 mdc-ripple-upgraded">
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