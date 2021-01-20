<!-- Judul -->
<div class="bg-body-light">
	<div class="content content-full">
		<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
			<h1 class="flex-sm-fill h3 my-2">
				<?= $title ?>
			</h1>
			<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-alt">
					<li class="breadcrumb-item">Sparepart</li>
					<li class="breadcrumb-item" aria-current="page">
						<a class="link-fx" href=""><?= $title ?></a>
					</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- Konten -->
<div class="content">
	<div class="block block-rounded">
		<div class="block-content block-content-full">
			<div class="row">
				<div class="col-sm-12 mb-3">
					<?= $this->session->flashdata('message'); ?>
					<?php if ($this->session->flashdata('simpan') == TRUE) : ?>
						<div class="alert alert-success alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<?= $this->session->flashdata('simpan') ?>.
						</div>
					<?php elseif ($this->session->flashdata('update') == TRUE) : ?>
						<div class="alert alert-success alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<?= $this->session->flashdata('update') ?>.
						</div>
					<?php elseif ($this->session->flashdata('hapus') == TRUE) : ?>
						<div class="alert alert-danger alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<?= $this->session->flashdata('hapus') ?>.
						</div>
					<?php endif; ?>
					<div class="text-center bg-body-light py-2 mb-2">
						<div class="dt-buttons"> <a href="<?= base_url('admin/sparepart/tambah_sparepart') ?>" class="btn btn-sm btn-rounded btn-outline-success" tabindex="0" type="button"><span> <i class="fa fa-fw fa-plus mr-1"></i>Tambah Data</span></a></div>
					</div>
				</div>
			</div>
			<!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Kategori</th>
							<th class="text-center">Nama Sparepart</th>
							<th class="text-center">Keterangan</th>
							<th class="text-center">Harga Beli</th>
							<th class="text-center">Harga Jual</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- tampilkan data kategori -->
						<?php $no = 1;
						foreach ($sparepart as $data) : ?>
							<tr>
								<td class="text-center font-size-sm"><?= $no++  ?></td>
								<td class="text-center font-w600 font-size-sm"><?= $data->nama_kategori ?></td>
								<td class="text-center font-w600 font-size-sm"><?= $data->nama_sparepart ?></td>
								<td class="text-center font-w600 font-size-sm"><?= $data->ukuran ?> <?= $data->satuan ?></td>
								<td class="text-center font-w600 font-size-sm"><?= "Rp. " . number_format($data->harga_beli, 0, ',', '.') ?></td>
								<td class="text-center font-w600 font-size-sm"><?= "Rp. " . number_format($data->harga_jual, 0, ',', '.') ?></td>
								<td class="text-center">
									<div class="btn-group">
										<a href="<?= base_url('admin/sparepart/edit_sparepart/') . $data->id_sparepart ?>" class="btn btn-sm btn-alt-primary" data-toggle="tooltip" title="Edit">
											<i class="fa fa-fw fa-pencil-alt"></i>
										</a>
										<a href="<?= base_url('admin/sparepart/delete/') . $data->id_sparepart ?>" class="btn btn-sm btn-alt-primary" data-toggle="tooltip" title="Hapus">
											<i class="fa fa-fw fa-times"></i>
										</a>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
