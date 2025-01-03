<?php include('process/read.php'); ?>

<div class="container-xxl flex-grow-1 container-p-y">
   <form action="pages/transaction/process/borrowed-update.php" method="POST">
      <div class="row">
         <div class="col-xl">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Borrower | Add Books
               </div>
               <?php if (isset($_SESSION['msg']['sukses'])) { ?>
                  <div class="alert alert-success ms-2 me-2" role="alert">
                     <?php echo $_SESSION['msg']['sukses']; ?>
                  </div>
               <?php } ?>

               <?php if (isset($_SESSION['msg']['general'])) { ?>
                  <div class="alert alert-danger ms-2 me-2" role="alert">
                     <?php echo $_SESSION['msg']['general']; ?>
                  </div>
               <?php } ?>
               <div class="card-body">
                  <div class="mb-6">
                     <div class="input-group">
                        <span
                           class="input-group-text <?php echo (isset($_SESSION['msg']['nik_member'])) ? 'border-danger' : null; ?>">
                           <i class="ri-search-line ri-20px"></i></span>
                        <input readonly type="text" placeholder="Search Member's NIK" name="member-nik"
                           class="form-control <?php echo (isset($_SESSION['msg']['nik_member'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $_SESSION['value']['nik_member'] ?? $data['nik_member'] ?? ''; ?>"
                           id="memberNik" onkeyup="showName(this.value)">
                     </div>
                     <?php if (isset($_SESSION['msg']['nik_member'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['nik_member'] . '</span>';
                     } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Member's Name</label>
                     <input type="text" name="member-name" id="memberName" class="form-control" placeholder="Name will appear here"
                        value="<?php echo $_SESSION['value']['member-name'] ?? $data['name'] ?? ''; ?>" readonly />
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Borrow Date</label>
                     <input
                        readonly
                        class="form-control disabled <?php echo (isset($_SESSION['msg']['borrow_date'])) ? 'border-danger' : null; ?>"
                        value="<?php echo $_SESSION['value']['borrow_date'] ?? $data['borrow_date'] ?? ''; ?>"
                        type="date" name="borrow-date" />
                     <?php if (isset($_SESSION['msg']['borrow_date'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['borrow_date'] . '</span>';
                     } ?>
                  </div>
                  <div class="text-end">
                     <button type="reset" name="reset" class="btn btn-secondary me-3 p-4">Reset</button>
                     <button type="submit" name="submit" class="btn btn-primary me-3 p-4">Submit</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl">
            <div class="card">
               <div class="card-body">
                  <?php if (isset($_SESSION['msg']['book'])) { ?>
                     <div class="alert alert-danger float-end w-50" role="alert">
                        <?php echo $_SESSION['msg']['book']; ?>
                     </div>
                  <?php } ?>
                  <h6>Books</h6>
                  <?php
                  // Total maksimum buku
                  $maxBooks = 5;
                  // Tampilkan semua buku
                  for ($i = 1; $i <= $maxBooks; $i++) {
                     if ($i <= count($book)) {
                        // Jika buku sudah dipinjam
                  ?>
                        <div class="mb-4">
                           <h6>Book <?php echo $i; ?> (Borrowed)</h6>
                           <input type="text" class="form-control" readonly value="<?php echo $book[$i - 1]['code_book']; ?>" />
                           <input type="text" class="form-control" readonly value="<?php echo $book[$i - 1]['title']; ?>" />
                        </div>
                     <?php
                     } else {
                        // Jika buku baru
                     ?>
                        <div class="mb-4">
                           <h6>Book <?php echo $i; ?></h6>
                           <input type="text" class="form-control" name="book<?php echo $i; ?>" placeholder="Book Code" onkeyup="showBook(this.value, <?php echo $i; ?>)" />
                           <input type="text" class="form-control" readonly id="bookTitle<?php echo $i; ?>" name="title<?php echo $i; ?>" placeholder="Book Title"
                              value="<?php echo $_SESSION['value']["title$i"] ?? '';
                                       echo $book[$i - 1]['title'] ?? '' ?>" />
                        </div>
                  <?php
                     }
                  }
                  ?>
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