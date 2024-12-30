<!-- live search using ajax -->
<script>
   function searchBook(str) {
      let carouselContainer = document.getElementById('carousel-container');
      let booksContainer = document.querySelector('.row.mb-12.g-6');

      let xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            booksContainer.innerHTML = this.responseText;

            // Sembunyikan carousel jika ada pencarian
            if (str.length > 0) {
               carouselContainer.style.display = "none";
            } else {
               carouselContainer.style.display = "block";
            }
         }
      };

      if (str.length == 0) {
         xmlhttp.open("GET", "functions/search.php?q=", true);
      } else {
         xmlhttp.open("GET", "functions/search.php?q=" + str, true);
      }
      xmlhttp.send();
   }
</script>