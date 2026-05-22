<?php
include "conexao.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: painel.php");
    exit;
}

$id = intval($_GET['id']);

$result = $conn->query("SELECT * FROM advogados WHERE id=$id");

if ($result->num_rows == 0) {
    echo "Advogado não encontrado";
    exit;
}

$adv = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
body {
    font-family: Arial;
    background: #f4f6f8;
}

.form-box {
    background: white;
    padding: 20px;
    max-width: 500px;
    margin: 50px auto;
    border-radius: 10px;
    box-shadow: 0 0 10px #ddd;
}

input {
    width: 100%;
    padding: 10px;
    margin: 6px 0;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button {
    background: #2d6cdf;
    color: white;
    padding: 10px;
    width: 100%;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

a {
    display: block;
    margin-top: 10px;
    text-align: center;
}
</style>

</head>

<body>

<div class="form-box">

<h2>Editar Advogado</h2>

<form action="atualizar.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $adv['id']; ?>">

    <label>Nome</label>
    <input name="nome" value="<?php echo $adv['nome']; ?>">

    <label>OAB</label>
    <input name="oab" value="<?php echo $adv['oab']; ?>">

    <label>Telefone</label>
    <input name="telefone" value="<?php echo $adv['telefone']; ?>">

    <label>Instagram</label>
    <input name="instagram" value="<?php echo $adv['instagram']; ?>">

    <button type="submit">Atualizar</button>

</form>

<a href="painel.php">Voltar</a>

</div>

</body>
</html>