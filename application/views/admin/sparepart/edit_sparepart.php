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
							<form action="<?= base_url('admin/sparepart/update') ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<input type="hidden" name="id" value="<?= $sparepart->id_sparepart ?>">
								<div class="row push">
									<div class="col-lg-12 col-xl-12">
										<div class="form-group">
											<label for="example-text-input">Nama Sparepart</label>
											<input type="text" class="form-control" name="nama_sparepart" value="<?= $sparepart->nama_sparepart ?>" placeholder="Masukan nama sparepart">
											<?= form_error('nama_sparepart', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Kategori</label>
											<select name="kategori" id="kategori" class="form-control">
												<option value="<?= $sparepart->id_kategori ?>"><?= $sparepart->nama_kategori ?></option>
												<?php foreach ($kategori as $kat) : ?>
													<option value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
												<?php endforeach ?>
											</select>
											<?= form_error('kategori', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Keterangan / Size</label>
											<input type="text" class="form-control" name="keterangan" value="<?= $sparepart->ukuran ?>" placeholder="Contoh : 16">
											<?= form_error('keterangan', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group" id="satForm">
											<label id="labelSat">Satuan</label>
											<input class="form-control" type="text" id="Satuan" disabled></input>
										</div>
										<div class="form-group">
											<label for="example-text-input">Harga Beli</label>
											<input type="text" class="form-control" name="harga_beli" id="rupiah" value="<?= "Rp. " . number_format($sparepart->harga_beli, 0, ',', '.') ?>" placeholder="Masukan harga beli">
											<?= form_error('harga_beli', '<label class="text-danger">', '</label>'); ?>
										</div>
										<div class="form-group">
											<label for="example-text-input">Harga Jual</label>
											<input type="text" class="form-control" name="harga_jual" id="harga" value="<?= "Rp. " . number_format($sparepart->harga_jual, 0, ',', '.') ?>" placeholder="Masukan harga jual">
											<?= form_error('harga_jual', '<label class="text-danger">', '</label>'); ?>
										</div>
										<button type="submit" class="btn btn-primary float-right">Simpan</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- END Basic -->
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
					//format rupiah2
					var harga = document.getElementById("harga");
					if (harga) {
						harga.addEventListener("keyup", function(e) {
							// tambahkan 'Rp.' pada saat form di ketik
							// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
							harga.value = formatHarga(this.value, "Rp. ");
						});
					}
					/* Fungsi formatRupiah */
					function formatHarga(angka, prefix) {
						var number_string = angka.replace(/[^,\d]/g, "").toString(),
							split = number_string.split(","),
							sisa = split[0].length % 3,
							harga = split[0].substr(0, sisa),
							ribuan = split[0].substr(sisa).match(/\d{3}/gi);

						// tambahkan titik jika yang di input sudah menjadi angka ribuan
						if (ribuan) {
							separator = sisa ? "." : "";
							harga += separator + ribuan.join(".");
						}

						harga = split[1] != undefined ? harga + "," + split[1] : harga;
						return prefix == undefined ? harga : harga ? "Rp. " + harga : "";
					}
					//
					$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
						// Kita sembunyikan dulu untuk loadingnya
						$("#Satuan").hide();
						$("#labelSat").hide();

						$("#kategori").change(function() { // Ketika user mengganti atau memilih data provinsi
							$("#Satuan").hide();

							$.ajax({
								type: "POST", // Method pengiriman data bisa dengan GET atau POST
								url: "<?php echo base_url("admin/SparepartController/listSatuan"); ?>", // Isi dengan url/path file php yang dituju
								data: {
									id_kategori: $("#kategori").val(),
									<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
								}, // data yang akan dikirim ke file yang dituju
								dataType: "json",
								beforeSend: function(e) {
									if (e && e.overrideMimeType) {
										e.overrideMimeType("application/json;charset=UTF-8");
									}
								},
								success: function(response) { // Ketika proses pengiriman berhasil
									$("#loading").hide(); // Sembunyikan loadingnya

									$("#Satuan").val(response.list_satuan).show();
									$("#labelSat").val(response.list_satuan).show();
								},
								error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
									alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
								}
							});
						});
					});
				</script>
