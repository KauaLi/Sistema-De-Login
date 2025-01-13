<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['name'])){
        die("Você nao esta logado");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painél</title>
    <link rel="stylesheet" href="../css/display.css">
</head>
<body>
    <video src="../assets/videoBackground.mp4" autoplay muted loop></video>
    <main>
        <h1>
            Bem Vindo
            <br>
            <?php echo $_SESSION['name']?>
            <br>
        </h1>
        <a style="color: white; text-align: center;" href="index.php">Sair</a>
    </main>
</body>
</html>