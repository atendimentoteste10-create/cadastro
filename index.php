<?php
session_start();
include "conexao.php";

$erro = "";

if (isset($_POST['login'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM users WHERE usuario='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        // LOGIN SIMPLES (por enquanto)
        if ($senha == $row['senha']) {

            $_SESSION['logado'] = true;
            header("Location: painel.php");
            exit;

        } else {
            $erro = "Senha incorreta";
        }

    } else {
        $erro = "Usuário não encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
body {
    font-family: Arial;
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;

    /* fundo moderno */
    background: linear-gradient(135deg, #0f172a, #1e293b, #334155);
}

/* caixa login */
.box {
    background: rgba(255, 255, 255, 0.95);
    padding: 35px;
    border-radius: 14px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    width: 320px;
    text-align: center;
    backdrop-filter: blur(8px);
}

/* título */
.box h2 {
    margin-bottom: 20px;
    color: #1e293b;
}

/* inputs */
input {
    width: 100%;
    padding: 12px;
    margin: 6px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    outline: none;
    transition: 0.3s;
}

input:focus {
    border-color: #6366f1;
    box-shadow: 0 0 5px rgba(99,102,241,0.5);
}

/* botão */
button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(90deg, #6366f1, #8b5cf6);
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.03);
    box-shadow: 0 10px 20px rgba(99,102,241,0.4);
}

/* erro */
.error {
    color: #ef4444;
    margin-bottom: 10px;
}
</style>

</head>

<body>

<div class="box">

    <h2>Login</h2>

    <?php if ($erro != "") { ?>
        <div class="error"><?php echo $erro; ?></div>
    <?php } ?>

    <form method="POST">
        <input name="usuario" placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha">
        <button name="login">Entrar</button>
    </form>

</div>

</body>
</html>