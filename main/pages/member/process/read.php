<?php 
include('../components/connection.php');
// $sql = "SELECT * FROM book
//          LEFT JOIN category ON book.code = book.code 
//          LEFT JOIN publisher ON book.code = book.code";

$sql = "SELECT * FROM member";
$query = mysqli_query($connect, $sql);

// for update
if (isset($_REQUEST['nik'])) {
   $nik = $_REQUEST['nik'];
   $sql = "SELECT * FROM member WHERE nik='$nik'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}