<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Listar Dados</title>
</head>
<body>
    <h1>Lista de Dados</h1>

    <?php
    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "usuarios";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    // Consulta SQL para obter todos os dados do banco de dados
    $sql = "SELECT id, nome, email FROM clientes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os dados em uma tabela
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ação</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            // Adicionar um botão ou link para excluir com o ID como parâmetro
            echo "<td><a href='excluir.php?id_excluir=" . $row["id"] . "'>Excluir</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum dado encontrado.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>

</body>
</html>
