<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h3 align="left" style="color:red;">Halaman Edit Obat<br></h3>
				<p align="left" style="color:black;">Edit Data Obat - BelajarAplikasi.com<br></p>
				<hr>
				<form name="form1" method="post" action="<?php echo base_url() ?>obat/edit/<?php echo $kd_obat ?>">

					<p><Label>Kode Obat</Label>
						<input type="text" class="form-control" name="kd_obat" value="<?php echo $kd_obat ?>"
							readonly></p>
					<p><Label>Nama Obat</Label>
						<input type="text" class="form-control" name="nm_obat" value="<?php echo $data->
                        nm_obat ?>"></p>
					<p><Label>Satuan</Label>
						<input type="text" class="form-control" name="satuan" value="<?php echo $data->satuan ?>"></p>
					<p><Label>Jenis Obat</Label>
						<input type="text" class="form-control" name="jenis_obat" value="<?php echo $data->jenis_obat?>">
					</p>
					<p><Label>Stok</Label>
						<input type="text" class="form-control" name="stok" value="<?php echo $data->stok ?>"></p>
						<input type="submit" name="submit" value="EDIT">
						<input type="reset" name="submit2" value="BATAL">
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
