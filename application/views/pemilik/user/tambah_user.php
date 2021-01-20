				<!-- Judul -->
				<div class="bg-body-light">
					<div class="content content-full">
						<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
							<h1 class="flex-sm-fill h3 my-2">
								<?= $title ?>
							</h1>
							<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
								<ol class="breadcrumb breadcrumb-alt">
									<li class="breadcrumb-item">User</li>
									<li class="breadcrumb-item" aria-current="page">
										<a class="link-fx" href=""><?= $title ?></a>
									</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Page Content -->
				<div class="content">
					<!-- Basic -->
					<div class="block block-rounded">
						<div class="block-content block-content-full">
							<form action="<?= base_url('pemilik/user/insert') ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<div class="row push">
									<div class="col-lg-12 col-xl-12">
										<div class="form-group">
											<label for="example-text-input">Nama</label>
											<input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukan nama lengkap" required>
											<?= form_error('nama', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Username</label>
											<input type="text" class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="Username login user" required>
											<?= form_error('username', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-password-input">Password</label>
											<input type="password" class="form-control" name="password" placeholder="Masukan password">
											<?= form_error('password', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Alamat</label>
											<input type="text" class="form-control" name="alamat" value="<?= set_value('alamat') ?>" placeholder="Masukan alamat lengkap" required>
											<?= form_error('alamat', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Nomor Hp</label>
											<input type="text" class="form-control" name="no_hp" value="<?= set_value('no_hp') ?>" placeholder="Masukan nomor hp" required>
											<?= form_error('no_hp', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input" required>Jabatan</label>
											<select name="jabatan" class="form-control">
												<option value="">Pilih Jabatan</option>
												<option value="admin" <?= set_select('jabatan', 'admin'); ?>>Admin</option>
												<option value="pemilik" <?= set_select('jabatan', 'pemilik'); ?>>Pemilik</option>
											</select>
											<?= form_error('jabatan', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label class="d-block" for="example-file-input">Foto Profil</label>
											<input type="file" name="foto" required>
										</div>
										<button type="submit" class="btn btn-primary float-right">Simpan</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- END Basic -->

				</div>
				<!-- END Page Content -->
