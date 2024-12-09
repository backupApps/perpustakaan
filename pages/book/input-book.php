<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h5 class="mb-0">Book | Input</h5>
            </div>
            <div class="card-body pt-0">
               <form id="formAccountSettings" method="POST" onsubmit="return false">
                  <div class="row mt-1 g-5">
                     <div class="col-md-4">
                        <label class="form-label">Code</label>
                        <input class="form-control" type="text" name="book-code" placeholder="012..." autofocus />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input class="form-control" type="text" name="book-title" placeholder="Book title" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Category</label>
                        <select class="select2 form-select">
                           <option value="">Select Category</option>
                           <option value="Sains">Sains</option>
                           <option value="Novel">Novel</option>
                           <option value="Comic">Comic</option>
                           <option value="Sastra">Sastra</option>
                           <option value="Encyclopedia">Encyclopedia</option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Writer</label>
                        <input class="form-control" type="text" name="book-writer"
                           placeholder="J.K. Rowling; J.R.R. Tolkien; ..." />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">ISBN</label>
                        <input class="form-control" type="text" name="book-isbn" placeholder="123-456-7890-12-3" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Publisher</label>
                        <select class="select2 form-select">
                           <option value="">Select Publisher</option>
                           <option value="Erlangga">Erlangga</option>
                           <option value="Grammedia">Grammedia</option>
                           <option value="Grammedia">Mizan</option>
                           <option value="Grammedia">Bentang Pustaka</option>
                           <option value="Grammedia">Kanisius</option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" name="book-date" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Cover</label>
                        <input type="file" class="form-control" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Language</label>
                        <select class="select2 form-select">
                           <option value="">Select Language</option>
                           <option value="en">English</option>
                           <option value="fr">French</option>
                           <option value="de">German</option>
                           <option value="pt">Portuguese</option>
                        </select>
                     </div>
                     <div class="col-12">
                        <div class="input-group">
                           <span class="input-group-text border-end">
                              Synopsys
                           </span>
                           <textarea class="form-control ps-3" placeholder="typing..." rows="2"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="mt-6">
                     <button type="submit" class="btn btn-primary me-3">Submit</button>
                     <button type="reset" class="btn btn-outline-secondary">Reset</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>