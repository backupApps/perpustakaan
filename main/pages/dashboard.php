<?php
include('../components/connection.php');

//! Cards
$sql = "SELECT 
            (SELECT COUNT(id) FROM transaksi) AS transaksi,
            (SELECT COUNT(nik) FROM member) AS members,
            (SELECT COUNT(code) FROM book) AS books,
            (SELECT COUNT(id) FROM users) AS users
";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

//! Data tables 
// Pagination setup
$limit = 10; // Jumlah data per halaman
$page = isset($_REQUEST['pagination']) ? (int)$_REQUEST['pagination'] : 1; // Halaman saat ini, default 1

// Hitung total data
$totalQuery = mysqli_query($connect, "SELECT COUNT(DISTINCT transaksi.id) AS total FROM transaksi
                                      LEFT JOIN member ON transaksi.nik_member = member.nik
                                      LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $limit); // Total halaman

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;
$offset = ($page - 1) * $limit; // Hitung offset untuk SQL

$sql = "SELECT 
            transaksi.id, 
            transaksi.nik_member, 
            DATE_FORMAT(transaksi.borrow_date, '%Y-%m-%d %H:%i') AS borrowed_date,
            DATE_FORMAT(transaksi.return_date, '%Y-%m-%d %H:%i') AS returned_date,
            detail_transaksi.id_transaksi, 
            member.name, 
            COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
        FROM transaksi
        LEFT JOIN member ON transaksi.nik_member = member.nik
        LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
        GROUP BY transaksi.id 
        ORDER BY transaksi.id DESC
        LIMIT $limit OFFSET $offset";
$query = mysqli_query($connect, $sql);

// fungsi cari
if (isset($_POST['search'])) {
   $member_nik = $_POST['member_nik'];

   if (!empty($member_nik)) {
      // Simpan input pencarian ke session
      $_SESSION['value']['member_nik'] = $member_nik;

      // Query pencarian
      $sql = "SELECT 
                    transaksi.id, 
                    transaksi.nik_member, 
                    DATE_FORMAT(transaksi.borrow_date, '%Y-%m-%d %H:%i') AS borrowed_date,
                    DATE_FORMAT(transaksi.return_date, '%Y-%m-%d %H:%i') AS returned_date, 
                    detail_transaksi.id_transaksi, 
                    member.name, 
                    COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
                FROM transaksi
                LEFT JOIN member ON transaksi.nik_member = member.nik
                LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
                WHERE transaksi.nik_member LIKE '%$member_nik%'
                GROUP BY transaksi.id 
                ORDER BY transaksi.id DESC";
      $query = mysqli_query($connect, $sql);

      // Hitung total data hasil pencarian
      $totalQuery = mysqli_query($connect, "SELECT COUNT(DISTINCT transaksi.id) AS total FROM transaksi
                                      LEFT JOIN member ON transaksi.nik_member = member.nik
                                      LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
                                      WHERE transaksi.nik_member LIKE '%$member_nik%'");
      $totalData = mysqli_fetch_assoc($totalQuery)['total'];
      $totalPages = ceil($totalData / $limit);

      // Notifikasi jika data tidak ditemukan
      if (mysqli_num_rows($query) == 0) {
         $_SESSION['msg']['not-found'] = 'Anggota tidak ditemukan!';
      }
   } else {
      // Reset pencarian jika input kosong
      unset($_SESSION['value']['member_nik'], $_SESSION['msg']['not-found']);
      $sql = "SELECT 
                    transaksi.id, 
                    transaksi.nik_member, 
                    DATE_FORMAT(transaksi.borrow_date, '%Y-%m-%d %H:%i') AS borrowed_date,
                    DATE_FORMAT(transaksi.return_date, '%Y-%m-%d %H:%i') AS returned_date, 
                    detail_transaksi.id_transaksi, 
                    member.name, 
                    COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
                FROM transaksi
                LEFT JOIN member ON transaksi.nik_member = member.nik
                LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
                GROUP BY transaksi.id 
                ORDER BY transaksi.id DESC
                LIMIT $limit OFFSET $offset";
      $query = mysqli_query($connect, $sql);
   }
}

// detail
if (isset($_REQUEST['detail'])) {
   $id = $_REQUEST['detail'];

   // Ambil detail transaksi beserta data member dan buku
   $sql = "SELECT *, 
               DATE_FORMAT(transaksi.borrow_date, '%Y-%m-%d %H:%i') AS borrowed_date,
               DATE_FORMAT(transaksi.return_date, '%Y-%m-%d %H:%i') AS returned_date
            FROM detail_transaksi
            LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            LEFT JOIN member ON transaksi.nik_member = member.nik
            LEFT JOIN book ON detail_transaksi.code_book = book.code
            LEFT JOIN category ON book.category_code = category.category_code
            LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
            WHERE detail_transaksi.id_transaksi = '$id'
   ";
   $query = mysqli_query($connect, $sql);

   $queryMember = mysqli_query($connect, $sql);
   $dataMember = mysqli_fetch_array($queryMember);
}

$no = $offset + 1;
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row gy-6">
      <!-- Card -->
      <div class="col-lg-12">
         <div class="row g-6 mb-6">
            <div class="col-md">
               <div class="card">
                  <div class="row g-0 ms-2 align-items-center">
                     <div class="col-md-4">
                        <img class="card-img card-img-left" src="../assets/img/icons/book-shelf-line.png" alt="Card image" />
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title">Buku</h5>
                           <h5 class="card-text"><?php echo $data['books']; ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md">
               <div class="card">
                  <div class="row g-0 ms-2 align-items-center">
                     <div class="col-md-4">
                        <img class="card-img card-img-left" src="../assets/img/icons/id-card-line.png" alt="Card image" />
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title">Anggota</h5>
                           <h5 class="card-text"><?php echo $data['members']; ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md">
               <div class="card">
                  <div class="row g-0 ms-2 align-items-center">
                     <div class="col-md-4">
                        <img class="card-img card-img-left" src="../assets/img/icons/shopping-cart-line.png" alt="Card image" />
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title">Transaksi</h5>
                           <h5 class="card-text"><?php echo $data['transaksi']; ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md">
               <div class="card">
                  <div class="row g-0 ms-2 align-items-center">
                     <div class="col-md-4">
                        <img class="card-img card-img-left" src="../assets/img/icons/user-star-line.png" alt="Card image" />
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title">Admin</h5>
                           <h5 class="card-text"><?php echo $data['users']; ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Card -->

      <!-- Data Tables -->
      <div class="card">
         <h5 class="card-header">Data Telat Pengembalian Buku</h5>
         <?php if (isset($_SESSION['msg']['return']) || isset($_SESSION['msg']['not-found'])) { ?>
            <div class="alert alert-<?php echo (isset($_SESSION['msg']['return'])) ? 'success' : 'warning'; ?> mt-2" role="alert">
               <?php
               echo $_SESSION['msg']['return'];
               echo $_SESSION['msg']['not-found'];
               ?>
            </div>
         <?php } ?>
         <div class="d-flex justify-content-between align-items-center">
            <!-- SEARCH -->
            <form action="" method="POST">
               <div class="navbar-nav align-items-center border-primary rounded px-4">
                  <div class="input-group">
                     <input type="text" name="member_nik" class="form-control border-primary" placeholder="Cari NIK Anggota"
                        value="<?= (isset($_SESSION['value']['member_nik'])) ? $_SESSION['value']['member_nik'] : null; ?>">
                     <button class="btn btn-outline-primary waves-effect" type="submit" id="button-addon2"
                        name="search">Cari</button>
                  </div>
               </div>
            </form>
            <!-- PAGINATION -->
            <nav aria-label="Page navigation">
               <ul class="pagination justify-content-end float-end me-5">
                  <!-- Tombol "Previous" atau "Home" -->
                  <?php if ($page > 1): ?>
                     <?php if ($page > 2): ?>
                        <li class="page-item">
                           <a class="page-link" href="?page=transaction/show-data&pagination=1">Home</a>
                        </li>
                     <?php endif; ?>
                     <li class="page-item">
                        <a class="page-link" href="?page=transaction/show-data&pagination=<?php echo $page - 1; ?>">
                           <i class="tf-icon ri-skip-back-mini-line ri-22px"></i>
                        </a>
                     </li>
                  <?php else: ?>
                     <li class="page-item disabled">
                        <a class="page-link">
                           <i class="tf-icon ri-skip-back-mini-line ri-22px"></i>
                        </a>
                     </li>
                  <?php endif; ?>

                  <!-- Balon angka halaman -->
                  <?php
                  if ($totalPages > 3) {
                     // Tampilkan angka halaman
                     if ($page > 2) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                     }
                     for ($i = max(1, $page - 1); $i <= min($totalPages, $page + 1); $i++) {
                        echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                        echo '<a class="page-link" href="?page=transaction/show-data&pagination=' . $i . '">' . $i . '</a>';
                        echo '</li>';
                     }
                     if ($page < $totalPages - 1) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                     }
                  } else {
                     // Jika total halaman <= 3, tampilkan semuanya
                     for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                        echo '<a class="page-link" href="?page=transaction/show-data&pagination=' . $i . '">' . $i . '</a>';
                        echo '</li>';
                     }
                  }
                  ?>

                  <!-- Tombol "Next" -->
                  <?php if ($page < $totalPages): ?>
                     <li class="page-item">
                        <a class="page-link" href="?page=transaction/show-data&pagination=<?php echo $page + 1; ?>">
                           <i class="tf-icon ri-skip-forward-mini-line ri-22px"></i>
                        </a>
                     </li>
                  <?php else: ?>
                     <li class="page-item disabled">
                        <a class="page-link">
                           <i class="tf-icon ri-skip-forward-mini-line ri-22px"></i>
                        </a>
                     </li>
                  <?php endif; ?>
               </ul>
            </nav>
         </div>
         <div class="table-responsive text-nowrap">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>NIK</th>
                     <th>Nama</th>
                     <th>Jumlah Peminjaman</th>
                     <th>Waktu Peminjaman</th>
                     <th>Waktu Pengembalian</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody class="table-border-bottom-0">
                  <?php while ($data = mysqli_fetch_array($query)) { ?>
                     <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nik_member']; ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo ($data['returned_date'] != null) ? '0' : $data['borrowed_books'] ?>/5</td>
                        <td><?php echo $data['borrowed_date'] ?></td>
                        <td><?php echo ($data['returned_date'] != null) ? $data['returned_date'] : '<b>Belum Dikembalikan</b>' ?></td>
                        <td>
                           <a href="?page=transaction/detail-borrower&detail=<?php echo $data['id_transaksi']; ?>"
                              class="btn btn-sm btn-warning">
                              Detail
                              <i class="ri-book-open-line"></i>
                           </a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
      <!--/ Data Tables -->
   </div>
</div>