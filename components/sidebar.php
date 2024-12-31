<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow">
   <div class="app-brand demo">
      <a href="" class="app-brand-link">
         <img style="width: 50px;" src="../assets/img/elements/book.png" alt="">
         <span class="app-brand-text demo menu-text fw-semibold ms-2">Perpustakaan</span>
      </a>
   </div>
   <div class="menu-inner-shadow"></div>

   <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li
         class="menu-item <?php echo (!isset($_REQUEST['page']) || $_REQUEST['page'] == 'dashboard') ? 'active' : null ?> ">
         <a href="?page=dashboard" class="menu-link">
            <i class="menu-icon tf-icons ri-pie-chart-line"></i>
            <div data-i18n="Dashboard">Dashboard</div>
         </a>
      </li>

      <!-- Category -->
      <li
         class="menu-item <?php if ($_REQUEST['page'] == 'category/data-category' || $_REQUEST['page'] == 'category/input-category') {
                              echo 'open';
                           } ?>">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ri-book-read-line"></i>
            <div data-i18n="Dashboards">Category</div>
         </a>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'category/data-category') ? 'active' : null ?>">
               <a href="?page=category/data-category" class="menu-link">
                  <div data-i18n="Data">Category Data</div>
               </a>
            </li>
         </ul>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'category/input-category') ? 'active' : null ?>">
               <a href="?page=category/input-category" class="menu-link">
                  <div data-i18n="Input">Category Input</div>
               </a>
            </li>
         </ul>
      </li>

      <!-- Publisher -->
      <li
         class="menu-item <?php if ($_REQUEST['page'] == 'publisher/data-publisher' || $_REQUEST['page'] == 'publisher/input-publisher') {
                              echo 'open';
                           } ?>">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ri-price-tag-3-line"></i>
            <div data-i18n="Dashboards">Publisher</div>
         </a>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'publisher/data-publisher') ? 'active' : null ?>">
               <a href="?page=publisher/data-publisher" class="menu-link">
                  <div data-i18n="Data">Publisher Data</div>
               </a>
            </li>
         </ul>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'publisher/input-publisher') ? 'active' : null ?>">
               <a href="?page=publisher/input-publisher" class="menu-link">
                  <div data-i18n="Input">Publisher Input</div>
               </a>
            </li>
         </ul>
      </li>

      <!-- Book -->
      <li
         class="menu-item <?php if ($_REQUEST['page'] == 'book/data-book' || $_REQUEST['page'] == 'book/input-book') {
                              echo 'open';
                           } ?>">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ri-book-shelf-line"></i>
            <div data-i18n="Dashboards">Book</div>
         </a>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'book/data-book') ? 'active' : null ?>">
               <a href="?page=book/data-book" class="menu-link">
                  <div data-i18n="Data">Book Data</div>
               </a>
            </li>
         </ul>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'book/input-book') ? 'active' : null ?>">
               <a href="?page=book/input-book" class="menu-link">
                  <div data-i18n="Input">Book Input</div>
               </a>
            </li>
         </ul>
      </li>

      <!-- Member -->
      <li
         class="menu-item <?php if ($_REQUEST['page'] == 'member/data-member' || $_REQUEST['page'] == 'member/input-member') {
                              echo 'open';
                           } ?>">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ri-id-card-line"></i>
            <div data-i18n="Member">Member</div>
         </a>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'member/data-member') ? 'active' : null ?>">
               <a href="?page=member/data-member" class="menu-link">
                  <div data-i18n="Data">Member Data</div>
               </a>
            </li>
         </ul>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'member/input-member') ? 'active' : null ?>">
               <a href="?page=member/input-member" class="menu-link">
                  <div data-i18n="Input">Member Input</div>
               </a>
            </li>
         </ul>
      </li>

      <!-- Transaction -->
      <li
         class="menu-item <?php if ($_REQUEST['page'] == 'transaction/borrow' || $_REQUEST['page'] == 'transaction/return' || $_REQUEST['page'] == 'transaction/show-data') {
                              echo 'open';
                           } ?>">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ri-shopping-cart-line"></i>
            <div data-i18n="Transaction">Transaction</div>
         </a>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'transaction/show-data') ? 'active' : null ?>">
               <a href="?page=transaction/show-data" class="menu-link">
                  <div data-i18n="Data">Borrower's Data</div>
               </a>
            </li>
         </ul>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'transaction/borrow') ? 'active' : null ?>">
               <a href="?page=transaction/borrow" class="menu-link">
                  <div data-i18n="Data">Borrowed Books</div>
               </a>
            </li>
         </ul>
         <ul class="menu-sub ms-5">
            <li class="menu-item <?php echo ($_REQUEST['page'] == 'transaction/return') ? 'active' : null ?>">
               <a href="?page=transaction/return" class="menu-link">
                  <div data-i18n="Input">Return Books</div>
               </a>
            </li>
         </ul>
      </li>
   </ul>
</aside>