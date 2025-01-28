<?php
include('../components/connection.php');

// Pagination setup
$limit = 10; // Jumlah data per halaman
$page = isset($_REQUEST['pagination']) ? (int)$_REQUEST['pagination'] : 1; // Halaman saat ini, default 1

// Hitung total data
$totalQuery = mysqli_query($connect, "SELECT COUNT(DISTINCT transaksi.id) AS total FROM transaksi
                                      LEFT JOIN member ON transaksi.nik_member = member.nik
                                      LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $limit); // Total halaman

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;
$offset = ($page - 1) * $limit; // Hitung offset untuk SQL

$sql = "SELECT 
            transaksi.id, 
            transaksi.nik_member, 
            DATE_FORMAT(transaksi.borrow_date, '%Y-%m-%d %H:%i') AS borrowed_date,
            DATE_FORMAT(transaksi.return_date, '%Y-%m-%d %H:%i') AS returned_date,
            detail_transaksi.id_transaksi, 
            member.name, 
            COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
        FROM transaksi
        LEFT JOIN member ON transaksi.nik_member = member.nik
        LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
        GROUP BY transaksi.id 
        ORDER BY transaksi.id DESC
        LIMIT $limit OFFSET $offset";
$query = mysqli_query($connect, $sql);

// fungsi cari
if (isset($_POST['search'])) {
    $member_nik = $_POST['member_nik'];

    if (!empty($member_nik)) {
        // Simpan input pencarian ke session
        $_SESSION['value']['member_nik'] = $member_nik;

        // Query pencarian
        $sql = "SELECT 
                    transaksi.id, 
                    transaksi.nik_member, 
                    DATE_FORMAT(transaksi.borrow_date, '%Y-%m-%d %H:%i') AS borrowed_date,
                    DATE_FORMAT(transaksi.return_date, '%Y-%m-%d %H:%i') AS returned_date, 
                    detail_transaksi.id_transaksi, 
                    member.name, 
                    COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
                FROM transaksi
                LEFT JOIN member ON transaksi.nik_member = member.nik
                LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
                WHERE transaksi.nik_member LIKE '%$member_nik%'
                GROUP BY transaksi.id 
                ORDER BY transaksi.id DESC";
        $query = mysqli_query($connect, $sql);

        // Hitung total data hasil pencarian
        $totalQuery = mysqli_query($connect, "SELECT COUNT(DISTINCT transaksi.id) AS total FROM transaksi
                                      LEFT JOIN member ON transaksi.nik_member = member.nik
                                      LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
                                      WHERE transaksi.nik_member LIKE '%$member_nik%'");
        $totalData = mysqli_fetch_assoc($totalQuery)['total'];
        $totalPages = ceil($totalData / $limit);

        // Notifikasi jika data tidak ditemukan
        if (mysqli_num_rows($query) == 0) {
            $_SESSION['msg']['not-found'] = 'Anggota tidak ditemukan!';
        }
    } else {
        // Reset pencarian jika input kosong
        unset($_SESSION['value']['member_nik'], $_SESSION['msg']['not-found']);
        $sql = "SELECT 
                    transaksi.id, 
                    transaksi.nik_member, 
                    DATE_FORMAT(transaksi.borrow_date, '%Y-%m-%d %H:%i') AS borrowed_date,
                    DATE_FORMAT(transaksi.return_date, '%Y-%m-%d %H:%i') AS returned_date, 
                    detail_transaksi.id_transaksi, 
                    member.name, 
                    COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
                FROM transaksi
                LEFT JOIN member ON transaksi.nik_member = member.nik
                LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
                GROUP BY transaksi.id 
                ORDER BY transaksi.id DESC
                LIMIT $limit OFFSET $offset";
        $query = mysqli_query($connect, $sql);
    }
}

// detail
if (isset($_REQUEST['detail'])) {
    $id = $_REQUEST['detail'];

    // Ambil detail transaksi beserta data member dan buku
    $sql = "SELECT * FROM detail_transaksi
            LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            LEFT JOIN member ON transaksi.nik_member = member.nik
            LEFT JOIN book ON detail_transaksi.code_book = book.code
            LEFT JOIN category ON book.category_code = category.category_code
            LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
            WHERE detail_transaksi.id_transaksi = '$id'
   ";
    $query = mysqli_query($connect, $sql);

    $queryMember = mysqli_query($connect, $sql);
    $dataMember = mysqli_fetch_array($queryMember);
}

// tambah buku
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
