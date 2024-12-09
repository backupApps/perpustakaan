<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
   data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
   <!-- Page CSS -->
   <?php include("../components/link-css.php"); ?>
</head>

<body>
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
               <?php
                  $page = isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page'] : 'dashboard';
                  include("pages/" . $page . ".php");
               ?>
               <!-- Footer -->
               <?php include("../components/footer.php"); ?>
               <!-- / Footer -->

               <div class="content-backdrop fade"></div>
            </div>
         </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
   </div>

   <!-- Core JS -->
   <?php include("../components/link-js.php"); ?>
</body>

</html>