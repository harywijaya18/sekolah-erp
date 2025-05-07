<?php 

//if ($_GET['module']=='') {
	//include '/../component/com_dashboard/dashboard.php';
//}
	if ($_GET['module'] == 'dashboard') {
	include 'component/com_dashboard/dashboard.php';
}elseif ($_GET['module'] == 'pegawai_all') {
	include 'component/com_pegawai/pegawai_view.php';
}elseif ($_GET['module'] == 'under_construction') {
	include 'component/com_error/500.php';
}elseif ($_GET['module'] == 'tapel_all') {
	include 'component/com_tapel/tapel_all.php';
}elseif ($_GET['module'] == 'spektrum'){
	include 'component/com_spektrum/spektrum_view.php';
}elseif ($_GET['module'] == 'jurusan'){
	include 'component/com_jurusan/jurusan_view.php';
}elseif ($_GET['module'] == 'asal_sekolah'){
	include 'component/com_asalsekolah/asal_sekolah_view.php';
}elseif ($_GET['module'] == 'diskon'){
	include 'component/com_diskon/diskon_view.php';
}elseif ($_GET['module'] == 'voucher'){
	include 'component/com_voucher/voucher_view.php';
}elseif ($_GET['module'] == 'asal_kelas'){
	include 'component/com_asalkelas/kelas_view.php';
}elseif ($_GET['module'] == 'calon_siswa'){
	include 'component/com_calonsiswa/calon_siswa_view.php';
}elseif ($_GET['module'] == 'detail_csiswa'){
	include 'component/com_detailcalonsiswa/detail_calon_siswa.php';
}elseif ($_GET['module'] == 'det_csiswa'){
	include 'component/com_detailcalonsiswa/detail_view.php';
}elseif ($_GET['module'] == 'jadwalpsb'){
	include 'component/com_jadwalpsb/jadwalpsb_view.php';
}elseif ($_GET['module'] == 'daftar_online'){
	include 'component/com_daftaronline/daftar_online_view.php';
}elseif ($_GET['module'] == 'uploadcasis'){
	include 'component/com_upload/upload_view.php';
}elseif ($_GET['module'] == 'lapsekolah'){
	include 'component/com_laporan/lap_sekolah.php';
}elseif ($_GET['module'] == 'lapjurusan'){
	include 'component/com_laporan/lap_jurusan.php';
}elseif ($_GET['module'] == 'lappembayaran'){
	include 'component/com_laporan/lap_pembayaran.php';
}elseif ($_GET['module'] == 'pengaturan') {
	 if ($_SESSION['leveluser']=='admin'){
		include 'component/com_pengaturan/pengaturan.php';
	}else{
		echo '<meta http-equiv="refresh" content="0; url=../index.php">';
	}
}else{
	echo '<meta http-equiv="refresh" content="0; url=?module=dashboard">';
}


?>