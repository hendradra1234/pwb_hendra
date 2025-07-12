<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h3 align="left" style="color:red;">Halaman Tambah Obat<br></h3>
				<p align="left" style="color:black;">Tambah Data Obat - BelajarAplikasi.com<br></p>
				<hr>
				<form method="post" action="<?php echo base_url() ?>obat/tambah">
					<div class="form-group">
						<label for="cari">Kode Obat</label>
						<input type="text" class="form-control" name="kd_obat" value="<?php echo $idx ?>"
							readonly>
					</div>

					<div class="form-group">
						<label for="exampleInputUsername1">Nama Obat</label>
						<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama obat"
							name="nm_obat" id="nm_obat">
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Satuan</label>
						<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Satuan"
							name="satuan" id="satuan">
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Jenis Obat</label>
						<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Jenis Obat"
							name="jenis_obat" id="jenis_obat">
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Stok</label>
						<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Stok"
							name="stok" id="stok">
					</div>
					<input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="SUBMIT">
					<input type="reset" name="submit2" class="btn btn-danger" value="CANCEL">
				</form>
			</div>
		</div>
	</div>
</div>
