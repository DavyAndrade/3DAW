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

function createAsk() {
  let pergunta = document.getElementById("pergunta").value;
  let a = document.getElementById("a").value;
  let b = document.getElementById("b").value;
  let c = document.getElementById("c").value;
  let d = document.getElementById("d").value;
  let gabarito = document.getElementById("gabarito").value;

  let objForm = new FormData();
  objForm.append("pergunta", pergunta);
  objForm.append("a", a);
  objForm.append("b", b);
  objForm.append("c", c);
  objForm.append("d", d);
  objForm.append("gabarito", gabarito);

  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("msg").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("POST", "../php/criarQuestionario.php", true);
  xmlhttp.send(objForm);
}
