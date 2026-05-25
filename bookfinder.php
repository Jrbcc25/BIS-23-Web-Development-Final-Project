<!DOCTYPE html>
<html>
<head>
    <title>Book Finder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<section class="hero">
    <h1>Book Finder</h1>

    <div class="card">
        <input type="text" id="search" placeholder="Search by title or author">
        <button onclick="findBook()">Search</button>
        <div id="results"></div>
    </div>
</section>

<script>
function findBook() {
    let search = document.getElementById("search").value;

    fetch("getbooks.php?search=" + search)
        .then(response => response.text())
        .then(data => {
            document.getElementById("results").innerHTML = data;
        });
}
</script>

</body>
</html>