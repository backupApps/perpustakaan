<?php 
include('../components/connection.php');
// $sql = "SELECT * FROM book
//          LEFT JOIN category ON book.code = book.code 
//          LEFT JOIN publisher ON book.code = book.code";

$sql = "SELECT * FROM book";
$query = mysqli_query($connect, $sql);

// for update
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM book WHERE code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}