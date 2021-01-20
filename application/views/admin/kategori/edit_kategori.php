				<!-- Judul -->
				<div class="bg-body-light">
					<div class="content content-full">
						<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
							<h1 class="flex-sm-fill h3 my-2">
								<?= $title ?>
							</h1>
							<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
								<ol class="breadcrumb breadcrumb-alt">
									<li class="breadcrumb-item">Kategori</li>
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
							<form action="<?= base_url('admin/kategori/update') ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<input type="hidden" name="id" value="<?= $kategori->id_kategori ?>">
								<div class="row push">
									<div class="col-lg-12 col-xl-12">
										<div class="form-group">
											<label for="example-text-input">Nama Kategori</label>
											<input type="text" class="form-control" name="nama_kategori" value="<?= $kategori->nama_kategori ?>" placeholder="Masukan nama kategori">
											<?= form_error('nama_kategori', '<label class="text-danger">', '</label>'); ?>
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
