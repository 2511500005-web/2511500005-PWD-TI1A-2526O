document.addEventListener('DOMContentLoaded', () => {
  const txtPesan = document.getElementById('txtPesan');
  const charCount = document.getElementById('charCount');

  if (txtPesan && charCount) {
    txtPesan.addEventListener('input', () => {
      const len = txtPesan.value.length;
      charCount.textContent = `${len}/200 karakter`;
      if (len > 200) {
        txtPesan.value = txtPesan.value.substring(0, 200);
      }
    });
  }

  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', e => {
      if (!confirm('Yakin ingin menghapus data ini?')) {
        e.preventDefault();
      }
    });
  });
});