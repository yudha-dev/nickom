<!doctype html>
<html lang="en">

<!-- Head -->
<?php $this->load->view('tekhnisi/templates/head'); ?>

<body>
	<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
		<!-- Side Overlay-->
		<aside id="side-overlay">
			<!-- Navbar -->
			<?php $this->load->view('tekhnisi/templates/navbar'); ?>
		</aside>
		<nav id="sidebar" aria-label="Main Navigation">
			<!-- Menu -->
			<?php $this->load->view('tekhnisi/templates/menu'); ?>
		</nav>
		<!-- Header -->
		<header id="page-header">
			<!-- header -->
			<?php $this->load->view('tekhnisi/templates/header'); ?>
		</header>
		<!-- Content -->
		<main id="main-container">
			<?php $this->load->view('tekhnisi/' . $folder . '/' . $page); ?>
		</main>
		<!-- Footer -->
		<footer id="page-footer" class="bg-body-light">
			<?php $this->load->view('tekhnisi/templates/footer'); ?>
		</footer>
		<!-- Modal -->
		<div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="block block-rounded block-themed block-transparent mb-0">
						<div class="block-header bg-primary-dark">
							<h3 class="block-title">Apps</h3>
							<div class="block-options">
								<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
									<i class="si si-close"></i>
								</button>
							</div>
						</div>
						<div class="block-content block-content-full">
							<div class="row gutters-tiny">
								<div class="col-6">
									<!-- CRM -->
									<a class="block block-rounded block-link-shadow bg-body" href="javascript:void(0)">
										<div class="block-content text-center">
											<i class="si si-speedometer fa-2x text-primary"></i>
											<p class="font-w600 font-size-sm mt-2 mb-3">
												CRM
											</p>
										</div>
									</a>
									<!-- END CRM -->
								</div>
								<div class="col-6">
									<!-- Products -->
									<a class="block block-rounded block-link-shadow bg-body" href="javascript:void(0)">
										<div class="block-content text-center">
											<i class="si si-rocket fa-2x text-primary"></i>
											<p class="font-w600 font-size-sm mt-2 mb-3">
												Products
											</p>
										</div>
									</a>
									<!-- END Products -->
								</div>
								<div class="col-6">
									<!-- Sales -->
									<a class="block block-rounded block-link-shadow bg-body mb-0" href="javascript:void(0)">
										<div class="block-content text-center">
											<i class="si si-plane fa-2x text-primary"></i>
											<p class="font-w600 font-size-sm mt-2 mb-3">
												Sales
											</p>
										</div>
									</a>
									<!-- END Sales -->
								</div>
								<div class="col-6">
									<!-- Payments -->
									<a class="block block-rounded block-link-shadow bg-body mb-0" href="javascript:void(0)">
										<div class="block-content text-center">
											<i class="si si-wallet fa-2x text-primary"></i>
											<p class="font-w600 font-size-sm mt-2 mb-3">
												Payments
											</p>
										</div>
									</a>
									<!-- END Payments -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<?php $this->load->view('tekhnisi/templates/js'); ?>

</body>

</html>
