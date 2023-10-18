<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar o ID do usuário da sessão
    $user_id = $_SESSION['user_id']; // ID do usuário autenticado

    // Deleta o registro com base no ID
    $sql = "DELETE FROM clientes WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro apagado com sucesso.";
    } else {
        echo "Erro na exclusão do registro: " . $conn->error;
    }
}

$conn->close();
?>
