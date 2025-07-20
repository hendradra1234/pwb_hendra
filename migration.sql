DROP TABLE IF EXISTS pelanggan;
DROP TABLE IF EXISTS barang;
DROP TABLE IF EXISTS ekspedisi;
DROP TABLE IF EXISTS pesanan;
DROP TABLE IF EXISTS ada;
DROP TABLE IF EXISTS pembayaran;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS obat;
DROP TABLE IF EXISTS pesanan;
DROP TABLE IF EXISTS keranjang;

--  1
CREATE TABLE pelanggan (
    kd_pelanggan INT(3) PRIMARY KEY,
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
	kd_pelanggan INT(3) NOT NULL,
    FOREIGN KEY (kd_ekspedisi) REFERENCES ekspedisi(kd_ekspedisi),
	FOREIGN KEY (kd_pelanggan) REFERENCES pelanggan(kd_pelanggan)
);

-- 5
CREATE TABLE ada (
	no_pesanan VARCHAR(10) NOT NULL,
	kd_barang VARCHAR(10) NOT NULL,
	qty INT(3) NOT NULL,
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

CREATE TABLE keranjang (
	kd_pelanggan INT(3) NOT NULL,
	kd_barang VARCHAR(10) NOT NULL,
	qty INT(3) NOT NULL,

    FOREIGN KEY (kd_pelanggan) REFERENCES pelanggan(kd_pelanggan),
	FOREIGN KEY (kd_barang) REFERENCES barang(kd_barang)
);

-- Default Migration

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `stok`, `harga`, `berat`, `satuan`, `keterangan`, `gambar`) VALUES
('1', 'LA San Franciso Bay Condo', 1, 25000000, 20, '10', '1', 'josh-bean-Gecsh_1GOz4-unsplash.jpg'),
('2', 'b2 spirit used', 3, 250000, 3, 'kg', 'b2 spirit', 'b2_2.jpg');

INSERT INTO `ekspedisi` (`kd_ekspedisi`, `nama_ekspedisi`, `tujuan`, `ongkir`) VALUES
('1', 'jne ekspedisi', 'sungailiat', 200000),
('2', 'jne kargo id', 'Toboali', 245000);

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `satuan`, `jenis_obat`, `stok`) VALUES
('1', 'tes1', 'tes1', 'tes1', 2),
('4', 'paracetamol ultra pro max', 'pack', 'obat keras', 100);

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `kota_pelanggan`, `telp_pelanggan`, `email_pelanggan`, `password`) VALUES
('1', 'novi yunita', 'jakarta barat, indonesia', 'jakarta', '082788271281', 'noviynita@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
('2', 'via lestari', 'jalan sisingamangaraja no 3 kudai', 'sungailiat', '087277717652', 'vialestari@gmail.com', '25f9e794323b453885f5181f1b624d0b');

INSERT INTO `users` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user', 'user', 'user');
