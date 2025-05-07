<!-- SEARCH AREA -->

<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<form action="?module=<?php echo $_GET['module'];?>&aksi=cari" enctype="multipart/form-data" method="POST">
                            <div class="breadcome-list">
                                <div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="breadcome-heading">
                                            <label>Masukan NISN / Kode Daftar / Nama untuk mencari Calon Siswa </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="breadcome-heading">
											<input type="text" name="idcari" id="idcari" placeholder="Search..." class="search-int form-control">
                                        </div>
                                    </div>
									
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <ul class="breadcome-heading">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                                        </ul>
                                    </div>
									
                                </div>
                            </div>
						</form>
                        </div>
                    </div>
                </div>
            </div>


<!-- DETAIL CALON SISWA AREA -->
<?php
	if($_GET['aksi'] == ''){
		$module = $_GET['module'];
		$kd_siswa =  $_GET['id'];
		
		//DATA DETAIL SISWA
		$querydet = "SELECT calon_siswa.*, m_sekolah.nama_sekolah, m_jurusan.jurusan
						FROM calon_siswa 
						INNER JOIN m_sekolah ON calon_siswa.kd_sekolah = m_sekolah.kd_sekolah
						INNER JOIN m_jurusan ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
						WHERE kd_siswa ='$kd_siswa'";
		$hasil = mysqli_query($conn,$querydet);
		$data = mysqli_fetch_array($hasil);
		$jk = $data['jenis_kelamin'];
		$jenis_kelamin = "";
		if($jk == 'P'){
			$jenis_kelamin = "Perempuan";
		}else{
			$jenis_kelamin = "Laki-laki";
		}
		
		
		//DATA DETAIL PEMBAYARAN
		$queryhistory ="SELECT calon_siswa.kd_siswa, calon_siswa.nama, calon_siswa.kd_sekolah, m_sekolah.nama_sekolah, calon_siswa.kd_jurusan, m_jurusan.jurusan, m_jurusan.singkatan, 
																		m_jurusan.program_studi, m_jurusan.udp, calon_siswa.kd_voucher, m_voucher.nominal_voucher, calon_siswa.kd_diskon, m_diskon.diskon
																		FROM calon_siswa INNER JOIN m_sekolah ON calon_siswa.kd_sekolah = m_sekolah.kd_sekolah
																		INNER JOIN m_jurusan ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
                                                                        LEFT JOIN m_voucher ON calon_siswa.kd_voucher =  m_voucher.kd_voucher
                                                                        LEFT JOIN m_diskon ON calon_siswa.kd_diskon = m_diskon.kd_diskon
																		WHERE calon_siswa.status='Y' AND calon_siswa.kd_siswa = '$kd_siswa'
																		ORDER BY calon_siswa.tanggal_buat desc";
																		
		$hasilhistory = mysqli_query($conn,$queryhistory);
		$datahistory = mysqli_fetch_array($hasilhistory);
		
		//Hitung Total Pembayaran yg sudah masuk
		$querySumTrans = "SELECT SUM(jumlah_bayar) as totaltransaksi FROM transaksi_psb where kd_siswa ='$kd_siswa'";
		$hasilSum = mysqli_query($conn,$querySumTrans);
		$dataSum = mysqli_fetch_array($hasilSum);
		
		$statusBayar = "";
		$sisaBayar = 0;
		$voucher = 0;
		$diskon = 0;
		$totalBayar = 0;
		$totalSisaBayar = 0;
		
		if($datahistory['nominal_voucher'] != '' || $datahistory['nominal_voucher'] != NULL){
			$voucher = $datahistory['nominal_voucher'];
		}
		
		if($datahistory['diskon'] != '' || $datahistory['diskon'] != NULL){
			$diskon = $datahistory['diskon'];
		}
		
		if($dataSum['totaltransaksi'] != '' || $dataSum['totaltransaksi'] != NULL){
			$totalBayar = $dataSum['totaltransaksi'];
		}
		
		
		$totaldiskon = $datahistory['udp'] * $diskon / 100;
		$sisaBayar = $datahistory['udp'] - $totaldiskon - $voucher;
		
		$grandTotal = $sisaBayar - $totalBayar;
		$totalSisaBayar =  $grandTotal;
		if($grandTotal <= 0){
			$statusBayar = "LUNAS";
		}else{
			$statusBayar = "BELUM LUNAS";
		}
		
		
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
					<!-- SIDE BOX PROFILE -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img src="img/profile/universityprofile.jpg" alt="" />
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Nama Calon Siswa</b><br /> <?php echo $data['nama'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>NISN</b><br /> <?php echo $data['nisn'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Kode Daftar</b><br /> <?php echo $data['kd_unik_siswa'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Jenis Kelamin</b><br /> <?php echo $jenis_kelamin;?></p>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>TTL</b><br /> <?php echo $data['tanggal_lahir'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Telp</b><br /> <?php echo $data['telp'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Alamat</b><br /> <?php echo $data['alamat'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Nama orang tua</b><br /> <?php echo $data['nama_orangtua'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Tanggal Daftar</b><br /> <?php echo $data['tanggal_buat'];?></p>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Asal Sekolah</b><br /> <?php echo $data['nama_sekolah'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Jurusan Yg Dipilih</b><br /> <?php echo $data['jurusan'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					
					<!-- BOX TAB DETAIL -->
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Detail Siswa</a></li>
								<li><a href="#history"> History Siswa</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <!--<div class="row mg-b-15">-->
                                                    <!--<div class="col-lg-12">-->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="skill-title">
                                                                    <h2>Histori Pembayaran</h2>
																	
                                                                    <hr />
                                                                </div>
                                                            </div>															

                                                        </div>
														<div class="row">
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
																		<div class="basic-login-inner">
																			<h5>Status Pembayaran</h5>
																			<div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
																				<div class="social-edu-ctn">
																					<h6><?php echo $statusBayar; ?></h6>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
																		<div class="basic-login-inner">
																			<h5>Sisa Pembayaran</h5>
																			<div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
																				<div class="social-edu-ctn">
																					<h6><?php echo rupiah2($totalSisaBayar); ?></h6>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
																		<div class="basic-login-inner">
																			<h5>UDP</h5>
																			<div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
																				<div class="social-edu-ctn">
																					<h6><?php echo rupiah2($datahistory['udp']); ?></h6>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
																		<div class="basic-login-inner">
																			<h5>Diskon</h5>
																			<div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
																				<div class="social-edu-ctn">
																					<h6><?php echo $datahistory['diskon'].' %'; ?></h6>
																				</div>
																			</div>
																		</div>
																	</div>
																	
																	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
																		<div class="basic-login-inner">
																			<h5>Voucher</h5>
																			<div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
																				<div class="social-edu-ctn">
																					<h6><?php echo rupiah2($datahistory['nominal_voucher']); ?></h6>
																				</div>
																			</div>
																		</div>
																	</div>

                                                            
                                                        </div>
														<div class="row">
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">	
																		<div class="btn-group btn-custom-groups">
																			<!--<a href="?module=<?php echo $_GET['module'];?>&aksi=add">Tambah Pembayaran</a>-->
																			<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#ModalAdd">Tambah Pembayaran</a>
																		</div>
																	</div>
														</div>
                                                        <div class="sparkline13-graph">
															<div class="datatable-dashv1-list custom-datatable-overright">
																<div id="toolbar">
																	<select class="form-control dt-tb">
																		<option value="">Export Basic</option>
																		<option value="all">Export All</option>
																		<option value="selected">Export Selected</option>
																	</select>
																</div>
																<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" 
																data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
																	data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
																	<thead>
																		<tr>
																			<!--<th data-field="state" data-checkbox="true"></th>-->
																			<th data-field="no">No</th>
																			<th data-field="id">No Bayar</th>
																			<th data-field="bayar" data-editable="false">Jumlah Bayar</th>
																			<th data-field="date" data-editable="false">Tanggal bayar</th>
																			<th data-field="jurusan" data-editable="false">Keterangan</th>
																			<th data-field="action">Action</th>
																		</tr>
																	</thead>
																	<tbody>
																	<?php
																		$no = 0;
																		$query=mysqli_query($conn,"select * from transaksi_psb where kd_siswa = '$kd_siswa' and	status = 'A'
																									ORDER by tanggal_buat, no_bayar ASC");
																		while($row=mysqli_fetch_array($query)){
																		$no++;
																	?>
																	
																		<tr>
																			<!--<td></td>-->
																			<td><?php echo $no;?></td>
																			<td><?php echo $row['no_bayar'];?> </td>
																			<td><?php echo rupiah2(strval($row['jumlah_bayar']));?> </td>
																			<td><?php echo date("d F Y", strtotime($row['tanggal_buat']));?> </td>
																			<td><?php echo $row['ket'];?> </td>
																			<td>
																				<a href="#" class="btn btn-social-icon" title="Klik untuk mengubah data" data-toggle='modal' data-target='#modalEdit' data-id="<?php echo ($row[no_bayar]); ?>"><i class="fa fa-pencil-square-o"></i></a>
																				<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_bayar]);?>&kdsiswa=<?php echo ($row[kd_siswa]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
																			</td>
																		</tr>
																		
																	 <?php 
																		$tabletotal = $tabletotal + $row['jumlah_bayar'];
																	 } ?>
																		<tr>
																			<td colspan=2>TOTAL BAYAR</td>
																			<td colspan=4><?php echo rupiah2($tabletotal); ?></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
                                                    <!--</div>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<!-- PANEL HISTORY PEMBAYARAN -->
								<div class="product-tab-list tab-pane fade" id="history">
									<div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <!--<div class="row mg-b-15">-->
                                                    <!--<div class="col-lg-12">-->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="skill-title">
                                                                    <h2>Histori Perpindahan Jurusan Calon Siswa</h2>
                                                                </div>
                                                            </div>															

                                                        </div>
                                                        <div class="sparkline13-graph">
															<div class="datatable-dashv1-list custom-datatable-overright">
																<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" 
																data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
																	data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
																	<thead>
																		<tr>
																			<!--<th data-field="state" data-checkbox="true"></th>-->
																			<th data-field="no">No</th>
																			<th data-field="kd">Kode Daftar</th>
																			<th data-field="nama" data-editable="false">Nama</th>
																			<th data-field="nama" data-editable="false">Jurusan Sebelumnya</th>
																			<th data-field="date" data-editable="false">Tanggal Pindah</th>
																		</tr>
																	</thead>
																	<tbody>
																	<?php
																		$no = 0;
																		$queryHistory=mysqli_query($conn,"SELECT log_calonsiswa.kd_siswa, log_calonsiswa.kd_unik_siswa, log_calonsiswa.nama, m_jurusan.jurusan,
																											log_calonsiswa.tanggal_buat 
																											FROM log_calonsiswa
																											LEFT JOIN m_jurusan
																											ON log_calonsiswa.kd_jurusan =  m_jurusan.kd_jurusan
																											where log_calonsiswa.kd_siswa = '$kd_siswa'");
																		while($rowHistory=mysqli_fetch_array($queryHistory)){
																		$no++;
																	?>
																	
																		<tr>
																			<!--<td></td>-->
																			<td><?php echo $no;?></td>
																			<td><?php echo $rowHistory['kd_unik_siswa'];?> </td>
																			<td><?php echo $rowHistory['nama'];?> </td>
																			<td><?php echo $rowHistory['jurusan'];?> </td>
																			<td><?php echo date("d F Y", strtotime($rowHistory['tanggal_buat']));?> </td>
																		</tr>
																		
																	 <?php } ?>
																	</tbody>
																</table>
															</div>
														</div>
                                                    <!--</div>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
		
<?php }elseif($_GET['aksi'] == 'add'){
	//MODAL FORM TAMBAH DATA
	
}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN DATA
	include 'action_detail_siswa.php';
}elseif($_GET['aksi'] == 'editmodal'){
	//MODAL FORM EDIT DATA
	include 'modal_edit_calonsiswa.php';
}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT SIMPAN PERUBAHAN DATA
	include 'action_detail_siswa.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	include 'action_detail_siswa.php';
}

include 'modal_detail_siswa.php';
include 'modal_edit_detail.php';
include 'modal_delete_payment.php'; 


?>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script src="js/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#modalEdit').on('show.bs.modal', function (e) {
            var getDetail = $(e.relatedTarget).data('id');
			var base_url = window.location.origin;
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'POST',
                //url : './component/com_detailcalonsiswa/action_modal_edit.php',
				url : base_url+'/sekolah/component/com_detailcalonsiswa/action_modal_edit.php',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'getDetail='+ getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>
  
  