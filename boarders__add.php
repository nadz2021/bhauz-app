<?php
include ("layouts/header.php"); 
$error_msg = '';
$success_msg='';
if(isset($_POST['submit'])){
  $boarders = new Boarders();
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
  
  $result = $boarders->checkNameExistByName($name);
  if(count($result[0]) == 0) {
    $boarders->insertBoarder($name,$address,$contact,$email,$dob,$education,$occupation,$emergency_contact_person,$emergency_contact_number,$relationship);
    $success_msg ='Data is now added!';
  }
  else {
    $error_msg ='Name already exist!';
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
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                    <div class="mdc-layout-grid">
                    <?php if($error_msg!='') { ?>
                      <h4 class="text-danger text-center"><strong><?php echo $error_msg; ?></strong></h4>
                    <?php } else if($success_msg!='') { ?>  
                      <h4 class="text-success text-center"><strong><?php echo $success_msg; ?></strong></h4>
                    <?php } ?>
                    <h6 class="card-title">Personal Information</h6>
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="name" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Full Name</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="address" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Address</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="contact" type="tel" class="mdc-text-field__input" id="text-field-hero-input" required pattern="^\d{6,15}$">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Contact Number</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="email" type="email" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Email Address</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="dob" class="mdc-text-field__input" type="date" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Date of Birth</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="education" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Education</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="occupation" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Occupation</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="emergency_contact_person" class="mdc-text-field__input" id="text-field-hero-input" required>
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Emergency Contact Person</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="emergency_contact_number" type="tel" class="mdc-text-field__input" id="text-field-hero-input" required pattern="^\d{6,15}$">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Emergency Contact Number</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <input name="relationship" class="mdc-text-field__input" id="text-field-hero-input" required  >
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Relationship</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                            <button type="submit" name="submit" class="mdc-button mdc-button--raised w-100 mdc-ripple-upgraded">
                            Register
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
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include ("layouts/footer.php"); ?>