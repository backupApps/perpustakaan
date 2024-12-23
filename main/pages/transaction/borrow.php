<?php 
?>

<!-- 1 -->
<div class="container-xxl flex-grow-1 container-p-y">
   <form action="pages/transaction/process/create.php" method="POST">
      <div class="row">
         <div class="col-xl">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Borrower
               </div>
               <div class="card-body">
                  <div class="input-group input-group-merge mb-6">
                     <span class="input-group-text"><i class=" ri-search-line ri-20px"></i></span>
                     <input type="text" class="form-control" placeholder="Search Member's NIK" name="member-nik"
                        id="memberNik" onkeyup="showResult(this.value)">
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Member's Name</label>
                     <input type="text" name="member-name" id="memberName" class="form-control"
                        value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" readonly />
                     <?php if (isset($_SESSION['msg']['not-get'])) {echo '<span class="text-danger">'.$_SESSION['msg']['not-get'].'</span>';} ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Borrow Date</label>
                     <input
                        class="form-control <?php echo (isset($_SESSION['msg']['date'])) ? 'border-danger' : null; ?>"
                        value="<?php echo (isset($_SESSION['value']['date'])) ? $_SESSION['value']['date'] : null; ?>"
                        type="date" name="borrow-date" />
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl">
            <div class="card">
               <div class="card-body">
                  <h6>Books</h6>
                  <?php for ($i = 1; $i <= 5; $i++) { ?>
                  <div class="form-floating form-floating-outline mb-6">
                     <input type="text" name="book<?php echo $i; ?>" class="form-control" placeholder="Book 1">
                     <label>Book <?php echo $i; ?></label>
                  </div>
                  <?php } ?>
                  <button type="submit" class="btn btn-secondary me-3 p-4">Reset</button>
                  <button type="submit" name="submit" class="btn btn-primary me-3 p-4">Submit</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>

<?php 
include('process/live-search.php');
unset($_SESSION['msg']); 
?>

<!-- 2 -->
<!-- <div>
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-xl">
            <div class="card">
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
                        <label class="form-label">Member's Name</label>
                        <input type="text" name="member-name" class="form-control" readonly />
                     </div>
                     <div class="mb-6">
                        <label class="form-label">Borrow Date</label>
                        <input class="form-control" value="" type="date" name="borrow-date" />
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-xxl flex-grow-1 container-p-y">
      <form action="" method="POST">
         <div class="row">
            <div class="col-xl">
               <div class="card">
                  <div class="card-body">
                     <h6>Book 1</h6>
                     <div class="input-group input-group-merge mb-6">
                        <span class="input-group-text" id="basic-addon-search31"><i
                              class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Code" aria-label="Search..."
                           aria-describedby="basic-addon-search31" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" placeholder="Harry Potter; Games of Thrones; ..." />
                        <label for="basic-default-company">Title</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl">
               <div class="card mb-6">

                  <div class="card-body">
                     <h6>Book 2</h6>
                     <div class="input-group input-group-merge mb-6">
                        <span class="input-group-text" id="basic-addon-search31"><i
                              class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Code" aria-label="Search..."
                           aria-describedby="basic-addon-search31" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" placeholder="Harry Potter; Games of Thrones; ..." />
                        <label for="basic-default-company">Title</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl">
               <div class="card mb-6">

                  <div class="card-body">
                     <h6>Book 3</h6>
                     <div class="input-group input-group-merge mb-6">
                        <span class="input-group-text" id="basic-addon-search31"><i
                              class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Code" aria-label="Search..."
                           aria-describedby="basic-addon-search31" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" placeholder="Harry Potter; Games of Thrones; ..." />
                        <label for="basic-default-company">Title</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl">
               <div class="card mb-6">

                  <div class="card-body">
                     <h6>Book 4</h6>
                     <div class="input-group input-group-merge mb-6">
                        <span class="input-group-text" id="basic-addon-search31"><i
                              class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Code" aria-label="Search..."
                           aria-describedby="basic-addon-search31" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" placeholder="Harry Potter; Games of Thrones; ..." />
                        <label for="basic-default-company">Title</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl">
               <div class="card mb-6">

                  <div class="card-body">
                     <h6>Book 5</h6>
                     <div class="input-group input-group-merge mb-6">
                        <span class="input-group-text" id="basic-addon-search31"><i
                              class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Code" aria-label="Search..."
                           aria-describedby="basic-addon-search31" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" placeholder="Harry Potter; Games of Thrones; ..." />
                        <label for="basic-default-company">Title</label>
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary me-3 p-4">Submit</button>
         </div>
      </form>
   </div>
</div> -->