<div id="page-container">

	<!-- Main Container -->
	<main id="main-container">

		<!-- Page Content -->
		<div class="hero-static d-flex align-items-center">
			<div class="w-100">
				<!-- Sign In Section -->
				<div class="bg-white">
					<div class="content content-full">
						<div class="row justify-content-center">
							<div class="col-md-8 col-lg-6 col-xl-4 py-4">
								<!-- Header -->
								<div class="text-center">
									<?= $this->session->flashdata('message'); ?>
									<?php if ($this->session->flashdata('pass') == TRUE) : ?>
										<div class="alert alert-danger alert-dismissible fade show">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<?= $this->session->flashdata('pass') ?>.
										</div>
									<?php elseif ($this->session->flashdata('belum') == TRUE) : ?>
										<div class="alert alert-danger alert-dismissible fade show">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<?= $this->session->flashdata('belum') ?>.
										</div>
									<?php elseif ($this->session->flashdata('tdk') == TRUE) : ?>
										<div class="alert alert-danger alert-dismissible fade show">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<?= $this->session->flashdata('tdk') ?>.
										</div>
									<?php endif; ?>
									<p class="mb-2">
										<i class="fa fa-2x fa-circle-notch text-primary"></i>
									</p>
									<h1 class="h4 mb-1">
										Halaman Login
									</h1>
									<h2 class="h6 font-w400 text-muted mb-3">
										Silahkan masukan username dan password anda
									</h2>
								</div>
								<!-- END Header -->
								<!-- Sign In Form -->
								<form class="js-validation-signin" action="<?= base_url('auth'); ?>" method="POST">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
									<div class="py-3">
										<div class="form-group">
											<input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="login-username" placeholder="Username">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="login-password" placeholder="Password">
										</div>
										<div class="form-group">
											<div class="d-md-flex align-items-md-center justify-content-md-between">
												<div class="custom-control custom-switch">
													<input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember">
													<label class="custom-control-label font-w400" for="login-remember">Ingat Saya</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row justify-content-center mb-0">
										<div class="col-md-6 col-xl-5">
											<button type="submit" class="btn btn-block btn-primary">
												<i class="fa fa-fw fa-sign-in-alt mr-1"></i> Login
											</button>
										</div>
									</div>
								</form>
								<!-- END Sign In Form -->
							</div>
						</div>
					</div>
				</div>
				<!-- END Sign In Section -->

				<!-- Footer -->
				<div class="font-size-sm text-center text-muted py-3">
					<strong>NICK COM</strong> &copy; <span data-toggle="year-copy">2020</span>
				</div>
				<!-- END Footer -->
			</div>
		</div>
		<!-- END Page Content -->
	</main>
	<!-- END Main Container -->
</div>
