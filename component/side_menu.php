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
						<?php if ($_GET['module'] == 'pegawai_all' ||  $_GET['module'] == 'tapel_all' || $_GET['module'] == 'spektrum' ||$_GET['module'] == 'jurusan' 
						|| $_GET['module'] == 'diskon'|| $_GET['module'] == 'voucher' || $_GET['module'] == 'asal_sekolah'				
						) { ?>
                        <li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Master Data</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Semua Petugas" href="?module=pegawai_all&aksi"><span class="fa fa-address-book-o icon-wrap"></span> Data Petugas</span></a></li>
								<li><a title="Tahun Ajaran" href="?module=tapel_all&aksi"><span class="glyphicon glyphicon-list-alt icon-wrap"></span> Tahun Ajaran</span></a></li>
								<li><a title="Spektrum" href="?module=spektrum&aksi"><span class="fa fa-building-o icon-wrap"></span> Spektrum Jurusan</span></a></li>
								<li><a title="Jurusan" href="?module=jurusan&aksi"><span class="fa fa-building-o icon-wrap"></span> Semua Jurusan</span></a></li>
								<li><a title="Semua Promo Diskon" href="?module=diskon&aksi"><span class="glyphicon glyphicon-file icon-wrap"></span> Semua Promo</span></a></li>
								<li><a title="Semua Voucher" href="?module=voucher&aksi"><span class="fa fa-ticket edu-crop-tool icon-wrap"></span> Semua Voucher</span></a></li>
								<li><a title="All Schools" href="?module=asal_sekolah&aksi"><span class="fa fa-institution icon-wrap"></span> Sekolah(SMP)</span></a></li>
								<li><a title="Classes" href="?module=asal_kelas&aksi"><span class="fa fa-columns icon-wrap"></span> Kelas(SMP)</span></a></li>
								<li><a title="Outfit" href="?module=outfit&aksi"><span class="fa fa-black-tie icon-wrap"></span> Ukuran Baju</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Menu PSB -->
						<?php if ($_GET['module'] == 'calon_siswa' || $_GET['module'] == 'jadwalpsb' || $_GET['module'] == 'daftar_online') { ?>
						<li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-folder-open-o icon-wrap"></span> <span class="mini-click-non">PSB</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
								<li><a title="Jadwal Promosi" href="?module=jadwalpsb&aksi"><span class="mini-sub-pro">Jadwal Promosi</span></a></li>
                                <li><a title="Semua Calon Siswa" href="?module=calon_siswa&aksi"><span class="mini-sub-pro">Semua Calon Siswa</span></a></li>
								<li><a title="History Pembayaran" href="?module=detail_csiswa&aksi"><span class="mini-sub-pro">Pembayaran</span></a></li>
								<li><a title="Pendaftar Online" href="?module=daftar_online&aksi"><span class="mini-sub-pro">Pendaftar Online</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Menu PSB -->
						<?php if ($_GET['module'] == 'uploadcasis') { ?>
						<li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-cloud-upload icon-wrap"></span> <span class="mini-click-non">Upload</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
								<li><a title="Upload Data Calon Siswa" href="?module=uploadcasis&aksi"><span class="mini-sub-pro">Upload Calon Siswa</span></a></li>
                            </ul>
                        </li>
						
						<!-- SIDE MENU Semua Menu Laporan PSB -->
						<?php if ($_GET['module'] == 'lapsekolah' || $_GET['module'] == 'lapjurusan' || $_GET['module'] == 'lappembayaran') { ?>
						<li class="active">
						<?php }else{ ?>
						<li>
						<?php } ?>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-file-text-o icon-wrap"></span> <span class="mini-click-non">Laporan PSB</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
								<li><a title="Laporan PSB Berdasarkan Sekolah Asal" href="?module=lapsekolah&aksi"><span class="mini-sub-pro">Lap PSB Sekolah Asal</span></a></li>
								<li><a title="Laporan PSB Berdasarkan Jurusan" href="?module=lapjurusan&aksi"><span class="mini-sub-pro">Lap PSB Jurusan</span></a></li>
								<li><a title="Laporan Pencapaian PSB" href="?module=under_construction"><span class="mini-sub-pro">Lap Target PSB</span></a></li>
								<li><a title="Laporan Pembayaran" href="?module=lappembayaran&aksi"><span class="mini-sub-pro">Lap Pembayaran</span></a></li>
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