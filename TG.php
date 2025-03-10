<?php
session_start();

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answer = $_POST['answer'] ?? '';
    $correct_answer = $_SESSION['correct_answer'] ?? '';

    if ($user_answer == $correct_answer) {
        $_SESSION['score']++;
        $message = "¡Correcto! Tu puntuación es: " . $_SESSION['score'];
    } else {
        $message = "Incorrecto. La respuesta era $correct_answer. Tu puntuación sigue en: " . $_SESSION['score'];
    }
}

$number1 = rand(1, 10);
$number2 = rand(1, 10);
$correct_answer = $number1 + $number2;
$_SESSION['correct_answer'] = $correct_answer;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Juego de Sumas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 18px;
        }
        input[type='number'] {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #218838;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Juego de Matemáticas</h1>
        <p>¿Cuánto es <?php echo $number1; ?> + <?php echo $number2; ?>?</p>
        <form method="post">
            <input type="number" name="answer" required>
            <button type="submit">Responder</button>
        </form>
        
        <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>
        <p>Puntuación actual: <strong><?php echo $_SESSION['score']; ?></strong></p>
    </div>
</body>
</html>
