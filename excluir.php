<?php
include "conexao.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: painel.php");
    exit;
}

$id = intval($_GET['id']); // proteção básica

$conn->query("DELETE FROM advogados WHERE id=$id");

header("Location: painel.php");
exit;
?>