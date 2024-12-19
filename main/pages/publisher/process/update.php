<?php
session_start();

if (!isset($_POST['submit'])) {
   header('location: ../../../?page=publisher/data-publisher');
   exit();
}

$code = $_POST['code'];
$name = $_POST['name'];
$address = $_POST['address'];

if ($name == '') {
   $_SESSION['msg']['name'] = "Kolom nama tidak boleh kosong!";
}

if ($address == '') {
   $_SESSION['msg']['name'] = "Kolom alamat tidak boleh kosong!";
}

if (isset($_SESSION['msg']['name'])) {
   header('location: ../../../?page=publisher/update-publisher&code='.$code);
   exit();
}

if (isset($_SESSION['msg']['address'])) {
   header('location: ../../../?page=publisher/update-publisher&code='.$code);
   exit();
}

include('../../../../components/connection.php');

$sql = "SELECT * FROM publisher WHERE name='$name' AND code!='code'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data penerbit sudah ada, periksa kode atau nama yang sama!";
   header('location: ../../../?page=publisher/update-publisher&code='.$code);
   exit();
}

$sql = "UPDATE publisher SET name='$name', address='$address' WHERE code='$code'";
$query = mysqli_query($connect, $sql);
$_SESSION['msg']['update'] = "Data penerbit berhasil di-edit!";
header('location: ../../../?page=publisher/data-publisher');