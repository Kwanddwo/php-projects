<?php
	session_start();
	
	if (isset($_SESSION['user'])) {
		header('Location: index.php');
		exit;
	}
	
	$error = '';
    
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$user = $_POST["user"] ?? '';
		$password = $_POST["password"] ?? '';
        if ($user === "user" && $password === "password") {
            $_SESSION["user"] = $user;
            header("Location: index.php");
            die();
		} else {
		$error = "username or password incorrect";
	}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
	<h1>Login</h1>
    <form method="post">
        <input type="text" name="user">
        <input type="password" name="password">
        <input type="submit" value="login">
    </form>
	<?php if ($error): ?>
		<p style="color:red;"> <?= htmlspecialchars($error) ?> </p>
	<?php endif; ?>
    <?
        if (isset($_POST['user'])) {
            echo $_POST['user'];
            echo $_POST['password'];
        }
    ?>
</body>
</html>