<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                                    <div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h5>Rekapitulasi Pendaftaran Calon Siswa</h5>
											<div class="sparkline13-list">
											<!-- QUERY TOTAL SISWA BERDASARKAN SPEKTRUM -->
											<?php
											
												$stylebox1 ="hpanel shadow-inner hbwhite bg-1 responsive-mg-b-30";
												$stylebox2 ="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30";
												$stylebox3 ="hpanel shadow-inner hbgblue bg-2 responsive-mg-b-30";
												$no = 0;
												$grandTotal=0;
												
												$querySiswaSpektrum=mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) as total, m_jurusan.kd_jurusan, 
																						m_spektrum.spektrum, m_spektrum.singkatan FROM calon_siswa
																						LEFT JOIN m_jurusan ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
																						LEFT JOIN m_spektrum ON m_jurusan.kd_spektrum = m_spektrum.kd_spektrum
																						WHERE calon_siswa.status ='Y'
																						GROUP BY m_spektrum.kd_spektrum");
												
												while($dataSiswaSpektrum=mysqli_fetch_array($querySiswaSpektrum)){
												$no++;
												
											?>
												
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
												<?php if($no == 1){?>
													<div class="hpanel shadow-inner hbwhite bg-1 responsive-mg-b-30">
												<?php } ?>
												<?php if($no == 2){?>
													<div class="hpanel shadow-inner hbwhgreen bg-1 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
												<?php } ?>
												<?php if($no == 3){?>
													<div class="hpanel shadow-inner hbwhpurple bg-1 responsive-mg-b-30">
												<?php } ?>
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3><?php echo "Total ".$dataSiswaSpektrum['singkatan']; ?></h3>
																<p class="text-big font-light">
																	<?php echo $dataSiswaSpektrum['total']; ?> Calon Siswa
																	<?php $grandTotal=$grandTotal+$dataSiswaSpektrum['total']; ?>
																</p>
																<small>
																			
																</small>
															</div>
														</div>
													</div>
												</div>
												
												<?php } ?>
												
												
												<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
													<div class="hpanel shadow-inner hbwhred bg-1 res-tablet-mg-t-30 dk-res-t-pro-30">
														<div class="panel-body">
															<div class="text-center content-bg-pro">
																<h3>Grand Total</h3>
																<p class="text-big font-light">
																	<?php echo $grandTotal; ?> Calon Siswa
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
        