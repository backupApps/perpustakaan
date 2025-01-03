<?php
include('process/read.php');
$no = 1;
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
                        <a href="?page=transaction/detail-borrower&id_tr=<?php echo $data['id_transaksi']; ?>"
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

<?php unset($_SESSION['msg']); ?>