<?php
    include 'conexao.php';
    session_start();

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM cliente WHERE email='$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(password_verify($senha, $row['senha'])){
                header("Location: clientes.html");
                exit();
            } else {
                $erro = "Senha incorreta!";
            }
        } else {
            $erro = "Email não cadastrado!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LM's</title>
</head>
<body>
    <header></header>
    <div class="container">

        <h1 class="loja">LM's</h1>
        <h2 class="cadastro">Login</h2>

        <?php if(isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

        <form method="POST" action="login.php">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <button type="submit" name="login">Login</button>
        </form>

        <a href="cadastro.php"><p>Não tenho uma conta</p></a>
    </div>
    <footer></footer>
</body>
</html>
