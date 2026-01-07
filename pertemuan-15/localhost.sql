-- Buat database baru
CREATE DATABASE IF NOT EXISTS crud_biodata
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

-- Gunakan database
USE crud_biodata;

-- Tabel biodata mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
  nim VARCHAR(20) PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  tempat VARCHAR(100) NOT NULL,
  tanggal VARCHAR(20) NOT NULL,
  hobi VARCHAR(100) NOT NULL,
  pasangan VARCHAR(100) NOT NULL,
  pekerjaan VARCHAR(100) NOT NULL,
  ortu VARCHAR(100) NOT NULL,
  kakak VARCHAR(100) NOT NULL,
  adik VARCHAR(100) NOT NULL,
  dibuat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  diubah TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel kontak (untuk form "Kontak Kami")
CREATE TABLE IF NOT EXISTS kontak (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pesan TEXT NOT NULL,
  dibuat TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contoh data awal mahasiswa (opsional)
INSERT INTO mahasiswa (nim, nama, tempat, tanggal, hobi, pasangan, pekerjaan, ortu, kakak, adik)
VALUES
('A12345', 'Melvyn', 'Depok', '2000-01-01', 'Coding', 'N/A', 'Programmer', 'Bapak Melvyn', 'Kakak Melvyn', 'Adik Melvyn')
ON DUPLICATE KEY UPDATE nama = VALUES(nama);

-- Contoh data awal kontak (opsional)
INSERT INTO kontak (nama, email, pesan)
VALUES
('Hadi', 'hadi@example.com', 'Halo, ini pesan percobaan!')
ON DUPLICATE KEY UPDATE pesan = VALUES(pesan);