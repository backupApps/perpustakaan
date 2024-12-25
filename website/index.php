<?php 
include('../components/connection.php');
$sql = "SELECT * FROM book";
$query = mysqli_query($connect, $sql);
?>

<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
   data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
   <meta charset="utf-8" />
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title>Perpustakaan</title>

   <meta name="description" content="" />

   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

   <link rel="stylesheet" href="../assets/vendor/fonts/remixicon/remixicon.css" />

   <!-- Menu waves for no-customizer fix -->
   <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

   <!-- Core CSS -->
   <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
   <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
   <link rel="stylesheet" href="../assets/css/demo.css" />

   <!-- Vendors CSS -->
   <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

   <!-- Page CSS -->

   <!-- Helpers -->
   <script src="../assets/vendor/js/helpers.js"></script>
   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="../assets/js/config.js"></script>
</head>

<body>

   <!-- Navbar -->
   <nav class="layout-navbar px-10 navbar align-items-center bg-navbar-theme shadow" id="layout-navbar"
      style="height: 10vh;">
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
         <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="ri-menu-fill ri-24px"></i>
         </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
         <!-- Search -->
         <div class="navbar-nav align-items-center border rounded px-4">
            <div class="nav-item d-flex align-items-center">
               <i class="ri-search-line ri-22px me-2"></i>
               <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
            </div>
         </div>

         <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <li class="nav-item lh-1 me-4">
               <a class="github-button"
                  href="https://github.com/themeselection/materio-bootstrap-html-admin-template-free"
                  data-icon="octicon-star" data-size="large" data-show-count="true"
                  aria-label="Star themeselection/materio-bootstrap-html-admin-template-free on GitHub">Star</a>
            </li>

            <!-- Login -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
               <div class="d-grid px-4 pt-2 pb-1">
                  <a class="btn btn-danger d-flex" href="../auth/form-login.php">
                     <small class="align-middle">Login</small>
                     <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                  </a>
               </div>
            </li>
         </ul>
      </div>
   </nav>

   <!-- Content wrapper -->
   <div class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
         <!-- Carousel -->
         <div class="col-md mb-10">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                     aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                     aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                     aria-label="Slide 3"></button>
               </div>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img class="d-block w-100" src="../assets/img/carousels/bleach-landscape.jpeg" alt="First slide"
                        style="max-height: 400px; object-fit: fill;" />
                     <div class="carousel-caption d-none d-md-block">
                        <h3>BLEACH</h3>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="../assets/img/carousels/hunterxhunter-landscape.jpeg"
                        alt="Second slide" style="max-height: 400px; object-fit: fill;" />
                     <div class="carousel-caption d-none d-md-block">
                        <h3>HUNTER X HUNTER</h3>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="../assets/img/carousels/naruto-landscape.jpeg" alt="Third slide"
                        style="max-height: 400px; object-fit: fill;" />
                     <div class="carousel-caption d-none d-md-block">
                        <h3>NARUTO</h3>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
               </a>
            </div>
         </div>

         <!-- CARD -->
         <div class="row mb-12 g-6">
            <?php while($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-6 col-lg-3">
               <div class="card h-100">
                  <img class="card-img-top" src="../main/pages/book/image/<?php echo $data['cover']; ?>"
                     alt="Card image cap" style="max-height: 250px; object-fit: cover;" />
                  <div class="card-body">
                     <h5 class="card-title"><?php echo $data['title']; ?></h5>
                     <p class="card-text"
                        style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <?php echo $data['synopsis']; ?>
                     </p>
                     <a href="javascript:void(0)" class="btn btn-outline-primary">View</a>
                     <a href="javascript:void(0)" class="btn btn-primary">Edit</a>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
      <!-- / Content -->

      <!-- Footer -->
      <footer class="content-footer footer bg-footer-theme shadow">
         <div class="row container-xxl p-5 justify-content-center">
            <div class="col-md-6 col-12">
               <h5>About</h5>
               <p class="w-75">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit tempore
                  necessitatibus optio
                  nostrum fugit nihil! Necessitatibus impedit, eos nostrum amet inventore sequi fugit, ducimus,
                  provident iusto sint minima. Quia, nam?</p>
            </div>
            <div class="col-md-2 col-12">
               <div class="card-header">
                  <h5 class="mb-1">Connected Accounts</h5>
               </div>
               <div class="card-body">
                  <div class="d-flex mb-4 align-items-center">
                     <div class="flex-shrink-0">
                        <img src="../assets/img/icons/brands/google.png" alt="google" class="me-4" height="32">
                     </div>
                     <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                        <div class="mb-sm-0 mb-2">
                           <small>
                              <h6 class="mb-0">Google</h6>
                           </small>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-4 align-items-center">
                     <div class="flex-shrink-0">
                        <img src="../assets/img/icons/brands/github.png" alt="github" class="me-4" height="32">
                     </div>
                     <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                        <div class="mb-sm-0 mb-2">
                           <small>
                              <h6 class="mb-0">Github</h6>
                           </small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-2 col-12">
               <div class="card-header">
                  <h5 class="mb-1">Social Accounts</h5>
               </div>
               <div class="card-body">
                  <!-- Social Accounts -->
                  <div class="d-flex mb-4 align-items-center">
                     <div class="flex-shrink-0">
                        <img src="../assets/img/icons/brands/facebook.png" alt="facebook" class="me-4" height="32">
                     </div>
                     <div class="flex-grow-1 row align-items-center">
                        <div class="col-7">
                           <a href="https://twitter.com/Theme_Selection" target="_blank" class="small">
                              <h6 class="mb-0">Facebook</h6>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-4 align-items-center">
                     <div class="flex-shrink-0">
                        <img src="../assets/img/icons/brands/twitter.png" alt="twitter" class="me-4" height="32">
                     </div>
                     <div class="flex-grow-1 row align-items-center">
                        <div class="col-7">
                           <a href="https://twitter.com/Theme_Selection" target="_blank" class="small">
                              <h6 class="mb-0">Twitter</h6>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-4 align-items-center">
                     <div class="flex-shrink-0">
                        <img src="../assets/img/icons/brands/instagram.png" alt="instagram" class="me-4" height="32">
                     </div>
                     <div class="flex-grow-1 row align-items-center">
                        <div class="col-7">
                           <a href="https://www.instagram.com/themeselection/" target="_blank" class="small">
                              <h6 class="mb-0">Instagram</h6>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class=" container-xxl">
            <div
               class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
               <div class="text-body mb-2 mb-md-0">
                  ©
                  <script>
                  document.write(new Date().getFullYear());
                  </script>
                  , made with <span class="text-danger"><i class="tf-icons ri-heart-fill"></i></span> by
                  <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
               </div>
               <div class="d-none d-lg-inline-block">
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                     Themes</a>

                  <a href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/documentation/"
                     target="_blank" class="footer-link me-4">Documentation</a>

                  <a href="https://github.com/themeselection/materio-bootstrap-html-admin-template-free/issues"
                     target="_blank" class="footer-link">Support</a>
               </div>
            </div>

         </div>

      </footer>
      <!-- / Footer -->

      <div class="content-backdrop fade"></div>
   </div>

   <!-- Overlay -->
   <div class="layout-overlay layout-menu-toggle"></div>

   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="../assets/vendor/libs/jquery/jquery.js"></script>
   <script src="../assets/vendor/libs/popper/popper.js"></script>
   <script src="../assets/vendor/js/bootstrap.js"></script>
   <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
   <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
   <script src="../assets/vendor/js/menu.js"></script>

   <!-- endbuild -->

   <!-- Vendors JS -->
   <script src="../assets/vendor/libs/masonry/masonry.js"></script>

   <!-- Main JS -->
   <script src="../assets/js/main.js"></script>

   <!-- Page JS -->

   <!-- Place this tag before closing body tag for github widget button. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>