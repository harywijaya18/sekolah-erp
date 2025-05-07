<?php
include 'config/conn.php';
include 'lib/tanggal.php';

if($_GET['aksi']=='') {
	
   $tanggal = date("Y-m-d");
?>

<!-- AREA BOX INFO PROMOSI -->
<div class="analytics-sparkle-area">
	<div class="container-fluid">
		<div class="row">
			
				
			<?php
				
				$queryYesterday=mysqli_query($conn,"SELECT * FROM `jadwal_psb` WHERE tanggal_jadwal < '$tanggal' ORDER BY tanggal_jadwal desc LIMIT 1");
				$rowYesterday=mysqli_num_rows($queryYesterday);
				$kd_jadwalYesterday ="";
			?>
			<!-- PROMOSI SELANJUTNYA -->
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="analytics-sparkle-line reso-mg-b-30">
					<div class="analytics-content">
						<h5>Promosi Sebelumnya</h5>
						<?php
						if($rowYesterday > 0){
						while($rowYesterday=mysqli_fetch_array($queryYesterday)){
						$no++;
						$kd_jadwalYesterday = $rowYesterday['kd_jadwal'];
						?>
						<h6><span></span>  <span><?php echo hariString(date("D", strtotime($rowYesterday['tanggal_jadwal'])));?>, <?php echo date("d F Y", strtotime($rowYesterday['tanggal_jadwal']));?></span></h6>
						<?php } ?>
						<?php
							$queryDataYesterday=mysqli_query($conn,"SELECT jadwalpsb_detail.*, jadwal_psb.kd_jadwal, jadwal_psb.tanggal_jadwal, m_sekolah.nama_sekolah
																		FROM jadwalpsb_detail 
																		LEFT JOIN jadwal_psb ON jadwalpsb_detail.kd_jadwal = jadwal_psb.kd_jadwal
																		LEFT JOIN m_sekolah ON jadwalpsb_detail.kd_sekolah = m_sekolah.kd_sekolah
																		where jadwalpsb_detail.kd_jadwal = '$kd_jadwalYesterday'");
							$rowDataYesterday=mysqli_num_rows($queryDataYesterday);
							while($rowDataYesterday=mysqli_fetch_array($queryDataYesterday)){
						?>
						<h6><span><?php echo $rowDataYesterday['nama_sekolah']; ?></span> - jam <?php echo $rowDataYesterday['jam']; ?> - <span><?php echo $rowDataYesterday['jumlah_kelas']; ?> kelas</span></h6>
						<?php } }else{	?>
						<h6><span>Tanggal</span> - <span></span></h6>
						<h6><span>Tidak Ada Jadwal</span> - <span></span></h6>
						<h6><span></span> - <span></span></h6>
						<h6><span></span> - <span></span></h6>
						<?php } ?>
					</div>
				</div>
			</div>
			
			
			
			<?php
				
				$queryToday=mysqli_query($conn,"SELECT * FROM jadwal_psb where tanggal_jadwal = '$tanggal' ORDER BY tanggal_jadwal desc");
				$rowToday=mysqli_num_rows($queryToday);
				$kd_jadwalToday ="";
			?>
			<!-- PROMOSI HARI INI -->
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="analytics-sparkle-line reso-mg-b-30">
					<div class="analytics-content">
						<h5>Promosi Hari ini</h5>
						<?php
						if($rowToday > 0){
						while($rowToday=mysqli_fetch_array($queryToday)){
						$no++;
						$kd_jadwalToday = $rowToday['kd_jadwal'];
						?>
						<h6><span></span>  <span><?php echo hariString(date("D", strtotime($rowToday['tanggal_jadwal'])));?>, <?php echo date("d F Y", strtotime($rowToday['tanggal_jadwal']));?></span></h6>
						<?php } ?>
						<?php
							$queryDataToday=mysqli_query($conn,"SELECT jadwalpsb_detail.*, jadwal_psb.kd_jadwal, jadwal_psb.tanggal_jadwal, m_sekolah.nama_sekolah
																		FROM jadwalpsb_detail 
																		LEFT JOIN jadwal_psb ON jadwalpsb_detail.kd_jadwal = jadwal_psb.kd_jadwal
																		LEFT JOIN m_sekolah ON jadwalpsb_detail.kd_sekolah = m_sekolah.kd_sekolah
																		where jadwalpsb_detail.kd_jadwal = '$kd_jadwalToday'");
							$rowDataToday=mysqli_num_rows($queryDataToday);
							while($rowDataToday=mysqli_fetch_array($queryDataToday)){
						?>
						<h6><span><?php echo $rowDataToday['nama_sekolah']; ?></span> - jam <?php echo $rowDataToday['jam']; ?> - <span><?php echo $rowDataToday['jumlah_kelas']; ?> kelas</span></h6>
						<?php } }else{	?>
						<h6><span></span> - <span></span></h6>
						<h6><span>Tidak Ada Jadwal</span> - <span></span></h6>
						<h6><span></span> - <span></span></h6>
						<h6><span></span> - <span></span></h6>
						<?php } ?>
					</div>
				</div>
			</div>
			
			
			<?php
				
				$queryTommorow=mysqli_query($conn,"SELECT * FROM `jadwal_psb` WHERE tanggal_jadwal > '$tanggal' ORDER BY tanggal_jadwal ASC LIMIT 1");
				$rowTommorow=mysqli_num_rows($queryTommorow);
				$kd_jadwalTommorow ="";
			?>
			<!-- PROMOSI SELANJUTNYA -->
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="analytics-sparkle-line reso-mg-b-30">
					<div class="analytics-content">
						<h5>Promosi Selanjutnya</h5>
						<?php
						if($rowTommorow > 0){
						while($rowTommorow=mysqli_fetch_array($queryTommorow)){
						$no++;
						$kd_jadwalTommorow = $rowTommorow['kd_jadwal'];
						?>
						<h6><span></span>  <span><?php echo hariString(date("D", strtotime($rowTommorow['tanggal_jadwal'])));?>, <?php echo date("d F Y", strtotime($rowTommorow['tanggal_jadwal']));?></span></h6>
						<?php } ?>
						<?php
							$queryDataTommorow=mysqli_query($conn,"SELECT jadwalpsb_detail.*, jadwal_psb.kd_jadwal, jadwal_psb.tanggal_jadwal, m_sekolah.nama_sekolah
																		FROM jadwalpsb_detail 
																		LEFT JOIN jadwal_psb ON jadwalpsb_detail.kd_jadwal = jadwal_psb.kd_jadwal
																		LEFT JOIN m_sekolah ON jadwalpsb_detail.kd_sekolah = m_sekolah.kd_sekolah
																		where jadwalpsb_detail.kd_jadwal = '$kd_jadwalTommorow'");
							$rowDataTommorow=mysqli_num_rows($queryDataTommorow);
							while($rowDataTommorow=mysqli_fetch_array($queryDataTommorow)){
						?>
						<h6><span><?php echo $rowDataTommorow['nama_sekolah']; ?></span> - jam <?php echo $rowDataTommorow['jam']; ?> - <span><?php echo $rowDataTommorow['jumlah_kelas']; ?> kelas</span></h6>
						<?php } }else{	?>
						<h6><span>Tanggal</span> - <span></span></h6>
						<h6><span>Tidak Ada Jadwal</span> - <span></span></h6>
						<h6><span></span> - <span></span></h6>
						<h6><span></span> - <span></span></h6>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</br>
<!-- AREA TABLE VIEW -->
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Jadwal Promosi</a></li>
                                <li><a href="#reviews"> Rekap Kunjungan </a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="sparkline13-list">
												<div class="sparkline13-hd">
													<div class="main-sparkline13-hd">
														<h1>Jadwal PSB <span class="table-project-n"></span> Table</h1>
														<div class="add-product">
															<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ModalAdd">Tambah Jadwal</a>
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
																	<th data-field="id">No</th>
																	<th data-field="voucher" data-editable="false">Tanggal</th>
																	<th data-field="nominal" data-editable="false">Jumlah Sekolah</th>
																	<th data-field="stok" data-editable="false">Status</th>
																	<th data-field="ket" data-editable="false">Ket</th>
																	<th data-field="action">Action</th>
																</tr>
															</thead>
															<tbody>
															<?php
																$no = 0;
																$query=mysqli_query($conn,"SELECT jadwal_psb.*, COUNT(jadwalpsb_detail.kd_jadwal) AS jumlah_sekolah
																							FROM jadwal_psb
																							LEFT JOIN jadwalpsb_detail ON jadwal_psb.kd_jadwal = jadwalpsb_detail.kd_jadwal
																							GROUP BY jadwal_psb.kd_jadwal ORDER BY tanggal_jadwal desc");
																while($row=mysqli_fetch_array($query)){
																$no++;
															?>
															
																<tr>
																	<!--<td></td>-->
																	<td><?php echo $no;?></td>
																	<td><?php echo date("d F Y", strtotime($row['tanggal_jadwal']));?> </td>
																	<td><?php echo $row['jumlah_sekolah'];?> Sekolah</td>
																	<td><?php echo $row['status'];?> </td>
																	<td><?php echo $row['keterangan'];?> </td>
																	<td>
																		<a href="?module=<?php echo $_GET['module'];?>&aksi=detail&id=<?php echo $row['kd_jadwal'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk detail data Promosi"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i></a>
																		<a href="?module=<?php echo $_GET['module'];?>&aksi=editmodal&id=<?php echo $row['kd_jadwal'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk mengubah data"><i class="fa fa-pencil-square-o"></i></a>
																		<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_jadwal]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
																	</td>
																</tr>
																
															 <?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
                                </div>
								
								<?php
									$queryTotalSekolah=mysqli_query($conn,"SELECT COUNT(kd_sekolah) as total_sekolah FROM m_sekolah");
									$dataTotalSekolah=mysqli_fetch_array($queryTotalSekolah);
									
									$queryTotalKunjungan=mysqli_query($conn,"SELECT COUNT(kd_sekolah) as total_sekolah FROM m_sekolah WHERE selected='Y'");
									$dataTotalKunjungan=mysqli_fetch_array($queryTotalKunjungan);
									
									$querySudahKunjungan=mysqli_query($conn,"SELECT COUNT(kd_sekolah) as total_sekolah FROM jadwalpsb_detail WHERE status='Y'");
									$dataSudahKunjungan=mysqli_fetch_array($querySudahKunjungan);
								?>
								
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="sparkline13-list">
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbggreen bg-1 responsive-mg-b-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Total Sekolah SMP/MTS</h3>
																<p class="text-big font-light">
																	<?php echo $dataTotalSekolah['total_sekolah']; ?> Sekolah
																</p>
																<small>
																			
																</small>
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Sekolah Terjadwal</h3>
																<p class="text-big font-light">
																	<?php echo $dataTotalKunjungan['total_sekolah']; ?> Sekolah
																</p>
																<small>
																			
																</small>
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbgblue bg-2 responsive-mg-b-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Total Sudah Dikunjungi</h3>
																<p class="text-big font-light">
																	<?php echo $dataSudahKunjungan['total_sekolah']; ?> Sekolah
																</p>
																<small>
																			
																</small>
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbgred bg-4 res-tablet-mg-t-30 dk-res-t-pro-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Belum Dikunjungi</h3>
																<p class="text-big font-light">
																	Sekolah
																</p>
																<small>
																			
																</small>
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
                </div>
            </div>
        </div>
		
<?php

}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN DATA
	include 'action_jadwalpsb.php';
}elseif($_GET['aksi'] == 'editmodal'){
	//MODAL FORM EDIT DATA
	//include 'modal_edit_jurusan.php';
}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT ACTION
	//include 'action_jurusan.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	//include 'action_jadwalpsb.php';
}elseif($_GET['aksi'] == 'detail'){
	include 'detail_view.php';
}elseif($_GET['aksi'] == 'simpan_detail'){
	include 'action_jadwalpsb.php';
}elseif($_GET['aksi'] == 'simpan_kunjungan'){
	include 'action_jadwalpsb.php';
}

include 'modal_add_jadwalpsb.php';
include 'modal_delete.php';

?>

