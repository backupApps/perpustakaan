<?php
session_start();

if (!isset($_POST['submit'])) {
   header('location: ../../../index.php');
   exit();
}

$code = $_POST['code'];
$name = $_POST['name'];

if ($code == '') {
   $_SESSION['msg']['code'] = "Kolom kode tidak boleh kosong!";
}

if ($name == '') {
   $_SESSION['msg']['name'] = "Kolom nama tidak boleh kosong!";
}

if (isset($_SESSION['msg'])) {
   header('location: ../../../?page=category/input-category');
   exit();
}

include('../../../../components/connection.php');

$sql = "SELECT * FROM category WHERE category_code='$code' OR category_name='$name'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data kategori sudah ada, periksa kode atau nama yang sama!";
   header('location: ../../../?page=category/input-category');
   exit();
}

$sql = "INSERT INTO category VALUES ('$code', '$name')";
mysqli_query($connect, $sql);
$_SESSION['msg']['success'] = "Data kategori baru berhasil ditambahkan!";
header('location: ../../../?page=category/input-category');