<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Basic Layout -->
   <div class="row w-50">
      <div class="col-xl">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Kategori | Input</h5>
            </div>
            <?php if (isset($_SESSION['msg']['failed'])) { ?>
               <div class="alert alert-danger mt-2" role="alert">
                  <?php echo $_SESSION['msg']['failed']; ?>
               </div>
            <?php } ?>

            <?php if (isset($_SESSION['msg']['success'])) { ?>
               <div class="alert alert-success mt-2" role="alert">
                  <?php echo $_SESSION['msg']['success']; ?>
               </div>
            <?php } ?>
            <div class="card-body">
               <form action="pages/category/process/create.php" method="POST">
                  <div class="mb-6">
                     <label class="form-label">Kode Kategori</label>
                     <input type="text" name="code" class="form-control" id="basic-default-fullname"
                        placeholder="NVL; CMC; SNC; ..." />
                     <?php if (isset($_SESSION['msg']['code'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['code'] ?></span>
                     <?php } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Nama Kategori</label>
                     <input type="text" name="name" class="form-control"
                        placeholder="Novel; Comic; Sains; Encyclopedia; ..." />
                     <?php if (isset($_SESSION['msg']['name'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['name'] ?></span>
                     <?php } ?>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php unset($_SESSION['msg']); ?>