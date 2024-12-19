<?php

$code = $_REQUEST['code'];

include('../../../../components/connection.php');
$sql = "DELETE FROM category WHERE code='$code'";
$query = mysqli_query($connect, $sql);

session_start();
$_SESSION['msg']['delete'] = "Data kategori <b>'". $code ."</b>' berhasil di hapus!";
header('location: ../../../?page=category/data-category');