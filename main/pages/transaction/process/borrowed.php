<?php
session_start();
include('../../../../components/connection.php');

if (!isset($_POST['submit'])) {
    header('location: ../../../index.php');
    exit();
}

// Ambil data dari form
$nik_member = $_POST['member-nik'];
$member_name = $_POST['member-name'];
$borrow_date = $_POST['borrow-date'];

// Ambil data buku
$books = [];
for ($i = 1; $i <= 5; $i++) {
    $bookCode = $_POST["book$i"] ?? '';
    $bookTitle = $_POST["title$i"] ?? '';
    if (!empty($bookCode)) {
        $books[] = ['code' => $bookCode, 'title' => $bookTitle];
    }
}

// Simpan ke sesi untuk redisplay
$_SESSION['value'] = [
    'nik_member' => $nik_member,
    'borrow_date' => $borrow_date,
    'member-name' => $member_name,
];
foreach ($books as $key => $book) {
    $_SESSION['value']["book" . ($key + 1)] = $book['code'];
    $_SESSION['value']["title" . ($key + 1)] = $book['title'];
}

//! Validasi
if (empty($nik_member)) {
    $_SESSION['msg']['nik_member'] = "Tidak ada NIK yang dicari!";
} else if (strlen($nik_member) < 16 || mysqli_num_rows(mysqli_query($connect, "SELECT * FROM member WHERE nik='$nik_member'")) == 0) {
    $_SESSION['msg']['nik_member'] = "";
} else if (!isset($_REQUEST['id']) && mysqli_num_rows(mysqli_query($connect, "SELECT * FROM transaksi WHERE nik_member='$nik_member' AND return_date IS NULL")) != 0) {
    $_SESSION['msg']['general'] = "Anggota belum mengembalikan buku";
}

if (empty($borrow_date)) {
    $_SESSION['msg']['borrow_date'] = "Isi tanggal peminjaman!";
}

if (empty($books)) {
    $_SESSION['msg']['book'] = "Pilih buku yang ingin dipinjam!";
} else {
    foreach ($books as $book) {
        $sql = "SELECT * FROM book WHERE code='{$book['code']}'";
        $query = mysqli_query($connect, $sql);
        if (mysqli_num_rows($query) == 0) {
            $_SESSION['msg']['book'] = "Buku dengan kode '{$book['code']}' tidak ditemukan!";
            break;
        }
    }
}

if (!empty($_SESSION['msg'])) {
    header('location: ../../../?page=transaction/borrow');
    exit();
}

// Mulai transaksi
mysqli_autocommit($connect, false);
try {
    $queryTransaksi = "INSERT INTO transaksi (id, nik_member, borrow_date, return_date) 
                       VALUES (NULL, '$nik_member', '$borrow_date', NULL)";
    if (!mysqli_query($connect, $queryTransaksi)) {
        throw new Exception(mysqli_error($connect));
    }

    $idTransaksi = mysqli_insert_id($connect);
    foreach ($books as $book) {
        $book = strtoupper($book['code']);
        $queryDetail = "INSERT INTO detail_transaksi (id, id_transaksi, nik_member, code_book) 
                        VALUES (NULL, '$idTransaksi', '$nik_member', '$book')";
        if (!mysqli_query($connect, $queryDetail)) {
            throw new Exception(mysqli_error($connect));
        }
    }

    mysqli_commit($connect);
    $_SESSION['msg']['sukses'] = "TRANSAKSI PEMINJAMAN BUKU BERHASIL!";
    unset($_SESSION['value']);
    header('location: ../../../?page=transaction/borrow');
    exit();
} catch (Exception $e) {
    mysqli_rollback($connect);
    $_SESSION['msg']['general'] = "Terjadi kesalahan: " . $e->getMessage();
    header('location: ../../../?page=transaction/borrow');
    exit();
}
