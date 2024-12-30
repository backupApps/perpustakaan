<nav class="layout-navbar px-10 py-11 navbar align-items-center bg-navbar-theme shadow" id="layout-navbar"
   style="height: 10vh;">
   <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <!-- Search -->
      <div class="navbar-nav align-items-center border border-primary rounded px-4">
         <div class="nav-item d-flex align-items-center">
            <i class="ri-search-line ri-22px me-2"></i>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
               onkeyup="searchBook(this.value)" />
         </div>
      </div>

      <div class="navbar-nav align-items-center m-auto d-flex flex-row">
         <img style="width: 80px;" src="../assets/img/elements/book.png" alt="">
         <h2 class="text-primary mt-3 ms-3">
            E - PUSTAKA
         </h2>
      </div>

      <ul class="navbar-nav flex-row align-items-center ms-auto">
         <!-- Login -->
         <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <div class="d-grid px-4 pt-2 pb-1">
               <a class="btn btn-danger d-flex" href="../auth/form-login.php">
                  <div class="align-middle">Login</div>
                  <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
               </a>
            </div>
         </li>
      </ul>
   </div>
</nav>