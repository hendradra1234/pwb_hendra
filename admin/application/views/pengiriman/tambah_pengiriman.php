<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h3 align="left" style="color:red;">Tambah Pengiriman<br></h3>
				<hr>
				<form method="post" action="<?php echo base_url() ?>pengiriman/tambah">
					<div class = "form-group">
						<p><Label>ID PESANAN</Label>
						<input type="text" class="form-control" name="id_pesanan" value="<?php echo $id_pesanan ?>"
							readonly></p>
					</div>

					<div class = "form-group">
						<p><Label>TANGGAL PESANAN</Label>
						<input type="date" class="form-control" name="tgl_pesanan" value="<?php echo $data->tgl_pesanan ?>"></p>
					</div>

					<div class = "form-group">
						<p><Label>NAMA PELANGGAN</Label>
						<input type="text" class="form-control" name="nm_pelanggan" value="<?php echo $data->nm_pelanggan ?>"></p>
					</div>

					<div class = "form-group">
						<p><Label>TOTAL PESANAN</Label>
						<input type="text" class="form-control" name="total_pesanan" value="<?php echo $data->total_pesanan ?>"></p>
					</div>

					<div class = "form-group">
						<p><Label>TANGGAL PENGIRIMAN</Label>
						<input type="text" class="form-control" name="tanggal_pengiriman" value="<?php echo $data->tanggal_pengiriman ?>"></p>
					</div>

					<div class = "form-group">
						<p><Label>JENIS PENGIRIMAN</Label>
						<input type="text" class="form-control" name="jenis_pengiriman" value="<?php echo $data->jenis_pengiriman ?>"></p>
					</div>

					<div class = "form-group">
						<p><Label>KETERANGAN</Label>
						<input type="text" class="form-control" name="keterangan" value="<?php echo $data->keterangan ?>"></p>
					</div>

					<input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="TAMBAH">
				</form>
			</div>
		</div>
	</div>
</div>
