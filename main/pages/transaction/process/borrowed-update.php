<?php
session_start();
include('../../../../components/connection.php');

if (!isset($_POST['submit'])) {
   header('location: ../../../index.php');
   exit();
}

// Ambil data dari form
$id = $_POST['id'];
$nik_member = $_POST['member-nik'];
$member_name = $_POST['member-name'];
$borrow_date = $_POST['borrow-date'];

// Ambil data buku dari form
$books = [];
for ($i = 1; $i <= 5; $i++) {
   $bookCode = $_POST["book$i"] ?? '';
   $bookTitle = $_POST["title$i"] ?? '';
   if (!empty($bookCode)) {
      $books[] = ['code' => $bookCode, 'title' => $bookTitle];
   }
}

// Simpan data form ke sesi untuk redisplay
$_SESSION['value'] = [
   'nik_member' => $nik_member,
   'borrow_date' => $borrow_date,
   'member_name' => $member_name,
];
foreach ($books as $key => $book) {
   $_SESSION['value']["book" . ($key + 1)] = $book['code'];
   $_SESSION['value']["title" . ($key + 1)] = $book['title'];
}

// Ambil data buku lama yang sudah ada di transaksi
$existingBooks = [];
$existingBooksQuery = "SELECT code_book FROM detail_transaksi WHERE id_transaksi='$id'";
$existingBooksResult = mysqli_query($connect, $existingBooksQuery);
while ($row = mysqli_fetch_assoc($existingBooksResult)) {
   $existingBooks[] = strtoupper($row['code_book']);
}

// Filter buku baru
$newBooks = [];
foreach ($books as $book) {
   $bookCode = strtoupper($book['code']);
   if (!in_array($bookCode, $existingBooks)) {
      $newBooks[] = $bookCode;
   }
}

//! Validasi form
if (empty($nik_member)) {
   $_SESSION['msg']['nik_member'] = "NIK wajib diisi!";
} elseif (strlen($nik_member) != 16 || !mysqli_num_rows(mysqli_query($connect, "SELECT * FROM member WHERE nik='$nik_member'"))) {
   $_SESSION['msg']['nik_member'] = "NIK tidak valid atau tidak ditemukan!";
}

if (empty($borrow_date)) {
   $_SESSION['msg']['borrow_date'] = "Tanggal peminjaman wajib diisi!";
}

if (empty($books)) {
   $_SESSION['msg']['book'] = "Tidak ada menambah peminjaman buku baru!";
} else {
   foreach ($books as $book) {
      $sql = "SELECT * FROM book WHERE code='{$book['code']}'";
      $query = mysqli_query($connect, $sql);
      if (mysqli_num_rows($query) == 0) {
         $_SESSION['msg']['book'] = "Buku dengan kode '{$book['code']}' tidak ditemukan!";
      }
   }
}

//! Validasi buku baru
if (empty($newBooks)) {
   $_SESSION['msg']['book'] = "Tidak ada buku baru yang ditambahkan!";
}

//! Jika ada pesan error, kembalikan ke halaman sebelumnya
if (!empty($_SESSION['msg'])) {
   header('location: ../../../?page=transaction/borrow-update&id=' . $id);
   exit();
}

// Tambahkan buku baru ke transaksi
mysqli_autocommit($connect, false);
try {
   foreach ($newBooks as $bookCode) {
      $bookCode = strtoupper($bookCode);
      $queryDetail = "INSERT INTO detail_transaksi (id, id_transaksi, nik_member, code_book) 
                        VALUES (NULL, '$id', '$nik_member', '$bookCode')";
      if (!mysqli_query($connect, $queryDetail)) {
         throw new Exception(mysqli_error($connect));
      }
   }
   mysqli_commit($connect);
   $_SESSION['msg']['sukses'] = "Buku baru berhasil ditambahkan!";
} catch (Exception $e) {
   mysqli_rollback($connect);
   $_SESSION['msg']['general'] = "Terjadi kesalahan saat menambahkan buku: " . $e->getMessage();
}

// Redirect ke halaman transaksi
header('location: ../../../?page=transaction/borrow-update&id=' . $id);
exit();
