<?php
include ("layouts/header.php");



if(isset($_POST['submit'])){
  $b_id                     = $_POST['b_id'];
  $name                     = $_POST['name'];
  $address                  = $_POST['address'];
  $contact                  = $_POST['contact'];
  $email                    = $_POST['email'];
  $dob                      = $_POST['dob'];
  $education                = $_POST['education'];
  $occupation               = $_POST['occupation'];
  $emergency_contact_person = $_POST['emergency_contact_person'];
  $emergency_contact_number = $_POST['emergency_contact_number'];
  $relationship             = $_POST['relationship'];
  $boarders->updateBoarderInfo($name,$address,$contact,$email,$dob,$education,$occupation,$emergency_contact_person,$emergency_contact_number,$relationship,$b_id);
  header("Location: boarders__edit.php?b_id=".$b_id);  	
}
else if(isset($_POST['delete'])){
  $id = $_POST['b_id'];
  $boarder->deleteBoarderInfo($id);
  header("Location: boarders.php");  	
}
else {
  $id = $_GET['b_id'];
  $boarder = new Boarders();
  $boarder_info = $boarder->getBoarderInfo($id);
  $b_id                     = $boarder_info[0]['id__c'];
  $name                     = $boarder_info[0]['name__c'];
  $address                  = $boarder_info[0]['address__c'];
  $contact                  = $boarder_info[0]['contact__c'];
  $email                    = $boarder_info[0]['email__c'];
  $dob                      = $boarder_info[0]['dob__c'];
  $education                = $boarder_info[0]['education__c'];
  $occupation               = $boarder_info[0]['occupation__c'];
  $emergency_contact_person = $boarder_info[0]['emergency_contact_person__c'];
  $emergency_contact_number = $boarder_info[0]['emergency_contact_number__c'];
  $relationship             = $boarder_info[0]['relationship__c'];

  $account = new Accounts();
  $account_info   = $account->getAccountInfoByBoarderID($id);
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
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <input name="b_id" type="hidden" value="<?php echo $b_id; ?>">
                    <div class="mdc-layout-grid">
                      <h6 class="card-title">Personal Information</h6>
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="name" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $name; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Full Name</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="address" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $address; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Address</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="contact" type="tel" class="mdc-text-field__input" id="text-field-hero-input" required pattern="^\d{6,15}$" value="<?php echo $contact; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Contact Number</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="email" type="email" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $email; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Email Address</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="dob" class="mdc-text-field__input" type="date" id="text-field-hero-input" required value="<?php echo $dob; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Date of Birth</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="education" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $education; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Education</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="occupation" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $occupation; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Occupation</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="emergency_contact_person" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $emergency_contact_person; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Emergency Contact Person</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="emergency_contact_number" type="tel" class="mdc-text-field__input" id="text-field-hero-input" required pattern="^\d{6,15}$" value="<?php echo $emergency_contact_number; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Emergency Contact Number</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="relationship" class="mdc-text-field__input" id="text-field-hero-input" required value="<?php echo $relationship; ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Relationship</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button type="submit" name="submit" class="mdc-button mdc-button--raised w-100 mdc-ripple-upgraded">
                            Update
                        </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button type="submit" name="delete" class="mdc-button mdc-button--raised filled-button--secondary w-100 mdc-ripple-upgraded" onclick="return confirm('Are you sure you want to delete?');">
                              Delete
                            </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <a href="boarders.php" class="mdc-button mdc-button--raised filled-button--light w-100 mdc-ripple-upgraded">
                                Cancel
                            </a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid">              
            <div class="mdc-card p-0">
              <div class="d-flex justify-content-between my-3 px-1">                
                <div class="p-2 bd-highlight">
                  <h6 class="card-title">Accounts</h6>
                </div>                
              </div>
              <div class="table-responsive">
                <table class="table table-hoverable">
                  <thead>
                    <tr>
                      <th class="text-left">Room Number</th>
                      <th>Room Price</th>
                      <th>Total Amount</th>
                      <th>Deposit</th>
                      <th>Date Start</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(count($account_info)!=null) { ?>
                    <tr>
                      <td class="text-left"><?php echo $account_info[0]['room_number__c']; ?></td>
                      <td><?php echo $account_info[0]['price__c']; ?></td>
                      <td><?php echo $account_info[0]['total_amount__c']; ?></td>
                      <td><?php echo $account_info[0]['deposit__c']; ?></td>
                      <td><?php echo $account_info[0]['date_start__c']; ?></td>
                      <td>
                        <a href="accounts__info.php?acc_id=<?php echo $account_info[0]['account_id__c']; ?>" class="mdc-button mdc-button--raised filled-button--secondary">View Account</a>
                      </td>
                    </tr>                   
                  <?php } else { ?>
                      <td colspan="3"><h3 class="text-center">No Account/s found...</h3></td>
                  <?php } ?>                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include ("layouts/footer.php"); ?>