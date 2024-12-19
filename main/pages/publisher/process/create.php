<?php
session_start();

if (!isset($_POST['submit'])) {
   header('location: ../../../index.php');
   exit();
}

$code = $_POST['code'];
$name = $_POST['name'];
$address = $_POST['address'];

if ($code == '') {
   $_SESSION['msg']['code'] = "Kolom kode tidak boleh kosong!";
}

if ($name == '') {
   $_SESSION['msg']['name'] = "Kolom nama tidak boleh kosong!";
}

if ($address == '') {
   $_SESSION['msg']['address'] = "Kolom penerbit tidak boleh kosong!";
}

if (isset($_SESSION['msg']['code']) || isset($_SESSION['msg']['name']) || isset($_SESSION['msg']['address'])) {
   header('location: ../../../?page=publisher/input-publisher');
   exit();
}

include('../../../../components/connection.php');

$sql = "SELECT * FROM publisher WHERE code='$code' OR name='$name'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data penerbit sudah ada, periksa kode atau nama yang sama!";
   header('location: ../../../?page=publisher/input-publisher');
   exit();
}

$sql = "INSERT INTO publisher VALUES ('$code', '$name', '$address')";
$query = mysqli_query($connect, $sql);
$_SESSION['msg']['success'] = "Data penerbit baru berhasil ditambahkan!";
header('location: ../../../?page=publisher/input-publisher');