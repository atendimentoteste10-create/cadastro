<?php
session_start();
include "conexao.php";

if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
body {
    font-family: Arial;
    background: #f4f6f8;
    margin: 0;
}

/* topo */
.header {
    background: #1f3c88;
    color: white;
    padding: 15px;
    text-align: center;
}

/* container formulário */
.form-box {
    background: white;
    padding: 20px;
    border-radius: 10px;
    max-width: 600px;
    margin: 30px auto;
    box-shadow: 0 0 10px #ddd;
}

/* inputs */
input {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border-radius: 6px;
    border: 1px solid #ccc;
}

/* botão */
button {
    background: #2d6cdf;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    width: 100%;
    margin-top: 10px;
}
</style>

</head>

<body>

<div class="header">
    <h2>Cadastrar Advogado</h2>
</div>

<div class="form-box">

<form action="salvar.php" method="POST" enctype="multipart/form-data">

    <h3>👤 Dados Pessoais</h3>
    <input name="nome" placeholder="Nome completo">
    <input name="telefone" placeholder="Telefone">
    <input name="email" placeholder="E-mail">

    <h3>⚖️ OAB</h3>
    <input name="oab" placeholder="Número OAB">
    <input name="estado_oab" placeholder="Estado (SP, RJ...)">

    <h3>📱 Redes Sociais</h3>
    <input name="instagram" placeholder="Instagram">

    <h3>📷 Foto</h3>
    <input type="file" name="foto">

    <button type="submit">Salvar Advogado</button>

</form>

<br>

<a href="painel.php" style="display:block; text-align:center; margin-top:10px;">
Voltar ao painel
</a>

</div>

</body>
</html>