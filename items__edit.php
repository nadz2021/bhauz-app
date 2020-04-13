<?php
include ("layouts/header.php");
$item = new Items();


if(isset($_POST['submit'])){  
  $id         = $_POST['id'];
  $item_name  = $_POST['item_name'];
  $price      = $_POST['price'];
  $item->updateItemInfo($item_name,$price,$id);
  header("Location: items__edit.php?id=".$id);  	
}
else if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $item->deleteItemInfo($id);
  header("Location: items.php");  	
}
else {
  $id = $_GET['id'];
  $item_info = $item->getItemInfo($id);
  foreach ($item_info as $row) {
    $id         = $row['id__c'];
    $item_name  = $row['item__c'];
    $price      = $row['price__c'];
  }
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
                  <form method="post">
                    <div class="mdc-layout-grid">
                    <input name="id" type="hidden" value="<?php echo $id; ?>">
                    <h6 class="card-title">Item Information</h6>
                      <div class="mdc-layout-grid__inner">                        
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="item_name" class="mdc-text-field__input" id="text-field-hero-input"  required value="<?php echo $item_name; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Item Name</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="price" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $price; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Price</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button name="submit" type="submit" class="mdc-button mdc-button--raised w-100 mdc-ripple-upgraded">
                                Update
                            </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                          <button type="submit" name="delete" class="mdc-button mdc-button--raised filled-button--secondary w-100 mdc-ripple-upgraded" onclick="return confirm('Are you sure you want to delete?');">
                            Delete
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