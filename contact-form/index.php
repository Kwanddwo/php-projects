<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Your name" required />
        <input type="email" name="email" placeholder="Your email" required />
        <textarea name="message" placeholder="Your message"></textarea>
        <input type="submit" value="Send Message" />
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $csv_file = fopen("inbox.csv", "a") or die("Unable to open file!");
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            
            $out = $name . ";" . $email . ";" . $message . "\n";
            fwrite($csv_file, $out);
            fclose($csv_file);
            echo "<p>Thank you, $name. Your message has been sent.</p>";
        }
    ?>
</body>
</html>