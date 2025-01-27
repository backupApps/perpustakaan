<?php
include('process/read.php');
$no = $offset + 1;
?>

<!-- Striped Rows -->
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card">
      <h5 class="card-header">Member | Data</h5>
      <?php if (isset($_SESSION['msg']['delete'])) { ?>
         <div class="alert alert-success mt-2" role="alert">
            <?php echo $_SESSION['msg']['delete']; ?>
         </div>
      <?php } ?>
      <!-- PAGINATION -->
      <nav aria-label="Page navigation">
         <ul class="pagination justify-content-end float-end me-5">
            <!-- Tombol "Previous" atau "Home" -->
            <?php if ($page > 1): ?>
               <?php if ($page > 2): ?>
                  <li class="page-item">
                     <a class="page-link" href="?page=member/data-member&pagination=1">Home</a>
                  </li>
               <?php endif; ?>
               <li class="page-item">
                  <a class="page-link" href="?page=member/data-member&pagination=<?php echo $page - 1; ?>">
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
                  echo '<a class="page-link" href="?page=member/data-member&pagination=' . $i . '">' . $i . '</a>';
                  echo '</li>';
               }
               if ($page < $totalPages - 1) {
                  echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
               }
            } else {
               // Jika total halaman <= 3, tampilkan semuanya
               for ($i = 1; $i <= $totalPages; $i++) {
                  echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                  echo '<a class="page-link" href="?page=member/data-member&pagination=' . $i . '">' . $i . '</a>';
                  echo '</li>';
               }
            }
            ?>

            <!-- Tombol "Next" -->
            <?php if ($page < $totalPages): ?>
               <li class="page-item">
                  <a class="page-link" href="?page=member/data-member&pagination=<?php echo $page + 1; ?>">
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
      <?php if (isset($_SESSION['msg']['update'])) { ?>
         <div class="alert alert-success ms-2 me-2" role="alert">
            <?php echo $_SESSION['msg']['update']; ?>
         </div>
      <?php } ?>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Photo's</th>
                  <th>NIK</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>E-mail</th>
                  <th>Address</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_array($query)) { ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td>
                        <img src="pages/member/photo/<?php echo $data['photo'] ?>" alt="users" class="rounded" width="85"
                           height="120" />
                     </td>
                     <td><?php echo $data['nik'] ?></td>
                     <td><?php echo $data['name'] ?></td>
                     <td><?php echo $data['phone_number'] ?></td>
                     <td><?php echo $data['email'] ?></td>
                     <td><?php echo $data['address'] ?></td>
                     <td>
                        <a href="?page=member/update-member&nik=<?php echo $data['nik']; ?>" class="btn btn-sm btn-info">
                           Edit
                           <i class="ri-pencil-line"></i>
                        </a> |
                        <a href="pages/member/process/delete.php?nik=<?php echo $data['nik']; ?>"
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

<?php unset($_SESSION['msg']); ?>