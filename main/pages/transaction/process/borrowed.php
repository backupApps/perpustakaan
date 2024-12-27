<?php
session_start();
include('../../../../components/connection.php');

if (isset($_POST['reset'])) {
    header('location: ../../../?page=transaction/borrow');
    exit();
}

// Pastikan form di-submit
if (!isset($_POST['submit'])) {
    header('location: ../../../index.php');
    exit();
}

// Ambil data dari form
$nik_member = $_POST['member-nik'];
$borrow_date = $_POST['borrow-date'];

// Ambil semua buku dari form, hilangkan elemen kosong
$books = array_filter([
    $_POST['book1'] ?? '', // ($_POST['book1']) ? $_POST['book1'] : '';
    $_POST['book2'] ?? '',
    $_POST['book3'] ?? '',
    $_POST['book4'] ?? '',
    $_POST['book5'] ?? ''
]);

// Validasi data
$_SESSION['value']['nik_member'] = $nik_member;
$_SESSION['value']['borrow_date'] = $borrow_date;
$_SESSION['value']['member-name'] = $_POST['member-name'];
$_SESSION['value']['book1'] = $_POST['book1'];
$_SESSION['value']['book2'] = $_POST['book2'];
$_SESSION['value']['book3'] = $_POST['book3'];
$_SESSION['value']['book4'] = $_POST['book4'];
$_SESSION['value']['book5'] = $_POST['book5'];
$_SESSION['value']['title1'] = $_POST['title1'];
$_SESSION['value']['title2'] = $_POST['title2'];
$_SESSION['value']['title3'] = $_POST['title3'];
$_SESSION['value']['title4'] = $_POST['title4'];
$_SESSION['value']['title5'] = $_POST['title5'];

foreach ($books as $key => $book) {
    $_SESSION['value']['book' . ($key + 1)] = $book;
}

if ($nik_member == '') {
    $_SESSION['msg']['nik_member'] = "Tidak ada NIK yang dicari!";
}
if ($borrow_date == '') {
    $_SESSION['msg']['borrow_date'] = "Isi tanggal peminjaman!";
}

if (empty($books)) {
    $_SESSION['msg']['book'] = "Pilih buku yang ingin dipinjam!";
}

if (isset($_SESSION['msg'])) {
    header('location: ../../../?page=transaction/borrow');
    exit();
}

// Mulai transaksi database
mysqli_autocommit($connect, false); // Mulai transaksi

try {
    // 1. Masukkan data ke tabel transaksi
    $queryTransaksi = "INSERT INTO transaksi (id, nik_member, borrow_date, return_date) VALUES (NULL,'$nik_member', '$borrow_date', NULL)";
    $resultTransaksi = mysqli_query($connect, $queryTransaksi);
    if (!$resultTransaksi) {
        throw new Exception("Gagal memasukkan data ke tabel transaksi: " . mysqli_error($connect));
    }

    // Ambil id transaksi yang baru saja dimasukkan
    $idTransaksi = mysqli_insert_id($connect);

    // 2. Masukkan data ke tabel detail_transaksi untuk setiap buku
    foreach ($books as $book) {
        $queryDetail = "INSERT INTO detail_transaksi (id, id_transaksi, nik_member, code_book) VALUES (NULL, '$idTransaksi', '$nik_member', '$book')";
        $resultDetail = mysqli_query($connect, $queryDetail);
        if (!$resultDetail) {
            throw new Exception("Gagal memasukkan data ke tabel detail_transaksi: " . mysqli_error($connect));
        }
    }

    // Commit transaksi
    mysqli_commit($connect);

    // Redirect ke halaman sukses atau reset form
    $_SESSION['msg']['sukses'] = "TRANSAKSI PEMINJAMAN BUKU BERHASIL!";
    unset($_SESSION['value']);
    header('location: ../../../?page=transaction/borrow');
    exit();
} catch (Exception $e) {
    // Rollback jika terjadi error
    mysqli_rollback($connect);
    $_SESSION['msg']['general'] = "Terjadi kesalahan saat memproses data: " . $e->getMessage();
    header('location: ../../../?page=transaction/borrow');
    exit();
}
