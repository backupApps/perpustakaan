<?php
session_start();

if (!isset($_POST['submit'])) {
   header('location: ../../../index.php');
   exit();
}

$nik = $_POST['nik'];
$name = $_POST['name'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$address = $_POST['address'];

// insert gambar ke db dan folder image
$photo = $_FILES['photo']['name'];
$fileTmp = $_FILES['photo']['tmp_name'];
$folder = '../photo/';
$target = $folder.$photo;
$upload = move_uploaded_file($fileTmp, $target);

// value
$_SESSION['value']['nik'] = $nik;
$_SESSION['value']['name'] = $name;
$_SESSION['value']['phoneNumber'] = $phoneNumber;
$_SESSION['value']['email'] = $email;
$_SESSION['value']['address'] = $address;
$_SESSION['value']['photo'] = $photo;

// validation
if ($nik == '') {
   $_SESSION['msg']['nik'] = "Kolom NIK tidak boleh kosong!";
}
if ($name == '') {
   $_SESSION['msg']['name'] = "Kolom nama tidak boleh kosong!";
}
if ($phoneNumber == '') {
   $_SESSION['msg']['phoneNumber'] = "Kolom nomor telepon tidak boleh kosong!";
}
if ($email == '') {
   $_SESSION['msg']['email'] = "Kolom email tidak boleh kosong!";
}
if ($address == '') {
   $_SESSION['msg']['address'] = "Kolom address tidak boleh kosong!";
}
if ($photo == '') {
   $_SESSION['msg']['photo'] = "Pilih Gambar!";
} else if (!$upload) {
   $_SESSION['msg']['photo'] = "Gagal meng-upload file.";
   header('location: ../../../?page=member/input-member');
   exit();
}

if (isset($_SESSION['msg']['nik']) || 
   isset($_SESSION['msg']['name']) || 
   isset($_SESSION['msg']['phoneNumber']) ||
   isset($_SESSION['msg']['email']) ||
   isset($_SESSION['msg']['address']) ||
   isset($_SESSION['msg']['photo'])
) {
   header('location: ../../../?page=member/input-member');
   exit();
}

include('../../../../components/connection.php');

$sql = "SELECT * FROM member WHERE nik='$nik' OR phone_number='$phoneNumber' OR email='$email'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data anggota sudah ada, periksa kembali nomor telepon atau alamat email!";
   header('location: ../../../?page=member/input-member');
   exit();
}

$sql = "INSERT INTO member VALUES ('$nik', '$name', '$phoneNumber', '$email', '$address', '$photo')";
$query = mysqli_query($connect, $sql);
$_SESSION['msg']['member'] = "Data anggota baru berhasil ditambahkan!";
header('location: ../../../?page=member/input-member');
unset($_SESSION['value']);