<?php
include "conexao.php";

$nome = $_POST['nome'];
$oab = $_POST['oab'];
$telefone = $_POST['telefone'];
$instagram = $_POST['instagram'];

/* VERIFICA OAB DUPLICADA */
$verifica = $conn->query("SELECT * FROM advogados WHERE oab='$oab'");

if ($verifica->num_rows > 0) {
    echo "Essa OAB já está cadastrada!";
    exit;
}

/* UPLOAD DA FOTO */
$foto = $_FILES['foto']['name'];
$destino = "uploads/" . $foto;

move_uploaded_file($_FILES['foto']['tmp_name'], $destino);

/* INSERIR NO BANCO */
$sql = "INSERT INTO advogados (nome, oab, telefone, instagram, foto)
VALUES ('$nome', '$oab', '$telefone', '$instagram', '$foto')";

$conn->query($sql);

/* VOLTA PARA PAINEL */
header("Location: painel.php");
exit;
?>