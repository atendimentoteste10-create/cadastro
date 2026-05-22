<?php
include "conexao.php";

if (!isset($_POST['id']) || empty($_POST['id'])) {
    header("Location: painel.php");
    exit;
}

$id = intval($_POST['id']);

$nome = $_POST['nome'];
$oab = $_POST['oab'];
$telefone = $_POST['telefone'];
$instagram = $_POST['instagram'];
$email = $_POST['email'] ?? '';
$estado_oab = $_POST['estado_oab'] ?? '';

$sql = "UPDATE advogados SET 
nome='$nome',
oab='$oab',
telefone='$telefone',
instagram='$instagram',
email='$email',
estado_oab='$estado_oab'
WHERE id=$id";

$conn->query($sql);

header("Location: painel.php");
exit;
?>