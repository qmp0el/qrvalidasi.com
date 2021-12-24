<?php
//variabel koneksi
$konek = mysqli_connect("localhost","root","","qrvalidasi.com");

if(!$konek){
	echo "Koneksi Database Gagal...!!!";
}

function namaBulan($angka){
	switch ($angka) {
		case '1':
			$bulan = "January";
			break;
		case '2':
			$bulan = "February";
			break;
		case '3':
			$bulan = "March";
			break;
		case '4':
			$bulan = "April";
			break;
		case '5':
			$bulan = "Mey";
			break;
		case '6':
			$bulan = "June";
			break;
		case '7':
			$bulan = "July";
			break;
		case '8':
			$bulan = "Agust";
			break;
		case '9':
			$bulan = "September";
		case '10':
			$bulan = "October";
			break;
		case '11':
			$bulan = "November";
			break;
		case '12':
			$bulan = "December";
			break;
		default:
			$bulan = "Tidak ada bulan yang dipilih...";
			break;
	}

	return $bulan;
}

function tglIndonesia($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = namaBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $bulan.', '.$tanggal.' '.$tahun;		 
}

?>