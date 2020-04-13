<?php
include ("layouts/header.php");
$room = new Rooms();


if(isset($_POST['submit'])){  
  $id           = $_POST['id'];
  $room_number  = $_POST['room_number'];
  $room_type    = $_POST['room_type'];
  $price        = $_POST['price'];
  $room->updateRoomInfo($room_number,$room_type,$price,$id);
  header("Location: rooms__edit.php?id=".$id);  	
}
else if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $room->deleteRoomInfo($id);
  header("Location: rooms.php");  	
}
else {
  $id = $_GET['id'];
  $room_info = $room->getRoomInfo($id);
  foreach ($room_info as $row) {
    $id           = $row['id__c'];
    $room_number  = $row['room_number__c'];
    $room_type    = $row['room_type__c'];
    $price        = $row['price__c'];
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
                <form method="POST" action="">
                  <input name="id" type="hidden" value="<?php echo $id; ?>">
                  <div class="mdc-layout-grid">
                    <h6 class="card-title">Room Information</h6>                    
                      <div class="mdc-layout-grid__inner">                        
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="room_number" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $room_number; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Room Number</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="room_type" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $room_type; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Room Type</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="price" type="number" step="0.01" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $price; ?>">
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
                            <a href="rooms.php" class="mdc-button mdc-button--raised filled-button--light w-100 mdc-ripple-upgraded">
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