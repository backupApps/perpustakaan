<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-6">
            <h5 class="card-header">Member | Input</h5>
            <?php if (isset($_SESSION['msg']['failed'])) { ?>
               <div class="alert alert-danger ms-2 me-2" role="alert">
                  <?php echo $_SESSION['msg']['failed']; ?>
               </div>
            <?php } ?>

            <?php if (isset($_SESSION['msg']['member'])) { ?>
               <div class="alert alert-success ms-2 me-2" role="alert">
                  <?php echo $_SESSION['msg']['member']; ?>
               </div>
            <?php } ?>
            <div class="card-body pt-0">
               <form action="pages/member/process/create.php" method="POST" enctype="multipart/form-data">
                  <div class="row mt-1 g-5">
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input type="number"
                              class="form-control <?php echo (isset($_SESSION['msg']['nik'])) ? 'border-danger' : null; ?>"
                              value="<?php echo (isset($_SESSION['value']['nik'])) ? $_SESSION['value']['nik'] : null; ?>"
                              name="nik" placeholder="NIK"
                              <?php echo (isset($_SESSION['msg']['nik'])) ? null : 'autofocus'; ?> />
                           <label for="nik">NIK</label>
                        </div>
                        <?php if (isset($_SESSION['msg']['nik'])) { ?>
                           <span class="text-danger"><?php echo $_SESSION['msg']['nik'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['name'])) ? 'border-danger' : null; ?>"
                              type="text" name="name" placeholder="Name"
                              value="<?php echo (isset($_SESSION['value']['name'])) ? $_SESSION['value']['name'] : null; ?>" />
                           <label for="name">Name</label>
                           <?php if (isset($_SESSION['msg']['name'])) { ?>
                              <span class="text-danger"><?php echo $_SESSION['msg']['name'] ?></span>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="input-group input-group-merge">
                           <span
                              class="input-group-text <?php echo (isset($_SESSION['msg']['phoneNumber'])) ? 'border-danger' : null; ?>">
                              ID (+62)
                           </span>
                           <div class="form-floating form-floating-outline">
                              <input type="number" id="phoneNumber" name="phoneNumber"
                                 class="form-control <?php echo (isset($_SESSION['msg']['phoneNumber'])) ? 'border-danger' : null; ?>"
                                 placeholder="81234567890"
                                 value="<?php echo (isset($_SESSION['value']['phoneNumber'])) ? $_SESSION['value']['phoneNumber'] : null; ?>" />
                              <label for="phoneNumber">Phone Number</label>
                           </div>
                        </div>
                        <?php if (isset($_SESSION['msg']['phoneNumber'])) { ?>
                           <span class="text-danger"><?php echo $_SESSION['msg']['phoneNumber'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['email'])) ? 'border-danger' : null; ?>"
                              type="text" id="email" name="email" placeholder="your.mail@example.com"
                              value="<?php echo (isset($_SESSION['value']['email'])) ? $_SESSION['value']['email'] : null; ?>" />
                           <label for="email">E-mail</label>
                           <?php if (isset($_SESSION['msg']['email'])) { ?>
                              <span class="text-danger"><?php echo $_SESSION['msg']['email'] ?></span>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['address'])) ? 'border-danger' : null; ?>"
                              type="text" name="address" placeholder="address"
                              value="<?php echo (isset($_SESSION['value']['address'])) ? $_SESSION['value']['address'] : null; ?>" />
                           <label for="address">Address</label>
                           <?php if (isset($_SESSION['msg']['address'])) { ?>
                              <span class="text-danger"><?php echo $_SESSION['msg']['address'] ?></span>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['photo'])) ? 'border-danger' : null; ?>"
                              type="file" name="photo" placeholder=""
                              value="<?php echo (isset($_SESSION['value']['photo'])) ? $_SESSION['value']['photo'] : null; ?>" />
                           <label for="photo">Photo</label>
                        </div><?php if (isset($_SESSION['msg']['photo'])) { ?>
                           <span class="text-danger"><?php echo $_SESSION['msg']['photo'] ?></span>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="mt-6">
                     <button type="reset" class="btn btn-outline-secondary">Reset</button>
                     <button type="submit" name="submit" class="btn btn-primary me-3">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
unset($_SESSION['msg']);
?>