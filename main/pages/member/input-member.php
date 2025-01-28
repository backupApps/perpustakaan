<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-6">
            <h5 class="card-header">Anggota | Input</h5>
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
                        <div class="">
                           <label class="form-label">NIK</label>
                           <input type="text"
                              class="form-control <?php echo (isset($_SESSION['msg']['nik'])) ? 'border-danger' : null; ?>"
                              value="<?php echo (isset($_SESSION['value']['nik'])) ? $_SESSION['value']['nik'] : null; ?>"
                              name="nik" placeholder="NIK"
                              <?php echo (isset($_SESSION['msg']['nik'])) ? null : 'autofocus'; ?> />
                        </div>
                        <?php if (isset($_SESSION['msg']['nik'])) { ?>
                           <span class="text-danger"><?php echo $_SESSION['msg']['nik'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-6">
                        <div class="">
                           <label class="form-label">Nama</label>
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['name'])) ? 'border-danger' : null; ?>"
                              type="text" name="name" placeholder="Nama"
                              value="<?php echo (isset($_SESSION['value']['name'])) ? $_SESSION['value']['name'] : null; ?>" />
                           <?php if (isset($_SESSION['msg']['name'])) { ?>
                              <span class="text-danger"><?php echo $_SESSION['msg']['name'] ?></span>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label class="form-label">Nomor HP</label>
                        <div class="input-group input-group-merge">
                           <span
                              class="input-group-text <?php echo (isset($_SESSION['msg']['phoneNumber'])) ? 'border-danger' : null; ?>">
                              ID (+62)
                           </span>
                           <input type="text" id="phoneNumber" name="phoneNumber"
                              class="form-control <?php echo (isset($_SESSION['msg']['phoneNumber'])) ? 'border-danger' : null; ?>"
                              placeholder="81234567890"
                              value="<?php echo (isset($_SESSION['value']['phoneNumber'])) ? $_SESSION['value']['phoneNumber'] : null; ?>" />
                        </div>
                        <?php if (isset($_SESSION['msg']['phoneNumber'])) { ?>
                           <span class="text-danger"><?php echo $_SESSION['msg']['phoneNumber'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-6">
                        <div class="">
                           <label class="form-label">E-mail</label>
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['email'])) ? 'border-danger' : null; ?>"
                              type="text" id="email" name="email" placeholder="your.mail@example.com"
                              value="<?php echo (isset($_SESSION['value']['email'])) ? $_SESSION['value']['email'] : null; ?>" />
                           <?php if (isset($_SESSION['msg']['email'])) { ?>
                              <span class="text-danger"><?php echo $_SESSION['msg']['email'] ?></span>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="">
                           <label class="form-label">Alamat</label>
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['address'])) ? 'border-danger' : null; ?>"
                              type="text" name="address" placeholder="alamat"
                              value="<?php echo (isset($_SESSION['value']['address'])) ? $_SESSION['value']['address'] : null; ?>" />
                           <?php if (isset($_SESSION['msg']['address'])) { ?>
                              <span class="text-danger"><?php echo $_SESSION['msg']['address'] ?></span>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="">
                           <label class="form-label">Foto</label>
                           <input
                              class="form-control <?php echo (isset($_SESSION['msg']['photo'])) ? 'border-danger' : null; ?>"
                              type="file" name="photo" placeholder=""
                              value="<?php echo (isset($_SESSION['value']['photo'])) ? $_SESSION['value']['photo'] : null; ?>" />
                        </div><?php if (isset($_SESSION['msg']['photo'])) { ?>
                           <span class="text-danger"><?php echo $_SESSION['msg']['photo'] ?></span>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="mt-6">
                     <button type="reset" class="btn btn-outline-secondary">Reset</button>
                     <button type="submit" name="submit" class="btn btn-primary me-3">Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
unset($_SESSION['msg']);
unset($_SESSION['value']);
?>