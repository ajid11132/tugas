CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    jam_mulai TIME NOT NULL,
    durasi INT NOT NULL,
    jenis_lapangan VARCHAR(50) NOT NULL
);
