<?php
$search = strtolower($_GET["search"]);
$xml = simplexml_load_file("books.xml");

$found = false;

foreach ($xml->book as $book) {
    $title = strtolower($book->title);
    $author = strtolower($book->author);

    if ($search == "" || strpos($title, $search) !== false || strpos($author, $search) !== false) {
        echo "<h3>" . $book->title . "</h3>";
        echo "<p><strong>Author:</strong> " . $book->author . "</p>";
        echo "<p><strong>Category:</strong> " . $book->category . "</p><hr>";
        $found = true;
    }
}

if (!$found) {
    echo "<p>No books found. Try JavaScript, HTML, CSS, or PHP.</p>";
}
?>