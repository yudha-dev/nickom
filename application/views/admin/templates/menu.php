                <!-- Side Header -->
                <div class="content-header bg-white-5">
                	<!-- Logo -->
                	<a class="font-w600 text-dual" href="index.html">
                		<span class="smini-visible">
                			<i class="fa fa-circle-notch text-primary"></i>
                		</span>
                		<span class="smini-hide font-size-h5 tracking-wider">
                			Nick<span class="font-w400">Com</span>
                		</span>
                	</a>
                	<!-- END Logo -->

                	<!-- Extra -->
                	<div>
                		<!-- Options -->
                		<div class="dropdown d-inline-block ml-2">
                			<a class="btn btn-sm btn-dual" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                				<i class="si si-drop"></i>
                			</a>
                			<div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                				<!-- Color Themes -->
                				<!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                				<a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="default" href="#">
                					<span>Default</span>
                					<i class="fa fa-circle text-default"></i>
                				</a>
                				<a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="<?= base_url('assets/'); ?>css/themes/amethyst.min.css" href="#">
                					<span>Ungu</span>
                					<i class="fa fa-circle text-amethyst"></i>
                				</a>
                				<a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="<?= base_url('assets/'); ?>css/themes/city.min.css" href="#">
                					<span>Orange</span>
                					<i class="fa fa-circle text-city"></i>
                				</a>
                				<a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="<?= base_url('assets/'); ?>css/themes/flat.min.css" href="#">
                					<span>Hijau Tua</span>
                					<i class="fa fa-circle text-flat"></i>
                				</a>
                				<a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="<?= base_url('assets/'); ?>css/themes/modern.min.css" href="#">
                					<span>Hijau Muda</span>
                					<i class="fa fa-circle text-modern"></i>
                				</a>
                				<a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="<?= base_url('assets/'); ?>css/themes/smooth.min.css" href="#">
                					<span>Pink</span>
                					<i class="fa fa-circle text-smooth"></i>
                				</a>
                				<!-- END Color Themes -->

                				<div class="dropdown-divider"></div>

                				<!-- Sidebar Styles -->
                				<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                				<a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_light" href="#">
                					<span>Sidebar Putih</span>
                				</a>
                				<a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                					<span>Sidebar Hitam</span>
                				</a>
                				<!-- Sidebar Styles -->

                				<div class="dropdown-divider"></div>

                				<!-- Header Styles -->
                				<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                				<a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_light" href="#">
                					<span>Header Putih</span>
                				</a>
                				<a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_dark" href="#">
                					<span>Header Hitam</span>
                				</a>
                				<!-- Header Styles -->
                			</div>
                		</div>
                		<!-- END Options -->

                		<!-- Close Sidebar, Visible only on mobile screens -->
                		<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                		<a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                			<i class="fa fa-fw fa-times"></i>
                		</a>
                		<!-- END Close Sidebar -->
                	</div>
                	<!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                	<!-- Side Navigation -->
                	<div class="content-side">
                		<ul class="nav-main">
                			<li class="nav-main-item">
                				<a class="nav-main-link  <?php echo $this->uri->segment(2) == 'beranda' ? 'active' : '' ?>" href="<?php echo site_url('admin/beranda') ?>">
                					<i class="nav-main-link-icon si si-speedometer"></i>
                					<span class="nav-main-link-name">Dashboard</span>
                				</a>
                			</li>
                			<li class="nav-main-heading">DATA MASTER</li>
                			<li class="nav-main-item">
                				<a class="nav-main-link  <?php echo $this->uri->segment(2) == 'kategori' ? 'active' : '' ?>" href="<?php echo site_url('admin/kategori/data_kategori') ?>">
                					<i class="nav-main-link-icon si si-tag"></i>
                					<span class="nav-main-link-name">Kategori</span>
                				</a>
                			</li>
                			<li class="nav-main-item">
                				<a class="nav-main-link  <?php echo $this->uri->segment(2) == 'sparepart' ? 'active' : '' ?>" href="<?php echo site_url('admin/sparepart/data_sparepart') ?>">
                					<i class="nav-main-link-icon si si-screen-desktop"></i>
                					<span class="nav-main-link-name">Sparepart</span>
                				</a>
                			</li>
                			<li class="nav-main-item">
                				<a class="nav-main-link  <?php echo $this->uri->segment(2) == 'servis' ? 'active' : '' ?>" href="<?php echo site_url('admin/servis/data_servis') ?>">
                					<i class="nav-main-link-icon si si-settings"></i>
                					<span class="nav-main-link-name">Servis</span>
                				</a>
                			</li>
                			<li class="nav-main-item">
                				<a class="nav-main-link  <?php echo $this->uri->segment(2) == 'pembayaran' ? 'active' : '' ?>" href="<?php echo site_url('admin/pembayaran/data_pembayaran') ?>">
                					<i class="nav-main-link-icon si si-credit-card"></i>
                					<span class="nav-main-link-name">Pembayaran</span>
                				</a>
                			</li>
                		</ul>
                	</div>
                	<!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
