<?php
include('../components/connection.php');
$sql = "SELECT *, COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
      FROM transaksi
      LEFT JOIN member ON transaksi.nik_member = member.nik
      LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
      GROUP BY transaksi.id ORDER BY transaksi.id DESC";
$query = mysqli_query($connect, $sql);
$no = 1;
// $no = $offset + 1;
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="card">
      <h5 class="card-header">Transaction | Borrower's Data</h5>
      <?php if (isset($_SESSION['msg']['return'])) { ?>
      <div class="alert alert-success ms-2 me-2" role="alert">
         <?php echo $_SESSION['msg']['return']; ?>
      </div>
      <?php } ?>

      <?php if (isset($_SESSION['msg']['delete'])) { ?>
      <div class="alert alert-success ms-2 me-2" role="alert">
         <?php echo $_SESSION['msg']['delete']; ?>
      </div>
      <?php } ?>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>Name</th>
                  <th>Borrowed Books</th>
                  <th>Borrow Date</th>
                  <th>Return Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_array($query)) { ?>
               <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nik']; ?></td>
                  <td><?php echo $data['name'] ?></td>
                  <td><?php echo ($data['return_date'] != null) ? '0' : $data['borrowed_books'] ?>/5</td>
                  <td><?php echo $data['borrow_date'] ?></td>
                  <td><?php echo ($data['return_date'] != null) ? $data['return_date'] : '<b>Not return yet</b>' ?></td>
                  <td>
                     <a href="?page=transaction/detail-borrower&detail=<?php echo $data['id_transaksi']; ?>"
                        class="btn btn-sm btn-warning">
                        Detail
                        <i class="ri-book-open-line"></i>
                     </a>
                     <a href="?page=transaction/borrow-update&id=<?php echo $data['id_transaksi']; ?>"
                        class="btn btn-sm btn-info <?php echo ($data['return_date'] != null || $data['borrowed_books'] == '5') ? 'disabled' : null ?>">
                        Add books
                        <i class="ri-add-line"></i>
                     </a>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?php unset($_SESSION['msg']); 


/*
<!-- PAGINATION -->
      <nav aria-label="Page navigation">
         <ul class="pagination justify-content-end float-end me-5">
            <!-- Tombol "Previous" -->
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
<a class="page-link" href="?page=transaction/show-data&pagination=<?php echo $page - 1; ?>">
   <i class="tf-icon ri-skip-back-mini-line ri-22px"></i>
</a>
</li>

<!-- Tombol angka halaman -->
<?php for ($i = 1; $i <= $totalPages; $i++) : ?>
<li class="page-item <?php if ($i == $page) echo 'active'; ?>">
   <a class="page-link" href="?page=transaction/show-data&pagination=<?php echo $i; ?>">
      <?php echo $i; ?>
   </a>
</li>
<?php endfor; ?>

<!-- Tombol "Next" -->
<li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
   <a class="page-link" href="?page=transaction/show-data&pagination=<?php echo $page + 1; ?>">
      <i class="tf-icon ri-skip-forward-mini-line ri-22px"></i>
   </a>
</li>
</ul>
</nav>
*/
?>