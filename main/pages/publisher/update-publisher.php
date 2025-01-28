<?php
include('../components/connection.php');
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM publisher WHERE publisher_code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Basic Layout -->
   <div class="row w-50">
      <div class="col-xl">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Penerbit | Pembaruan</h5>
            </div>
            <?php if (isset($_SESSION['msg']['failed'])) { ?>
               <div class="alert alert-danger mt-2" role="alert">
                  <?php echo $_SESSION['msg']['failed']; ?>
               </div>
            <?php } ?>
            <div class="card-body">
               <form action="pages/publisher/process/update.php" method="POST">
                  <div class="mb-6">
                     <label class="form-label">Kode Penerbit</label>
                     <input type="text" name="code" class="form-control" value="<?php echo $data['publisher_code']; ?>"
                        readonly />
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Nama Penerbit</label>
                     <input type="text" name="name" class="form-control" value="<?php echo $data['publisher_name']; ?>"
                        placeholder="Novel; Comic; Sains; Encyclopedia; ..." />
                     <?php if (isset($_SESSION['msg']['name'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['name'] ?></span>
                     <?php } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Alamat Penerbit</label>
                     <input type="text" name="address" class="form-control" value="<?php echo $data['publisher_address']; ?>" />
                     <?php if (isset($_SESSION['msg']['address'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['address'] ?></span>
                     <?php } ?>
                  </div>
                  <button type="submit" class="btn btn-secondary">Kembali</button>
                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php unset($_SESSION['msg']); ?>