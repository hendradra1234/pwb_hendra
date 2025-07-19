<h3 class="mb-5">Laporan Penjualan</h3>
<form method="post" action="<?php echo base_url('laporan/cetak_laporan_penjualan'); ?>">
	<div class="form-group row">
		<div class="col-1">
			<h4>Periode :</h4>
		</div>
		<div class="col-5">
			<input type="date" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
				required>
		</div>
		<div class="col-5">
			<input type="date" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal_selesai"
				name="tanggal_selesai" required>
		</div>
		<button type="submit" class="btn btn-primary">Cetak Laporan</button>
</form>
