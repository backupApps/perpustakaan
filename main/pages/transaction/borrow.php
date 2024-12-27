<div class="container-xxl flex-grow-1 container-p-y">
   <form action="pages/transaction/process/borrowed.php" method="POST">
      <div class="row">
         <div class="col-xl">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Borrower
               </div>
               <?php if (isset($_SESSION['msg']['sukses'])) { ?>
                  <div class="alert alert-success ms-2 me-2" role="alert">
                     <?php echo $_SESSION['msg']['sukses']; ?>
                  </div>
               <?php } ?>

               <?php if (isset($_SESSION['msg']['general'])) { ?>
                  <div class="alert alert-danger ms-2 me-2" role="alert">
                     <?php echo $_SESSION['msg']['general']; ?>
                  </div>
               <?php } ?>
               <div class="card-body">
                  <div class="mb-6">
                     <div class="input-group input-group-merge">
                        <span
                           class="input-group-text <?php echo (isset($_SESSION['msg']['nik_member'])) ? 'border-danger' : null; ?>">
                           <i class=" ri-search-line ri-20px"></i></span>
                        <input type="text" placeholder="Search Member's NIK" name="member-nik"
                           class="form-control <?php echo (isset($_SESSION['msg']['nik_member'])) ? 'border-danger' : null; ?>"
                           value="<?php echo (isset($_SESSION['value']['nik_member'])) ? $_SESSION['value']['nik_member'] : null; ?>"
                           id="memberNik" onkeyup="showName(this.value)">
                     </div>
                     <?php if (isset($_SESSION['msg']['nik_member'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['nik_member'] . '</span>';
                     } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Member's Name</label>
                     <input type="text" name="member-name" id="memberName" class="form-control"
                        value="<?php echo isset($data['name']) ? $data['name'] : '';
                                 echo (isset($_SESSION['value']['member-name'])) ? $_SESSION['value']['member-name'] : null; ?>" readonly />
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Borrow Date</label>
                     <input
                        class="form-control <?php echo (isset($_SESSION['msg']['borrow_date'])) ? 'border-danger' : null; ?>"
                        value="<?php echo (isset($_SESSION['value']['borrow_date'])) ? $_SESSION['value']['borrow_date'] : null; ?>"
                        type="date" name="borrow-date" />
                     <?php if (isset($_SESSION['msg']['borrow_date'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['borrow_date'] . '</span>';
                     } ?>
                  </div>
                  <div class="text-end">
                     <button type="submit" name="reset" class="btn btn-secondary me-3 p-4">Reset</button>
                     <button type="submit" name="submit" class="btn btn-primary me-3 p-4">Submit</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl">
            <div class="card">
               <div class="card-body">
                  <?php if (isset($_SESSION['msg']['book'])) {
                     echo '<div class="alert alert-danger float-end w-50" role="alert">' . $_SESSION['msg']['book'] . '</div>';
                  } ?>
                  <h6>Books</h6>
                  <div class="">
                     <h6>Book 1</h6>
                     <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Book 1" name="book1"
                           value="<?php echo (isset($_SESSION['value']['book1'])) ? $_SESSION['value']['book1'] : null; ?>"
                           onkeyup="showBook(this.value, 1)" onkeyup="showBook(this.value)" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input readonly type="text" name="title1" class="form-control" id="bookTitle1"
                           value="<?php echo isset($data['title']) ? $data['title'] : '';
                                    echo (isset($_SESSION['value']['title1'])) ? $_SESSION['value']['title1'] : null; ?>" />
                     </div>
                  </div>
                  <div class="">
                     <h6>Book 2</h6>
                     <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Book 2" name="book2"
                           value="<?php echo (isset($_SESSION['value']['book2'])) ? $_SESSION['value']['book2'] : null;  ?>"
                           onkeyup="showBook(this.value, 2)" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input readonly type="text" name="title2" class="form-control" id="bookTitle2"
                           value="<?php echo isset($data['title']) ? $data['title'] : '';
                                    echo (isset($_SESSION['value']['title2'])) ? $_SESSION['value']['title2'] : null; ?>" />
                     </div>
                  </div>
                  <div class="">
                     <h6>Book 3</h6>
                     <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Book 3" name="book3"
                           value="<?php echo (isset($_SESSION['value']['book3'])) ? $_SESSION['value']['book3'] : null; ?>"
                           onkeyup="showBook(this.value, 3)" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input readonly type="text" name="title3" class="form-control" id="bookTitle3"
                           value="<?php echo isset($data['title']) ? $data['title'] : '';
                                    echo (isset($_SESSION['value']['title3'])) ? $_SESSION['value']['title3'] : null; ?>" />
                     </div>
                  </div>
                  <div class="">
                     <h6>Book 4</h6>
                     <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Book 4" name="book4"
                           value="<?php echo (isset($_SESSION['value']['book4'])) ? $_SESSION['value']['book4'] : null; ?>"
                           onkeyup="showBook(this.value, 4)" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input readonly type="text" name="title4" class="form-control" id="bookTitle4"
                           value="<?php echo isset($data['title']) ? $data['title'] : '';
                                    echo (isset($_SESSION['value']['title4'])) ? $_SESSION['value']['title4'] : null; ?>" />
                     </div>
                  </div>
                  <div class="">
                     <h6>Book 5</h6>
                     <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-search-line ri-20px"></i></span>
                        <input type="text" class="form-control" placeholder="Book 5" name="book5"
                           value="<?php echo (isset($_SESSION['value']['book5'])) ? $_SESSION['value']['book5'] : null; ?>"
                           onkeyup="showBook(this.value, 5)" />
                     </div>
                     <div class="form-floating form-floating-outline mb-6">
                        <input readonly type="text" name="title5" class="form-control" id="bookTitle5"
                           value="<?php echo isset($data['title']) ? $data['title'] : '';
                                    echo (isset($_SESSION['value']['title5'])) ? $_SESSION['value']['title5'] : null; ?>" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>

<?php
include('process/live-search.php');
unset($_SESSION['value']);
unset($_SESSION['msg']);
?>

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