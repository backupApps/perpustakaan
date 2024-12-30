<?php
include('../components/connection.php');
$sql = "SELECT * FROM book
         LEFT JOIN category ON book.category_code = category.category_code 
         LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
         ORDER BY book.title ASC";

$query = mysqli_query($connect, $sql);

// for update
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM book WHERE code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}
