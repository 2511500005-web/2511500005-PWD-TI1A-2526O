document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.getElementById("menuToggle");
  const nav = document.querySelector("nav");

  if (menuToggle && nav) {
    menuToggle.addEventListener("click", () => {
      nav.classList.toggle("active");
    });
  }

  const txtPesan = document.getElementById("txtPesan");
  const charCount = document.getElementById("charCount");

  if (txtPesan && charCount) {
    txtPesan.addEventListener("input", () => {
      const count = txtPesan.value.length;
      charCount.textContent = `${count}/200 karakter`;
    });
  }
});