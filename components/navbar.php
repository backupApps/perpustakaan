<nav class="layout-navbar container-xxl navbar navbar-expand-xl align-items-center bg-navbar-theme shadow"
   id="layout-navbar">
   <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
         <i class="ri-menu-fill ri-24px"></i>
      </a>
   </div>

   <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
         <!-- Place this tag where you want the button to render. -->
         <li class="nav-item lh-1 me-4">
            <a class="btn btn-warning" href="../index.php">
               Daftar Buku |
               <img style="width: 25px;" src="../assets/img/elements/book.png" alt="">
            </a>
         </li>

         <!-- User -->
         <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
               <div class="avatar avatar-online">
                  <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
               </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
               <li>
                  <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2">
                           <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <h6 class="mb-0 small">ADMIN</h6>
                           <small class="text-muted">Admin</small>
                        </div>
                     </div>
                  </a>
               </li>
               <li>
                  <div class="dropdown-divider"></div>
               </li>
               <li>
                  <div class="d-grid px-4 pt-2 pb-1">
                     <a class="btn btn-danger d-flex" href="../auth/process/logout-process.php">
                        <small class="align-middle">Logout</small>
                        <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                     </a>
                  </div>
               </li>
            </ul>
         </li>
         <!--/ User -->
      </ul>
   </div>
</nav>