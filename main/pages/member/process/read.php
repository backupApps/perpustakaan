<?php 
include('../components/connection.php');

$sql = "SELECT * FROM member";
$query = mysqli_query($connect, $sql);

// for update
if (isset($_REQUEST['nik'])) {
   $nik = $_REQUEST['nik'];
   $sql = "SELECT * FROM member WHERE nik='$nik'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);
}