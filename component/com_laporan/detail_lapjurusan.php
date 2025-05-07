<!-- DETAIL JADWAL PSB -->
<?php
		$module = $_GET['module'];
		$kd_jurusan =  $_GET['id'];
		
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
                                    <h1>Detail Calon Siswa Berdasarkan Jurusan </h1>
									
                                </div>
                            </div>
							<div class="add-product">
								<a class="Primary mg-b-10" href="?module=<?php echo $_GET['module'];?>&aksi">Kembali</a>
							</div>
                            <div class="sparkline13-graph">
                                <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan_kunjungan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
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
                                                <th data-field="kodedaftar" data-editable="false">Kode Daftar</th>
												<th data-field="asalsekolah" data-editable="false">Jurusan</th>
                                                <th data-field="voucher" data-editable="false">Nama Siswa</th>
												<th data-field="date" data-editable="false">Tanggal Daftar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT calon_siswa.*, m_jurusan.jurusan
																		FROM calon_siswa
																		INNER JOIN m_jurusan
																		ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
																		where calon_siswa.kd_jurusan = '$kd_jurusan'
																		AND calon_siswa.status = 'Y'
																		ORDER BY kd_unik_siswa ASC");
											while($row=mysqli_fetch_array($query)){
											$no++;
										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
												<td><?php echo $row['kd_unik_siswa'];?> </td>
												<td><?php echo $row['jurusan'];?> </td>
                                                <td><?php echo $row['nama'];?> </td>
												<td><?php echo date("d F Y", strtotime($row['tanggal_buat']));?> </td>
                                            </tr>
											
										 <?php } ?>
                                        </tbody>
                                    </table>
								
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
<?php

?>