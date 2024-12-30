<?php
include('../../components/connection.php');

// Fungsi untuk menampilkan buku dengan modal
function displayBooks($query)
{
    while ($data = mysqli_fetch_array($query)) {
        echo '
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <img class="card-img-top" src="../main/pages/book/image/' . $data['cover'] . '" alt="Card image cap" style="max-height: 250px; object-fit: cover;" />
                <div class="card-body">
                    <h5 class="card-title">' . $data['title'] . '</h5>
                    <p class="card-text" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' . $data['synopsis'] . '</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScrollable-' . $data['code'] . '">View Detail</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade pb-10" id="modalScrollable-' . $data['code'] . '" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content w-100">
                    <div class="modal-header shadow">
                        <h3 class="modal-title mb-5 ms-10">Books Detail</h3>
                        <button type="button" class="btn btn-close btn-lg btn-danger mb-3 me-3" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center mb-5">
                            <img class="shadow rounded me-5" style="width: 35%;" src="../main/pages/book/image/' . $data['cover'] . '" alt="">
                            <div>
                                <h5>Title : ' . $data['title'] . '</h5>
                                <h5>Category : ' . $data['category_name'] . '</h5>
                                <h5>ISBN : ' . $data['isbn'] . '</h5>
                                <h5>Writer : ' . $data['writer'] . '</h5>
                                <h5>Publisher : ' . $data['publisher_name'] . '</h5>
                                <h5>Date : ' . $data['date'] . '</h5>
                                <h5>Language : ' . $data['language'] . '</h5>
                            </div>
                        </div>
                        <div>
                            <h5>Synopsis :</h5>
                            <h5>' . $data['synopsis'] . '</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}

// Jika parameter 'q' dikirim, lakukan pencarian dinamis
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $title = $_GET['q'];
    $sql = "SELECT * FROM book 
         LEFT JOIN category ON book.category_code = category.category_code
         LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code WHERE title LIKE '%$title%'";
    $query = mysqli_query($connect, $sql);

    if (mysqli_num_rows($query) > 0) {
        displayBooks($query);
    } else {
        echo '<h1 class="text-center bg-warning py-5">Book not found!</h1>';
    }
} else {
    // Jika parameter 'q' kosong, tampilkan semua buku
    $sql = "SELECT * FROM book 
         LEFT JOIN category ON book.category_code = category.category_code
         LEFT JOIN publisher ON book.publisher_code = publisher.publisher_code";
    $query = mysqli_query($connect, $sql);
    displayBooks($query);
}

mysqli_close($connect);
