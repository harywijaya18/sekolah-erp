<div id="ModalAddDetail" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Form Tambah Data Promosi Ke Sekolah</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
									<form action="?module=<?php echo $_GET['module'];?>&aksi=simpan_detail" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                    <div class="modal-body">            
											<div class="form-group">
												<input type="hidden"  class="form-control" name="kd_jadwal" value="<?php echo $_GET['id'];?>"  />
												<select required name="kd_sekolah" id="kdsekolah" class="chosen-select" tabindex="-1">
													<option value="">- Pilih Sekolah -</option>
													<?php
													$query  = mysqli_query($conn,"SELECT * FROM m_sekolah WHERE status='on' AND selected != 'Y' ORDER BY nama_sekolah ASC");
													while($r=mysqli_fetch_array($query)){
													echo "<option value=\"$r[kd_sekolah]\">$r[nama_sekolah]</option>";
													}
													?>
												</select>
                                            </div>
											
											<div class="form-group">
												<select required name="jam" id="jam" class="chosen-select" tabindex="-1">
													<option value="">- Pilih Jam -</option>
													<?php
														 for($i=7; $i < 18; $i++){
														?>
														<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
														 <?php }
													?>
												</select>
                                            </div>
											
											<div class="form-group">
												<input name="jumlah_kelas" id="jmlkelas" type="text" class="form-control" placeholder="Jumlah Kelas" autocomplete="off">
                                            </div>
											
											<div class="form-group">
												<input name="ket" id="ket" type="text" class="form-control" placeholder="Keterangan" autocomplete="off">
                                            </div>
                                                            
                                    </div>
                                    <div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Batal</button>
										<button type="submit" class="btn btn-primary"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Simpan</button>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>					