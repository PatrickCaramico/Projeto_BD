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
    $name = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["telefone"];
    $date = $_POST["date"];
    $email = $_POST["email"];
    $pass = ($_POST['senha']);
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $com = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    // Query SQL com declaração preparada
    $sql = "INSERT INTO clientes (nome, cpf, telefone, data_nascimento, email, senha, cep, rua, numero, complemento, bairro, cidade, estado) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssssssssss", $name, $cpf, $tel, $date, $email, $pass, $cep, $rua, $numero, $com, $bairro, $cidade, $estado);

        if ($stmt->execute()) {
            // Cadastro bem-sucedido, redireciona com uma mensagem de confirmação
            echo "Cadastro criado com sucesso";

            echo '<br><a href="index.html">Voltar para a página de login</a>';
        } else {
            throw new Exception("Erro ao executar a consulta: " . $stmt->error);
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da declaração SQL: " . $conn->error;
    }

    

    $conn->close();
}
?>
