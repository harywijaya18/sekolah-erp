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
                                    <h1>Laporan <span class="table-project-n">Pembayaran PSB</span></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" 
									data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                                <th rowspan="2">No</th>
												<th data-editable="false" rowspan="2">Kode Daftar</th>
                                                <th data-editable="false" rowspan="2">Jurusan</th>
                                                <th data-editable="false" rowspan="2">Nama</th>
												<th data-editable="false" rowspan="2">JK</th>
												<th data-editable="false" rowspan="2">Asal Sekolah</th>
												<th data-editable="false" rowspan="2">Telp</th>
												<th data-editable="false" colspan="12">Cicilan UDP</th>
												<th data-editable="false" rowspan="2">Voucher</th>
												<th data-editable="false" rowspan="2">Jumlah Pembayaran</th>
												<th data-editable="false" colspan="3">UDP</th>
												<th data-editable="false" rowspan="2">Kekurangan UDP</th>
												<th data-editable="false" rowspan="2">Keterangan</th>
                                            </tr>
											<tr>
												<?php for ($i = 1; $i < 7; $i++){?>
												<th data-editable="false">Tgl</th>
												<th data-editable="false">Ke - <?php echo $i ?></th>
												<?php } ?>
												<th data-editable="false">Murni</th>
												<th data-editable="false">Disc</th>
												<th data-editable="false">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
											<?php
											$no = 0;
											$query=mysqli_query($conn,"SELECT calon_siswa.*, m_jurusan.*, m_sekolah.nama_sekolah,
																		m_voucher.nominal_voucher 
																		FROM calon_siswa
																		LEFT JOIN m_jurusan
																		ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
																		LEFT JOIN m_sekolah
																		ON calon_siswa.kd_sekolah = m_sekolah.kd_sekolah
																		LEFT JOIN m_voucher
                                                                        ON calon_siswa.kd_voucher = m_voucher.kd_voucher
                                                                        WHERE calon_siswa.status = 'Y'
																		ORDER BY calon_siswa.kd_unik_siswa ASC");
											while($row=mysqli_fetch_array($query)){
											$no++;
											?>
											
                                            <tr>
                                                <!--<td></td>-->
                                                <td><?php echo $no;?></td>
												<td><?php echo $row['kd_unik_siswa'];?></td>
                                                <td><?php echo $row['singkatan'];?></td>
                                                <td><?php echo $row['nama'];?></td>
												<td><?php echo $row['jenis_kelamin'];?></td>
												<td><?php echo $row['nama_sekolah'];?></td>
												<td><?php echo "'".$row['telp'];?></td>
												<?php
												$queryCicilan=mysqli_query($conn,"SELECT * from transaksi_psb where kd_siswa = '$row[kd_siswa]'");
												$numCicilan=mysqli_num_rows($queryCicilan);
												$hitung=0;
												$batas =6;
												$jmlbyr=0;
												$harusbayar=$row['udp'];
												$harusbayar=$harusbayar-$row['nominal_voucher'];
												if($numCicilan > 0) {
												while($rowCicilan=mysqli_fetch_array($queryCicilan)){ 
													$hitung++; 
													$jmlbyr=$jmlbyr+$rowCicilan['jumlah_bayar'];
													?>
													<td><?php echo date("d-m-Y", strtotime($rowCicilan['tanggal_buat']))?></td>
													<td><?php echo rupiah2(strval($rowCicilan['jumlah_bayar']));?></td>
												<?php }
													if($hitung=$numCicilan){ 
														for($x=$hitung; $x < $batas; $x++){?>
															<td> - </td>
															<td> - </td>													
												<?php }}
												}else{ ?>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<td> - </td>
													<?php }?>
												<td><?php echo rupiah2(strval($row['nominal_voucher']));?></td>
												<td><?php echo rupiah2(strval($jmlbyr)); ?></td>
												<td><?php echo rupiah2(strval($row['udp']));?></td>
												<td><?php echo "Rp. 0";?></td>
												<td><?php echo rupiah2(strval($harusbayar)); ?></td>
												<?php
													$kekurangan = $harusbayar-$jmlbyr;
												?>
												<td><?php echo rupiah2(strval($kekurangan)); ?></td>
												<?php
													if($kekurangan==0){
												?>
												<td><?php echo "LUNAS"; ?></td>
												<?php
													}else{
												?>
												<td><?php echo "BELUM LUNAS"; ?></td>
													<?php } ?>
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
	include 'detail_lapjurusan.php';
}



?>
