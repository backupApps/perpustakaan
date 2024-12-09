<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="nav-align-top">
            <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" href="javascript:void(0);">
                     <i class="ri-group-line me-1_5"></i>
                     Member Account</a>
               </li>
            </ul>
         </div>
         <div class="card mb-6">

            <!-- Account -->
            <div class="card-body">
               <div class="d-flex align-items-start align-items-sm-center gap-6">
                  <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded"
                     id="uploadedAvatar" />
                  <div class="button-wrapper">
                     <label for="upload" class="btn btn-sm btn-primary me-3 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="ri-upload-2-line d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" hidden
                           accept="image/png, image/jpeg" />
                     </label>
                     <button type="button" class="btn btn-sm btn-outline-danger account-image-reset mb-4">
                        <i class="ri-refresh-line d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                     </button>

                     <div>Allowed JPG, JPEG or PNG. Max size of 2MB</div>
                  </div>
               </div>
            </div>
            <div class="card-body pt-0">
               <form id="formAccountSettings" method="POST" onsubmit="return false">
                  <div class="row mt-1 g-5">
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input class="form-control" type="text" id="firstName" name="firstName"
                              placeholder="First Name" autofocus />
                           <label for="firstName">First Name</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                           <input class="form-control" type="text" name="lastName" id="lastName"
                              placeholder="Last Name" />
                           <label for="lastName">Last Name</label>
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
                           <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" />
                           <label for="address">NIK</label>
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