<?php
include('../components/connection.php');
$sql = "SELECT * FROM book 
         LEFT JOIN category ON book.category_code = category.category_code
         LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code
         ORDER BY book.title ASC";
$query = mysqli_query($connect, $sql);
