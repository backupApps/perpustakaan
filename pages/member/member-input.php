<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-6">
            <h5 class="card-header">Member | Input</h5>
            <div class="card-body pt-0">
               <form id="formAccountSettings" method="POST" onsubmit="return false">
                  <div class="row mt-1 g-5">
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" />
                           <label for="address">NIK</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input class="form-control" type="text" name="name" placeholder="Name" autofocus />
                           <label for="firstName">Name</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="input-group input-group-merge">
                           <div class="form-floating form-floating-outline">
                              <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                 placeholder="812 3456 7890" />
                              <label for="phoneNumber">Phone Number</label>
                           </div>
                           <span class="input-group-text">ID (+62)</span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input class="form-control" type="text" id="email" name="email"
                              placeholder="your.mail@example.com" />
                           <label for="email">E-mail</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input class="form-control" type="text" name="lastName" id="lastName"
                              placeholder="Last Name" />
                           <label for="lastName">Address</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input class="form-control" type="file" name="lastName" id="lastName" placeholder="" />
                           <label for="lastName">Photo</label>
                        </div>
                     </div>
                  </div>
                  <div class="mt-6">
                     <button type="submit" class="btn btn-primary me-3">Save</button>
                     <button type="reset" class="btn btn-outline-secondary">Reset</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>