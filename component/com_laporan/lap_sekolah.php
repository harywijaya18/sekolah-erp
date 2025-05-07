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
                                    <h1>Laporan <span class="table-project-n">Jumlah Calon Siswa</span> Berdasarkan Sekolah Asal</h1>
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
                                                <th data-field="nip" data-editable="false">SMP / MTS</th>
                                                <th data-field="singkatan" data-editable="false">Jumlah Siswa</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_sekolah) as total, m_sekolah.kd_sekolah, m_sekolah.nama_sekolah, calon_siswa.nama 
																			FROM calon_siswa INNER JOIN m_sekolah 
																			ON calon_siswa.kd_sekolah = m_sekolah.kd_sekolah 
																			WHERE calon_siswa.status = 'Y' GROUP BY calon_siswa.kd_sekolah
																			ORDER BY m_sekolah.nama_sekolah ASC");
											while($row=mysqli_fetch_array($query)){
											$no++;
										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row['nama_sekolah'];?> </td>
                                                <td><?php echo $row['total'];?> </td>
                                                <td>
													<a href="?module=<?php echo $_GET['module'];?>&aksi=detail&id=<?php echo $row['kd_sekolah'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk detail data"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"> Detail </i></a>
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

}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN DATA
	//include 'action_jadwalpsb.php';
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
	include 'detail_lapsekolah.php';
}



?>
