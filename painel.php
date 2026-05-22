<?php
session_start();
include "conexao.php";

if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit;
}

// total
$total = $conn->query("SELECT COUNT(*) as total FROM advogados")->fetch_assoc();

// busca
$busca = $_GET['busca'] ?? '';

if ($busca != '') {
    $result = $conn->query("SELECT * FROM advogados 
    WHERE nome LIKE '%$busca%' OR oab LIKE '%$busca%' 
    ORDER BY id DESC");
} else {
    $result = $conn->query("SELECT * FROM advogados ORDER BY id DESC");
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

/* botões */
button, .btn {
    background: #2d6cdf;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    margin: 5px;
}

/* container */
.container {
    width: 90%;
    max-width: 1000px;
    margin: auto;
}

/* card */
.card {
    background: white;
    display: flex;
    align-items: center;
    padding: 15px;
    margin: 10px 0;
    border-radius: 10px;
    box-shadow: 0 0 8px #ddd;
}

/* foto */
.card img {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 10px;
    margin-right: 20px;
}

/* info */
.info {
    flex: 1;
}

/* inputs */
input {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.header {
    background: #1f3c88;
    color: white;
    padding: 15px;
    text-align: center;
    position: relative;
}

/* botão sair */
.logout-btn {
    position: absolute;
    right: 20px;
    top: 15px;

    background: #ef4444;
    color: white;
    padding: 8px 14px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.logout-btn:hover {
    background: #dc2626;
    transform: scale(1.05);
}
</style>

</head>

<body>

<div class="header">

    <h2>Painel de Advogados</h2>

    <a href="logout.php" class="logout-btn">
        Sair
    </a>

</div>

<div class="container">

<h3>Total de Advogados: <?php echo $total['total']; ?></h3>

<form method="GET">
    <input name="busca" placeholder="Buscar por nome ou OAB">
    <button>Buscar</button>
</form>

<a href="cadastrar.php">
<button>Cadastrar Advogado</button>
</a>

<hr>

<h2>Lista de Advogados</h2>

<?php while ($row = $result->fetch_assoc()) { ?>

<div class="card">

    <img src="uploads/<?php echo $row['foto']; ?>">

    <div class="info">
        <b><?php echo $row['nome']; ?></b><br>
        OAB: <?php echo $row['oab']; ?><br>
        Telefone: <?php echo $row['telefone']; ?><br>
        Instagram: <?php echo $row['instagram']; ?><br>
    </div>

    <div>
        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a><br>
        <a href="excluir.php?id=<?php echo $row['id']; ?>" style="color:red">Excluir</a>
    </div>

</div>

<?php } ?>

</div>

</body>
</html>