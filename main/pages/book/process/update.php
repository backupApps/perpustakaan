<?php
session_start();
include('../../../../components/connection.php');

if (!isset($_POST['submit'])) {
   header('location: ../../../?page=book/data-book');
   exit();
}

// Ambil data lama dari database
$code = $_POST['code'];
$sql = "SELECT * FROM book WHERE code='$code'";
$query = mysqli_query($connect, $sql);
$oldData = mysqli_fetch_array($query);

// Ambil data dari form
$title = $_POST['title'] ?: $oldData['title'];
$category = $_POST['category'] ?: $oldData['category'];
$writer = $_POST['writer'] ?: $oldData['writer'];
$publisher = $_POST['publisher'] ?: $oldData['publisher'];
$date = $_POST['date'] ?: $oldData['date'];
$language = $_POST['language'] ?: $oldData['language'];
$synopsis = $_POST['synopsis'] ?: $oldData['synopsis'];

$isbn = $_POST['isbn'] ?: $oldData['isbn'];
if (isset($_POST['isbn']) && $_POST['isbn'] !== '') {
   $isbn = $_POST['isbn'];
} else {
   $isbn = $oldData['isbn'];  // Gunakan ISBN lama jika tidak diubah
}

// insert gambar ke db dan folder covers
$cover = $_FILES['cover']['name'];
$fileTmp = $_FILES['cover']['tmp_name'];
$folder = '../image/';
$target = $folder . $cover;

// Ambil gambar lama dari database
$sql = "SELECT cover FROM book WHERE code='$code'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
$oldFile = $data['cover'];
$filePath = $folder . $oldFile;

// Cek apakah file gambar baru diupload
if ($cover) {
   // Jika gambar baru diupload, hapus gambar lama
   if (file_exists($filePath)) {
       unlink($filePath);  // Hapus gambar lama
   }

   // Pindahkan gambar baru ke folder
   $upload = move_uploaded_file($fileTmp, $target);

   // Update nama gambar baru di database
   if ($upload) {
       $sql = "UPDATE book SET cover='$cover' WHERE code='$code'";
       mysqli_query($connect, $sql);
   }
}

// validation
if ($code == '') {
   $_SESSION['msg']['code'] = "Kolom kode tidak boleh kosong!";
}
if ($title == '') {
   $_SESSION['msg']['title'] = "Kolom title tidak boleh kosong!";
}
if ($category == '') {
   $_SESSION['msg']['category'] = "Pilih kategori!";
}
if ($writer == '') {
   $_SESSION['msg']['writer'] = "Kolom penulis tidak boleh kosong!";
}
if ($isbn == '') {
   $_SESSION['msg']['isbn'] = "Kolom isbn tidak boleh kosong!";
}
if ($publisher == '') {
   $_SESSION['msg']['publisher'] = "Pilih penerbit!";
}
if ($date == '') {
   $_SESSION['msg']['date'] = "Tentukan waktu!";
}
// if ($cover == '') {
//    $_SESSION['msg']['cover'] = "Pilih Gambar!";
// } else if (!$upload) {
//    $_SESSION['msg']['cover'] = "Gagal meng-upload file.";
//    header('location: ../../../?page=book/update-book&code='.$code);
//    exit();
// }
if ($language == '') {
   $_SESSION['msg']['language'] = "Pilih bahasa!";
}
if ($synopsis == '') {
   $_SESSION['msg']['synopsis'] = "Kolom sinopsis tidak boleh kosong!";
}

if (isset($_SESSION['msg'])) {
   header('location: ../../../?page=book/update-book&code='.$code);
   exit();
}

// $sql = "SELECT * FROM book WHERE isbn='$isbn' AND code!='code'";
// $query = mysqli_query($connect, $sql);
// if (mysqli_num_rows($query) != 0) {
//    $_SESSION['msg']['failed'] = "Data buku sudah ada, periksa kode atau isbn yang sama!";
//    header('location: ../../../?page=book/update-book&code='.$code);
//    exit();
// }

$sql = "UPDATE book SET title='$title', category_code='$category', isbn='$isbn', writer='$writer', publisher_code='$publisher', date='$date', language='$language', synopsis='$synopsis' WHERE code='$code'";
$query = mysqli_query($connect, $sql);
if ($query) {
   $_SESSION['msg']['update'] = "Data buku baru berhasil di-edit!";
   header('location: ../../../?page=book/data-book');
   exit();
} else {
   $_SESSION['msg']['failed'] = "Gagal meng-edit data buku!";
   header('location: ../../../?page=book/update-book&code='.$code);
}