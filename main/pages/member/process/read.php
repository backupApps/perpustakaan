<?php
include('../components/connection.php');


// Pagination setup
$limit = 10; // Jumlah data per halaman
$page = isset($_REQUEST['pagination']) ? (int)$_REQUEST['pagination'] : 1; // Halaman saat ini, default 1
$offset = ($page - 1) * $limit; // Hitung offset untuk SQL

// Hitung total data
$totalQuery = mysqli_query($connect, "SELECT COUNT(*) AS total FROM member");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $limit); // Total halaman

$sql = "SELECT * FROM member ORDER BY name ASC LIMIT $limit OFFSET $offset";
$query = mysqli_query($connect, $sql);

if (isset($_POST['search'])) {
   $member_nik = $_POST['member_nik'];

   if (!empty($member_nik)) {
      // Simpan input pencarian ke session
      $_SESSION['value']['member_nik'] = $member_nik;

      // Query pencarian
      $sql = "SELECT * FROM member WHERE nik LIKE '%$member_nik%' ORDER BY name ASC";
      $query = mysqli_query($connect, $sql);

      // Hitung total data hasil pencarian
      $totalQuery = mysqli_query($connect, "SELECT COUNT(*) AS total FROM member WHERE name LIKE '%$member_nik%'");
      $totalData = mysqli_fetch_assoc($totalQuery)['total'];
      $totalPages = ceil($totalData / $limit);

      // Notifikasi jika data tidak ditemukan
      if (mysqli_num_rows($query) == 0) {
         $_SESSION['msg']['not-found'] = 'Anggota tidak ditemukan!';
      }
   } else {
      // Reset pencarian jika input kosong
      unset($_SESSION['value']['member_nik'], $_SESSION['msg']['not-found']);
      $sql = "SELECT * FROM member ORDER BY name ASC LIMIT $limit OFFSET $offset";
      $query = mysqli_query($connect, $sql);
   }
}

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

// for update
if (isset($_REQUEST['nik'])) {
   $nik = $_REQUEST['nik'];
   $sql = "SELECT * FROM member WHERE nik='$nik'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}
