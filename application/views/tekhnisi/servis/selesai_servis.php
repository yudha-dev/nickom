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
							<form action="<?= base_url('tekhnisi/servis/done_servis') ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<input type="hidden" name="kode_servis" value="<?= $kode ?>">
								<input type="hidden" name="total" value="<?= $total->harga_jual ?>">
								<div class="row push">
									<div class="col-lg-12 col-xl-12">
										<div class="form-group">
											<label for="example-text-input">Kode Servis</label>
											<input type="text" class="form-control" value="<?= $kode ?>" disabled>
										</div>
										<div class="form-group">
											<label for="example-text-input">Nama Tekhnisi</label>
											<input type="text" class="form-control" name="tekhnisi" value="<?= $this->session->userdata('username') ?>" disabled>
										</div>
										<div class="form-group">
											<label for="example-text-input">Tarif Sparepart</label>
											<input type="text" class="form-control" value="<?= "Rp. " . number_format($total->harga_jual, 0, ',', '.') ?>" disabled>
										</div>
										<div class="form-group">
											<label for="example-text-input">Tarif Servis</label>
											<input type="text" class="form-control" name="tarif_servis" id="rupiah" value="<?= set_value('tarif_servis') ?>" placeholder="Masukan tarif servis">
											<?= form_error('tarif_servis', '<label class="text-danger">', '</label>'); ?>
										</div>
										<button type="submit" class="btn btn-primary float-right">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- END Basic -->

				</div>
				<!-- END Page Content -->
				<script>
					//format rupiah
					var rupiah = document.getElementById("rupiah");
					if (rupiah) {
						rupiah.addEventListener("keyup", function(e) {
							// tambahkan 'Rp.' pada saat form di ketik
							// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
							rupiah.value = formatRupiah(this.value, "Rp. ");
						});
					}
					/* Fungsi formatRupiah */
					function formatRupiah(angka, prefix) {
						var number_string = angka.replace(/[^,\d]/g, "").toString(),
							split = number_string.split(","),
							sisa = split[0].length % 3,
							rupiah = split[0].substr(0, sisa),
							ribuan = split[0].substr(sisa).match(/\d{3}/gi);

						// tambahkan titik jika yang di input sudah menjadi angka ribuan
						if (ribuan) {
							separator = sisa ? "." : "";
							rupiah += separator + ribuan.join(".");
						}

						rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
						return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
					}
				</script>
