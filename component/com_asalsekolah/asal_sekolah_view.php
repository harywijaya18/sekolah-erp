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
                                    <h1>Asal <span class="table-project-n">Sekolah (SMP)</span> Table</h1>
									<div class="add-product">
										<a href="?module=<?php echo $_GET['module'];?>&aksi=add">Add Sekolah Asal</a>
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
                                                <th data-field="namasekolah" data-editable="false">Nama Sekolah</th>
												<th data-field="npsnsekolah" data-editable="false">NPSN</th>
                                                <th data-field="singkatan" data-editable="false">Singkatan</th>
                                                <th data-field="alamatsekolah" data-editable="false">Alamat Sekolah</th>
												<th data-field="date" data-editable="false">Tanggal Buat</th>
												<th data-field="status" data-editable="false">Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT * FROM m_sekolah ORDER BY nama_sekolah asc");
											while($row=mysqli_fetch_array($query)){
											$no++;
										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row['nama_sekolah'];?> </td>
												<td><?php echo $row['npsn'];?> </td>
                                                <td><?php echo $row['singkatan'];?> </td>
                                                <td><?php echo $row['alamat_sekolah'];?> </td>
												<td><?php echo $row['tanggal_buat'];?> </td>
												<td><?php echo $row['status'];?> </td>
                                                <td>
													<a href="?module=<?php echo $_GET['module'];?>&aksi=editmodal&id=<?php echo $row['kd_sekolah'];?>" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk mengubah data"><i class="fa fa-pencil-square-o"></i></a>
													<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_sekolah]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
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
	include 'modal_add_sekolah.php';
}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN DATA
	include 'action_sekolah.php';
}elseif($_GET['aksi'] == 'editmodal'){
	//SCRIPT UBAH DATA
	include 'modal_edit_sekolah.php';
}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT SIMPAN PERUBAHAN DATA
	include 'action_sekolah.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	include 'action_sekolah.php';
}

include 'modal_delete.php';
?>

