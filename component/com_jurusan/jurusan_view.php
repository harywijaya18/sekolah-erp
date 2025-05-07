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
                                    <h1>Jurusan <span class="table-project-n"></span> Table</h1>
									<div class="add-product">
										<a href="?module=<?php echo $_GET['module'];?>&aksi=add">Add Jurusan</a>
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
                                                <th data-field="jurusan" data-editable="false">Jurusan</th>
                                                <th data-field="singkatan" data-editable="false">Singkatan</th>
                                                <th data-field="prodi" data-editable="false">Program Studi</th>
												<th data-field="udp" data-editable="false">UDP</th>
												<th data-field="target" data-editable="false">Target</th>
												<th data-field="date" data-editable="false">Tahun Ajaran</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT m_jurusan.*, m_spektrum.*, m_tahun.*
																		FROM m_jurusan
																		LEFT JOIN m_tahun
																		ON m_jurusan.kd_tahun = m_tahun.kd_tahun
																		LEFT JOIN m_spektrum
																		ON m_jurusan.kd_spektrum = m_spektrum.kd_spektrum
																		ORDER BY m_jurusan.jurusan ASC");
											while($row=mysqli_fetch_array($query)){
											$no++;
										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row['jurusan'];?> </td>
                                                <td><?php echo $row['singkatan'];?> </td>
                                                <td><?php echo "Program ".strval($row['program_studi'])." Tahun";?> </td>
												<td><?php echo rupiah2(strval($row['udp']));?> </td>
												<td><?php echo strval($row['target_siswa']);?> </td>
												<td><?php echo $row['tahun'];?> </td>
                                                <td>
													<a href="?module=<?php echo $_GET['module'];?>&aksi=editmodal&id=<?php echo $row['kd_jurusan'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk mengubah data"><i class="fa fa-pencil-square-o"></i></a>
													<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_jurusan]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
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
	include 'modal_add_jurusan.php';
}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN DATA
	include 'action_jurusan.php';
}elseif($_GET['aksi'] == 'editmodal'){
	//MODAL FORM EDIT DATA
	include 'modal_edit_jurusan.php';
}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT ACTION
	include 'action_jurusan.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	include 'action_jurusan.php';
}

include 'modal_delete.php';
?>

