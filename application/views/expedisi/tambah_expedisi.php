<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h3 align="left" style="color:red;">Halaman Tambah Expedisi<br></h3>
				<p align="left" style="color:black;">Tambah Data Expedisi - BelajarAplikasi.com<br></p>
				<hr>
				<form method="post" action="<?php echo base_url() ?>expedisi/tambah">
					<div class="form-group">
						<label for="cari">Kode Expedisi</label>
						<input type="text" class="form-control" id="kd_expedisi" name="kd_expedisi"
							placeholder="Kode expedisi">
					</div>

					<div class="form-group">
						<label for="exampleInputUsername1">Nama Expedisi</label>
						<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama expedisi"
							name="nama_expedisi" id="nama_expedisi">
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Tujuan</label>
						<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tujuan"
							name="tujuan" id="tujuan">
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Ongkir</label>
						<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Harga"
							name="ongkir" id="ongkir">
					</div>
					<input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="SUBMIT">
					<input type="reset" name="submit2" class="btn btn-danger" value="CANCEL">
				</form>
			</div>
		</div>
	</div>
</div>
