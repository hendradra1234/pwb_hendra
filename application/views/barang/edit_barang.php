<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h3 align="left" style="color:red;">Halaman Edit Barang<br></h3>
				<p align="left" style="color:black;">Edit Data Barang - BelajarAplikasi.com<br></p>
				<hr>
				<form name="form1" method="post" action="<?php echo base_url() ?>barang/edit/<?php echo $kd_barang ?>">

					<p><Label>Kode Barang</Label>
						<input type="text" class="form-control" name="kd_barang" value="<?php echo $kd_barang ?>"
							readonly></p>
					<p><Label>Nama Barang</Label>
						<input type="text" class="form-control" name="nama_barang" value="<?php echo $data->
                        nama_barang ?>"></p>

					<p><Label>Stok</Label>
						<input type="text" class="form-control" name="stok" value="<?php echo $data->stok ?>"></p>
					<p><Label>Harga</Label>
						<input type="text" class="form-control" name="harga" value="<?php echo $data->harga ?>"></p>
					<p><Label>Satuan</Label>
						<input type="text" class="form-control" name="satuan" value="<?php echo $data->satuan ?>"></p>
					<p><Label>Berat</Label>
						<input type="text" class="form-control" name="berat" value="<?php echo $data->berat ?>"></p>
					<p><Label>Keterangan</Label>
						<input type="text" class="form-control" name="keterangan" value="<?php echo $data->keterangan?>">
					</p>
					<p><Label>Gambar</Label>
						<input type="file" class="form-control" name="gambar" value="<?php echo $data->gambar ?>"></p>
					<p>
						<input type="submit" name="submit" value="EDIT">
						<input type="reset" name="submit2" value="BATAL">
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
