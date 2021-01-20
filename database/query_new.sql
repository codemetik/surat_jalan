/*no antrian setealh regis*/
SELECT * FROM tb_pasien_baru

/*no_antrian dan no_rm saat proses pendaftaran pasien*/
SELECT * FROM tb_pasien X
INNER JOIN tb_pasien_baru Y ON y.id_user = x.id_user

SELECT * FROM tb_user

SELECT x.id_user,no_antrian, hari AS hari_daftar,username, PASSWORD, confirm_password, 
nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, 
TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama, tgl_masuk, 
id_rols_user, id_bagian, y.tgl_user_regis 
FROM tb_user X 
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user 
INNER JOIN tb_pasien_baru z ON z.id_user = x.id_user 
WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC

SELECT @aku:= 1++

SELECT no_antrian, no_rekam_medis, x.id_user, nama_user, jenis_kelamin, gol_darah, tanggal_lahir, 
TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama
FROM tb_user X
INNER JOIN tb_pasien Y ON y.id_user = x.id_user GROUP BY no_antrian DESC

SELECT IF(WEEKDAY(NOW())= '0','Senin',
IF(WEEKDAY(NOW())='1','Selasa',
IF(WEEKDAY(NOW())='2','Rabu',
IF(WEEKDAY(NOW())='3','Kamis',
IF(WEEKDAY(NOW())='4','Jumat',
IF(WEEKDAY(NOW())='5','Sabtu',
IF(WEEKDAY(NOW())='6','Minggu','Salah'))))))) 
AS hari

SELECT * FROM tb_user
SELECT * FROM tb_pasien_baru
SELECT * FROM tb_pasien X
INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Senin' GROUP BY nomor_antri DESC
INNER JOIN tb_dokter z ON z.id_dokter = x.id_dokter

SELECT * FROM tb_dokter
'AN-20201203-0003'
SELECT waktu_buka FROM tb_jadwal_praktek WHERE id_dokter = '5'
SELECT * FROM tb_jadwal_praktek
SELECT WEEKDAY('2020-12-04') > 1 AS ma

SELECT @n:=1 AS n, @n+1 AS nomer

'AN-20201203-0002'
'AN-20201203-0003'


SELECT TIMEDIFF()
SELECT * FROM tb_pasien_baru
SELECT * FROM tb_pasien X
INNER JOIN tb_jadwal_praktek Y ON y.id_dokter = x.id_dokter

SELECT * FROM tb_user
SELECT * FROM tb_bagian

SELECT x.id_user, y.id_bagian, username, PASSWORD, nama_bagian FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian

SELECT * FROM tb_user X
INNER JOIN tb_pasien_baru Y ON y.id_user = x.id_user
INNER JOIN tb_pasien z ON z.id_user = x.id_user

SELECT no_antrian, no_rekam_medis, x.id_user, nama_user, jenis_kelamin, gol_darah, tanggal_lahir, 
TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama 
FROM tb_user X 
INNER JOIN tb_pasien Y ON y.id_user = x.id_user 
ORDER BY no_antrian DESC


SELECT * FROM tb_pasien X 
INNER JOIN tb_user Y ON y.id_user = x.id_user 
WHERE hari_periksa = 'Senin' 
GROUP BY nomor_antri DESC

SELECT * FROM tb_barang_keluar

SELECT * FROM tb_rols_barang_keluar

SELECT * FROM tb_customer

SELECT * FROM tb_specialis
SELECT * FROM tb_user
SELECT * FROM tb_pasien
SELECT * FROM tb_pasien_baru X
INNER JOIN tb_user Y ON y.id_user = x.id_user

SELECT * FROM tb_bagian
SELECT * FROM tb_dokter

SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user GROUP BY nomor_antri DESC

SELECT x.id_user, y.id_bagian, username, PASSWORD, nama_bagian FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian

SELECT * FROM tb_pasien X
INNER JOIN tb_dokter z ON z.id_dokter = x.id_dokter

SELECT CONCAT(COUNT(nomor_antri) - 1,' Orang') AS menunggu FROM tb_pasien

SELECT COUNT(*) FROM tb_pasien WHERE nomor_antri != ''

ANTRIAN002

SELECT COUNT(nomor_antri) WHERE nomoe_antri = IS NULL FROM tb_pasien 

SELECT id_pasien, 
@ok:= CASE nomor_antri
WHEN '' THEN 'kosong'
WHEN nomor_antri THEN nomor_antri
END AS nomer_antrian , @ok, COUNT(*)
FROM tb_pasien

SELECT * FROM tb_pasien_baru

SELECT DATE_FORMAT(NOW(),'%M')

`id_bagian` X 
INNER JOIN tb_user Y ON y.id_user = x.id_user 
WHERE hari_periksa = 'Senin' GROUP BY nomor_antri ASC

SELECT id_user, IF(nomor_antri = '','Tidak Ada',nomor_antri) AS nomer, 
IF(nomor_antri = '', 'Tidak Ada',
IF((SELECT MIN(nomor_antri) FROM tb_pasien WHERE nomor_antri != '') = nomor_antri, 'Sedang di Proses', 
CONCAT((SELECT COUNT(*) FROM tb_pasien WHERE nomor_antri != '') - 1,' Orang Lagi')
)) AS keterangan_periksa,
IF((SELECT MIN(nomor_antri) FROM tb_pasien WHERE nomor_antri != '') = nomor_antri, 
'Sedang Proses Periksa ',IF(nomor_antri = '','Anda Sedang tidak dalam Antrian','Menunggu')) AS status_periksa
FROM tb_pasien WHERE id_user = 'USR0016' ORDER BY id_pasien

SELECT COUNT(*) FROM tb_pasien WHERE nomor_antri != ''

SELECT * FROM tb_pasien_baru

SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE nomor_antri != '' GROUP BY nomor_antri ASC

SELECT * FROM tb_specialis
SELECT * FROM tb_user X
INNER JOIN tb_pasien Y ON y.id_user = x.id_user
SELECT * FROM tb_laporan WHERE waktu_mulai_antri = DATE(NOW())

SELECT DATE(NOW())

SELECT * FROM tb_laporan X INNER JOIN tb_user Y ON y.id_user = x.id_user

SELECT *, TIMESTAMPDIFF(YEAR,tanggal_lahir,NOW()) AS umur FROM tb_dokter X 
INNER JOIN tb_specialis Y ON y.id_specialis = x.id_specialis
INNER JOIN tb_user z ON z.id_user = x.id_user

TIMESTAMPDIFF(YEAR,tanggal_lahir,NOW())