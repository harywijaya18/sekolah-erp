<?php
include 'config/conn.php';

if($_GET['aksi']=='') {
?>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> <span class="table-project-n">Pendaftar Online</span> Table</h1>
									<!--
									<div class="add-product">

										<a href="?module=<?php echo $_GET['module'];?>&aksi=add">Add Calon Siswa</a>
										
									</div>-->
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
									data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <!--<th data-field="state" data-checkbox="true"></th>-->
												<th data-field="action">Action</th>
                                                <th data-field="id">No</th>
                                                <th data-field="kd_unik" data-editable="false">Kode </th>
												<th data-field="date" data-editable="false">Tgl Daftar</th>
												<!--<th data-field="nisn" data-editable="false">NISN</th>-->
                                                <th data-field="name" data-editable="false">Nama Lengkap</th>
                                                <th data-field="jenis_kelamin" data-editable="false">L/P</th>
												<th data-field="asal_sekolah" data-editable="false">Asal Sekolah</th>
												<th data-field="tempat" data-editable="false">Tempat</th>
												<th data-field="tanngal_lahir" data-editable="false">Tanggal Lahir</th>
												<th data-field="nama_ortu" data-editable="false">Nama Orang Tua</th>
												<th data-field="alamat" data-editable="false">Alamat</th>
												<th data-field="telp" data-editable="false">Telp</th>
												<th data-field="prg_keah" data-editable="false">Program Keahlian</th>
												<th data-field="ket" data-editable="false">Ket</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$spanStyle = "";
											$query=mysqli_query($conn,"SELECT daftar_online.*, m_jurusan.jurusan, m_sekolah.nama_sekolah
																		FROM daftar_online
																		LEFT JOIN m_jurusan
																		ON daftar_online.kd_jurusan = m_jurusan.kd_jurusan
																		LEFT JOIN m_sekolah
																		ON daftar_online.kd_sekolah = m_sekolah.kd_sekolah
																		where daftar_online.status != 'M'
																		ORDER BY daftar_online.tanggal_buat DESC");	
											while($row=mysqli_fetch_array($query)){
											$no++;
											
											if($row['status'] == "N"){
												$spanStyle = "text-decoration: line-through red;text-decoration-thickness: 2px";
											}else{
												$spanStyle = "";
											}
										?>
										
                                            <tr style="background-color: #828181;">
                                                <!--<td></td>-->
												 <td>
													<?php
													$waContain = "";
													$waContain = "Assalamualaikum Wr. Wb.%0a
													Terima kasih sudah mendaftar online ke SMK Taruna Terpadu 2 (BORCESS). %0a
													kami dari panitia PPDB 2022, ingin menginfokan terkait dengan biaya pendaftaran,%0a
													saat ini anda masuk ke gelombang 1 (diskon 50%). %0a
													apakah anda sudah melakukan pembayaran?";
													
													?>
													
													<a class="btn btn-social-icon" target=”_blank” href="https://wa.me/+62<?php echo $row['telp'];  ?>?text=<?php echo $waContain; ?>">
														<div class="social-info">	
															<img class="img-socialmed" src="img/logo/walogomin.jpg"/>
															
														</div>
													
													</a>
													<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_siswa]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-ban"></i></a>
													<a href="?module=daftar_online&aksi=mutasi&id=<?php echo $row['kd_siswa'];?>" class="btn btn-social-icon" data-toggle="modal" title="Pindahkan pendaftar ke calon siswa"><i class="fa fa-retweet" aria-hidden="true"></i></a>
													<a href="?module=daftar_online&aksi=edit&id=<?php echo $row['kd_siswa'];?>" class="btn btn-social-icon" data-toggle="modal" title="Edit Data Calon Pendaftar"><i class="fa fa-edit" aria-hidden="true"></i></a>
													<!--
													<a href="?module=<?php echo $_GET['module'];?>&aksi=editmodal&id=<?php echo $row['kd_siswa'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk mengubah data"><i class="fa fa-pencil-square-o"></i></a>
													
													<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_siswa]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
													-->
												</td>
                                                <td><?php echo $no;?></td>
                                                <td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['kd_unik_siswa'];?></span> </td>
                                                <td><span style="<?php echo $spanStyle; ?>;"><?php echo date("d-m-Y", strtotime($row['tanggal_buat']));?></span> </td>
												<!--<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['nisn'];?></span> </td>-->
                                                <td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['nama'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['jenis_kelamin'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['nama_sekolah'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['tempat'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['tanggal_lahir'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['nama_orangtua'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['alamat'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['telp'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['jurusan'];?></span> </td>
												<td><span style="<?php echo $spanStyle; ?>;"><?php echo $row['keterangan'];?></span> </td>
                                               
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
        </div>
		
<?php

}elseif($_GET['aksi'] == 'mutasi'){
	//MODAL FORM EDIT DATA
	include 'modal_edit_mutasi.php';
}elseif($_GET['aksi'] == 'edit'){
	//MODAL FORM EDIT DATA
	include 'modal_edit.php';
}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN PERUBAHAN DATA
	include 'action_daftaronline.php';
}elseif($_GET['aksi'] == 'update'){
	//SCRIPT SIMPAN PERUBAHAN DATA
	include 'action_daftaronline.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	include 'action_daftaronline.php';
}

//include 'modal_add_calonsiswa.php';
include 'modal_delete_online.php';

?>
