<div class="container-fluid pt-5">
	<form method="post" action="<?php echo base_url() ?>keranjang/buat_pesanan" name="form">
		<div class="row px-xl-5">
			<div class="col-lg-12 mb-5">
				<div class="cart-list">
					<div class="form-group">
						<label>Ekspedisi</label>
						<select name="kd_ekspedisi" class="form-control">
							<?php if($data_ekspedisi) { ?>
							<?php foreach($data_ekspedisi as $row_ekspedisi) { ?>
							<option value="<?php echo $row_ekspedisi->kd_ekspedisi ?>">
								<?php echo $row_ekspedisi->nama_ekspedisi . ' - Rp. ' . $row_ekspedisi->ongkir ?>
							</option>
							<?php }
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" placeholder="Masukkan Nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Telpon</label>
						<input type="text" name="telp" placeholder="Masukkan Telpon" class="form-control">
					</div>
					<table class="table-bordered" width="100%" align="center">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>Gambar</th>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($data)
								$grandtotal = 0;
							foreach ($data as $row) {
								$grandtotal += $row->qty * $row->harga;
								?>
							<tr class="text-center">
								<td class="product-remove">
									<a href="<?php echo base_url() ?>keranjang/clear/<?php echo $row->kd_barang ?>">
										<span class="ion-ios-close"></span>
									</a>
								</td>
								<td class="image-prod"><img
										src="<?php echo base_url() . '../gambar/' . $row->gambar; ?>" width="80"
										height="80"></td>
								<td class="product-name"><?php echo $row->nama_barang ?></td>
								<td class="price">Rp. <?php echo number_format($row->harga) ?></td>
								<td class="quantity"><?php echo $row->qty ?></td>
								<td class="total">Rp. <?php echo number_format($row->qty * $row->harga) ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td colspan="5" align="right">Grand Total :</td>
								<td align="center">Rp. <?php echo number_format($grandtotal) ?></td>
							</tr>
						</tbody>
					</table><br><br>
					<button type="submit" name="submit" class="btn btn-primary px-3" value="Checkout">BUAT
						PESANAN</button><br><br>

				</div>
			</div>
		</div>
	</form>
</div>
