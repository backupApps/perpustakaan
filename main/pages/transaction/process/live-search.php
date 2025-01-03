<!-- live search using ajax -->
<script>
function showName(str) {
   if (str.length == 0) {
      document.getElementById('memberName').value = "";
      return;
   } else {
      let xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById('memberName').value = this.responseText;
         }
      }
      xmlhttp.open("GET", "pages/transaction/process/search.php?q=" + str, true);
      xmlhttp.send();
   }
}

function showBook(str, bookNumber) {
   let titleField = 'bookTitle' + bookNumber; // ID of the title field
   if (str.length == 0) {
      document.getElementById(titleField).value = "";
      return;
   } else {
      let xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById(titleField).value = this.responseText;
         }
      }
      xmlhttp.open("GET", "pages/transaction/process/search.php?b=" + str, true);
      xmlhttp.send();
   }
}
</script>