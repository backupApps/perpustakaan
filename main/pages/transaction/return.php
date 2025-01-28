<div class="container-xxl flex-grow-1 container-p-y">
   <form action="pages/transaction/process/returned.php" method="POST">
      <div class="row w-50">
         <div class="col-xl">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Pengembalian Buku
               </div>
               <?php if (isset($_SESSION['msg']['failed'])) { ?>
                  <div class="alert alert-danger ms-2 me-2" role="alert">
                     <?php echo $_SESSION['msg']['failed']; ?>
                  </div>
               <?php } ?>
               <div class="card-body">
                  <div class="mb-6">
                     <label class="form-label">NIK Anggota</label>
                     <div class="input-group">
                        <input type="text" placeholder="Input NIK Anggota" name="nik_member"
                           class="form-control <?php echo (isset($_SESSION['msg']['nik_member'])) ? 'border-danger' : null; ?>"
                           value="<?php echo (isset($_SESSION['value']['nik_member'])) ? $_SESSION['value']['nik_member'] : null; ?>"
                           id="memberNik" onkeyup="showName(this.value)">
                        <span
                           class="input-group-text <?php echo (isset($_SESSION['msg']['nik_member'])) ? 'border-danger' : null; ?>">
                           <i class="ri-search-line ri-20px"></i></span>
                     </div>
                     <?php if (isset($_SESSION['msg']['nik_member'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['nik_member'] . '</span>';
                     } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Nama Anggota</label>
                     <input type="text" name="member-name" id="memberName" class="form-control" placeholder="John"
                        value="<?php echo isset($data['name']) ? $data['name'] : '';
                                 echo (isset($_SESSION['value']['member-name'])) ? $_SESSION['value']['member-name'] : null; ?>" readonly />
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Waktu Pengembalian</label>
                     <input
                        class="form-control <?php echo (isset($_SESSION['msg']['return_date'])) ? 'border-danger' : null; ?>"
                        value="<?php echo (isset($_SESSION['value']['return_date'])) ? $_SESSION['value']['return_date'] : null; ?>"
                        type="date" name="return_date" />
                     <?php if (isset($_SESSION['msg']['return_date'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['return_date'] . '</span>';
                     } ?>
                  </div>
                  <div class="text-end">
                     <button type="reset" class="btn btn-secondary me-3 p-4">Reset</button>
                     <button type="submit" name="submit" class="btn btn-primary me-3 p-4">Simpan</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>

<?php
include('process/live-search.php');
unset($_SESSION['value']);
unset($_SESSION['msg']);
?>