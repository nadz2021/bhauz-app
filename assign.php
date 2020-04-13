<?php
include ("layouts/header.php"); 
$room           = new Rooms();
$boarder        = new Boarders();
$room_list      = $room->getRooms();
$boarders_list  = $boarder->getBoarders();
$error_msg = '';
$success_msg='';

if(isset($_POST['submit'])){
    $account = new Accounts();
    $boarder_id = $_POST['boarder_id'];
    $room_id    = $_POST['room_id'];
    $account_id = $account->insertAccount($boarder_id,$room_id);
    header("location:accounts__setup.php?acc_id=".$account_id);
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
                    <h6 class="card-title">Room Information</h6>
                      <div class="mdc-layout-grid__inner">                        
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-select w-100 mdc-ripple-upgraded" data-mdc-auto-init="MDCSelect">
                                <input type="hidden" name="boarder_id">
                                <i class="mdc-select__dropdown-icon"></i>
                                <div class="mdc-select__selected-text"></div>
                                <div class="mdc-select__menu mdc-menu-surface demo-width-class w-50">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                        </li>
                                        <?php foreach ($boarders_list as $row) { ?>
                                        <li class="mdc-list-item" data-value="<?php echo $row['id__c']; ?>">
                                        <?php echo $row['name__c']; ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <span class="mdc-floating-label">Boarder Name</span>
                                <div class="mdc-line-ripple"></div>
                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-select w-100 mdc-ripple-upgraded" data-mdc-auto-init="MDCSelect">
                                <input type="hidden" name="room_id">
                                <i class="mdc-select__dropdown-icon"></i>
                                <div class="mdc-select__selected-text"></div>
                                <div class="mdc-select__menu mdc-menu-surface demo-width-class w-50">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                        </li>
                                        <?php foreach ($room_list as $row) { ?>
                                        <li class="mdc-list-item" data-value="<?php echo $row['id__c']; ?>">
                                        <?php echo $row['room_number__c']; ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <span class="mdc-floating-label">Room Number</span>
                                <div class="mdc-line-ripple"></div>
                            </div>
                        </div>
                        
                        
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button type="submit" name="submit" class="mdc-button mdc-button--raised w-100 mdc-ripple-upgraded">
                                Add
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