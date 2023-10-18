<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Informações da Conta</title>
</head>
<body>
<?php
// Conecte-se ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

session_start();

// Recupere os dados do usuário
$user_id = $_SESSION['user_id']; // Suponhamos que o ID do usuário seja 1
$sql = "SELECT * FROM clientes WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <h1>Informações da Conta</h1>
    <form id="editarForm" action="conta_info.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>



        
    </form>
    <div id="mensagem"></div>
    <script>
        function carregarDados() {
            // Faça uma solicitação AJAX para buscar as informações do usuário
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "buscar_dados.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    document.getElementById("nome").value = data.nome;
                    document.getElementById("email").value = data.email;
                }
            };
            xhr.send();
        }
    </script>
    <?php
} else {
    echo "Nenhum dado encontrado.";
}

$conn->close();
?>
</body>
</html>
