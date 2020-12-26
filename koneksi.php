<?php 
	
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'surat_jalan';

	$koneksi = mysqli_connect($hostname, $username, $password, $database)
	or die('Could not connect: ' . mysqli_connect_error());


//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com
 
function rupiah($angka){
	
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
// echo rupiah(1000000);

function angka($ang){
	
	$angka = number_format($ang,0,'','.');
	return $angka;
 
}

?>