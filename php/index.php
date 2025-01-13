<?php 
    include('conection.php');

    if(isset($_POST['email'])){
        $sqlCodeGetUser = "SELECT * from users WHERE email='" . $_POST['email'] . "'";
        $getUser = $mysqli->query($sqlCodeGetUser) or die("Erro na conexão");
        if($getUser->num_rows == 1){
            $user = $getUser->fetch_assoc();
            if(password_verify($_POST['password'], $user['password'])){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['date'] = $user['date'];

                header("Location: display.php");
            }

            else {
                echo "<script>alert(\"Usuário ou senha inválidos\");</script>";
            }
        }
        else {
            echo "<script>alert(\"Este email não está cadastrado\");</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <section>
        <h1>
            Bem Vindo de Volta
        </h1>
        <br>
        <br>
        <img src="../assets/undraw_digital-artwork_xlmm.svg" alt="">
    </section>
    <form action="" method="post">
        <h1>Entrar</h1>
        <div class="effect"></div>
        <br>
        <div class="containerEmail">
            <label for="emailInput">Email</label>
            <br>
            <input type="email" name="email" id="emailInput" placeholder="Digite seu nome" required>
        </div>
        <br>
        <div class="containerPassword">
            <label for="passwordInput">Senha</label>
            <br>
            <input type="password" name="password" id="passwordInput" placeholder="Digite sua senha" required>
        </div>
        <button style="font-weight: 600;" type="submit">Entrar</button>
        <a style="color: white;" href="singup.php">Sua Primeira Vez?</a>
    </form>
</body>
</html>