<?php 
session_start();
if (!isset($_SESSION['login'])){
   header('location: ../auth/form-login.php');
   exit();
}
?>

<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
   data-assets-path="assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
   <!-- Page CSS -->
   <?php include("../components/link-css.php"); ?>
</head>

<body>
   <?php
   $page = isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page'] : 'dashboard';
   $page_path = "pages/" . $page . ".php";

   if (file_exists($page_path)) {
   ?>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <!-- Sidebar Menu -->
         <?php include("../components/sidebar.php"); ?>

         <!-- Layout container -->
         <div class="layout-page">
            <!-- Navbar -->
            <?php include("../components/navbar.php"); ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">
               <!-- Content -->
               <?php include($page_path); ?>
               <!-- Footer -->
               <?php include("../components/footer.php"); ?>
               <!-- / Footer -->

               <div class="content-backdrop fade"></div>
            </div>
         </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
   </div>

   <?php 
   } else {
      http_response_code(404);
      include("pages/404.php");
   }
   ?>

   <!-- Core JS -->
   <?php include("../components/link-js.php"); ?>
</body>

</html>