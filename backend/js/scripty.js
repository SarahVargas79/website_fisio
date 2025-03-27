document.querySelector("form").addEventListener("submit", function (event) {
  const nome = document.querySelector("#nome").value;
  const sobrenome = document.querySelector("#sobrenome").value;
  const email = document.querySelector("#email").value;
  const whatsapp = document.querySelector("#whatsapp").value;

  // Verifica se algum campo está vazio
  if (!nome.trim() || !sobrenome.trim() || !email.trim() || !whatsapp.trim()) {
    alert("Por favor, preencha todos os campos.");
    event.preventDefault(); // Impede o envio do formulário
  }
});
