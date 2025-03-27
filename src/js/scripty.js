document
  .getElementById("hamburger-menu")
  .addEventListener("click", function () {
    document.getElementById("menu").classList.toggle("active");
  });

// Funcionalidade para fechar o toast ao clicar no 'X'
document.addEventListener("DOMContentLoaded", function () {
  const closeBtn = document.querySelector(".close-btn");

  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      const toast = this.closest(".toast");
      toast.style.display = "none"; // Fecha o toast
    });
  }
});
