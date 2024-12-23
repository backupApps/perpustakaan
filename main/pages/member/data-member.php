<?php 
include('process/read.php');
$no = 1;
?>

<!-- Striped Rows -->
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card">
      <h5 class="card-header">Member | Data</h5>
      <?php if (isset($_SESSION['msg']['delete'])) { ?>
      <div class="alert alert-success mt-2" role="alert">
         <?php echo $_SESSION['msg']['delete'];?>
      </div>
      <?php } ?>

      <?php if (isset($_SESSION['msg']['update'])) { ?>
      <div class="alert alert-success ms-2 me-2" role="alert">
         <?php echo $_SESSION['msg']['update'];?>
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
               <?php while($data = mysqli_fetch_array($query)) { ?>
               <tr>
                  <td><?php echo $no++; ?></td>
                  <td>
                     <img src="pages/member/photo/<?php echo $data['photo'] ?>" alt="users" class="rounded w-75">
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