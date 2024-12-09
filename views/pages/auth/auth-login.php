<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
   data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
   <meta charset="utf-8" />
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title>Login Basic - Pages | Materio - Bootstrap Material Design Admin Template</title>

   <meta name="description" content="" />

   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="../../../assets/img/favicon/favicon.ico" />

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

   <link rel="stylesheet" href="../../../assets/vendor/fonts/remixicon/remixicon.css" />

   <!-- Menu waves for no-customizer fix -->
   <link rel="stylesheet" href="../../../assets/vendor/libs/node-waves/node-waves.css" />

   <!-- Core CSS -->
   <link rel="stylesheet" href="../../../assets/vendor/css/core.css" class="template-customizer-core-css" />
   <link rel="stylesheet" href="../../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
   <link rel="stylesheet" href="../../../assets/css/demo.css" />

   <!-- Vendors CSS -->
   <link rel="stylesheet" href="../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

   <!-- Page CSS -->
   <!-- Page -->
   <link rel="stylesheet" href="../../../assets/vendor/css/pages/page-auth.css" />

   <!-- Helpers -->
   <script src="../../../assets/vendor/js/helpers.js"></script>
   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="../../../assets/js/config.js"></script>
</head>

<body>
   <!-- Content -->

   <div class="position-relative">
      <div class="authentication-wrapper authentication-basic container-p-y">
         <div class="authentication-inner py-6 mx-4">
            <!-- Login -->
            <div class="card p-7">
               <!-- Logo -->
               <div class="app-brand justify-content-center mt-5">
                  <a href="index.html" class="app-brand-link gap-3">
                     <span class="app-brand-logo demo">
                        <span style="color: #9055fd">
                           <svg width="30" height="24" viewBox="0 0 250 196" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z"
                                 fill="currentColor" />
                              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                                 d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z" fill="black" />
                              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                                 d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z" fill="black" />
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z"
                                 fill="currentColor" />
                              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                                 d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z" fill="black" />
                              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                                 d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z" fill="black" />
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                                 fill="currentColor" />
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                                 fill="white" fill-opacity="0.15" />
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                                 fill="currentColor" />
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                                 fill="white" fill-opacity="0.3" />
                           </svg>
                        </span>
                     </span>
                     <!-- <span class="app-brand-text demo text-heading fw-semibold">Materio</span> -->
                  </a>
               </div>
               <!-- /Logo -->

               <div class="card-body mt-1">
                  <h4 class="mb-1">Welcome to Perpustakaan! 👋🏻</h4>
                  <p class="mb-5">Please sign-in to your account</p>

                  <form id="formAuthentication" class="mb-5" action="../../?page=dashboard" method="POST">
                     <div class="form-floating form-floating-outline mb-5">
                        <input type="text" class="form-control" id="email" name="email-username"
                           placeholder="Enter your email or username" autofocus />
                        <label for="email">Email or Username</label>
                     </div>
                     <div class="mb-5">
                        <div class="form-password-toggle">
                           <div class="input-group input-group-merge">
                              <div class="form-floating form-floating-outline">
                                 <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                 <label for="password">Password</label>
                              </div>
                              <span class="input-group-text cursor-pointer"><i
                                    class="ri-eye-off-line ri-20px"></i></span>
                           </div>
                        </div>
                     </div>
                     <div class="mb-5 pb-2 d-flex justify-content-between pt-2 align-items-center">
                        <div class="form-check mb-0">
                           <input class="form-check-input" type="checkbox" id="remember-me" />
                           <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                        <a href="auth-forgot.php" class="float-end mb-1">
                           <span>Forgot Password?</span>
                        </a>
                     </div>
                     <div class="mb-5">
                        <button class="btn btn-primary d-grid w-100" type="submit">login</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /Login -->
            <img src="../../../assets/img/illustrations/tree-3.png" alt="auth-tree"
               class="authentication-image-object-left d-none d-lg-block" />
            <img src="../../../assets/img/illustrations/auth-basic-mask-light.png"
               class="authentication-image d-none d-lg-block" height="172" alt="triangle-bg"
               data-app-light-img="illustrations/auth-basic-mask-light.png"
               data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
            <img src="../../../assets/img/illustrations/tree.png" alt="auth-tree"
               class="authentication-image-object-right d-none d-lg-block" />
         </div>
      </div>
   </div>

   <!-- / Content -->

   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="../../../assets/vendor/libs/jquery/jquery.js"></script>
   <script src="../../../assets/vendor/libs/popper/popper.js"></script>
   <script src="../../../assets/vendor/js/bootstrap.js"></script>
   <script src="../../../assets/vendor/libs/node-waves/node-waves.js"></script>
   <script src="../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
   <script src="../../../assets/vendor/js/menu.js"></script>

   <!-- endbuild -->

   <!-- Vendors JS -->

   <!-- Main JS -->
   <script src="../../../assets/js/main.js"></script>

   <!-- Page JS -->

   <!-- Place this tag before closing body tag for github widget button. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>