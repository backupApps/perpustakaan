<?php 
include('../components/connection.php');
$sql = "SELECT * FROM category";
$query = mysqli_query($connect, $sql);

// for update
$editData = [];
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM category WHERE code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}