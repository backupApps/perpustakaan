<?php
// return book
session_start();
include('../../../../components/connection.php');

if (isset($_POST['reset'])) {
   header('location: ../../../?page=transaction/borrow');
   exit();
}

if (!isset($_POST['submit'])) {
   header('location: ../../../?page=transaction/return');
   exit();
}

$nik_member = $_POST['nik_member'];
$return_date = $_POST['return_date'];

$_SESSION['value']['nik_member'] = $nik_member;
$_SESSION['value']['return_date'] = $return_date;
$_SESSION['value']['member-name'] = $_POST['member-name'];

// Validasi jika member tidak ada
$sql = "SELECT * FROM member WHERE nik='$nik_member'";
$query = mysqli_query($connect, $sql);
$data = mysqli_num_rows($query);

if ($nik_member == '') {
   $_SESSION['msg']['nik_member'] = "Tidak ada NIK yang dicari!";
} else if (strlen($nik_member) < 16 || $data == 0) {
   $_SESSION['msg']['nik_member'] = '';
}

if ($return_date == '') {
   $_SESSION['msg']['return_date'] = "Isi tanggal pengembalian!";
}
if (isset($_SESSION['msg'])) {
   header('location: ../../../?page=transaction/return');
   exit();
}

// Mulai transaksi
mysqli_autocommit($connect, false); // Mulai transaksi untuk konsistensi data

try {
   // 1. Cek apakah ada transaksi yang return_date nya NULL untuk satu member
   $sqlCheckReturn = "SELECT return_date FROM transaksi WHERE nik_member='$nik_member'";
   $queryCheckReturn = mysqli_query($connect, $sqlCheckReturn);
   if (!$queryCheckReturn) {
      throw new Exception("Gagal mengecek status pengembalian buku: " . mysqli_error($connect));
   }

   $nullReturnDate = false; // Menandakan apakah masih ada transaksi dengan return_date NULL
   $validReturnDate = false; // Menandakan apakah semua transaksi sudah memiliki return_date yang valid

   // Periksa seluruh transaksi member
   while ($dataReturn = mysqli_fetch_array($queryCheckReturn)) {
      if ($dataReturn['return_date'] == NULL) {
         // Jika ada transaksi dengan return_date NULL, berarti member masih bisa mengembalikan buku
         $nullReturnDate = true;
      } else {
         // Jika ada transaksi dengan return_date yang sudah terisi (valid), berarti member sudah mengembalikan buku
         $validReturnDate = true;
      }
   }

   // 2. Jika masih ada transaksi dengan return_date NULL, maka member bisa mengembalikan buku
   if ($nullReturnDate) {
      // Update return_date pada transaksi yang belum dikembalikan
      $sqlUpdateTransaksi = "UPDATE transaksi SET return_date='$return_date' WHERE nik_member='$nik_member' AND return_date IS NULL";
      $queryUpdateTransaksi = mysqli_query($connect, $sqlUpdateTransaksi);
      if (!$queryUpdateTransaksi) {
         throw new Exception("Gagal mengupdate return_date: " . mysqli_error($connect));
      }

      // Commit transaksi
      mysqli_commit($connect);

      // Set pesan sukses
      $_SESSION['msg']['return'] = "Buku peminjaman <b>" . $nik_member . "</b> berhasil dikembalikan!";
      unset($_SESSION['value']);
      header('location: ../../../?page=transaction/show-data');
      exit();
   } else {
      // Jika tidak ada transaksi dengan return_date NULL, maka member sudah mengembalikan semua bukunya
      $_SESSION['msg']['failed'] = "Tidak ada peminjaman buku dari member ini!";
      header('location: ../../../?page=transaction/return');
      exit();
   }

} catch (Exception $e) {
   // Rollback jika terjadi error
   mysqli_rollback($connect);
   $_SESSION['msg']['failed'] = "Terjadi kesalahan saat memproses data: " . $e->getMessage();
   header('location: ../../../?page=transaction/return');
   exit();
}





// session_start();
// include('../../../../components/connection.php');

// if (isset($_POST['reset'])) {
//    header('location: ../../../?page=transaction/borrow');
//    exit();
// }

// if (!isset($_POST['submit'])) {
//    header('location: ../../../?page=transaction/return');
//    exit();
// }

// $nik_member = $_POST['nik_member'];
// $return_date = $_POST['return_date'];

// $_SESSION['value']['nik_member'] = $nik_member;
// $_SESSION['value']['return_date'] = $return_date;
// $_SESSION['value']['member-name'] = $_POST['member-name'];

// // validasi jika member tidak ada
// $sql = "SELECT * FROM member WHERE nik='$nik_member'";
// $query = mysqli_query($connect, $sql);
// $data = mysqli_num_rows($query);

// if ($nik_member == '') {
//    $_SESSION['msg']['nik_member'] = "Tidak ada NIK yang dicari!";
// } else if (strlen($nik_member) < 16 || $data == 0) {
//    $_SESSION['msg']['nik_member'] = '';
// }

// if ($return_date == '') {
//    $_SESSION['msg']['return_date'] = "Isi tanggal pengembalian!";
// }
// if (isset($_SESSION['msg'])) {
//    header('location: ../../../?page=transaction/return');
//    exit();
// }

// // Mulai transaksi
// mysqli_autocommit($connect, false); // Mulai transaksi untuk konsistensi data

// try {
//    // 1. Update return_date di tabel transaksi
//    $sqlUpdateTransaksi = "UPDATE transaksi SET return_date='$return_date' WHERE nik_member='$nik_member'";
//    $queryUpdateTransaksi = mysqli_query($connect, $sqlUpdateTransaksi);
//    if (!$queryUpdateTransaksi) {
//       throw new Exception("Gagal mengupdate return_date: " . mysqli_error($connect));
//    }

//    // 2. Ambil id_transaksi berdasarkan nik_member
//    $sqlGetTransaksi = "SELECT id FROM transaksi WHERE nik_member='$nik_member' AND return_date='$return_date'";
//    $resultTransaksi = mysqli_query($connect, $sqlGetTransaksi);
//    if (!$resultTransaksi) {
//       throw new Exception("Gagal mendapatkan id_transaksi: " . mysqli_error($connect));
//    }
//    $dataTransaksi = mysqli_fetch_array($resultTransaksi);
//    $id_transaksi = $dataTransaksi['id'];

//    // 3. Hapus semua detail_transaksi terkait id_transaksi
//    // $sqlDeleteDetail = "DELETE FROM detail_transaksi WHERE id_transaksi='$id_transaksi'";
//    // $queryDeleteDetail = mysqli_query($connect, $sqlDeleteDetail);
//    // if (!$queryDeleteDetail) {
//    //    throw new Exception("Gagal menghapus data dari detail_transaksi: " . mysqli_error($connect));
//    // }

//    // Commit transaksi
//    mysqli_commit($connect);

//    // Set pesan sukses
//    $_SESSION['msg']['return'] = "Buku peminjaman <b>" . $nik_member . "</b> berhasil dikembalikan!";
//    unset($_SESSION['value']);
//    header('location: ../../../?page=transaction/show-data');
//    exit();
// } catch (Exception $e) {
//    // Rollback jika terjadi error
//    mysqli_rollback($connect);
//    $_SESSION['msg']['failed'] = "Terjadi kesalahan saat memproses data: " . $e->getMessage();
//    header('location: ../../../?page=transaction/return');
//    exit();
// }
