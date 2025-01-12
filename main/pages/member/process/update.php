<?php
session_start();
include('../../../../components/connection.php');

if (!isset($_POST['submit'])) {
   header('location: ../../../?page=member/data-member');
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

$ekstensiValid = ['jpg', 'jpeg', 'png'];
$ekstensiFile = strtolower(pathinfo($photo, PATHINFO_EXTENSION));

// fungsi waktu
$photo = date('l, d-m-Y  H:i:s');

// generate nama baru
$newName = strtolower(md5($photo).'.'.$ekstensiFile);

// Ambil gambar lama dari database
$sql = "SELECT photo FROM member WHERE nik='$nik'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
$oldFile = $data['photo'];
$filePath = $folder . $oldFile;

if ($_FILES['photo']['name']) {

   if (!in_array($ekstensiFile, $ekstensiValid)) { // Validasi ekstensi file
      $_SESSION['msg']['photo'] = "Hanya file dengan ekstensi jpg, jpeg, atau png yang diperbolehkan!";
      header('location: ../../../?page=member/update-member&nik=' . $nik);
      exit();
   } else if ($_FILES['photo']['size'] > 2 * 1024 * 1024) { // Validasi ukuran file maksimal 2MB
      $_SESSION['msg']['photo'] = "Ukuran file maksimal 2MB!";
      header('location: ../../../?page=member/update-member&nik=' . $nik);
      exit();
   }

   if (file_exists($filePath)) {
      unlink($filePath);
   }

   $upload = move_uploaded_file($fileTmp, $folder.$newName);

   if ($upload) {
      $sql = "UPDATE member SET photo='$newName' WHERE nik='$nik'";
      mysqli_query($connect, $sql);
   }
}

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
if ($newName) {
   header('location: ../../../?page=member/data-member');
} else if ($photo == '') {
   $_SESSION['msg']['photo'] = "Pilih Gambar!";
} else if (!$upload) {
   $_SESSION['msg']['photo'] = "Gagal meng-upload file.";
   header('location: ../../../?page=member/update-member');
   exit();
}

if (isset($_SESSION['msg'])) {
   header('location: ../../../?page=member/update-member&nik='.$nik);
   exit();
}

$sql = "SELECT * FROM member WHERE (email='$email' OR phone_number='$phoneNumber') AND nik!='$nik'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data anggota sudah ada, periksa kembali nomor telepon atau alamat email!";
   header('location: ../../../?page=member/update-member&nik='.$nik);
   exit();
}

$sql = "UPDATE member SET name='$name', phone_number='$phoneNumber', email='$email', address='$address' WHERE nik='$nik'";
$query = mysqli_query($connect, $sql);
if ($query) {
$_SESSION['msg']['update'] = "Data member berhasil di-edit!";
header('location: ../../../?page=member/data-member');
} else {
   $_SESSION['msg']['failed'] = "Gagal meng-edit data member!";
   header('location: ../../../?page=member/update-member&nik='.$nik);
}