<?php
include('../components/connection.php');
if (isset($_REQUEST['nik'])) {
   $nik = $_REQUEST['nik'];
   $sql = "SELECT * FROM member WHERE nik='$nik'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-6">
            <h5 class="card-header">Member | Update</h5>
            <?php if (isset($_SESSION['msg']['failed'])) { ?>
            <div class="alert alert-danger ms-2 me-2" role="alert">
               <?php echo $_SESSION['msg']['failed'];?>
            </div>
            <?php } ?>

            <?php if (isset($_SESSION['msg']['member'])) { ?>
            <div class="alert alert-success ms-2 me-2" role="alert">
               <?php echo $_SESSION['msg']['member'];?>
            </div>
            <?php } ?>
            <div class="card-body pt-0">
               <form action="pages/member/process/update.php" method="POST" enctype="multipart/form-data">
                  <div class="row mt-1 g-5">
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input type="text"
                              class="form-control <?php echo (isset($_SESSION['msg']['nik'])) ? 'border-danger' : null; ?>"
                              name="nik" placeholder="NIK" value="<?php echo $data['nik'] ?>" readonly />
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
                              type="text" name="name" placeholder="Name" value="<?php echo $data['name'] ?>"
                              <?php echo (isset($_SESSION['msg']['code'])) ? null : 'autofocus'; ?> />
                           <label for="name">Name</label>
                           <?php if (isset($_SESSION['msg']['name'])) { ?>
                           <span class="text-danger"><?php echo $_SESSION['msg']['name'] ?></span>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="input-group input-group-merge">
                           <div class="form-floating form-floating-outline">
                              <input type="text" id="phoneNumber" name="phoneNumber"
                                 class="form-control <?php echo (isset($_SESSION['msg']['phoneNumber'])) ? 'border-danger' : null; ?>"
                                 placeholder="812 3456 7890" value="<?php echo $data['phone_number'] ?>" />
                              <label for="phoneNumber">Phone Number</label>
                           </div>
                           <span
                              class="input-group-text <?php echo (isset($_SESSION['msg']['phoneNumber'])) ? 'border-danger' : null; ?>">
                              ID (+62)</span>
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
                              value="<?php echo $data['email'] ?>" />
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
                              type="text" name="address" placeholder="address" value="<?php echo $data['address'] ?>" />
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
                              value="<?php echo (isset($_SESSION['value']['photo']) && $_SESSION['value']['photo'] != '') ? $_SESSION['value']['photo'] : $data['photo']; ?>" />
                           <label for="photo">Photo</label>
                           <?php echo $data['photo']; ?>
                           <br>
                        </div><?php if (isset($_SESSION['msg']['photo'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['photo'] ?></span>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="mt-6">
                     <button type="submit" class="btn btn-secondary">Back</button>
                     <button type="submit" name="submit" class="btn btn-primary">Save</button>
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