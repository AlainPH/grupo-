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
//ola
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
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
        
        body {
            font-family: 'Roboto', sans-serif;
            background: radial-gradient(circle, #1b2838, #0f1722);
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.8);
            display: inline-block;
            width: 40%;
        }
        h1 {
            color: #66c0f4;
            font-weight: 700;
        }
        p {
            font-size: 20px;
        }
        input[type='number'] {
            padding: 12px;
            margin: 10px;
            border-radius: 5px;
            border: none;
            font-size: 18px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-align: center;
            outline: none;
        }
        input[type='number']::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        button {
            padding: 12px 25px;
            background: #1b2838;
            color: #66c0f4;
            border: 2px solid #66c0f4;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
        }
        button:hover {
            background: #66c0f4;
            color: #1b2838;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
            font-size: 22px;
            color: #66c0f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Juego de Matemáticas</h1>
        <p>¿Cuánto es <?php echo $number1; ?> + <?php echo $number2; ?>?</p>
        <form method="post">
            <input type="number" name="answer" placeholder="Tu respuesta" required autofocus>
            <button type="submit">Responder</button>
        </form>
        
        <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>
        <p>Puntuación actual: <strong><?php echo $_SESSION['score']; ?></strong></p>
    </div>
</body>
</html>