<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Category | Update</h5>
         </div>
         <div class="modal-body">
            <form action="pages/category/process/update.php" method="POST">
               <div class="row">
                  <div class="col mb-6 mt-2">
                     <div class="">
                        <label class="form-label">Code</label>
                        <input type="text" name="code" class="form-control" value="" />
                     </div>
                  </div>
               </div>
               <div class="row g-4">
                  <div class="col mb-2">
                     <div class="">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" />
                     </div>
                  </div>
               </div>
         </div>
         </form>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
               Close
            </button>
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>