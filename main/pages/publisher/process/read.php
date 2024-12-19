<?php 
include('../components/connection.php');
$sql = "SELECT * FROM publisher";
$query = mysqli_query($connect, $sql);

// for update
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM publisher WHERE code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}