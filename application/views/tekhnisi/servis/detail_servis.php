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
				</div>
			</div>
			<!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

			<div class="table-responsive">
				<table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Kategori</th>
							<th class="text-center">Merk</th>
							<th class="text-center">Ukuran</th>
						</tr>
					</thead>
					<tbody>
						<!-- tampilkan data kategori -->
						<?php $no = 1;
						foreach ($detail as $dd) : ?>
							<tr>
								<td class="text-center font-size-sm"><?= $no++  ?></td>
								<td class="text-center font-w600 font-size-sm"><?= $dd->nama_kategori ?></td>
								<td class="text-center font-w600 font-size-sm"><?= $dd->nama_sparepart ?></td>
								<td class="text-center font-w600 font-size-sm"><?= $dd->ukuran ?> <?= $dd->satuan ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="col text-center">
					<a href="<?= base_url('tekhnisi/servis/selesai_servis/') . $dd->kode_servis ?>" class="btn btn-sm btn-success">Selesai Sevis</a>
				</div>
			</div>
		</div>
	</div>
</div>
