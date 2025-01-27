<?php
include('../components/connection.php');

// Pagination setup
$limit = 5; // Jumlah data per halaman
$page = isset($_REQUEST['pagination']) ? (int)$_REQUEST['pagination'] : 1; // Halaman saat ini, default 1
$offset = ($page - 1) * $limit; // Hitung offset untuk SQL

// Hitung total data
$totalQuery = mysqli_query($connect, "SELECT COUNT(*) AS total FROM category");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $limit); // Total halaman

$sql = "SELECT * FROM category LIMIT $limit OFFSET $offset";
$query = mysqli_query($connect, $sql);

if (isset($_POST['search'])) {
   $category_name = $_POST['category_name'];

   if (!empty($category_name)) {
      // Simpan input pencarian ke session
      $_SESSION['value']['category_name'] = $category_name;

      // Query pencarian
      $sql = "SELECT * FROM category WHERE category_name LIKE '%$category_name%' ORDER BY category_name ASC";
      $query = mysqli_query($connect, $sql);

      // Hitung total data hasil pencarian
      $totalQuery = mysqli_query($connect, "SELECT COUNT(*) AS total FROM category WHERE category_name LIKE '%$category_name%'");
      $totalData = mysqli_fetch_assoc($totalQuery)['total'];
      $totalPages = ceil($totalData / $limit);

      // Notifikasi jika data tidak ditemukan
      if (mysqli_num_rows($query) == 0) {
         $_SESSION['msg']['not-found'] = 'Kategori tidak ditemukan!';
      }
   } else {
      // Reset pencarian jika input kosong
      unset($_SESSION['value']['category_name'], $_SESSION['msg']['not-found']);
      $sql = "SELECT * FROM category LIMIT $limit OFFSET $offset";
      $query = mysqli_query($connect, $sql);
   }
}

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

// for update
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM category WHERE category_code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}
