<?php

$id = $_REQUEST['id'];

include('../../../../components/connection.php');
$sql = "DELETE FROM transaksi WHERE id='$id'";
$query = mysqli_query($connect, $sql);

$sql = "SELECT nik_member FROM transaksi";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);

session_start();
$_SESSION['msg']['delete'] = "Data peminjam <b>'" . $data['nik_member'] . "'</b> berhasil di hapus!";
header('location: ../../../?page=transaction/show-data');
