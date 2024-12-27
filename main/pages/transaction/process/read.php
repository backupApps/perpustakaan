<?php
include('../components/connection.php');
$sql = "SELECT transaksi.id, transaksi.nik_member, transaksi.borrow_date, transaksi.return_date, detail_transaksi.id_transaksi, member.nik, member.name, COUNT(detail_transaksi.id_transaksi) AS borrowed_books 
         FROM transaksi
         LEFT JOIN member ON transaksi.nik_member = member.nik
         LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
         GROUP BY transaksi.id";
$query = mysqli_query($connect, $sql);

// detail
if (isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];

   // Ambil detail transaksi beserta data member dan buku
   $sql = "SELECT 
           *
       FROM 
           detail_transaksi
       LEFT JOIN 
           book ON detail_transaksi.code_book = book.code
       LEFT JOIN 
           transaksi ON detail_transaksi.id_transaksi = transaksi.id
       LEFT JOIN 
           member ON transaksi.nik_member = member.nik
       WHERE 
           detail_transaksi.id_transaksi = '$id'
   ";
   $query = mysqli_query($connect, $sql);
}