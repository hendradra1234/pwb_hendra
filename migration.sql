DROP TABLE IF EXISTS ada;
DROP TABLE IF EXISTS pembayaran;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS obat;
DROP TABLE IF EXISTS pesanan;
DROP TABLE IF EXISTS keranjang;
DROP TABLE IF EXISTS pesanan;
DROP TABLE IF EXISTS barang;
DROP TABLE IF EXISTS ekspedisi;
DROP TABLE IF EXISTS pelanggan;

--  1
CREATE TABLE pelanggan (
    kd_pelanggan INT(3) PRIMARY KEY AUTO_INCREMENT,
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
    kd_ekspedisi INT(10) PRIMARY KEY,
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
	kd_ekspedisi INT(10) NOT NULL,
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
	id INT(3) PRIMARY KEY AUTO_INCREMENT,
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

CREATE TABLE pengiriman232250009hendra (
	id_kirim009 INT(10) PRIMARY KEY,
	tgl_kirim009 VARCHAR(50) NOT NULL,
	jenis_kirim009 INT(10) NOT NULL,
	keterangan009 TEXT NOT NULL,

	 FOREIGN KEY (jenis_kirim009) REFERENCES ekspedisi(kd_ekspedisi)
);

-- Default Migration
INSERT INTO `users` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user', 'user', 'user');

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `stok`, `harga`, `berat`, `satuan`, `keterangan`, `gambar`) VALUES
('1', 'LA San Franciso Bay Condo', 96, 25000000, 20, '10', '100', 'josh-bean-Gecsh_1GOz4-unsplash.jpg'),
('2', 'b2 spirit used', 11, 250000, 30, 'kg', 'b2 spirit', 'b2_2.jpg'),
('5', 'tes', 8, 250000, 20, 'kg', 'keterangan', 'josh-bean-Gecsh_1GOz4-unsplash.jpg');

INSERT INTO `ekspedisi` (`kd_ekspedisi`, `nama_ekspedisi`, `tujuan`, `ongkir`) VALUES
(1, 'jne ekspedisi', 'sungailiat', 200000),
(2, 'jne kargo id', 'Toboali', 245000);

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `kota_pelanggan`, `telp_pelanggan`, `email_pelanggan`, `password`) VALUES
(1, 'novi yunita', 'jakarta barat, indonesia', 'jakarta', '082788271281', 'noviynita@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 'hendra', 'Kudai', 'sungailiat', '08127277212', 'admin@gmail.com', 'admin'),
(3, 'nana berliana', 'bsd city', 'Tangerang', '081272727172', 'berliana@gmail.com', 'nananana'),
(4, 'berliana nana', 'bsd city', 'Tangerang', '081272727174', 'berliana-stephat@gmail.com', '12345667'),
(5, 'testing', 'testing', 'Tangerang', '081217271722', 'testing@gmail.com', '1223e23e34r34');

INSERT INTO `pesanan` (`no_pesanan`, `tanggal_pesanan`, `nama`, `alamat`, `telp`, `status`, `kd_ekspedisi`, `kd_pelanggan`) VALUES
('PS001', '2025-07-20', 'hendra', 'alamat', '08172727212', 'Sudah Bayar', 1, 2),
('PS002', '2025-07-20', 'hendra', 'alamat', '08172727212', 'Sudah Bayar', 1, 2),
('PS003', '2025-07-20', '', '', '', 'Sudah Bayar', '1', 2),
('PS004', '2025-07-20', 'tes', 'alamat tes', '08172727212', 'Sudah Bayar', 1, 2),
('PS005', '2025-07-20', 'hendra', 'alamat tes', '08172727212', 'Sudah Bayar', 1, 2),
('PS006', '2025-07-20', 'tes', 'alamat', '08172727212', 'Sudah Bayar', 1, 2),
('PS007', '2025-07-20', 'tes', 'alamat', '08172727212', 'Sudah Bayar', 1, 2),
('PS008', '2025-07-26', 'tes', 'alamat', '08172727212', 'Sudah Bayar', 1, 2),
('PS009', '2025-07-26', 'tes', 'alamat', '08172727212', 'Sudah Bayar', 1, 2);

INSERT INTO `ada` (`no_pesanan`, `kd_barang`, `qty`, `harga`) VALUES
('PS001', '2', 2, 250000),
('PS002', '2', 2, 250000),
('PS003', '1', 1, 25000000),
('PS004', '1', 1, 25000000),
('PS004', '2', 1, 250000),
('PS005', '1', 1, 25000000),
('PS005', '2', 1, 250000),
('PS006', '1', 1, 25000000),
('PS007', '1', 1, 25000000),
('PS007', '2', 1, 250000),
('PS007', '5', 1, 250000),
('PS008', '2', 1, 250000),
('PS009', '5', 1, 250000);

INSERT INTO `pembayaran` (`kd_pembayaran`, `tanggal_pembayaran`, `bukti_transfer`, `no_pesanan`) VALUES
('PMB001', '2025-07-20', 'PMB001', 'PS002'),
('PMB002', '2025-07-20', 'PMB002', 'PS003'),
('PMB003', '2025-07-20', 'PMB003', 'PS004'),
('PMB004', '2025-07-20', 'PMB004', 'PS001'),
('PMB005', '2025-07-20', 'PMB005', 'PS005'),
('PMB006', '2025-07-20', 'PMB006', 'PS006'),
('PMB007', '2025-07-20', 'PMB007', 'PS007'),
('PMB008', '2025-07-26', 'PMB008', 'PS008'),
('PMB009', '2025-07-26', 'PMB009', 'PS009');
