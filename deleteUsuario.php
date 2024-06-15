<?php
global $pdo;
require_once("link.php");
require_once("usuario.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $idUsuario = $_GET['id'];

    $usuario = new usuario($pdo);

    $excluido = $usuario->excluir($idUsuario);

    if($excluido) {
        header("Location: mostrarUsuários.php");
        exit;
    } else {
        echo "Erro ao excluir usuário.";
    }
} else {
    echo "ID do usuário não fornecido.";
}