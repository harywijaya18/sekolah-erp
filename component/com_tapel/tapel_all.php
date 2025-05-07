<?php
include 'config/conn.php';

if($_GET['aksi']=='') {
?>

<?php if(@$_SESSION['m'] == 'S'){ ?>
        <script>
            successAlert('Berhasil Menambahkan Tahun Ajaran');
        </script>
<?php
}elseif(@$_SESSION['m'] == 'D'){ ?>
    <script>
            successAlert('Berhasil Menonaktifkan Tahun Ajaran');
    </script>
<?php } 
    // <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    unset($_SESSION['m']); 
?>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Tahun <span class="table-project-n">Ajaran</span> Table</h1>
									<div class="add-product">
										<!--
										<a href="?module=<?php echo $_GET['module'];?>&aksi=add">Add Tahun Ajaran</a>
										-->
										<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ModalAdd">Tambah Tahun Ajaran</a>
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
                                                <th data-field="id">ID</th>
                                                <th data-field="name" >Tahun Ajaran</th>
                                                <th data-field="date" >Tanggal Buat</th>
                                                <th data-field="status" >Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT * FROM m_tahun ORDER BY tahun asc");
											while($row=mysqli_fetch_array($query)){
											$no++;
										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
                                                <?php if($row['status'] == 'Y') { ?>
                                                <td><?php echo $row['tahun'];?></td>
                                                <td><?php echo $row['tanggal_buat'];?> </td>
                                                <td><?php echo $row['status'];?> </td>
                                                <?php } else { ?>
                                                <td><span style="text-decoration: line-through red;"><?php echo $row['tahun'];?></span></td>
                                                <td><span style="text-decoration: line-through red;"><?php echo $row['tanggal_buat'];?> </span></td>
                                                <td><?php echo $row['status'];?> </td>
                                                <?php } ?>
                                                <td>
													<a href="#editModal" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk mengubah data" data-id="<?php echo $r['kd_jurusan']."-".$r['kelas'];?>"><i class="fa fa-pencil-square-o"></i></a>
													<!--
													<a href="#modal_delete" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo $row[kd_tahun];?>');"><i class="fa fa-trash"></i></a>
													-->
													<a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_tahun]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
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
	include 'modal_add_tapel.php';
}elseif($_GET['aksi'] == 'simpan'){
	//SCRIPT SIMPAN DATA
	include 'action_tapel.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	include 'action_tapel.php';
}

include 'modal_add_tapel_new.php';
include 'modal_delete_new.php';
//include 'modal_delete.php';
?>

