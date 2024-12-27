<?php
// Ambil kode buku yang akan dihapus dari parameter URL
$nik = $_REQUEST['nik'];

include('../../../../components/connection.php');

// Ambil nama file gambar dari database sebelum menghapus data
$sql = "SELECT photo FROM member WHERE nik='$nik'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
$filePath = '../photo/' . $data['photo']; // Path file gambar
unlink($filePath); // Menghapus file gambar dari folder

$sql = "DELETE FROM member WHERE nik='$nik'";
$query = mysqli_query($connect, $sql);

session_start();
$_SESSION['msg']['delete'] = "Data buku <b>'". $nik ."</b>' berhasil dihapus !";
header('location: ../../../?page=member/data-member');