<?php
session_start();
include('../components/connection.php');
$sql = "SELECT * FROM book 
         LEFT JOIN category ON book.category_code = category.category_code
         LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
         ORDER BY book.title ASC";
$query = mysqli_query($connect, $sql);

if (isset($_POST['search'])) {
   $title = $_POST['title-book'];
   $_SESSION['value-title'] = $title;
   $sql = "SELECT * FROM book 
            LEFT JOIN category ON book.category_code = category.category_code
            LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
            WHERE title LIKE '%$title%' 
            ORDER BY book.title ASC";
   $query = mysqli_query($connect, $sql);
   if (mysqli_num_rows($query) == 0) {
      $_SESSION['not-found'] = 'Buku tidak ditemukan!';
   }
}
?>

<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
   data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
   <?php include('../components/link-css.php'); ?>
</head>

<body>

   <!-- Navbar -->
   <?php include('layouts/navbar.php') ?>

   <!-- Content wrapper -->
   <div class="content-wrapper min-vh-100">
      <div class="container-xxl flex-grow-1 container-p-y">
         <!-- Carousel -->
         <div id="carousel-container" class="col-md mb-10">

            <?php
            if (!isset($_POST['search']) || empty($_POST['title-book'])) {
               include('layouts/carousel.php');
            }
            ?>
         </div>

         <!-- CARD -->
         <div class="row mb-12 g-6" id="card">
            <?php
            if (isset($_SESSION['not-found'])) {
               echo '<h1 class="text-center bg-warning py-5 rounded">' . $_SESSION['not-found'] . '</h1>';
            }
            include('layouts/card.php')
            ?>
         </div>
      </div>
      <!-- / Content -->

      <!-- Footer -->
      <?php include('layouts/footer.php') ?>
      <!-- / Footer -->

      <div class="content-backdrop fade"></div>
   </div>

   <!-- Overlay -->
   <div class="layout-overlay layout-menu-toggle"></div>

   <!-- Core JS -->
   <?php include('../components/link-js.php'); ?>

   <!-- live search -->
   <?php include('functions/live-search.php') ?>
</body>

</html>

<?php
unset($_SESSION['value-title']);
unset($_SESSION['not-found']);




// $sql = "SELECT * FROM book 
//          LEFT JOIN category ON book.category_code = category.category_code
//          LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
//          ORDER BY book.title ASC";

// live-search
//    $sql = "SELECT * FROM book
//             LEFT JOIN category ON book.category_code = category.category_code
//             LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
//             WHERE title LIKE '%$title%' ORDER BY book.title ASC";
?>