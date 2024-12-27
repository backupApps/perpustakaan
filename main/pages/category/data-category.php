<?php 
include('process/read.php');
$no = 1;
?>

<!-- Striped Rows -->
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card w-75">
      <h5 class="card-header">Category | Data</h5>
      <?php if (isset($_SESSION['msg']['delete'])) { ?>
      <div class="alert alert-success mt-2" role="alert">
         <?php echo $_SESSION['msg']['delete'];?>
      </div>
      <?php } ?>

      <?php if (isset($_SESSION['msg']['update'])) { ?>
      <div class="alert alert-success mt-2" role="alert">
         <?php echo $_SESSION['msg']['update'];?>
      </div>
      <?php } ?>
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
               <?php while ($data = mysqli_fetch_array($query)) { ?>
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