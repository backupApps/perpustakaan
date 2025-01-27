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
$_SESSION['msg']['delete'] = "Data buku <b>'" . $code . "</b>' berhasil dihapus !";
header('location: ../../../?page=book/data-book');
