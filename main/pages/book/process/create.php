<?php
session_start();

if (!isset($_POST['submit'])) {
   header('location: ../../../index.php');
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

// insert gambar ke db dan folder image
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
   header('location: ../../../?page=book/input-book');
   exit();
}
if ($language == '') {
   $_SESSION['msg']['language'] = "Pilih bahasa!";
}
if ($synopsis == '') {
   $_SESSION['msg']['synopsis'] = "Kolom sinopsis tidak boleh kosong!";
}

if (isset($_SESSION['msg'])) {
   header('location: ../../../?page=book/input-book');
   exit();
}

include('../../../../components/connection.php');

$sql = "SELECT * FROM book WHERE code='$code' OR isbn='$isbn'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) != 0) {
   $_SESSION['msg']['failed'] = "Data buku sudah ada, periksa kode atau isbn yang sama!";
   header('location: ../../../?page=book/input-book');
   exit();
}

$sql = "INSERT INTO book
VALUES (
   '$code', 
   '$title', 
   '$category', 
   '$isbn', 
   '$writer', 
   '$publisher', 
   '$date', 
   '$language', 
   '$cover', 
   '$synopsis'
)";
$query = mysqli_query($connect, $sql);
$_SESSION['msg']['book'] = "Data buku baru berhasil ditambahkan!";
header('location: ../../../?page=book/input-book');
unset($_SESSION['value']);



// echo $upload;
// header('location: ../../../?page=book/input-book');
// exit();

// if(isset($_FILES['cover']) && $_FILES['cover']['error'] == 0){
//    // Ambil nama file dan nama sementara
//    $cover = $_FILES['cover']['name'];
//    $fileTmp = $_FILES['cover']['tmp_name'];

//    // Tentukan folder tujuan penyimpanan
//    $folder = '../image/'; // Pastikan path ini benar sesuai struktur folder Anda
//    $target = $folder . basename($cover); // Gabungkan folder dan nama file

//    // Periksa apakah folder tujuan ada, jika belum buat foldernya
//    if (!file_exists($folder)) {
//        mkdir($folder, 0777, true); // Membuat folder jika belum ada
//    }

//    // Cek apakah file berhasil di-upload
   // $upload = move_uploaded_file($fileTmp, $target);

   // // Tampilkan pesan status upload
   // if ($upload) {
   //     // Jika berhasil, redirect ke halaman input book
   //     $_SESSION['msg']['cover'] = "File berhasil di-upload!";
   //     header('location: ../../../?page=book/input-book');
   //     exit();
   // } else {
   //    //  Jika gagal, tampilkan error
   //     $_SESSION['msg']['cover'] = "Gagal meng-upload file.";
   //     header('location: ../../../?page=book/input-book');
   //    // if ($_FILES['cover']['error'] !== UPLOAD_ERR_OK) {
   //    //    echo "Error uploading file: " . $_FILES['cover']['error'];
   //    // }
   //     exit();
   // }
// } else {
//    // Jika tidak ada file yang diupload
//    $_SESSION['msg']['cover'] = "Tidak ada file yang dipilih.";
//    header('location: ../../../?page=book/input-book');
//    exit();
// }