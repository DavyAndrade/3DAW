function createUser() {
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let senha = document.getElementById("senha").value;

  let objForm = { username: username, email: email, senha: senha };
  console.log("Dados do Usuário: ", objForm);

  fetch(
    "http://localhost/3DAW-Davy/Atividades/Atividade%20AV1/src/php/cadastrarUsuario.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(objForm),
    }
  )
    .then((response) => response.json())
    .then((data) => {
      console.log("Resposta do Servidor: ", data);
      document.getElementById("msg").innerHTML = data.message; // Exibe a mensagem de retorno
    })
    .catch((error) => {
      console.error("Erro:", error);
      document.getElementById("msg").innerHTML = "Erro ao cadastrar usuário.";
    });
}
