<?php
include('../components/connection.php');
if (isset($_REQUEST['code'])) {
   $code = $_REQUEST['code'];
   $sql = "SELECT * FROM book WHERE code='$code'";
   $query = mysqli_query($connect, $sql);
   $data = mysqli_fetch_array($query);

   $category = "SELECT * FROM category";
   $selectCategory = mysqli_query($connect, $category);

   $publisher = "SELECT * FROM publisher";
   $selectPublisher = mysqli_query($connect, $publisher);
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Book | Update</h5>
            </div>
            <?php if (isset($_SESSION['msg']['failed'])) { ?>
            <div class="alert alert-danger ms-2 me-2" role="alert">
               <?php echo $_SESSION['msg']['failed']; ?>
            </div>
            <?php } ?>

            <?php if (isset($_SESSION['msg']['book'])) { ?>
            <div class="alert alert-success ms-2 me-2" role="alert">
               <?php echo $_SESSION['msg']['book']; ?>
            </div>
            <?php } ?>
            <div class="card-body pt-0">
               <form action="pages/book/process/update.php" method="POST" enctype="multipart/form-data">
                  <div class="row mt-1 g-5">
                     <div class="col-md-4">
                        <label class="form-label">Code</label>
                        <input
                           class="form-control <?php echo (isset($_SESSION['msg']['code'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['code']; ?>" type="text" name="code" placeholder="B-book" readonly />
                        <?php if (isset($_SESSION['msg']['code'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['code'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input
                           class="form-control <?php echo (isset($_SESSION['msg']['title'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['title']; ?>" type="text" name="title" placeholder="Book title"
                           <?php echo (isset($_SESSION['msg']['title'])) ? null : 'autofocus'; ?> />
                        <?php if (isset($_SESSION['msg']['title'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['title'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Category</label>
                        <select
                           class="select2 form-select <?php echo (isset($_SESSION['msg']['category'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['category_code']; ?>" name="category">
                           <option value="">-- Select Category --</option>
                           <?php while ($var = mysqli_fetch_array($selectCategory)) { ?>
                           <option value="<?php echo $var['category_code']; ?>"
                              <?php echo ($var['category_code'] == $data['category_code']) ? 'selected' : ''; ?>>
                              <?php echo $var['category_name']; ?></option>
                           <?php } ?>
                        </select>
                        <?php if (isset($_SESSION['msg']['category'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['category'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">ISBN</label>
                        <input
                           class="form-control <?php echo (isset($_SESSION['msg']['isbn'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['isbn']; ?>" type="text" name="isbn"
                           placeholder="123-456-7890-12-3" />
                        <?php if (isset($_SESSION['msg']['isbn'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['isbn'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Writer</label>
                        <input
                           class="form-control <?php echo (isset($_SESSION['msg']['writer'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['writer']; ?>" type="text" name="writer"
                           placeholder="J.K. Rowling; J.R.R. Tolkien; ..." />
                        <?php if (isset($_SESSION['msg']['writer'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['writer'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Publisher</label>
                        <select
                           class="select2 form-select <?php echo (isset($_SESSION['msg']['publisher'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['publisher_code']; ?>" name="publisher">
                           <option value="">-- Select Publisher --</option>
                           <?php while ($var = mysqli_fetch_array($selectPublisher)) { ?>
                           <option value="<?php echo $var['publisher_code']; ?>"
                              <?php echo ($var['publisher_code'] == $data['publisher_code']) ? 'selected' : ''; ?>>
                              <?php echo $var['publisher_name']; ?>
                           </option>
                           <?php } ?>
                        </select>
                        <?php if (isset($_SESSION['msg']['publisher'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['publisher'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Date</label>
                        <input
                           class="form-control <?php echo (isset($_SESSION['msg']['date'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['date']; ?>" type="date" name="date" />
                        <?php if (isset($_SESSION['msg']['date'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['date'] ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Cover</label>
                        <input type="file"
                           class="form-control <?php echo (isset($_SESSION['msg']['cover'])) ? 'border-danger' : null; ?>"
                           value="<?php echo (isset($_SESSION['value']['cover']) && $_SESSION['value']['cover'] != '') ? $_SESSION['value']['cover'] : $data['cover']; ?>"
                           name="cover" />
                        <?php echo $data['cover']; ?>
                        <br />
                        <?php if (isset($_SESSION['msg']['cover'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['cover']; ?></span>
                        <?php } ?>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Language</label>
                        <select
                           class="select2 form-select <?php echo (isset($_SESSION['msg']['language'])) ? 'border-danger' : null; ?>"
                           value="<?php echo $data['language']; ?>" name="language">
                           <option value="">-- Select Language --</option>
                           <option value="Indonesia"
                              <?php echo (isset($data['language']) && $data['language'] == 'Indonesia') ? 'selected' : ''; ?>>
                              Indonesia
                           </option>
                           <option value="English"
                              <?php echo (isset($data['language']) && $data['language'] == 'English') ? 'selected' : ''; ?>>
                              English
                           </option>
                           <option value="Japan"
                              <?php echo (isset($data['language']) && $data['language'] == 'Japan') ? 'selected' : ''; ?>>
                              Japan
                           </option>
                        </select>
                        <?php if (isset($_SESSION['msg']['language'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['language'] ?></span>
                        <?php } ?>
                     </div>

                     <div class="col-12">
                        <label class="form-label">Synopsis</label>
                        <div class="input-group">
                           <textarea style="min-height: 20vh;"
                              class="form-control ps-3 <?php echo (isset($_SESSION['msg']['synopsis'])) ? 'border-danger' : null; ?>"
                              name="synopsis" placeholder="typing..."><?php echo $data['synopsis']; ?></textarea>
                        </div>
                        <?php if (isset($_SESSION['msg']['synopsis'])) { ?>
                        <span class="text-danger"><?php echo $_SESSION['msg']['synopsis'] ?></span>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="mt-6">
                     <button type="submit" class="btn btn-secondary">Back</button>
                     <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
unset($_SESSION['msg']);
unset($_SESSION['value']);
?>