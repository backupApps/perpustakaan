<?php
include('process/read.php');
$no = $offset + 1;
?>

<!-- Striped Rows -->
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card w-100">
      <h5 class="card-header">Category | Data</h5>
      <?php if (isset($_SESSION['msg']['delete'])) { ?>
         <div class="alert alert-success mt-2" role="alert">
            <?php echo $_SESSION['msg']['delete']; ?>
         </div>
      <?php } ?>

      <?php if (isset($_SESSION['msg']['update'])) { ?>
         <div class="alert alert-success mt-2" role="alert">
            <?php echo $_SESSION['msg']['update']; ?>
         </div>
      <?php } ?>
      <nav aria-label="Page navigation">
         <ul class="pagination justify-content-end float-end me-5">
            <!-- Tombol "Previous" -->
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
               <a class="page-link" href="?page=category/data-category&pagination=<?php echo $page - 1; ?>">
                  <i class="tf-icon ri-skip-back-mini-line ri-22px"></i>
               </a>
            </li>

            <!-- Tombol angka halaman -->
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
               <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                  <a class="page-link" href="?page=category/data-category&pagination=<?php echo $i; ?>">
                     <?php echo $i; ?>
                  </a>
               </li>
            <?php endfor; ?>

            <!-- Tombol "Next" -->
            <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
               <a class="page-link" href="?page=category/data-category&pagination=<?php echo $page + 1; ?>">
                  <i class="tf-icon ri-skip-forward-mini-line ri-22px"></i>
               </a>
            </li>
         </ul>
      </nav>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $data['category_code']; ?></td>
                     <td><?php echo $data['category_name']; ?></td>
                     <td>
                        <a href="?page=category/update-category&code=<?php echo $data['category_code']; ?>"
                           class="btn btn-sm btn-info">
                           Edit
                           <i class="ri-pencil-line"></i>
                        </a> |
                        <a href="pages/category/process/delete.php?code=<?php echo $data['category_code']; ?>"
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