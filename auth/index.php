<?php
    session_start();
    
	if (!isset($_SESSION['user'])) {
        echo 'waaaaaaaaaaaaaaaaaaa';
        header("Location: login.php");
        die();
    }
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if ($_POST["logout"] === "true") {
			session_destroy();
			header('Location: login.php');
		}
	}
	
	$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user) ?> </h1>
    <form method="post">
        <input type="hidden" name="logout" value="true"/>
        <input type="submit" value="logout">
    </form>
</body>
</html>