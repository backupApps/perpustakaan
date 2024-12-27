<?php

$nik = $_REQUEST['nik'];

include('../../../../components/connection.php');
$sql = "DELETE FROM transaksi WHERE nik_member='$nik'";
$query = mysqli_query($connect, $sql);

session_start();
$_SESSION['msg']['delete'] = "Data peminjam <b>'". $nik ."</b>' berhasil di hapus!";
header('location: ../../../?page=transaction/show-data');