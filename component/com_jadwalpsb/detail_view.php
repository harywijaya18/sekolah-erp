<!-- DETAIL JADWAL PSB -->
<?php
		$module = $_GET['module'];
		$kd_jadwal =  $_GET['id'];
		$queryDATA=mysqli_query($conn,"SELECT * FROM jadwal_psb where kd_jadwal = '$kd_jadwal'");
		$hasilDATA=mysqli_fetch_array($queryDATA);
		
?>
 
 <style type="text/css">
	.tombol-kembali{
		float: right;
		position: absolute;
		top: 20px;
		right: 200px;
		padding: 6px 20px;
		border-radius: 4px;
		color: #9e9e9e;
		background-color: #d7dad5;
		border-color: #e20909;
		touch-action: manipulation;
		cursor: pointer;
		background-image: none;
		border: 1px solid;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
	}		
 </style>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Detail Jadwal Promosi PSB <span class="table-project-n"> - Tanggal Promosi : <?php echo date("d F Y", strtotime($hasilDATA['tanggal_jadwal'])); ?></span> </h1>
									
                                </div>
                            </div>
							<div class="add-product">
								<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ModalAddDetail">Tambah Jadwal</a>
							</div>
							<div class="tombol-kembali">
								<a class="Primary mg-b-10" href="?module=<?php echo $_GET['module'];?>&aksi">Kembali</a>
							</div>
                            <div class="sparkline13-graph">
                                <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan_kunjungan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
								<input type="hidden"  class="form-control" name="kd_jadwal" value="<?php echo $_GET['id'];?>"  />
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
                                                <th data-field="date" data-editable="false">Tanggal</th>
                                                <th data-field="voucher" data-editable="false">Sekolah</th>
												<th data-field="stok" data-editable="false">Kelas</th>
												<th data-field="jam" data-editable="false">Jam</th>
												<th data-field="ket" data-editable="false">Keterangan</th>
												<th data-field="kunjungan" data-editable="false">Kunjungan</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT jadwalpsb_detail.*, jadwal_psb.kd_jadwal, jadwal_psb.tanggal_jadwal, m_sekolah.nama_sekolah
																		FROM jadwalpsb_detail 
																		LEFT JOIN jadwal_psb ON jadwalpsb_detail.kd_jadwal = jadwal_psb.kd_jadwal
																		LEFT JOIN m_sekolah ON jadwalpsb_detail.kd_sekolah = m_sekolah.kd_sekolah
																		where jadwalpsb_detail.kd_jadwal = '$kd_jadwal'");
											while($row=mysqli_fetch_array($query)){
											$no++;
										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
                                                <td><?php echo date("d F Y", strtotime($row['tanggal_jadwal']));?> </td>
                                                <td><?php echo $row['nama_sekolah'];?> </td>
												<td><?php echo $row['jumlah_kelas'];?> </td>
												<td><?php echo $row['jam'];?> </td>
												<td><?php echo $row['keterangan'];?> </td>
												<td>
													<?php if($row['status'] != 'Y'){ ?>
													<input type="checkbox" name="kunjungan[]" value=<?php echo $row['kd_sekolah']?> title="Ceklis ketika sekolah ini selesai dikunjungi">
													Belum Dikunjungi
													<?php }else{ ?>
													<input type="checkbox" name="kunjungan[]" value=<?php echo $row['kd_sekolah']?> title="Ceklis ketika sekolah ini selesai dikunjungi" checked>
													Sudah Dikunjungi
													<?php } ?>
												</td>
                                                <td>
													<a href="?module=<?php echo $_GET['module'];?>&aksi=editmodal&id=<?php echo $row['kd_jadwal'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk mengubah data"><i class="fa fa-pencil-square-o"></i></a>
													<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_voucher]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
												</td>
                                            </tr>
											
										 <?php } ?>
                                        </tbody>
                                    </table>
								
                                </div>
								<div class="modal-footer">
									 <button type="submit" class="btn btn-success btn-sm" title="Pilih Ceklis diatas untuk menyimpan sekolah yang sudah dikunjungi">Simpan sekolah yang sudah dikunjungi</button>
								</div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
<?php
include 'modal_detail.php';

?>