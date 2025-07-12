DROP TABLE IF EXISTS pelanggan;
DROP TABLE IF EXISTS barang;
DROP TABLE IF EXISTS ekspedisi;
DROP TABLE IF EXISTS pesanan;
DROP TABLE IF EXISTS ada;
DROP TABLE IF EXISTS pembayaran;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS obat;

--  1
CREATE TABLE pelanggan (
    kd_pelanggan VARCHAR(3) PRIMARY KEY,
    nama_pelanggan VARCHAR(50) NOT NULL,
    alamat_pelanggan VARCHAR(100) NOT NULL,
    kota_pelanggan VARCHAR(50) NOT NULL,
    telp_pelanggan VARCHAR(15) NOT NULL,
    email_pelanggan VARCHAR(100) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- 2
CREATE TABLE barang (
    kd_barang VARCHAR(10) PRIMARY KEY,
    nama_barang VARCHAR(50) NOT NULL,
    stok INT(3) NOT NULL,
    harga INT(8) NOT NULL,
    berat INT(3) NOT NULL,
    satuan VARCHAR(15) NOT NULL,
    keterangan VARCHAR(100) NOT NULL,
    gambar VARCHAR(100) NOT NULL
);

-- 3
CREATE TABLE ekspedisi (
    kd_ekspedisi VARCHAR(10) PRIMARY KEY,
    nama_ekspedisi VARCHAR(50) NOT NULL,
    tujuan VARCHAR(50) NOT NULL,
    ongkir INT(8) NOT NULL
);

-- 4
CREATE TABLE pesanan (
    no_pesanan VARCHAR(10) PRIMARY KEY,
    tanggal_pesanan DATE NOT NULL,
    nama VARCHAR(50) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    telp VARCHAR(15) NOT NULL,
    status VARCHAR(50) NOT NULL,
	kd_ekspedisi VARCHAR(10) NOT NULL,
	kd_pelanggan VARCHAR(10) NOT NULL,
    FOREIGN KEY (kd_ekspedisi) REFERENCES ekspedisi(kd_ekspedisi),
	FOREIGN KEY (kd_pelanggan) REFERENCES pelanggan(kd_pelanggan)
);

-- 5
CREATE TABLE ada (
	no_pesanan VARCHAR(10) NOT NULL,
	kd_barang VARCHAR(10) NOT NULL,
	th INT(3) NOT NULL,
	harga INT(8) NOT NULL,
	FOREIGN KEY (no_pesanan) REFERENCES pesanan(no_pesanan),
    FOREIGN KEY (kd_barang) REFERENCES barang(kd_barang)
);

-- 6
CREATE TABLE pembayaran (
    kd_pembayaran VARCHAR(10) PRIMARY KEY,
	tanggal_pembayaran DATE NOT NULL,
    bukti_transfer VARCHAR(100) NOT NULL,
	no_pesanan VARCHAR(100) NOT NULL,
    FOREIGN KEY (no_pesanan) REFERENCES `pesanan`(no_pesanan)
);

-- 7
CREATE TABLE users (
	id INT(3) NOT NULL,
	username VARCHAR(10) NOT NULL,
	password VARCHAR(100) NOT NULL,
	user_role VARCHAR(50) NOT NULL
);

CREATE TABLE obat (
	kd_obat  VARCHAR(5) PRIMARY KEY,
	nm_obat VARCHAR(50) NOT NULL,
	satuan VARCHAR(15) NOT NULL,
	jenis_obat VARCHAR(25) NOT NULL,
	stok INT(3) NOT NULL
);
