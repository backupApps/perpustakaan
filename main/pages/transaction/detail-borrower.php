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
                  <th>Photo</th>
                  <th>NIK</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Address</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <tr>
                  <td>
                     <img class="rounded" style="width: 150px;"
                        src="pages/member/photo/<?php echo $dataMember['photo']; ?>" alt="">
                  </td>
                  <td><?php echo $dataMember['nik']; ?></td>
                  <td><?php echo $dataMember['name']; ?></td>
                  <td><?php echo $dataMember['email']; ?></td>
                  <td><?php echo $dataMember['phone_number']; ?></td>
                  <td><?php echo $dataMember['address']; ?></td>
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
                  <th>Cover</th>
                  <th>Title Book</th>
                  <th>Writer</th>
                  <th>Category</th>
                  <th>Publisher</th>
                  <th>ISBN</th>
                  <th>Borrow Date</th>
                  <th>Return Date</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_array($query)) { ?>
               <tr>
                  <td><?php echo $no++; ?></td>
                  <td>
                     <img width="100" class="rounded" src="pages/book/image/<?php echo $data['cover']; ?>" alt="">
                  </td>
                  <td><b><?php echo $data['code']; ?></b> | <?php echo $data['title']; ?></td>
                  <td><?php echo $data['writer']; ?></td>
                  <td><?php echo $data['category_name']; ?></td>
                  <td><?php echo $data['publisher_name']; ?></td>
                  <td><?php echo $data['isbn']; ?></td>
                  <td>
                     <?php echo $data['borrow_date']; ?>
                  </td>
                  <td>
                     <?php echo ($data['return_date'] != null) ? $data['return_date'] : '<b>Not return yet</b>'; ?>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>