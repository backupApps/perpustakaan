<?php
// Memulai sesi dan memastikan koneksi database
session_start();
include('../../../../components/connection.php');

// Mengecek apakah parameter 'q' ada
if (isset($_GET['q'])) {
   $nik = $_GET['q'];

   // Query untuk mencari nama berdasarkan NIK
   $sql = "SELECT name FROM member WHERE nik = '$nik' LIMIT 1";
   $result = mysqli_query($connect, $sql);

   if (mysqli_num_rows($result) > 0) {
       // Menampilkan nama jika NIK ditemukan
       $row = mysqli_fetch_array($result);
       echo $row['name'];
   } else {
       // Menampilkan pesan jika NIK tidak ditemukan
       $_SESSION['msg']['not-get'] = "No member found with this NIK.";
       header('location: ../../../?page=transaction/borrow');
   }
}

// Menutup koneksi
mysqli_close($connect);
?>