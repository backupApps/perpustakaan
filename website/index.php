<?php
session_start();
include('functions/read.php') ?>

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
            <?php include('layouts/carousel.php') ?>
         </div>

         <!-- CARD -->
         <div class="row mb-12 g-6" id="card">
            <?php include('layouts/card.php') ?>
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
   <!-- Place this tag before closing body tag for github widget button. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>

   <?php include('functions/live-search.php') ?>
</body>

</html>