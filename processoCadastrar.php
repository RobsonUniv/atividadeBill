<?php
require_once("conecta.php");
require_once("Usuarios.php");

class processoCadastrar {
    public static function processoCadastrar() {
        global $pdo;

        $usuario = new usuario($pdo);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $id_novo_usuario = $usuario->inserir($nome, $email, $senha);

            if ($id_novo_usuario) {
                header("Location: mostrarUsuários.php");
                exit;
            } else {
                echo "Erro ao cadastrar usuário. Por favor, tente novamente.";
            }
        }
    }
}

processoCadastrar::processoCadastrar();