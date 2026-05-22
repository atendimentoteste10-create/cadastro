<?php
session_start();

// limpa todas as variáveis da sessão
$_SESSION = [];

// destrói a sessão
session_destroy();

// força redirecionamento limpo
header("Location: index.php");
exit;
?>