<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h3 align="left" style="color:red;">Halaman Edit ekspedisi<br></h3>
				<p align="left" style="color:black;">Edit Data ekspedisi - BelajarAplikasi.com<br></p>
				<hr>
				<form name="form1" method="post" action="<?php echo base_url() ?>ekspedisi/edit/<?php echo $kd_ekspedisi ?>">

					<p><Label>Kode ekspedisi</Label>
						<input type="text" class="form-control" name="kd_ekspedisi" value="<?php echo $kd_ekspedisi ?>"
							readonly></p>
					<p><Label>Nama ekspedisi</Label>
						<input type="text" class="form-control" name="nama_ekspedisi" value="<?php echo $data->
                        nama_ekspedisi ?>"></p>
					<p><Label>Tujuan</Label>
						<input type="text" class="form-control" name="tujuan" value="<?php echo $data->
                        tujuan ?>"></p>
					<p><Label>Ongkir</Label>
						<input type="text" class="form-control" name="ongkir" value="<?php echo $data->ongkir ?>"></p>

						<input type="submit" name="submit" value="EDIT">
						<input type="reset" name="submit2" value="BATAL">
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
