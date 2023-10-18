<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Iniciar a sessão para acessar as variáveis de sessão
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar o ID do usuário da sessão
    $user_id = $_SESSION['user_id']; // ID do usuário autenticado

    // Recupere os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Atualize os dados no banco de dados
    $sql = "UPDATE clientes SET nome = '$nome', email = '$email' WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro na atualização dos dados: " . $conn->error;
    }
}

$conn->close();
?>
