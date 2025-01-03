<?php
include('../components/connection.php');
$sql = "SELECT transaksi.id, transaksi.nik_member, transaksi.borrow_date, transaksi.return_date, detail_transaksi.id_transaksi, member.nik, member.name, COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
        FROM transaksi
        LEFT JOIN member ON transaksi.nik_member = member.nik
        LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
        GROUP BY transaksi.id ORDER BY transaksi.id DESC";
$query = mysqli_query($connect, $sql);

// detail
if (isset($_REQUEST['id_tr'])) {
    $id = $_REQUEST['id_tr'];

    // Ambil detail transaksi beserta data member dan buku
    $sql = "SELECT * FROM detail_transaksi
            LEFT JOIN book ON detail_transaksi.code_book = book.code
            LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            LEFT JOIN member ON transaksi.nik_member = member.nik
            WHERE detail_transaksi.id_transaksi = '$id'
   ";
    $query = mysqli_query($connect, $sql);

    $queryMember = mysqli_query($connect, $sql);
    $dataMember = mysqli_fetch_array($queryMember);
}

// menampilkan data lama di form peminjaman
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM detail_transaksi
            LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            LEFT JOIN book ON detail_transaksi.code_book = book.code
            LEFT JOIN member ON detail_transaksi.nik_member = member.nik
            WHERE detail_transaksi.id_transaksi = '$id'
    ";

    $query = mysqli_query($connect, $sql);
    $book = [];
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $book[] = $row; // Menyimpan setiap baris data ke dalam array
        }
    }

    $query = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($query);
}
