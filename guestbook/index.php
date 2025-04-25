<?php
define('MSG_FILE', __DIR__ . '/db.txt');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['visitor']) && !empty($_POST['message'])) {
    $visitor = strip_tags(trim($_POST['visitor']));
    $message = strip_tags(trim($_POST['message']));
    $date = date('Y-m-d H:i:s');
    $entry = "$visitor: $message | date: $date" . PHP_EOL;
    file_put_contents(MSG_FILE, $entry, FILE_APPEND | LOCK_EX);
    header('Location: index.php');
    exit;
}
$messages = [];
if (file_exists(MSG_FILE)) {
    $lines = file(MSG_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        [$dt, $txt] = explode(' | ', $line, 2) + [null, null];
        if ($txt !== null) {
            $messages[] = ['date' => $dt, 'text' => $txt];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Guestbook</title>
    </head>
    <body>
        <h1>Guestbook</h1>
        <form method="post">
            <label>Nom: <input type="text" name="visitor" required></label><br>
            <label>Message:<br><textarea name="message" rows="4" cols="50" required></textarea></label><br>
            <button type="submit">Envoyer</button>
        </form>
        <h2>Messages</h2>
        <?php if (empty($messages)): ?>
            <p>Aucun message pour le moment.</p>
        <?php else: ?>
        <ul>
            <?php foreach ($messages as $m): ?>
                <li><strong><?= htmlspecialchars($m['date']) ?></strong> – <?= nl2br(htmlspecialchars($m['text'])) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    </body>
</html>
