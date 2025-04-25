<?php
// Questions et réponses
$questions = [
    [
        'question' => "Quelle est la capitale de la France ?",
        'choices' => ['Paris', 'Lyon', 'Marseille'],
        'answer' => 'Paris'
    ],
    [
        'question' => "Combien y a-t-il de continents ?",
        'choices' => ['5', '6', '7'],
        'answer' => '7'
    ],
    [
        'question' => "Quel langage est utilisé pour créer des pages web dynamiques ?",
        'choices' => ['HTML', 'PHP', 'CSS'],
        'answer' => 'PHP'
    ]
];

$score = 0;
$isSubmitted = $_SERVER['REQUEST_METHOD'] === 'POST';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz PHP</title>
</head>
<body>
    <h1>Petit Quiz</h1>

    <?php if ($isSubmitted): ?>
        <h2>Résultats :</h2>
        <ul>
            <?php foreach ($questions as $index => $q): ?>
                <li>
                    <strong><?= $q['question'] ?></strong><br>
                    Votre réponse : 
                    <?php
                        $userAnswer = $_POST['q' . $index] ?? 'Aucune réponse';
                        echo htmlspecialchars($userAnswer);
                        if ($userAnswer === $q['answer']) {
                            echo " - Correcte!";
                            $score++;
                        } else {
                            echo " - Fausse!";
                        }
                    ?>
                </li>
                <br>
            <?php endforeach; ?>
        </ul>
        <h3>Score : <?= $score ?>/<?= count($questions) ?></h3>
        <a href="index.php">Recommencer</a>

    <?php else: ?>
        <form method="POST">
            <?php foreach ($questions as $index => $q): ?>
                <fieldset>
                    <legend><strong><?= $q['question'] ?></strong></legend>
                    <?php foreach ($q['choices'] as $choice): ?>
                        <label>
                            <input type="radio" name="q<?= $index ?>" value="<?= $choice ?>" required>
                            <?= $choice ?>
                        </label><br>
                    <?php endforeach; ?>
                </fieldset>
                <br>
            <?php endforeach; ?>
            <button type="submit">Valider</button>
        </form>
    <?php endif; ?>
</body>
</html>
