SELECT * FROM tb_user

SELECT * FROM tb_rols_user

SELECT * FROM tb_bagian

SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user 
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian
WHERE username = 'kepala' AND PASSWORD = 'kepala'

SELECT * FROM tb_jenis
SELECT * FROM tb_barang
SELECT * FROM tb_customer

SELECT * FROM tb_rols_customer

SELECT * FROM tb_barang X
INNER JOIN tb_rols_jenis Y ON y.id_barang = x.id_barang
INNER JOIN tb_jenis z ON z.id_jenis = y.id_jenis

SELECT * FROM tb_supplier
SELECT * FROM tb_customer

SELECT * FROM tb_barang

SELECT * FROM tb_rols_jenis

SELECT * FROM tb_rols_customer

SELECT * FROM tb_barang X
INNER JOIN tb_rols_customer Y ON y.id_barang = x.id_barang
INNER JOIN tb_customer z ON z.id_customer = y.id_customer GROUP BY id_rols_customer

SELECT * FROM tb_user
CS0003
INSERT INTO tb_customer(id_customer, nama_customer, no_telpn, alamat) VALUES('CS0004','PT. ASTRA OTOPART','000','Pamulang'),
('CS0005','PT. HILEX INDONESIA','000','Pamulang'),
('CS0006','PT. ROki','000','Pamulang'),
('CS0007','PT. SUZUKI INDO MOTOR','000','Pamulang'),
('CS0008','PT. CIPTA PERKASA METALINDO','000','Pamulang'),
('CS0009','PT. AHM SIMPLIKASI YASUNLI DAN DYNAPLAST','000','Pamulang'),
('CS0010','PT. ASTRA HONDA MOTOR','000','Pamulang'),
('CS0011','PT. AUTOLIV INDONESIA','000','Pamulang');


SELECT * FROM tb_customer
INSERT INTO tb_customer(id_customer, nama_customer, no_telpn, alamat) 
VALUES('CS0015','PT. YAMAHA INDONESIA MOTOR','000','Pamulang');

SELECT * FROM tb_barang X
INNER JOIN tb_stok Y ON y.id_barang = x.id_barang

SELECT * FROM tb_rols_customer

SELECT * FROM tb_barang X
INNER JOIN tb_stok Y ON y.id_barang = x.id_barang
INNER JOIN tb_barang_keluar z ON z.id_barang = x.id_barang

SELECT * FROM tb_rols_customer

SELECT * FROM tb_stok

SELECT * FROM tb_barang X 
INNER JOIN tb_stok Y ON y.id_barang = x.id_barang 
INNER JOIN tb_barang_keluar z ON z.id_barang = x.id_barang
INNER JOIN tb_rols_customer a ON a.id_barang = z.id_barang
INNER JOIN tb_customer b ON b.id_customer = a.id_customer

SELECT * FROM tb_rols_customer X
INNER JOIN tb_customer Y ON y.id_customer = x.id_customer

SELECT * FROM tb_barang_keluar

SELECT * FROM tb_rols_barang_keluar X
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar
INNER JOIN tb_barang z ON z.id_barang = y.id_barang
INNER JOIN tb_customer a ON a.id_customer = x.id_customer

SELECT * FROM tb_barang_keluar

SELECT * FROM tb_rols_barang_keluar X 
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar
INNER JOIN tb_customer a ON a.id_customer = x.id_customer

SELECT * FROM tb_bagian

SELECT * FROM tb_barang_keluar

SELECT * FROM tb_rols_barang_keluar X 
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar 
INNER JOIN tb_barang z ON z.id_barang = y.id_barang 
INNER JOIN tb_customer a ON a.id_customer = x.id_customer

SELECT * FROM tb_surat_jalan_masal X
INNER JOIN tb_barang Y ON y.id_barang = x.id_barang

SELECT * FROM tb_surat_jalan
SELECT * FROM tb_surat_jalan_final

SELECT * FROM tb_customer


SELECT * FROM tb_customer

SELECT * FROM tb_surat_jalan_masal X 
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar
INNER JOIN tb_barang z ON z.id_barang = y.id_barang

SELECT * FROM tb_customer X
INNER JOIN tb_rols_barang_keluar Y ON y.id_customer = x.id_customer
INNER JOIN tb_barang_keluar z ON z.id_barang_keluar = y.id_barang_keluar
WHERE STATUS != 'Ok' GROUP BY y.id_customer

SELECT * FROM tb_customer X 
INNER JOIN tb_rols_barang_keluar Y ON y.id_customer = x.id_customer 
INNER JOIN tb_barang_keluar z ON z.id_barang_keluar = y.id_barang_keluar 
WHERE STATUS != 'Ok' GROUP BY y.id_barang_keluar

SELECT * FROM tb_surat_jalan_final X
INNER JOIN tb_surat_jalan Y ON y.id_surat_jalan = x.id_surat_jalan

SELECT * FROM tb_surat_jalan X
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar
INNER JOIN tb_barang z ON z.id_barang = y.id_barang

SELECT * FROM tb_surat_jalan_masal X 
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar 
INNER JOIN tb_barang z ON z.id_barang = y.id_barang


SELECT * FROM tb_surat_jalan_final X
INNER JOIN tb_customer Y ON y.id_customer = x.id_customer

SELECT * FROM tb_barang X INNER JOIN tb_rols_jenis Y ON y.id_barang = x.id_barang INNER JOIN tb_jenis z ON z.id_jenis = y.id_jenis GROUP BY x.id_barang DESC

SELECT * FROM tb_barang X INNER JOIN tb_stok Y ON y.id_barang = x.id_barang GROUP BY id_stok DESC
SELECT * FROM tb_customer
SELECT * FROM tb_add_stok

SELECT * FROM tb_stok


SELECT * FROM tb_rols_barang_keluar X 
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar 
INNER JOIN tb_barang z ON z.id_barang = y.id_barang 
INNER JOIN tb_customer a ON a.id_customer = x.id_customer
GROUP BY id_rols_barang_keluar DESC

SELECT * FROM tb_barang_keluar

SELECT * FROM tb_add_stok X
INNER JOIN tb_barang Y ON y.id_barang = x.id_barang

SELECT * FROM tb_surat_jalan
SELECT * FROM tb_surat_jalan_final
SELECT * FROM tb_surat_jalan_masal

SELECT * FROM tb_barang_keluar


SELECT COUNT(*) FROM tb_customer
SELECT * FROM tb_customer
SELECT COUNT(*) FROM tb_barang
SELECT * FROM tb_barang
SELECT COUNT(*) FROM tb_stok
SELECT CONCAT(SUM(jumlah_stok),' Pcs') AS st FROM tb_stok
SELECT * FROM tb_barang_keluar

SELECT * FROM tb_surat_jalan_final


SELECT * FROM tb_surat_jalan

SELECT * FROM tb_barang X
INNER JOIN tb_stok Y ON y.id_barang = x.id_barang

SELECT * FROM tb_rols_barang_keluar X 
INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar 
INNER JOIN tb_barang z ON z.id_barang = y.id_barang 
INNER JOIN tb_customer a ON a.id_customer = x.id_customer 
GROUP BY id_rols_barang_keluar DESC

SELECT x.id_bagian, nama_bagian, z.id_user, nama_user, username, PASSWORD FROM tb_bagian X
INNER JOIN tb_rols_user Y ON y.id_bagian = x.id_bagian
INNER JOIN tb_user z ON z.id_user = y.id_user

SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian



SELECT * FROM tb_user
SELECT * FROM tb_rols_user
SELECT * FROM tb_bagian
SELECT * FROM tb_customer
SELECT * FROM tb_barang_keluar
SELECT * FROM tb_surat_jalan
SELECT * FROM tb_surat_jalan_masal
SELECT * FROM tb_surat_jalan_final
SELECT * FROM tb_barang
SELECT * FROM tb_stok
SELECT * FROM tb_add_stok

SELECT* FROM tb_bagian