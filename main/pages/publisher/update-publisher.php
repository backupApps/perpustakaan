<?php
include('process/read.php');
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Basic Layout -->
   <div class="row w-50">
      <div class="col-xl">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Publisher | Update</h5>
            </div>
            <?php if (isset($_SESSION['msg']['failed'])) { ?>
            <div class="alert alert-danger mt-2" role="alert">
               <?php echo $_SESSION['msg']['failed'];?>
            </div>
            <?php } ?>
            <div class="card-body">
               <form action="pages/publisher/process/update.php" method="POST">
                  <div class="mb-6">
                     <label class="form-label">Code Publisher</label>
                     <input type="text" name="code" class="form-control" value="<?php echo $data['code']; ?>"
                        readonly />
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Name Publisher</label>
                     <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>"
                        placeholder="Novel; Comic; Sains; Encyclopedia; ..." />
                     <?php if (isset($_SESSION['msg']['name'])) { ?>
                     <div class="alert alert-danger mt-2" role="alert">
                        <?php echo $_SESSION['msg']['name'];?>
                     </div>
                     <?php } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Address</label>
                     <input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>" />
                     <?php if (isset($_SESSION['msg']['address'])) { ?>
                     <div class="alert alert-danger mt-2" role="alert">
                        <?php echo $_SESSION['msg']['address'];?>
                     </div>
                     <?php } ?>
                  </div>
                  <button type="submit" class="btn btn-secondary">Back</button>
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php unset($_SESSION['msg']); ?>