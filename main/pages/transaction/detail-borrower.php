<?php
include('process/read.php');
$no = 1;
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <a href="?page=transaction/show-data" type="submit" class="btn btn-secondary">
      <i class="ri-arrow-left-s-line"></i>
      Back
   </a>
   <h3 class="card-header float-end">Transaction | Detail Borrower's</h3>
   <div class="card mt-5">
      <h5 class="card-header float-end">Member</h5>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php $sql = "SELECT * FROM member";
               $queryMember = mysqli_query($connect, $sql);
               $dataMember = mysqli_fetch_array($queryMember); ?>
               <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $dataMember['nik']; ?></td>
                  <td><?php echo $dataMember['name']; ?></td>
                  <td><?php echo $dataMember['email']; ?></td>
                  <td><?php echo $dataMember['phone_number']; ?></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="card mt-5">
      <h5 class="card-header">Books</h5>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Title Book</th>
                  <th>Cover</th>
                  <th>Return Date</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_array($query)) { ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $data['title']; ?> | <?= $data['code']; ?></td>
                     <td>
                        <img class="w-25" src="pages/book/image/<?php echo $data['cover']; ?>" alt="">
                     </td>
                     <td><?php echo ($data['return_date'] != null) ? $data['return_date'] : '<b>Not return yet</b>'; ?>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>