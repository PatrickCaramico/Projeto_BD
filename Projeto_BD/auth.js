// auth.js
document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const email = document.getElementById("ema").value;
        const senha = document.getElementById("sen").value;

        // Enviar solicitação para verificar a autenticação
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "auth.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = xhr.responseText;
                const parts = response.split(",");
                if (parts[0] === "Login bem-sucedido") {
                    const nick = parts[1].trim();
                    window.alert("Login bem-sucedido, Seja Bem Vindo " + nick);
                    window.location.href = "inicio.php";
                } else {
                    alert("Credenciais inválidas. Por favor, tente novamente.");
                }
            } else {
                alert("Erro na solicitação.");
            }
        };

        const data = `email=${email}&senha=${senha}`;
        xhr.send(data);
    });
});
