<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Basic Layout -->
   <div class="row w-50">
      <div class="col-xl">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Borrower
            </div>
            <div class="card-body">
               <form action="" method="POST">
                  <div>
                     <label class="form-label">Member's NIK</label>
                     <div class="input-group mb-6">
                        <input type="text" name="member-nik" class="form-control" />
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                     </div>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Return Date</label>
                     <input
                        class="form-control <?php echo (isset($_SESSION['msg']['date'])) ? 'border-danger' : null; ?>"
                        value="<?php echo (isset($_SESSION['value']['date'])) ? $_SESSION['value']['date'] : null; ?>"
                        type="date" name="borrow-date" />
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary me-3">Submit</button>
               </form>
            </div>
         </div>
      </div>
      <!-- <div class="col-xl">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">
                  Borrowed Books
               </h5>
            </div>
            <div class="row g-6 mb-6 p-4">
               <div class="input-group">
                  <input type="text" class="form-control" value="123 | Title Book 1" />
                  <button class="btn btn-outline-primary" type="submit">Return</button>
               </div>
               <div class="input-group">
                  <input type="text" class="form-control" value="213 | Title Book 2" />
                  <button class="btn btn-outline-primary" type="submit">Return</button>
               </div>
               <div class="input-group">
                  <input type="text" class="form-control" value="321 | Title Book 3" />
                  <button class="btn btn-outline-primary" type="submit">Return</button>
               </div>
            </div>
         </div>
      </div> -->
   </div>
</div>