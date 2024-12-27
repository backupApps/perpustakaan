<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Basic Layout -->
   <div class="row w-50">
      <div class="col-xl">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Publisher | Input</h5>
            </div>
            <?php if (isset($_SESSION['msg']['failed'])) { ?>
            <div class="alert alert-danger mt-2" role="alert">
               <?php echo $_SESSION['msg']['failed'];?>
            </div>
            <?php } ?>

            <?php if (isset($_SESSION['msg']['success'])) { ?>
            <div class="alert alert-success mt-2" role="alert">
               <?php echo $_SESSION['msg']['success'];?>
            </div>
            <?php } ?>
            <div class="card-body">
               <form action="pages/publisher/process/create.php" method="POST">
                  <div class="mb-6">
                     <label class="form-label">Code</label>
                     <input type="text" name="code" class="form-control" id="basic-default-fullname"
                        placeholder="ERL; GRA; ..." />
                     <?php if (isset($_SESSION['msg']['code'])) { ?>
                     <div class="alert alert-danger mt-2" role="alert">
                        <?php echo $_SESSION['msg']['code'];?>
                     </div>
                     <?php } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Name</label>
                     <input type="text" name="name" class="form-control" placeholder="Erlangga; Grammedia; ..." />
                     <?php if (isset($_SESSION['msg']['name'])) { ?>
                     <div class="alert alert-danger mt-2" role="alert">
                        <?php echo $_SESSION['msg']['name'];?>
                     </div>
                     <?php } ?>
                  </div>
                  <div class="mb-6">
                     <label class="form-label">Address</label>
                     <input type="text" name="address" class="form-control" />
                     <?php if (isset($_SESSION['msg']['address'])) { ?>
                     <div class="alert alert-danger mt-2" role="alert">
                        <?php echo $_SESSION['msg']['address'];?>
                     </div>
                     <?php } ?>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Add Publisher</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php unset($_SESSION['msg']); ?>