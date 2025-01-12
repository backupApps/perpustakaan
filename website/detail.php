<?php 
include('../components/connection.php');
if ($_REQUEST['code']) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM book 
         LEFT JOIN category ON book.category_code = category.category_code
         LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
         WHERE book.code = '$code'
      ";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php include('../components/link-css.php'); ?>
</head>

<body>
   <div class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
         <div class="card mb-6">
            <div class="card-body">
               <div class="mt-4">
                  <div class="">
                     <a href="index.php" class="btn btn-danger float-end">Close</a>
                     <h2 class="modal-title">Book's Detail</h2>
                  </div>
                  <div class="modal-body mt-5">
                     <div class="d-flex mb-5">
                        <img class="shadow rounded me-5" width="350" height="450vh"
                           src="../main/pages/book/image/<?= $data['cover']; ?>" alt="">
                        <div class="">
                           <h5><b>Title : </b><?= $data['title']; ?></h5>
                           <h5><b>Category : </b><?= $data['category_name']; ?></h5>
                           <h5><b>ISBN : </b><?= $data['isbn']; ?></h5>
                           <h5><b>Writer : </b><?= $data['writer']; ?></h5>
                           <h5><b>Publisher : </b><?= $data['publisher_name']; ?></h5>
                           <h5><b>Date : </b><?= $data['date']; ?></h5>
                           <h5><b>Language : </b><?= $data['language']; ?></h5>
                           <h5><b>Synopsis : </b><?= $data['synopsis']; ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php include('../components/link-js.php'); ?>
</body>

</html>