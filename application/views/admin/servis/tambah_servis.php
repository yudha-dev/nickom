				<!-- Judul -->
				<div class="bg-body-light">
					<div class="content content-full">
						<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
							<h1 class="flex-sm-fill h3 my-2">
								<?= $title ?>
							</h1>
							<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
								<ol class="breadcrumb breadcrumb-alt">
									<li class="breadcrumb-item">Servis</li>
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
					<!-- Toggle Side Content -->
					<!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
					<div class="d-xl-none push">
						<div class="row gutters-tiny">
							<div class="col-6">
								<button type="button" class="btn btn-light btn-block" data-toggle="class-toggle" data-target=".js-ecom-div-nav" data-class="d-none">
									<i class="fa fa-fw fa-bars text-muted mr-1"></i> Navigation
								</button>
							</div>
							<div class="col-6">
								<button type="button" class="btn btn-light btn-block" data-toggle="class-toggle" data-target=".js-ecom-div-cart" data-class="d-none">
									<i class="fa fa-fw fa-shopping-cart text-muted mr-1"></i> Cart (3)
								</button>
							</div>
						</div>
					</div>
					<!-- END Toggle Side Content -->

					<div class="row push">
						<div class="col-xl-4 order-xl-1">
							<!-- Categories -->
							<!-- <div class="block block-rounded js-ecom-div-nav d-none d-xl-block">
								<div class="block-header block-header-default">
									<h3 class="block-title">
										<i class="fa fa-fw fa-boxes text-muted mr-1"></i> Kategori
									</h3>
								</div>
								<div class="block-content">
									<ul class="nav nav-pills flex-column push">
										<?php foreach ($kategori as $kat) : ?>
											<li class="nav-item mb-1">
												<a class="nav-link d-flex justify-content-between align-items-center" href="javascript:void(0)">
													<?= $kat->nama_kategori ?> <span class="badge badge-pill badge-secondary ml-1"><?= $kat->jml ?></span>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div> -->
							<!-- END Categories -->
							<!-- Shopping Cart -->
							<div class="block block-rounded js-ecom-div-cart d-none d-xl-block">
								<div class="block-header block-header-default">
									<h3 class="block-title">
										<i class="fa fa-fw fa-shopping-cart text-muted mr-1"></i> Keranjang (<?= $count ?>)
									</h3>
								</div>
								<div class="block-content">
									<table class="table table-borderless table-hover table-vcenter">
										<tbody>
											<?php foreach ($keranjang as $krj) : ?>
												<tr>
													<td class="text-center">
														<a class="text-danger" href="<?= base_url('admin/servis/delete/') . $krj->id_keranjang ?>"><i class="fa fa-times"></i></a>
													</td>
													<td>
														<span class="h6"><?= $krj->nama_kategori ?> <?= $krj->nama_sparepart ?> (<?= $krj->ukuran ?> <?= $krj->satuan ?>)</span>
													</td>
													<td>
														<div class="font-w600 text-success"><?= "Rp. " . number_format($krj->harga_jual, 0, ',', '.') ?></div>
													</td>
												</tr>
											<?php endforeach ?>
											<tr class="bg-success-light">
												<td colspan="2">
													<span class="h5 font-w500">Total</span>
												</td>
												<td>
													<label class="h6 font-w600 text-success"><?= "Rp. " . number_format($total->harga_jual, 0, ',', '.') ?></label>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END Shopping Cart -->
							<!-- Pelanggan -->
							<div class="block block-rounded js-ecom-div-nav d-none d-xl-block">
								<div class="block-header block-header-default">
									<h3 class="block-title">
										<i class="fa fa-fw fa-user text-muted mr-1"></i> Data Pelanggan
									</h3>
								</div>
								<div class="block-content block-content-full">
									<form action="<?= base_url('admin/servis/add_servis') ?>" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
										<div class="row push">
											<div class="col-lg-12 col-xl-12">
												<div class="form-group">
													<label for="example-text-input">Nama Pelanggan</label>
													<input type="text" class="form-control" name="nama_pel" value="<?= set_value('nama_pel') ?>" placeholder="Masukan nama pelanggan">
													<?= form_error('nama_pel', '<label class="text-danger">', '</label>'); ?>
												</div>
												<div class="form-group">
													<label for="example-text-input">Alamat Pelanggan</label>
													<input type="text" class="form-control" name="alamat" value="<?= set_value('alamat') ?>" placeholder="Masukan nama pelanggan">
													<?= form_error('alamat', '<label class="text-danger">', '</label>'); ?>
												</div>
												<div class="form-group">
													<label for="example-text-input">Nomor Hp</label>
													<input type="text" class="form-control" name="no_hp" value="<?= set_value('no_hp') ?>" placeholder="Masukan nama pelanggan">
													<?= form_error('no_hp', '<label class="text-danger">', '</label>'); ?>
												</div>
												<button type="submit" class="btn btn-primary text-center float-md-right mt-4"> <i class="fa fa-check mr-1"></i> Kirim Ke Tekhnisi</button>
											</div>
										</div>
									</form>
								</div>
							</div>

						</div>
						<div class="col-xl-8 order-xl-0">
							<!-- Products -->
							<div class="block block-rounded">
								<div class="block-content block-content-full">
									<div class="table-responsive">
										<h4 class="text-center">Pilih Sparepart</h4>
										<table class="table table-bordered table-striped js-dataTable-full-pagination">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Kategori</th>
													<th class="text-center">Nama Sparepart</th>
													<th class="text-center">Harga Sparepart</th>
													<th class="text-center"></th>
												</tr>
											</thead>
											<tbody>
												<!-- tampilkan data kategori -->
												<?php $no = 1;
												foreach ($sparepart as $spr) : ?>
													<tr>
														<td class="text-center font-size-sm"><?= $no++  ?></td>
														<td class="text-center font-w600 font-size-sm"><?= strtoupper($spr->nama_kategori) ?></td>
														<td class="text-center font-w600 font-size-sm"><?= $spr->nama_sparepart ?> (<?= $spr->ukuran ?> <?= $spr->satuan ?>)</td>
														<td class="text-center font-w600 font-size-sm"><?= "Rp. " . number_format($spr->harga_jual, 0, ',', '.') ?></td>
														<td class="text-center"><a href="<?= base_url('admin/servis/add/') . $spr->id_sparepart ?>" class="btn btn-primary">Pilih</a></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END Products -->
						</div>
					</div>
				</div>
				<!-- END Basic -->
