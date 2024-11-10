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
          <th>Nome</th>
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Matrícula</th>
          <th>Ações</th>
        </tr>
      `;

      let tbodyContent = "";

      if (alunos.length > 0) {
        alunos.forEach((aluno) => {
          tbodyContent += `
            <tr>
              <td>${aluno.nome}</td>
              <td>${aluno.cpf}</td>
              <td>${aluno.dataNascimento}</td>
              <td>${aluno.matricula}</td>
              <td>
                <a href="atualizarAluno.html?id=${aluno.id}"><button>Atualizar</button></a>
                <button onclick="excluirAluno(${aluno.id})">Excluir</button>
              </td>
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

function buscarAluno() {
  const pesquisa = document.getElementById("campoBusca").value;

  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let alunos = JSON.parse(this.responseText);
      let theadContent = `
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Matrícula</th>
          <th>Ações</th>
        </tr>
      `;

      let tbodyContent = "";

      if (alunos.length > 0) {
        alunos.forEach((aluno) => {
          tbodyContent += `
            <tr>
              <td>${aluno.nome}</td>
              <td>${aluno.cpf}</td>
              <td>${aluno.dataNascimento}</td>
              <td>${aluno.matricula}</td>
              <td>
                <button onclick="atualizarAluno(${aluno.id})">Atualizar</button>
                <button onclick="excluirAluno(${aluno.id})">Excluir</button>
              </td>
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

  xmlhttp.open("GET", `../php/buscarAluno.php?pesquisa=${pesquisa}`, true);
  xmlhttp.send();
}

window.onload = listarAlunos();

function atualizarAluno(id) {
  const nome = prompt("Digite o novo nome do aluno:");
  const cpf = prompt("Digite o novo CPF do aluno:");
  const dataNascimento = prompt(
    "Digite a nova data de nascimento do aluno (AAAA-MM-DD):"
  );
  const matricula = prompt("Digite a nova matrícula do aluno:");

  if (nome && cpf && dataNascimento && matricula) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        alert("Aluno atualizado com sucesso!");
        listarAlunos(); // Atualiza a lista após a atualização
      }
    };

    xmlhttp.open("POST", "../php/atualizarAlunoProcessar.php", true);
    xmlhttp.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    xmlhttp.send(
      `id=${id}&nome=${nome}&cpf=${cpf}&dataNascimento=${dataNascimento}&matricula=${matricula}`
    );
  } else {
    alert("Todos os campos são obrigatórios!");
  }
}


function excluirAluno(id) {
  if (confirm("Tem certeza que deseja deletar este aluno?")) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Recarrega a lista de alunos após a exclusão
        listarAlunos();
      }
    };

    xmlhttp.open("GET", `../php/deletarAluno.php?id=${id}`, true);
    xmlhttp.send();
  }
}
