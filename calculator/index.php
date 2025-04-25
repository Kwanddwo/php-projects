<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculator</h1>
    <form method="get">
        <input type="number" name="first" placeholder="a">
        <select name="operator">
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="mul">x</option>
            <option value="div">/</option>
        </select>
        <input type="number" name="second" placeholder="b">
        <input type="submit" value="Calculate">
    </form>
    <?php 
    if (isset($_GET["first"]) && isset($_GET["second"]) && isset($_GET["operator"])) {
        $a = $_GET["first"];
        $b = $_GET["second"];
        $op = $_GET["operator"];
        if ($op == "add") {
            $result = $a + $b;
        } elseif ($op == "sub") {
            $result = $a - $b;
        } elseif ($op == "mul") {
            $result = $a * $b;
        } elseif ($op == "div") {
            if ($b != 0) {
                $result = $a / $b;
            } else {
                echo "<p>Cannot divide by zero</p>";
            }
        } else {
            echo "<p>Invalid operator</p>";
        }
        if (isset($result)) {
            echo "<p>Result: $a $op $b = $result<p>";
        }
    } else {
        echo "<p>Please enter numbers and select an operator.</p>";
    }
    ?>
</body>
</html>