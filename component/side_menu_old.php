<nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
					
						<!-- SIDE MENU Dashboard -->
						<?php if ($_GET['module'] == 'dashboard') { ?>
                        <li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="index.php">
								   <span class="glyphicon glyphicon-home icon-wrap"></span>
								   <span class="mini-click-non">Tarter 2</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="?module=dashboard"><span class="mini-sub-pro">Dashboard</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Pegawai -->
						<?php if ($_GET['module'] == 'pegawai_all') { ?>
                        <li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-address-book-o icon-wrap"></span> <span class="mini-click-non">Pegawai</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Semua Pegawai" href="?module=pegawai_all&aksi"><span class="mini-sub-pro">Semua Pegawai</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Tahun Ajaran -->
						<?php if ($_GET['module'] == 'tapel_all') { ?>
                        <li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="glyphicon glyphicon-list-alt icon-wrap"></span> <span class="mini-click-non">Tahun Ajaran</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Tahun Ajaran" href="?module=tapel_all&aksi"><span class="mini-sub-pro">Semua Tahun Ajaran</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Jurusan -->
						<?php if ($_GET['module'] == 'jurusan') { ?>
                        <li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-building-o icon-wrap"></span> <span class="mini-click-non">Jurusan</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Jurusan" href="?module=jurusan&aksi"><span class="mini-sub-pro">Semua Jurusan</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Promo Diskon -->
						<?php if ($_GET['module'] == 'diskon') { ?>
                        <li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="glyphicon glyphicon-file icon-wrap"></span> <span class="mini-click-non">Promo Diskon</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Semua Promo Diskon" href="?module=diskon&aksi"><span class="mini-sub-pro">Semua Promo</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Voucher -->
						<li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-ticket edu-crop-tool icon-wrap"></span> <span class="mini-click-non">Voucher</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Semua Voucher" href="?module=under_construction"><span class="mini-sub-pro">Semua Voucher</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Voucher -->
						<?php if ($_GET['module'] == 'asal_sekolah') { ?>
                        <li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-institution icon-wrap"></span> <span class="mini-click-non">Sekolah (SMP)</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Schools" href="?module=asal_sekolah&aksi"><span class="mini-sub-pro">Semua Sekolah(SMP)</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Menu PSB -->
						<?php if ($_GET['module'] == 'calon_siswa') { ?>
						<li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-folder-open-o icon-wrap"></span> <span class="mini-click-non">PSB</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
								<li><a title="Jadwal Promosi" href="?module=under_construction"><span class="mini-sub-pro">Jadwal Promosi</span></a></li>
                                <li><a title="Semua Calon Siswa" href="?module=calon_siswa&aksi"><span class="mini-sub-pro">Semua Calon Siswa</span></a></li>
								<li><a title="History Pembayaran" href="?module=under_construction"><span class="mini-sub-pro">Pembayaran</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Menu Laporan PSB -->
						<?php if ($_GET['module'] == 'laporan_psb') { ?>
						<li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-file-text-o icon-wrap"></span> <span class="mini-click-non">Laporan PSB</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
								<li><a title="Laporan Pencapaian PSB" href="?module=under_construction"><span class="mini-sub-pro">Laporan Target PSB</span></a></li>
								<li><a title="Laporan Pembayaran" href="?module=under_construction"><span class="mini-sub-pro">Laporan Pembayaran</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Murid -->
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="fa fa-mortar-board icon-wrap"></span> <span class="mini-click-non">Murid</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Semua Murid" href="?module=under_construction"><span class="mini-sub-pro">All Students</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU LOGOUT -->
                        <li id="removable">
                            <a href="logout.php" class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-sign-out icon-wrap"></span> <span class="mini-click-non">Log Out</span></a>
                            <!--
							<ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a title="Log Out" href="logout.php"><span class="mini-sub-pro">Log out</span></a></li>
                            </ul>
							-->
                        </li>
                    </ul>
                </nav>