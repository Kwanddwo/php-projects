<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Generator</title>
        <style>
            html {
                font-family: "Space Mono", monospace;
                background-color: #282c34;
                color:rgb(112, 251, 97);
            }
        </style>
    </head>
    <body>
        <form method="get">
            <input type="number" name="length" min="8" placeholder="Password Length" required>
            <input type="submit" value="Generate Password">
        </form>
        <?php
            const ASCII_MIN = 33;
            const ASCII_MAX = 126;
            if (isset($_GET['length'])) {
                $length = intval($_GET['length']);
                if ($length < 8) {
                    echo "<p>Password length must be at least 8 characters.</p>";
                } else {
                    $password = '';
                    for ($i = 0; $i < $length; $i++) {
                        $password .= chr(rand(33, 126));
                    }
                    echo "<p>Generated Password: <strong>$password</strong></p>";
                }
            }
        ?>
    </body>
</html>