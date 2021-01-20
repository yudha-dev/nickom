<!DOCTYPE html>
<html>
<title><?= $title ?></title>

<head>
	<style>
		#nota {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#nota td,
		#nota th {
			border: 1px solid black;
			border-collapse: collapse;

		}

		#ket {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 50%;
		}

		#ket td,
		#ket th {
			border-collapse: collapse;
			padding-bottom: 12px;
		}

		.kanan {
			float: right;
		}

		.center {
			text-align: center;
		}
	</style>
</head>

<body>

	<h3>
		<center>Nota Pembayaran Nick Kom</center>
	</h3>
	<table id="ket">
		<tr>
			<td>Nama Pelanggan </td>
			<td>:</td>
			<td><?= $get->nama_pel ?></td>
		</tr>
		<tr>
			<td>Alamat </td>
			<td>:</td>
			<td><?= $get->alamat_pel ?></td>
		</tr>
		<tr>
			<td>Nomor Hp </td>
			<td>:</td>
			<td><?= $get->no_hp ?></td>
		</tr>
		<tr>
			<td>Nama Tekhnisi </td>
			<td>:</td>
			<td><?= $get->nama ?></td>
		</tr>
	</table>
	<br>

	<div>
		<p class="kanan">kudus, <?= date('d M Y'); ?></p>
	</div>
	<table id="nota">
		<th>No</th>
		<th>Nama Sparepart</th>
		<th>Kategori</th>
		<th>Harga Sparepart</th>

		<body>
			<?php
			$no = 1;
			foreach ($datanya as $data) : ?>
				<tr>
					<td class="center"><?= $no++ ?></td>
					<td class="center"><?= $data->nama_sparepart ?> (<?= $data->ukuran ?><?= $data->satuan ?>)</td>
					<td class="center"><?= $data->nama_kategori ?></td>
					<td class="center"><?= "Rp. " . number_format($data->harga_jual, 0, ',', '.') ?></td>
				</tr>
			<?php endforeach; ?>
		</body>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<th class="center">Total</th>
				<th><?= "Rp. " . number_format($get->total_hrg_sparepart, 0, ',', '.') ?></th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<th class="center">Biaya Servis</th>
				<th><?= "Rp. " . number_format($get->tarif_servis, 0, ',', '.') ?></th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th>Total + Biaya Servis</th>
				<th><?= "Rp. " . number_format($get->total_hrg_sparepart + $get->tarif_servis, 0, ',', '.') ?></th>
			</tr>
		</tfoot>
	</table>
</body>

</html>

<script>
	window.print();
</script>