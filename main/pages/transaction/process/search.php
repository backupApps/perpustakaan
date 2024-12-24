<?php
// Memulai sesi dan memastikan koneksi database
session_start();
include('../../../../components/connection.php');

// Mengecek apakah parameter 'q' ada
if (isset($_GET['q'])) {
   $nik = $_GET['q'];

   // Query untuk mencari nama berdasarkan NIK
   $sql = "SELECT name FROM member WHERE nik = '$nik' LIMIT 1";
   $query = mysqli_query($connect, $sql);

   if (mysqli_num_rows($query) > 0) {
       // Menampilkan nama jika NIK ditemukan
       $data = mysqli_fetch_array($query);
       echo $data['name'];
   } else {
       // Menampilkan pesan jika NIK tidak ditemukan
       echo "No member found with this NIK!";
   }
}

if (isset($_GET['b'])) {
    $code = $_GET['b'];
 
    $sql = "SELECT title FROM book WHERE code = '$code' LIMIT 1";
    $query = mysqli_query($connect, $sql);
 
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        echo $data['title'];
    } else {
        echo "No book found with this code!";
    }
 }

mysqli_close($connect);
?>