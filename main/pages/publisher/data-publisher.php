<?php
include('process/read.php');
$no = $offset + 1;
?>

<!-- Striped Rows -->
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card">
      <h5 class="card-header">Publisher | Data</h5>
      <?php if (isset($_SESSION['msg']['delete']) || isset($_SESSION['msg']['update']) || isset($_SESSION['msg']['not-found'])) { ?>
         <div class="alert alert-<?php echo (isset($_SESSION['msg']['delete']) || isset($_SESSION['msg']['update'])) ? 'success' : 'warning'; ?> mt-2" role="alert">
            <?php
            echo $_SESSION['msg']['delete'];
            echo $_SESSION['msg']['update'];
            echo $_SESSION['msg']['not-found'];
            ?>
         </div>
      <?php } ?>
      <div class="d-flex justify-content-between align-items-center">
         <!-- SEARCH -->
         <form action="" method="POST">
            <div class="navbar-nav align-items-center border-primary rounded px-4">
               <div class="input-group">
                  <input type="text" name="publisher_name" class="form-control border-primary" placeholder="Cari Penerbit"
                     value="<?= (isset($_SESSION['value']['publisher_name'])) ? $_SESSION['value']['publisher_name'] : null; ?>">
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
                        <a class="page-link" href="?page=publisher/data-publisher&pagination=1">Home</a>
                     </li>
                  <?php endif; ?>
                  <li class="page-item">
                     <a class="page-link" href="?page=publisher/data-publisher&pagination=<?php echo $page - 1; ?>">
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
                     echo '<a class="page-link" href="?page=publisher/data-publisher&pagination=' . $i . '">' . $i . '</a>';
                     echo '</li>';
                  }
                  if ($page < $totalPages - 1) {
                     echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                  }
               } else {
                  // Jika total halaman <= 3, tampilkan semuanya
                  for ($i = 1; $i <= $totalPages; $i++) {
                     echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                     echo '<a class="page-link" href="?page=publisher/data-publisher&pagination=' . $i . '">' . $i . '</a>';
                     echo '</li>';
                  }
               }
               ?>

               <!-- Tombol "Next" -->
               <?php if ($page < $totalPages): ?>
                  <li class="page-item">
                     <a class="page-link" href="?page=publisher/data-publisher&pagination=<?php echo $page + 1; ?>">
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
                  <th>Code</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $data['publisher_code']; ?></td>
                     <td><?php echo $data['publisher_name']; ?></td>
                     <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <?php echo $data['address']; ?></td>
                     </td>
                     <td>
                        <a href="?page=publisher/update-publisher&code=<?php echo $data['publisher_code']; ?>"
                           class="btn btn-sm btn-info">
                           Edit
                           <i class="ri-pencil-line"></i>
                        </a> |
                        <a href="pages/publisher/process/delete.php?code=<?php echo $data['publisher_code']; ?>"
                           onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">
                           <i class="ri-delete-bin-line"></i>
                           Delete
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