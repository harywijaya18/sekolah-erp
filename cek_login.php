<?php
ob_start();
include "config/conn.php";
include 'lib/function.php';

// fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data){
	$filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	return $filter;
}

$username = anti_injection($_POST['username']);
$password = anti_injection(md5($_POST['password']));

// menghindari sql injection
$injeksi_username = mysqli_real_escape_string($conn, $username);
$injeksi_password = mysqli_real_escape_string($conn, $password);
	
// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
  echo "<script>alert('Gagal Login. Dilarang keras memasukan SQL Injection !!!'); window.location = 'index.php'</script>";
}
else{
	$login = mysqli_query($conn,"SELECT * FROM m_pegawai WHERE username='$username' AND password='$password' AND status='Y' AND level <> 'guru'");

	$ketemu = mysqli_num_rows($login);
	$r      = mysqli_fetch_array($login);

	// Apabila username dan password ditemukan (benar)
	if ($ketemu > 0){
		session_start();

    $_SESSION['namauser']    = $r['username'];
    $_SESSION['passuser']    = $r['password'];
    $_SESSION['namalengkap'] = $r['nama'];
    $_SESSION['leveluser']   = $r['level'];
	$_SESSION['kdpegawai']	 = $r['kd_pegawai'];

	/*
	$id_pegawaimon = $r['id_pegawai'];
	$monitoring = mysqli_query($conn, "SELECT * FROM monitoring where id_pegawai ='$id_pegawaimon'");
	$datamonit = mysqli_num_rows($monitoring);
	$waktu = date("Y-m-d h:i:sa");
		if($datamonit > 0){
			mysqli_query($conn, "UPDATE monitoring SET status='Y', terakhir_login='$waktu' where id_pegawai ='$id_pegawaimon'");
		}else{
			mysqli_query($conn, "INSERT INTO monitoring SET id_pegawai = '$id_pegawaimon', status='Y', terakhir_login='$waktu'");
		}
	
	*/
	
    login_validate();
      
   // bikin id_session yang unik dan mengupdatenya agar slalu berubah 
    // agar user biasa sulit untuk mengganti password Administrator 
    
	/*
	$sid_lama = session_id();
	  session_regenerate_id();
    $sid_baru = session_id();

    if ($r['level'] == 'nasabah'){

    mysqli_query($conn, "UPDATE nasabah SET id_session='$sid_baru' WHERE username='$username'");

	}else{
	mysqli_query($conn, "UPDATE pegawai SET id_session='$sid_baru' WHERE username='$username'");	
	}
	
	*/

    //header("location:index.php?module=dashboard");
	//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?module=dashboard">';
	echo "<script>  window.location= '../sekolah/index.php?module=dashboard' </script> ";
	
	//exit;
	}
	else{
		echo "<script>alert('Gagal Login. Username atau Password Salah'); window.location = 'index.php'</script>";
	}
}
?>