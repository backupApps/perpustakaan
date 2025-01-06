<?php
session_start();
include('../../../../components/connection.php');

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

$ekstensiValid = ['jpg', 'jpeg', 'png'];
$ekstensiFile = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
$ekstensiGambar = explode('.', $photo);
$ekstensiGambar = end($ekstensiGambar);

// fungsi waktu
$photo = date('l, d-m-Y  H:i:s');

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
} else if (strlen($nik) < 16 || strlen($nik) > 16) {
   $_SESSION['msg']['nik'] = "NIK harus 16 karakter!";
} else if (!ctype_digit($nik)) { // Validasi hanya angka
   $_SESSION['msg']['nik'] = "NIK hanya boleh berisi angka!";
}
if ($name == '') {
   $_SESSION['msg']['name'] = "Kolom nama tidak boleh kosong!";
} else if (preg_match('/\d/', $name)) { // Validasi tidak boleh ada angka
   $_SESSION['msg']['name'] = "Nama tidak boleh mengandung angka!";
}
if ($phoneNumber == '') {
   $_SESSION['msg']['phoneNumber'] = "Kolom nomor telepon tidak boleh kosong!";
} else if (!ctype_digit($phoneNumber)) { // Validasi hanya angka
   $_SESSION['msg']['phoneNumber'] = "Nomor telepon hanya boleh berisi angka!";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $_SESSION['msg']['email'] = "Format email tidak valid!";
}
if ($address == '') {
   $_SESSION['msg']['address'] = "Kolom address tidak boleh kosong!";
}
if (empty($photo)) {
   $_SESSION['msg']['photo'] = "Pilih Gambar!";
} else if (!in_array($ekstensiFile, $ekstensiValid)) { // Validasi ekstensi file
   $_SESSION['msg']['photo'] = "Hanya file dengan ekstensi jpg, jpeg, atau png yang diperbolehkan!";
} else if ($_FILES['photo']['size'] > 2 * 1024 * 1024) { // Validasi ukuran file maksimal 2MB
   $_SESSION['msg']['photo'] = "Ukuran file maksimal 2MB!";
} else {
   if (isset($_SESSION['msg'])) {
      header('location: ../../../?page=member/input-member');
      exit();
   }
   // Jika validasi berhasil, upload file
   // generate nama baru
   $newName = strtolower(md5($photo) . '.' . $ekstensiGambar);
   $upload = move_uploaded_file($fileTmp, $folder . $newName);

   if (!$upload) {
      $_SESSION['msg']['photo'] = "Gagal meng-upload file.";
      header('location: ../../../?page=member/input-member');
      exit();
   }
}
if (isset($_SESSION['msg'])) {
   header('location: ../../../?page=member/input-member');
   exit();
}

$sql = "SELECT * FROM member WHERE nik='$nik' OR phone_number='$phoneNumber' OR email='$email'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data anggota sudah ada, periksa kembali nomor telepon atau alamat email!";
   header('location: ../../../?page=member/input-member');
   exit();
}

$sql = "INSERT INTO member VALUES ('$nik', '$name', '$phoneNumber', '$email', '$address', '$newName')";
$query = mysqli_query($connect, $sql);
$_SESSION['msg']['member'] = "Data anggota baru berhasil ditambahkan!";
header('location: ../../../?page=member/input-member');
unset($_SESSION['value']);