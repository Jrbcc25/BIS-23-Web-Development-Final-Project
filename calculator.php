<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    if ($operator == "add") {
        $result = $num1 + $num2;
    } elseif ($operator == "subtract") {
        $result = $num1 - $num2;
    } elseif ($operator == "multiply") {
        $result = $num1 * $num2;
    } elseif ($operator == "divide") {
        $result = $num2 != 0 ? $num1 / $num2 : "Cannot divide by zero";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<section class="hero">
    <h1>PHP Calculator</h1>

    <form method="POST" class="card">
        <input type="number" name="num1" placeholder="First number" required>
        <input type="number" name="num2" placeholder="Second number" required>

        <select name="operator">
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select>

        <button type="submit">Calculate</button>

        <?php if ($result !== ""): ?>
            <h2>Result: <?php echo $result; ?></h2>
        <?php endif; ?>
    </form>
</section>

</body>
</html>