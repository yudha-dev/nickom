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
							<form action="<?= base_url('pemilik/user/update_user') ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<input type="hidden" name="id" value="<?= $user->id_user ?>" />
								<div class="row push">
									<div class="col-lg-12 col-xl-12">
										<div class="form-group">
											<label for="example-text-input">Nama</label>
											<input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" placeholder="Masukan nama lengkap" required>
											<?= form_error('nama', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Username</label>
											<input type="text" class="form-control" name="username" value="<?= $user->username ?>" placeholder="Username login user" required>
											<?= form_error('username', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Alamat</label>
											<input type="text" class="form-control" name="alamat" value="<?= $user->alamat ?>" placeholder="Masukan alamat lengkap" required>
											<?= form_error('alamat', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Nomor Hp</label>
											<input type="text" class="form-control" name="no_hp" value="<?= $user->no_hp ?>" placeholder="Masukan nomor hp" required>
											<?= form_error('no_hp', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input" required>Jabatan</label>
											<select name="jabatan" class="form-control">
												<option value="<?= $user->jabatan ?>"><?= ucwords($user->jabatan) ?></option>
												<?php if ($user->jabatan == 'admin') : ?>
													<option value="pemilik">Pemilik</option>
												<?php else : ?>
													<option value="admin">Admin</option>
												<?php endif; ?>
											</select>
											<?= form_error('jabatan', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label class="d-block" for="example-file-input">Foto Profil</label>
											<img src="<?= base_url('assets/media/avatars/' . $user->foto_profil) ?>" width="100px" height="100px">
											<input type="file" class="ml-3" name="foto">
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
