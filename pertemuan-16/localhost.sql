-- Buat database baru
CREATE DATABASE IF NOT EXISTS db_pwd2025;
USE db_pwd2025;

-- Tabel Biodata Dosen
CREATE TABLE IF NOT EXISTS dosen (
  kodedos VARCHAR(20) PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  alamat TEXT,
  tanggal DATE,
  jja VARCHAR(50),
  prodi VARCHAR(50),
  nohp VARCHAR(20),
  pasangan VARCHAR(100),
  anak VARCHAR(100),
  ilmu VARCHAR(100)
);

-- Tabel Kontak Pengunjung
CREATE TABLE IF NOT EXISTS kontak (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pesan TEXT NOT NULL,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);