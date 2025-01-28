<?php
include('process/read.php');
$no = $offset + 1;
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="card">
      <h5 class="card-header">Transaksi | Data Peminjaman</h5>
      <?php if (isset($_SESSION['msg']['return']) || isset($_SESSION['msg']['not-found'])) { ?>
         <div class="alert alert-<?php echo (isset($_SESSION['msg']['return'])) ? 'success' : 'warning'; ?> mt-2" role="alert">
            <?php
            echo $_SESSION['msg']['return'];
            echo $_SESSION['msg']['not-found'];
            ?>
         </div>
      <?php } ?>
      <div class="d-flex justify-content-between align-items-center">
         <!-- SEARCH -->
         <form action="" method="POST">
            <div class="navbar-nav align-items-center border-primary rounded px-4">
               <div class="input-group">
                  <input type="text" name="member_nik" class="form-control border-primary" placeholder="Cari Anggota Berdasarkan NIK"
                     value="<?= (isset($_SESSION['value']['member_nik'])) ? $_SESSION['value']['member_nik'] : null; ?>">
                  <button class="btn btn-outline-primary waves-effect" type="submit" id="button-addon2"
                     name="search">Cari</button>
               </div>
            </div>
         </form>
         <!-- PAGINATION -->
         <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end float-end me-5">
               <!-- Tombol "Previous" atau "Home" -->
               <?php if ($page > 1): ?>
                  <?php if ($page > 2): ?>
                     <li class="page-item">
                        <a class="page-link" href="?page=transaction/show-data&pagination=1">Home</a>
                     </li>
                  <?php endif; ?>
                  <li class="page-item">
                     <a class="page-link" href="?page=transaction/show-data&pagination=<?php echo $page - 1; ?>">
                        <i class="tf-icon ri-skip-back-mini-line ri-22px"></i>
                     </a>
                  </li>
               <?php else: ?>
                  <li class="page-item disabled">
                     <a class="page-link">
                        <i class="tf-icon ri-skip-back-mini-line ri-22px"></i>
                     </a>
                  </li>
               <?php endif; ?>

               <!-- Balon angka halaman -->
               <?php
               if ($totalPages > 3) {
                  // Tampilkan angka halaman
                  if ($page > 2) {
                     echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                  }
                  for ($i = max(1, $page - 1); $i <= min($totalPages, $page + 1); $i++) {
                     echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                     echo '<a class="page-link" href="?page=transaction/show-data&pagination=' . $i . '">' . $i . '</a>';
                     echo '</li>';
                  }
                  if ($page < $totalPages - 1) {
                     echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                  }
               } else {
                  // Jika total halaman <= 3, tampilkan semuanya
                  for ($i = 1; $i <= $totalPages; $i++) {
                     echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                     echo '<a class="page-link" href="?page=transaction/show-data&pagination=' . $i . '">' . $i . '</a>';
                     echo '</li>';
                  }
               }
               ?>

               <!-- Tombol "Next" -->
               <?php if ($page < $totalPages): ?>
                  <li class="page-item">
                     <a class="page-link" href="?page=transaction/show-data&pagination=<?php echo $page + 1; ?>">
                        <i class="tf-icon ri-skip-forward-mini-line ri-22px"></i>
                     </a>
                  </li>
               <?php else: ?>
                  <li class="page-item disabled">
                     <a class="page-link">
                        <i class="tf-icon ri-skip-forward-mini-line ri-22px"></i>
                     </a>
                  </li>
               <?php endif; ?>
            </ul>
         </nav>
      </div>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jumlah Peminjaman</th>
                  <th>Waktu Peminjaman</th>
                  <th>Waktu Pengembalian</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_array($query)) { ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $data['nik_member']; ?></td>
                     <td><?php echo $data['name'] ?></td>
                     <td><?php echo ($data['return_date'] != null) ? '0' : $data['borrowed_books'] ?>/5</td>
                     <td><?php echo $data['borrow_date'] ?></td>
                     <td><?php echo ($data['return_date'] != null) ? $data['return_date'] : '<b>Belum Dikembalikan</b>' ?></td>
                     <td>
                        <a href="?page=transaction/detail-borrower&detail=<?php echo $data['id_transaksi']; ?>"
                           class="btn btn-sm btn-warning">
                           Detail
                           <i class="ri-book-open-line"></i>
                        </a>
                        <a href="?page=transaction/borrow-update&id=<?php echo $data['id_transaksi']; ?>"
                           class="btn btn-sm btn-info <?php echo ($data['return_date'] != null || $data['borrowed_books'] == '5') ? 'disabled' : null ?>">
                           <i class="ri-add-line"></i>
                           Tambah Buku
                        </a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?php
unset($_SESSION['msg']);
unset($_SESSION['value']);
?>