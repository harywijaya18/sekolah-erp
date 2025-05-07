
<?php
	$host="localhost";
	$user="smktarun_psb";
	$pass="~borcess2 3s";
	$database="smktarun_sekolah";
	$conn=new mysqli($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
	  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
	}
	
	date_default_timezone_set('Asia/Jakarta');
?>