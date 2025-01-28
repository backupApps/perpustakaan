<?php
// return book
session_start();
include('../../../../components/connection.php');

if (!isset($_POST['submit'])) {
   header('location: ../../../?page=transaction/return');
   exit();
}

$nik_member = $_POST['nik_member'];
$return_date = $_POST['return_date'];

$_SESSION['value']['nik_member'] = $nik_member;
$_SESSION['value']['return_date'] = $return_date;
$_SESSION['value']['member-name'] = $_POST['member-name'];

// Validasi jika member tidak ada
$sql = "SELECT * FROM member WHERE nik='$nik_member'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

if ($nik_member == '') {
   $_SESSION['msg']['nik_member'] = "Tidak ada NIK yang dicari!";
} else if (strlen($nik_member) < 16 || !$data) {
   $_SESSION['msg']['nik_member'] = "NIK tidak valid atau member tidak ditemukan!";
}

if ($return_date == '') {
   $_SESSION['msg']['return_date'] = "Isi tanggal pengembalian!";
}

// Redirect kembali jika ada error
if (isset($_SESSION['msg'])) {
   header('location: ../../../?page=transaction/return');
   exit();
}

// Mulai transaksi
mysqli_autocommit($connect, false); // Mulai transaksi untuk konsistensi data

// 1. Cek apakah ada transaksi peminjaman yang belum dikembalikan
$sqlCheckReturn = "SELECT borrow_date, return_date, member.name
                  FROM transaksi
                  LEFT JOIN member ON transaksi.nik_member = member.nik
                  WHERE nik_member='$nik_member' AND return_date IS NULL";
$queryCheckReturn = mysqli_query($connect, $sqlCheckReturn);

$dataBorrow = mysqli_fetch_assoc($queryCheckReturn);
if (!$dataBorrow) {
   $_SESSION['msg']['failed'] = "Tidak ada peminjaman buku yang belum dikembalikan untuk member ini!";
   header('location: ../../../?page=transaction/return');
   exit();
}

// 2. Validasi tanggal pengembalian tidak boleh lebih kecil dari tanggal peminjaman
$borrow_date = $dataBorrow['borrow_date']; // Ambil tanggal peminjaman
if (strtotime($return_date) < strtotime($borrow_date)) {
   $_SESSION['msg']['failed'] = "Tanggal pengembalian tidak boleh lebih kecil dari tanggal peminjaman!";
   header('location: ../../../?page=transaction/return');
   exit();
}

// 3. Update return_date untuk transaksi yang belum dikembalikan
$sqlUpdateTransaksi = "UPDATE transaksi SET return_date=STR_TO_DATE('$return_date', '%Y-%m-%dT%H:%i') 
                     WHERE nik_member='$nik_member' AND return_date IS NULL";
mysqli_query($connect, $sqlUpdateTransaksi);

// Commit transaksi
mysqli_commit($connect);

// Set pesan sukses
$_SESSION['msg']['return'] = "Buku peminjaman <b>" . $nik_member . " | " . $dataBorrow['name'] . "</b> berhasil dikembalikan!";
unset($_SESSION['value']);
header('location: ../../../?page=transaction/show-data');
exit();