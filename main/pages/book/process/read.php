<?php
include('../components/connection.php');

// Pagination setup
$limit = 5; // Jumlah data per halaman
$page = isset($_REQUEST['pagination']) ? (int)$_REQUEST['pagination'] : 1; // Halaman saat ini, default 1
$offset = ($page - 1) * $limit; // Hitung offset untuk SQL

// Hitung total data
$totalQuery = mysqli_query($connect, "SELECT COUNT(*) AS total FROM book");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $limit); // Total halaman

$sql = "SELECT * FROM book
         LEFT JOIN category ON book.category_code = category.category_code 
         LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
         ORDER BY book.title ASC LIMIT $limit OFFSET $offset
      ";
$query = mysqli_query($connect, $sql);

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;


// for update
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM book WHERE code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}
