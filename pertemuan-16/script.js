document.addEventListener("DOMContentLoaded", function () {
  const txtPesan = document.querySelector("textarea[name='txtPesan']");
  const charCount = document.getElementById("charCount");

  if (txtPesan && charCount) {
    txtPesan.addEventListener("input", () => {
      const count = txtPesan.value.length;
      charCount.textContent = `${count}/200 karakter`;
    });
  }
});