<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                                    <div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h5>Rekapitulasi Pembayaran</h5>
											<div class="sparkline13-list">
											<!-- QUERY TOTAL SISWA BERDASARKAN SPEKTRUM -->
											<?php
											
												$stylebox1 ="hpanel shadow-inner hbwhite bg-1 responsive-mg-b-30";
												$stylebox2 ="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30";
												$stylebox3 ="hpanel shadow-inner hbgblue bg-2 responsive-mg-b-30";
												$no = 0;
												$grandTotal=0;
												$belumBayar = 0;
												$sudahBayar = 0;
												$lunasBayar = 0;
												
												$queryPayment=mysqli_query($conn,"SELECT calon_siswa.*, m_jurusan.udp, m_diskon.diskon, m_voucher.nominal_voucher,
																						transaksi_psb.kd_bayar, transaksi_psb.kd_siswa, transaksi_psb.no_bayar, 
																						SUM(m_jurusan.udp - m_voucher.nominal_voucher) as harus_bayar,
																						SUM(transaksi_psb.jumlah_bayar) as sudah_bayar,
																						SUM(m_jurusan.udp - m_voucher.nominal_voucher - transaksi_psb.jumlah_bayar) AS kurang_bayar
																						FROM calon_siswa
																						LEFT JOIN transaksi_psb ON calon_siswa.kd_siswa = transaksi_psb.kd_siswa
																						LEFT JOIN m_jurusan ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
																						LEFT JOIN m_diskon ON calon_siswa.kd_diskon = m_diskon.kd_diskon
																						LEFT JOIN m_voucher ON calon_siswa.kd_voucher = m_voucher.kd_voucher
																						WHERE calon_siswa.status = 'Y'
																						GROUP BY calon_siswa.kd_siswa");
												
												while($dataPayment=mysqli_fetch_array($queryPayment)){
												$no++;
												if($dataPayment['kurang_bayar'] == NULL ){
													$belumBayar = $belumBayar+1;
												}elseif($dataPayment['kurang_bayar'] > 0 ){
													$sudahBayar = $sudahBayar+1;
												}else{
													$lunasBayar = $lunasBayar+1;
												}
												
												
												} ?>
												
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbwhpurple bg-1 responsive-mg-b-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Bayar Formulir</h3>
																<p class="text-big font-light">
																	<?php echo $belumBayar; ?> Calon Siswa
																</p>
																<small>
																			
																</small>
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbwhred bg-1 res-tablet-mg-t-30 dk-res-t-pro-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Cicil UDP</h3>
																<p class="text-big font-light">
																	<?php echo $sudahBayar; ?> Calon Siswa
																</p>
																<small>
																			
																</small>
															</div>
														</div>
													</div>
												</div>
												
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbwhite bg-1 responsive-mg-b-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Sudah Lunas</h3>
																<p class="text-big font-light">
																	<?php echo $lunasBayar; ?> Calon Siswa
																</p>
																<small>
																			
																</small>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        