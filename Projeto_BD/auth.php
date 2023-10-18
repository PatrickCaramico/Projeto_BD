<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "usuarios"; // Nome do banco de dados

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar a autenticação do usuário e obter o nome
    $sql = "SELECT id, nome FROM clientes WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $nick);
            $stmt->fetch();

            // Iniciar a sessão e armazenar o ID do usuário
            session_start();
            $_SESSION['user_id'] = $user_id; // ID do usuário autenticado

            echo "Login bem-sucedido, " . $nick;
        } else {
            echo "Credenciais inválidas";
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da declaração SQL: " . $conn->error;
    }

    $conn->close();
}
?>
