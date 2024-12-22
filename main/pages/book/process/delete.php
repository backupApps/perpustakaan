<?php
// Ambil kode buku yang akan dihapus dari parameter URL
$code = $_REQUEST['code'];

include('../../../../components/connection.php');

// Ambil nama file gambar dari database sebelum menghapus data
$sql = "SELECT cover FROM book WHERE code='$code'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
$filePath = '../image/' . $data['cover']; // Path file gambar
unlink($filePath); // Menghapus file gambar dari folder

$sql = "DELETE FROM book WHERE code='$code'";
$query = mysqli_query($connect, $sql);

session_start();
$_SESSION['msg']['delete'] = "Data buku <b>'". $code ."</b>' berhasil dihapus !";
header('location: ../../../?page=book/data-book');



// $code = $_REQUEST['code'];

// include('../../../../components/connection.php');

// // Ambil nama file gambar dari database sebelum menghapus data
// $sql = "SELECT cover FROM book WHERE code='$code'";
// $query = mysqli_query($connect, $sql);
// $data = mysqli_fetch_assoc($query);

// if ($data) {
//     $coverFile = $data['cover']; // Nama file gambar
//     $filePath = '../../../../pages/book/image/' . $coverFile; // Path file gambar

//     // Hapus data dari database
//     $deleteSql = "DELETE FROM book WHERE code='$code'";
//     $deleteQuery = mysqli_query($connect, $deleteSql);

//     if ($deleteQuery) {
//         // Jika data berhasil dihapus, hapus file gambar
//         if (file_exists($filePath)) {
//             unlink($filePath); // Menghapus file gambar dari folder
//         }

//         // Set pesan sukses dan redirect
//         session_start();
//         $_SESSION['msg']['delete'] = "Data buku <b>'". $code ."</b>' berhasil dihapus beserta gambar!";
//         header('location: ../../../?page=book/data-book');
//         exit();
//     } else {
//         // Jika terjadi kesalahan saat menghapus data
//         session_start();
//         $_SESSION['msg']['delete'] = "Terjadi kesalahan saat menghapus data buku!";
//         header('location: ../../../?page=book/data-book');
//         exit();
//     }
// } else {
//     // Jika kode buku tidak ditemukan di database
//     session_start();
//     $_SESSION['msg']['delete'] = "Data buku tidak ditemukan!";
//     header('location: ../../../?page=book/data-book');
//     exit();
// }