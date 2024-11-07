function cadastrarAluno() {
  let nome = document.getElementById("nome").value;
  let cpf = document.getElementById("cpf").value;
  let dataNascimento = document.getElementById("dataNascimento").value;
  let matricula = document.getElementById("matricula").value;

  let formData = new FormData();
  formData.append("nome", nome);
  formData.append("cpf", cpf);
  formData.append("dataNascimento", dataNascimento);
  formData.append("matricula", matricula);

  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("msg").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("POST", "../php/cadastrarAluno.php", true);
  xmlhttp.send(formData);
}

function listarAlunos() {
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let alunos = JSON.parse(this.responseText);
      let theadContent = `
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Matrícula</th>
        </tr>
      `;

      let tbodyContent = "";

      if (alunos.length > 0) {
        alunos.forEach((aluno) => {
          tbodyContent += `
            <tr>
              <td>${aluno.id}</td>
              <td>${aluno.nome}</td>
              <td>${aluno.cpf}</td>
              <td>${aluno.dataNascimento}</td>
              <td>${aluno.matricula}</td>
            </tr>
          `;
        });
      } else {
        tbodyContent = `
          <tr>
            <td colspan="5">Nenhum aluno encontrado.</td>
          </tr>
        `;
      }

      document.getElementById("alunos-lista").innerHTML = `
        <table>
          <thead>${theadContent}</thead>
          <tbody>${tbodyContent}</tbody>
        </table>
      `;
    }
  };

  xmlhttp.open("GET", "../php/listarAlunos.php", true);
  xmlhttp.send();
}

window.onload = listarAlunos();

function atualizarAluno() {
  let idAluno = document.getElementById("idAluno").value;
  let nome = document.getElementById("nome").value;
  let cpf = document.getElementById("cpf").value;
  let dataNascimento = document.getElementById("dataNascimento").value;
  let matricula = document.getElementById("matricula").value;

  let formData = new FormData();
  formData.append("idAluno", idAluno);
  formData.append("nome", nome);
  formData.append("cpf", cpf);
  formData.append("dataNascimento", dataNascimento);
  formData.append("matricula", matricula);

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("msg").innerHTML = xhr.responseText;
    }
  };

  xhr.open("POST", "../php/atualizarAluno.php", true);
  xhr.send(formData);
}

