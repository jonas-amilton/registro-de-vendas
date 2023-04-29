// Cria a lista de registros de vendas
let listaRegistros = [];

// Adiciona o evento de submissão do formulário
$("#form-registro").submit(function (event) {
  event.preventDefault();
  let data = $("#data").val();
  let valor = $("#valor").val();
  let descricao = $("#descricao").val();
  adicionarRegistro(data, valor, descricao);
  mostrarRegistros();
});

// Adiciona um registro na lista de registros
function adicionarRegistro(data, valor, descricao) {
  let registro = {
    data: data,
    valor: valor,
    descricao: descricao,
  };
  listaRegistros.push(registro);
  salvarRegistros();
}

// Salva a lista de registros no LocalStorage
function salvarRegistros() {
  localStorage.setItem("listaRegistros", JSON.stringify(listaRegistros));
}

// Carrega a lista de registros do LocalStorage
function carregarRegistros() {
  let dados = localStorage.getItem("listaRegistros");
  if (dados) {
    listaRegistros = JSON.parse(dados);
  }
}

// Mostra a lista de registros na tabela
function mostrarRegistros() {
  $("#tabela-registros tbody").empty();
  let filtro = $("#filtro-registros").val().toLowerCase();
  let registrosEncontrados = false;

  if (listaRegistros.length === 0) {
    let linha = $("<tr>");
    linha.append($("<td colspan='4'>").text("Nenhum registro encontrado"));
    $("#tabela-registros tbody").append(linha);
    return;
  }

  listaRegistros.forEach(function (registro) {
    if (
      registro.data.toLowerCase().includes(filtro) ||
      registro.valor.toString().includes(filtro) ||
      registro.descricao.toLowerCase().includes(filtro)
    ) {
      registrosEncontrados = true;
      let linha = $("<tr>");
      linha.append($("<td>").text(registro.data));
      linha.append($("<td>").text(registro.valor));
      linha.append($("<td>").text(registro.descricao));
      let colunaAcoes = $("<td>");
      colunaAcoes.append(
        $("<button>")
          .addClass("btn btn-danger btn-remover")
          .text("Remover")
          .click(function () {
            // Abre o modal de remoção
            $("#modal-remover").modal("show");

            // Adiciona um evento de clique ao botão de cancelar a remoção
            $("#modal-remover .close").click(function () {
              $("#modal-remover").modal("hide");
            });

            $(document).click(function (event) {
              if ($(event.target).hasClass("modal")) {
                $(".modal").modal("hide");
              }
            });

            // Adiciona um evento de clique ao botão de confirmar a remoção
            $("#btn-remover-confirmar").click(function () {
              removerRegistro(registro);
              $("#modal-remover").modal("hide");
            });
          })
      );

      colunaAcoes.append($("<span>").text(" "));

      colunaAcoes.append(
        $("<button>")
          .addClass("btn btn-primary btn-editar")
          .text("Editar")
          .click(function () {
            editarRegistro(registro);
          })
      );

      linha.append(colunaAcoes);
      $("#tabela-registros tbody").append(linha);
    }
  });

  if (!registrosEncontrados) {
    let linha = $("<tr>");
    linha.append($("<td colspan='4'>").text("Nenhum registro encontrado"));
    $("#tabela-registros tbody").append(linha);
  }
}

// Remove um registro da lista de registros
function removerRegistro(registro) {
  let index = listaRegistros.indexOf(registro);

  listaRegistros.splice(index, 1);
  salvarRegistros();
  mostrarRegistros();
}

// Edita um registro da lista de registros
function editarRegistro(registro) {
  let index = listaRegistros.indexOf(registro);
  if (index > -1) {
    let modal = $("#modal-edicao");
    let form = $("#form-edicao");
    let dataInput = $("#data-edicao");
    let valorInput = $("#valor-edicao");
    let descricaoInput = $("#descricao-edicao");

    // Preenche o formulário com os valores do registro
    dataInput.val(registro.data);
    valorInput.val(registro.valor);
    descricaoInput.val(registro.descricao);

    // Adiciona um evento de submissão do formulário de edição
    form.submit(function (event) {
      event.preventDefault();
      let novaData = dataInput.val();
      let novoValor = valorInput.val();
      let novaDescricao = descricaoInput.val();

      // Atualiza o registro com os novos valores
      listaRegistros[index].data = novaData;
      listaRegistros[index].valor = novoValor;
      listaRegistros[index].descricao = novaDescricao;

      // Salva os registros e atualiza a tabela
      salvarRegistros();
      mostrarRegistros();

      // Fecha o modal
      modal.modal("hide");
    });

    // Abre o modal de edição
    modal.modal("show");
  }
}

// Executa a função de carregamento de registros quando a página é carregada
$(document).ready(function () {
  carregarRegistros();
  mostrarRegistros();
});

// Adiciona o evento de digitação no campo de filtro
$("#filtro-registros").on("input", function () {
  mostrarRegistros();
});

const formRegistro = document.querySelector("#form-registro");

formRegistro.addEventListener("submit", (event) => {
  event.preventDefault();

  // exibe o toast de sucesso
  const toast = new bootstrap.Toast(document.querySelector(".toast"));
  toast.show();
});
