-- DATABASE

CREATE TABLE PENGGUNA (
    ID_USER INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NAMA_USER VARCHAR(100),
    EMAIL_USER VARCHAR(100),
    PASSWORD_USER VARCHAR(25),
    CREATED_AT TIMESTAMP,
    UPDATED_AT TIMESTAMP 
);

CREATE TABLE PENERBIT (
    ID_PENERBIT INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NAMA_PENERBIT VARCHAR(100)
);

CREATE TABLE KATEGORI (
    ID_KATEGORI INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NAMA_KATEGORI VARCHAR(50)
);

CREATE TABLE BAHASA (
    ID_BAHASA INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NAMA_BAHASA VARCHAR(50)
);

CREATE TABLE BUKU (
    ID_BUKU INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(50) NOT NULL,
    JUDUL_BUKU VARCHAR(100),
    URL_IMG_BUKU VARCHAR(250),
    ID_PENERBIT INT NOT NULL,
        FOREIGN KEY(ID_PENERBIT) REFERENCES PENERBIT(ID_PENERBIT),
    ID_KATEGORI INT NOT NULL,
        FOREIGN KEY(ID_KATEGORI) REFERENCES KATEGORI(ID_KATEGORI),
    ID_BAHASA INT NOT NULL,
        FOREIGN KEY(ID_BAHASA) REFERENCES BAHASA(ID_BAHASA),
    CREATED_AT TIMESTAMP,
    UPDATED_AT TIMESTAMP
);

CREATE TABLE PEMINJAMAN (
    ID_PEMINJAMAN INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_BUKU INT NOT NULL,
        FOREIGN KEY(ID_BUKU) REFERENCES BUKU(ID_BUKU),
    ID_USER INT NOT NULL,
        FOREIGN KEY(ID_USER) REFERENCES PENGGUNA(ID_USER)
);

-- TAMBAH KOLOM PEMINJAMAN

ALTER TABLE PEMINJAMAN ADD TGL_PINJAM DATE;
ALTER TABLE PEMINJAMAN ADD DURASI_PEMINJAMAN DATE;
ALTER TABLE PEMINJAMAN ADD TGL_KEMBALI DATE;

-- TAMBAH KOLOM STATUS

ALTER TABLE BUKU ADD STATUS VARCHAR(25);
