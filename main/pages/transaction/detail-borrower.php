<?php
include('process/read.php');
$no = 1;
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <a href="?page=transaction/show-data" type="submit" class="btn btn-secondary">
      <i class="ri-arrow-left-s-line"></i>
      Kembali
   </a>
   <h3 class="card-header float-end">Transaksi | Detail Peminjaman</h3>
   <div class="card mt-5">
      <h5 class="card-header float-end">Anggota</h5>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>Foto</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Nomor HP</th>
                  <th>E-mail</th>
                  <th>Alamat</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <tr>
                  <td>
                     <img class="rounded" style="width: 150px;"
                        src="pages/member/photo/<?php echo $dataMember['photo']; ?>" alt="">
                  </td>
                  <td><?php echo $dataMember['nik']; ?></td>
                  <td><?php echo $dataMember['name']; ?></td>
                  <td><?php echo $dataMember['phone_number']; ?></td>
                  <td><?php echo $dataMember['email']; ?></td>
                  <td style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                     <?php echo $dataMember['address']; ?>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="card mt-5">
      <h5 class="card-header">Buku</h5>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Kategori</th>
                  <th>Penerbit</th>
                  <th>ISBN</th>
                  <th>Waktu Peminjaman</th>
                  <th>Waktu Pengembalian</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php while ($data = mysqli_fetch_array($query)) { ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td>
                        <img width="100" class="rounded" src="pages/book/image/<?php echo $data['cover']; ?>" alt="">
                     </td>
                     <td><b><?php echo $data['code']; ?></b> | <?php echo $data['title']; ?></td>
                     <td><?php echo $data['writer']; ?></td>
                     <td><?php echo $data['category_name']; ?></td>
                     <td><?php echo $data['publisher_name']; ?></td>
                     <td><?php echo $data['isbn']; ?></td>
                     <td>
                        <?php echo $data['borrowed_date']; ?>
                     </td>
                     <td>
                        <?php echo ($data['returned_date'] != null) ? $data['returned_date'] : '<b>Belum Dikembalikan</b>'; ?>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>