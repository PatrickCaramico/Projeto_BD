<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <h1>Tela inicial</h1>
    </header>
    <nav>
        <div class="menu">
            <a href="tecnologias.html" target="centro">Tecnologias</a>
            <a href="informacoes.php" target="centro">Informações da Conta</a>
            <a href="editar.php" target="centro">Editar Dados Pessoais</a>
            <a href="excluir.php" target="centro">Excluir Conta</a>
            <button id="sairButton" class="botao2">Sair da conta</button>
        </div>
    </nav>
    <main>
        <iframe name="centro" src="ajuda.html"></iframe>
    </main>
</body>
<footer>
    © 2023 Projeto Aplicações Web. Todos os direitos reservados. Tema por Grupo 03.
</footer>
<script>
    document.getElementById("sairButton").addEventListener("click", function() {
        window.location.href = "index.html";
    });
</script>
</html>
