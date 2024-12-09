<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Basic Layout -->
   <div class="row">
      <div class="col-xl">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Borrower
            </div>
            <div class="card-body">
               <form>
                  <div class="form-floating form-floating-outline mb-6">
                     <input type="text" class="form-control" id="basic-default-fullname" placeholder="012.." />
                     <label for="basic-default-fullname">NIK</label>
                  </div>
                  <div class="form-floating form-floating-outline mb-6">
                     <input type="text" class="form-control" id="basic-default-company" placeholder="" />
                     <label for="basic-default-company">Borrower's Name</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>
      <div class="col-xl">
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
      </div>
   </div>
</div>