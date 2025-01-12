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
         <a href="detail.php?code=<?php echo $data['code']; ?>" class="btn btn-primary">View Detail</a>
      </div>
   </div>
</div>
<?php } ?>