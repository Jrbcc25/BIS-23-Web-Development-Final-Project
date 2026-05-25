<?php
$host = "sql311.infinityfree.com";
$user = "if0_42011214";
$pass = "Jamaal2k00";
$dbname = "if0_42011214_guestbook";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    $sql = "INSERT INTO messages (name, message)
            VALUES ('$name', '$message')";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<section class="hero">
    <h1>Guestbook</h1>

    <div class="card">

        <form method="POST">

            <input type="text"
                   name="name"
                   placeholder="Enter your name"
                   required>

            <br><br>

            <textarea name="message"
                      placeholder="Leave a message"
                      rows="5"
                      cols="40"
                      required></textarea>

            <br><br>

            <button type="submit">Submit</button>

        </form>

        <div class="message-box">

            <h3>Messages</h3>

            <?php
            $result = $conn->query("SELECT * FROM messages ORDER BY id DESC");

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    echo "<p><strong>" .
                         $row['name'] .
                         ":</strong> " .
                         $row['message'] .
                         "</p>";
                }

            } else {

                echo "<p>No messages yet.</p>";
            }

            $conn->close();
            ?>

        </div>

    </div>
</section>

</body>
</html>