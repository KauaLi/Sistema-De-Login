<?php 
    include("conection.php");

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $password = password_hash($password = $_POST['password'], PASSWORD_DEFAULT);

        $sqlCode = "INSERT INTO users (name, email, password, date) VALUES ('$name', '$email', '$password', '$date');";
        $mysqli->query($sqlCode) or die("Falha ao adicionar usúario");

        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['name'] = $name;
        $_SESSION['date'] = $date;

        header("Location: display.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/singup.css">
</head>
<body>
    <form action="" method="post">
        <h1>Cadastre-se</h1>
        <div class="containerName">
            <label for="inputName">Name</label>
            <br>
            <input required type="text" name="name" id="inputName">
        </div>
        <div class="containerDate">
            <label for="inputName">Data</label>
            <br>
            <input required type="date" name="date" id="inputDate">
        </div>
        <div class="containerEmail">
            <label for="inputEmail">Email</label>
            <br>
            <input required type="text" name="email" id="inputEmail">
        </div>
        <div class="containerPassword">
            <label for="inputPassword">Senha</label>
            <br>
            <section class="inputPassword">
                <input required type="password" name="password" id="inputPassword">
                <section class="eye">
                    <img src="../assets/icons8-eye-24.png" alt="">
                    <div class="xEye"></div>
                </section>
            </section>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
    <script>
        document.querySelector(".eye").addEventListener("click", () => {
            if(document.querySelector("#inputPassword").type == "password"){
                document.querySelector("#inputPassword").type = "text";
                document.querySelector(".xEye").style.display = "none";
                return;
            }
            document.querySelector("#inputPassword").type = "password";
            document.querySelector(".xEye").style.display = "block";
        })
    </script>
</body>
</html>