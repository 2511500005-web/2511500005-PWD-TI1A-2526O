<?php
/**
 * Membersihkan input dari karakter berbahaya dan spasi berlebih.
 * Cocok untuk semua input teks dari form.
 */
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Menampilkan status berdasarkan parameter URL.
 * Dipanggil di index.php untuk menampilkan pesan sukses/gagal.
 */
function tampilkanStatus($status) {
    $pesan = [
        'success'         => ['Data berhasil disimpan!', 'success'],
        'failed'          => ['Gagal menyimpan data!', 'error'],
        'update_success'  => ['Data berhasil diupdate!', 'success'],
        'update_failed'   => ['Gagal update data!', 'error'],
        'delete_success'  => ['Data berhasil dihapus!', 'success'],
        'delete_failed'   => ['Gagal hapus data!', 'error'],
        'contact_success' => ['Pesan berhasil dikirim!', 'success'],
        'contact_failed'  => ['Gagal mengirim pesan!', 'error'],
        'captcha_failed'  => ['Captcha salah!', 'error']
    ];

    if (isset($pesan[$status])) {
        [$teks, $kelas] = $pesan[$status];
        echo "<p class='$kelas'>$teks</p>";
    }
}
?>