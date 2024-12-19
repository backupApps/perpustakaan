<?php
session_start();

if (!isset($_POST['submit'])) {
   header('location: ../../../?page=category/data-category');
   exit();
}

$code = $_POST['code'];
$name = $_POST['name'];

if ($name == '') {
   $_SESSION['msg']['name'] = "Kolom nama tidak boleh kosong!";
}

if (isset($_SESSION['msg']['name'])) {
   header('location: ../../../?page=category/update-category&code='.$code);
   exit();
}

include('../../../../components/connection.php');

$sql = "SELECT * FROM category WHERE name='$name' AND code != 'code'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data kategori sudah ada, periksa kode atau nama yang sama!";
   header('location: ../../../?page=category/update-category&code='.$code);
   exit();
}

$sql = "UPDATE category SET name='$name' WHERE code='$code'";
$query = mysqli_query($connect, $sql);
$_SESSION['msg']['update'] = "Data kategori berhasil di-edit!";
header('location: ../../../?page=category/data-category');