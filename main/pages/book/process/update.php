<?php
session_start();

if (!isset($_POST['submit'])) {
   header('location: ../../../?page=book/data-book');
   exit();
}

$code = $_POST['code'];
$title = $_POST['title'];
$category = $_POST['category'];
$writer = $_POST['writer'];
$isbn = $_POST['isbn'];
$publisher = $_POST['publisher'];
$date = $_POST['date'];
$language = $_POST['language'];
$synopsis = $_POST['synopsis'];

// insert gambar ke db dan folder covers
$cover = $_FILES['cover']['name'];
$fileTmp = $_FILES['cover']['tmp_name'];
$folder = '../image/';
$target = $folder.$cover;
$upload = move_uploaded_file($fileTmp, $target);

// value
$_SESSION['value']['code'] = $code;
$_SESSION['value']['title'] = $title;
$_SESSION['value']['category'] = $category;
$_SESSION['value']['writer'] = $writer;
$_SESSION['value']['isbn'] = $isbn;
$_SESSION['value']['publisher'] = $publisher;
$_SESSION['value']['date'] = $date;
$_SESSION['value']['cover'] = $cover;
$_SESSION['value']['language'] = $language;
$_SESSION['value']['synopsis'] = $synopsis;

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
if ($cover == '') {
   $_SESSION['msg']['cover'] = "Pilih Gambar!";
} else if (!$upload) {
   $_SESSION['msg']['cover'] = "Gagal meng-upload file.";
   header('location: ../../../?page=book/update-book&code='.$code);
   exit();
}
if ($language == '') {
   $_SESSION['msg']['language'] = "Pilih bahasa!";
}
if ($synopsis == '') {
   $_SESSION['msg']['synopsis'] = "Kolom sinopsis tidak boleh kosong!";
}

if (isset($_SESSION['msg']['title']) || 
   isset($_SESSION['msg']['category']) ||
   isset($_SESSION['msg']['writer']) ||
   isset($_SESSION['msg']['isbn']) ||
   isset($_SESSION['msg']['publisher']) ||
   isset($_SESSION['msg']['date']) ||
   isset($_SESSION['msg']['cover']) ||
   isset($_SESSION['msg']['language']) ||
   isset($_SESSION['msg']['synopsis'])
) {
   header('location: ../../../?page=book/update-book&code='.$code);
   exit();
}

include('../../../../components/connection.php');

$sql = "SELECT * FROM book WHERE isbn='$isbn' AND code!='code'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data buku sudah ada, periksa kode atau isbn yang sama!";
   header('location: ../../../?page=book/update-book&code='.$code);
   exit();
}

$sql = "UPDATE book SET title='$title', category='$category', isbn='$isbn', writer='$writer', publisher='$publisher', date='$date', cover='$cover', language='$language', synopsis='$synopsis' WHERE code='$code'";
$query = mysqli_query($connect, $sql);
$_SESSION['msg']['update'] = "Data buku baru berhasil di-edit!";
header('location: ../../../?page=book/data-book');