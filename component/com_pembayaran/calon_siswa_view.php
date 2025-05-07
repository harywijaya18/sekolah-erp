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
                                    <h1>Calon <span class="table-project-n">Siswa</span> Table</h1>
									<div class="add-product">
										<!--
										<a href="?module=<?php echo $_GET['module'];?>&aksi=add">Add Pegawai</a>
										-->
										<a href="?module=<?php echo $_GET['module'];?>&aksi=add">Add Calon Siswa</a>
										<!--
										<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ModalAdd">Add Calon Siswa</a>
										-->
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
									data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                                <th data-field="id">No</th>
                                                <th data-field="kd_unik" data-editable="false">Kode </th>
												<th data-field="date" data-editable="false">Tgl Daftar</th>
												<th data-field="nisn" data-editable="false">NISN</th>
                                                <th data-field="name" data-editable="false">Nama Lengkap</th>
                                                <th data-field="jenis_kelamin" data-editable="false">L/P</th>
												<th data-field="asal_sekolah" data-editable="false">Asal Sekolah</th>
												<th data-field="tempat" data-editable="false">Tempat</th>
												<th data-field="tanngal_lahir" data-editable="false">Tanggal Lahir</th>
												<th data-field="nama_ortu" data-editable="false">Nama Orang Tua</th>
												<th data-field="alamat" data-editable="false">Alamat</th>
												<th data-field="telp" data-editable="false">Telp</th>
												<th data-field="prg_keah" data-editable="false">Program Keahlian</th>
												<th data-field="udp" data-editable="false">UDP</th>
												<th data-field="keterangan" data-editable="false">Keterangan</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT calon_siswa.kd_siswa, calon_siswa.kd_unik_siswa, calon_siswa.tanggal_buat, calon_siswa.nisn,
																		calon_siswa.nama, calon_siswa.jenis_kelamin, calon_siswa.tempat, calon_siswa.tanggal_lahir, 
																		calon_siswa.nama_orangtua, calon_siswa.alamat, calon_siswa.telp, calon_siswa.kd_sekolah, 
																		m_sekolah.nama_sekolah, calon_siswa.kd_jurusan, m_jurusan.jurusan, m_jurusan.singkatan, 
																		m_jurusan.program_studi, m_jurusan.udp, calon_siswa.kd_voucher, calon_siswa.kd_diskon, calon_siswa.keterangan 
																		FROM calon_siswa INNER JOIN m_sekolah ON calon_siswa.kd_sekolah = m_sekolah.kd_sekolah
																		INNER JOIN m_jurusan ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
																		ORDER BY tanggal_buat desc");
											while($row=mysqli_fetch_array($query)){
											$no++;
										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row['kd_unik_siswa'];?> </td>
                                                <td><?php echo $row['tanggal_buat'];?> </td>
												<td><?php echo $row['nisn'];?> </td>
                                                <td><?php echo $row['nama'];?> </td>
												<td><?php echo $row['jenis_kelamin'];?> </td>
												<td><?php echo $row['nama_sekolah'];?> </td>
												<td><?php echo $row['tempat'];?> </td>
												<td><?php echo $row['tanggal_lahir'];?> </td>
												<td><?php echo $row['nama_orangtua'];?> </td>
												<td><?php echo $row['alamat'];?> </td>
												<td><?php echo $row['telp'];?> </td>
												<td><?php echo $row['jurusan'];?> </td>
												<td><?php echo rupiah2(strval($row['udp']));?> </td>
												<td><?php echo $row['keterangan'];?> </td>
                                                <td>
													<a href="?module=<?php echo $_GET['module'];?>&aksi=editmodal&id=<?php echo $row['kd_siswa'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk mengubah data"><i class="fa fa-pencil-square-o"></i></a>
													
													<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_siswa]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
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
        </div>
		
<?php

}elseif($_GET['aksi'] == 'add'){
	//MODAL FORM TAMBAH DATA
	include 'modal_add_calonsiswa_n.php';
}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN DATA
	include 'action_calonsiswa.php';
}elseif($_GET['aksi'] == 'editmodal'){
	//MODAL FORM EDIT DATA
	include 'modal_edit_calonsiswa.php';
}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT SIMPAN PERUBAHAN DATA
	include 'action_calonsiswa.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	include 'action_calonsiswa.php';
}

//include 'modal_add_calonsiswa.php';
include 'modal_delete_calonsiswa.php';

?>
