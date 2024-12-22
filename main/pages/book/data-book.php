<?php 
include('process/read.php');
$no = 1;
?>

<!-- Striped Rows -->
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card">
      <h5 class="card-header">Book | Data</h5>
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
                  <th>Code</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>ISBN</th>
                  <th>Writer</th>
                  <th>Publisher</th>
                  <th>Date</th>
                  <th>Language</th>
                  <th>Cover</th>
                  <th>Synopsis</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while($data = mysqli_fetch_array($query)) { ?>
               <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data['code'] ?></td>
                  <td><?php echo $data['title'] ?></td>
                  <td><?php echo $data['category'] ?></td>
                  <td><?php echo $data['isbn'] ?></td>
                  <td><?php echo $data['writer'] ?></td>
                  <td><?php echo $data['publisher'] ?></td>
                  <td><?php echo $data['date'] ?></td>
                  <td><?php echo $data['language'] ?></td>
                  <td>
                     <img class="w-100" src="pages/book/image/<?php echo $data['cover']; ?>" alt="">
                  </td>
                  <td><?php echo $data['synopsis'] ?></td>
                  <td>
                     <a href="?page=book/update-book&code=<?php echo $data['code']; ?>" class="btn btn-sm btn-info">
                        Edit
                        <i class="ri-pencil-line"></i>
                     </a> |
                     <a href="pages/book/process/delete.php?code=<?php echo $data['code']; ?>"
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