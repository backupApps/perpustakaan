<?php

$code = $_REQUEST['code'];

include('../../../../components/connection.php');
$sql = "DELETE FROM publisher WHERE code='$code'";
$query = mysqli_query($connect, $sql);

session_start();
$_SESSION['msg']['delete'] = "Data penerbit <b>'". $code ."</b>' berhasil di hapus!";
header('location: ../../../?page=publisher/data-publisher');