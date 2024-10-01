function createUser() {
  let objForm = document.getElementById("formUser");
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let senha = document.getElementById("senha").value;
  console.log("Nome: " + username + "Email: " + email + "Senha: " + senha);

  let objForm2 = { username: username, email: email, senha: senha };
  let objJson = JSON.stringify(objForm);
  console.log("objForm2: " + objForm2);
  console.log("JSON: " + objJson);

  let xmlhttp = new XMLHttpRequest();
  console.log("1");
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Chegou a resposta OK: " + this.responseText);
      console.log("2");
      document.getElementById("msg").innerHTML = this.responseText;
    } else if (this.readyState < 4) {
      console.log("3: " + this.readyState);
    } else console.log("Requisicao falhou: " + this.status);
  };
  console.log("4");
  xmlhttp.open(
    "GET",
    "../php/cadastrarUsuario.php?username=" +
      username +
      "&email=" +
      email +
      "&senha=" +
      senha
  );
  xmlhttp.send();
  console.log("Usuário Criado");
  console.log("5");
}
function ValidaForm(psenha, pnome, pemail) {
  let msg = "";
  if (psenha == "") msg = "Senha não preenchida. <br>";

  return msg;
}
