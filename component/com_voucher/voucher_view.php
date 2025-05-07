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
                                    <h1>Voucher <span class="table-project-n"></span> Table</h1>
									<div class="add-product">
										<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ModalAdd">Tambah Voucher</a>
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
                                                <th data-field="voucher" data-editable="false">Voucher</th>
                                                <th data-field="nominal" data-editable="false">Nominal</th>
												<th data-field="stok" data-editable="false">Stok</th>
												<th data-field="datestart" data-editable="false">Tanggal Awal</th>
												<th data-field="dateend" data-editable="false">Tanggal Akhir</th>
												<th data-field="ket" data-editable="false">Ket</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT * FROM m_voucher ORDER BY tanggal_buat asc");
											while($row=mysqli_fetch_array($query)){
                                            $no++;
                                            
                                            $queryCek=mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) as total FROM calon_siswa
                                                                    where kd_voucher ='$row[kd_voucher]' and status ='Y'");
                                            $cekVoucher = mysqli_fetch_array($queryCek);

										?>
										
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row['voucher'];?> </td>
                                                <td><?php echo "Rp." .rupiah($row['nominal_voucher']);?> </td>
												<td><?php echo $row['stok_voucher'];?> </td>
												<td><?php echo $row['tanggal_awal'];?> </td>
												<td><?php echo $row['tanggal_akhir'];?> </td>
												<td><?php echo $row['keterangan'];?> </td>
                                                <td>
                                                <a href="#" class="btn btn-social-icon" title="Klik untuk mengubah data" data-toggle='modal' data-target='#modalEdit' data-id="<?php echo ($row[kd_voucher]); ?>"><i class="fa fa-pencil-square-o"></i></a>
													<?php if($cekVoucher['total'] > 0) {?>
                                                        <a href="#" class="btn btn-social-icon" data-toggle="modal" title="Voucher Sudah Digunakan, tidak bisa dihapus"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"> <div class="info-voucher-used">Voucher digunakan  </div> <div class="info-voucher-used"><?php echo $cekVoucher['total']; ?></div></i></a>
                                                    <?php } else { ?>
                                                        <a onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo ($row[kd_voucher]);?>');" class="btn btn-social-icon" data-toggle="modal" title="Klik untuk menghapus" ><i class="fa fa-trash"></i></a>
                                                        <div class="info-voucher-notused" title="Voucher Belum digunakan">Voucher Belum digunakan</div>
                                                    <?php } ?>
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
	include 'action_voucher.php';
}elseif($_GET['aksi'] == 'editmodal'){
	//MODAL FORM EDIT DATA
	//include 'modal_edit_jurusan.php';
}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT ACTION
	include 'action_voucher.php';
}elseif($_GET['aksi'] == 'hapus'){
	//SCRIPT ACTION
	include 'action_voucher.php';
}

include 'modal_add_voucher.php';
include 'modal_delete.php';
include 'modal_edit_voucher.php';
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
				url : base_url+'/sekolah/component/com_voucher/action_modal_edit.php',
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