<!-- Striped Rows -->
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card">
      <h5 class="card-header">Transaction | Borrower's Data</h5>
      <div class="table-responsive text-nowrap">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>Name</th>
                  <th>Borrowed Books</th>
                  <th>Borrow Date</th>
                  <th>Return Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <tr>
                  <td>1</td>
                  <td>1234567843218765</td>
                  <td>Albert Einsten</td>
                  <td>3/5</td>
                  <td>24/12/2024</td>
                  <td><b>Not return yet</b></td>
                  <td>
                     <a href="" class="btn btn-sm btn-info">
                        Edit
                        <i class="ri-pencil-line"></i>
                     </a> |
                     <a href="?page=transaction/detail-page&id=<?php echo $data['code']; ?>"
                        class="btn btn-sm btn-warning">
                        Detail
                        <i class="ri-book-open-line"></i>
                     </a> |
                     <a href="pages/transaction/process/delete.php?id=<?php echo $data['code']; ?>"
                        onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">
                        <i class="ri-delete-bin-line"></i>
                        Delete
                     </a>
                  </td>
               </tr>
               <tr>
                  <td>2</td>
                  <td>1234567843218765</td>
                  <td>Nicola Tesla</td>
                  <td>2/5</td>
                  <td>24/12/2024</td>
                  <td>31/12/2024</td>
                  <td>
                     <a href="?page=transaction/update-transaction&code=<?php echo $data['code']; ?>"
                        class="btn btn-sm btn-info">
                        Edit
                        <i class="ri-pencil-line"></i>
                     </a> |
                     <a href="?page=transaction/update-transaction&code=<?php echo $data['code']; ?>"
                        class="btn btn-sm btn-warning">
                        Detail
                        <i class="ri-book-open-line"></i>
                     </a> |
                     <a href="pages/transaction/process/delete.php?code=<?php echo $data['code']; ?>"
                        onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">
                        <i class="ri-delete-bin-line"></i>
                        Delete
                     </a>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>