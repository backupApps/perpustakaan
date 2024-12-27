<?php
session_start();
include('../../../../components/connection.php');

// Pastikan form di-submit
if (!isset($_POST['submit'])) {
    header('location: ../../../?page=transaction/borrow');
    exit();
}

// Ambil data dari form
$nik_member = $_POST['member-nik'];
$borrow_date = $_POST['borrow-date'];

// Ambil semua buku dari form, hilangkan elemen kosong
$books = array_filter([
    $_POST['book1'] ?? '',
    $_POST['book2'] ?? '',
    $_POST['book3'] ?? '',
    $_POST['book4'] ?? '',
    $_POST['book5'] ?? ''
]);

// Validasi data
$_SESSION['value']['nik_member'] = $nik_member;
$_SESSION['value']['borrow_date'] = $borrow_date;
foreach ($books as $key => $book) {
    $_SESSION['value']['book' . ($key + 1)] = $book;
}

if ($nik_member == '') {
    $_SESSION['msg']['nik_member'] = "Tidak ada NIK yang dicari!";
}
if ($borrow_date == '') {
    $_SESSION['msg']['borrow_date'] = "Isi tanggal peminjaman!";
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




// session_start();
// include('../../../../components/connection.php');

// if (!isset($_POST['submit'])) {
//     header('location: ../../../?page=transaction/borrow');
//     exit();
// }

// $nik_member = $_POST['member-nik'];
// $borrow_date = $_POST['borrow-date'];
// $book1 = $_POST['book1'];
// $book2 = $_POST['book2'];
// $book3 = $_POST['book3'];
// $book4 = $_POST['book4'];
// $book5 = $_POST['book5'];

// // tidak hilang jika input sudah ada
// $_SESSION['value']['nik_member'] = $nik_member;
// $_SESSION['value']['borrow_date'] = $borrow_date;
// $_SESSION['value']['book1'] = $book1;
// $_SESSION['value']['book2'] = $book2;
// $_SESSION['value']['book3'] = $book3;
// $_SESSION['value']['book4'] = $book4;
// $_SESSION['value']['book5'] = $book5;

// if ($nik_member == '') {
//     $_SESSION['msg']['nik_member'] = "Tidak ada NIK yang dicari!";
// }
// if ($borrow_date == '') {
//     $_SESSION['msg']['borrow_date'] = "Isi tanggal peminjaman!";
// }

// if (isset($_SESSION['msg'])) {
//     header('location: ../../../?page=transaction/borrow');
//     exit();
// }






















// if (mysqli_query($connect, $sql_transaksi)) {
//     // Ambil ID transaksi yang baru saja dimasukkan
//     $id_transaksi = mysqli_insert_id($connect);

//     // Masukkan detail transaksi untuk setiap buku (jika ada)
//     $books = [$book1, $book2, $book3, $book4, $book5];
//     foreach ($books as $book) {
//         if (!empty($book)) {
//             $sql_detail_transaksi = "INSERT INTO detail_transaksi VALUES ('', '$id_transaksi', '$book')";
//             mysqli_query($connect, $sql_detail_transaksi);
//         }
//     }

//     $_SESSION['msg']['success'] = "Peminjaman berhasil!";
//     header('location: ../../../?page=transaction/borrow');
//     exit();
// } else {
//     $_SESSION['msg']['error'] = "Terjadi kesalahan saat menyimpan transaksi!";
//     header('location: ../../../?page=transaction/borrow');
//     exit();
// }