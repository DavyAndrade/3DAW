function createUser() {
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let senha = document.getElementById("senha").value;

  let objForm = new FormData();
  objForm.append("username", username);
  objForm.append("email", email);
  objForm.append("senha", senha);

  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("msg").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("POST", "../php/cadastrarUsuario.php", true);
  xmlhttp.send(objForm);
}