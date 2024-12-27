<?php 
include('process/read.php');
$no = 1;
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <a href="?page=transaction/show-data" type="submit" class="btn btn-secondary">
      <i class="ri-arrow-left-s-line"></i>
      Back
   </a>
   <div class="card mt-5">
      <h5 class="card-header">Transaction | Detail Borrower's Data</h5>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Title Book</th>
                  <th>Cover</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while($data = mysqli_fetch_array($query)) { ?>
               <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['title']; ?></td>
                  <td>
                     <img class="w-25" src="pages/book/image/<?php echo $data['cover']; ?>" alt="">
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>