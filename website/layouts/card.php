<?php while ($data = mysqli_fetch_array($query)) { ?>
<div class="col-md-6 col-lg-3">
   <div class="card h-100">
      <img class="card-img-top" src="../main/pages/book/image/<?php echo $data['cover']; ?>" alt="Card image cap"
         style="max-height: 250px; object-fit: cover;" />
      <div class="card-body">
         <h5 class="card-title"
            style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?php echo $data['title']; ?></h5>
         <p class="card-text" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?php echo $data['synopsis']; ?>
         </p>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalScrollable-<?= $data['code']; ?>">
            View Detail
         </button>

         <!-- MODALS -->
         <div class="modal fade" id="modalScrollable-<?= $data['code']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
               <div class="modal-content w-100">
                  <div class="modal-header shadow">
                     <h3 class="modal-title mb-5 ms-10" id="modalScrollableTitle">Books Detail</h3>
                     <button type="button" class="btn btn-close btn-lg btn-danger mb-3 me-3"
                        data-bs-dismiss="modal"></button>
                  </div>
                  <!-- CONTENT DETAIL -->
                  <div class="modal-body">
                     <div class="d-flex align-items-center mb-5">
                        <img class="shadow rounded me-5" style="width: 35%;"
                           src="../main/pages/book/image/<?= $data['cover']; ?>" alt="">
                        <div class="">
                           <h5>Title : <?= $data['title']; ?></h5>
                           <h5>Category : <?= $data['category_name']; ?></h5>
                           <h5>ISBN : <?= $data['isbn']; ?></h5>
                           <h5>Writer : <?= $data['writer']; ?></h5>
                           <h5>Publisher : <?= $data['publisher_name']; ?></h5>
                           <h5>Date : <?= $data['date']; ?></h5>
                           <h5>Language : <?= $data['language']; ?></h5>
                        </div>
                     </div>
                     <div>
                        <h5>Synopsis :</h5>
                        <h5><?= $data['synopsis']; ?></h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } ?>