<div class="container-fluid pt-5">
	<form method="post" action="<?php echo base_url() ?>pembayaran/simpan" name="form" enctype="multipart/form-data">
		<div class="row px-xl-5">
			<div class="col-lg-12 mb-5">
				<div class="cart-list">
					<?php
                    $nama = '';
                    foreach ($data as $row) {
                        $nama = $row->nama;
                        $alamat = $row->alamat;
                        $telp = $row->telp;
                        $no_pesanan = $row->no_pesanan;
                    }
                    ?>
					<div class="form-group">
						<p><label>Nama</label></p>
						<input type="text" name="nama" value="<?php echo $nama ?>" placeholder="Masukkan Nama"
							class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<p><label>Alamat</label></p>
						<input type="text" name="alamat" value="<?php echo $alamat ?>" placeholder="Masukkan Alamat"
							class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<p><label>Telpon</label></p>
						<input type="text" name="telp" value="<?php echo $telp ?>" placeholder="Masukkan Telpon"
							class="form-control" readonly="readonly">
					</div>
					<input type="hidden" name="no_pesanan" value="<?php echo $no_pesanan ?>" class="form-control">

					<div class="form-group">
						<label>Bukti Pembayaran<span>*</span></label>
						<input type="file" class="form-control" name="bukti_transfer" required>
					</div>
					<table class="table table-bordered" width="100%" align="center" border="1">
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
        				$grandtotal = 0;
        				$total = 0;
        				foreach ($data1 as $row) {
        				    $total += $row->qty * $row->harga;
            			?>
							<tr class="text-center">
								<td class="product-remove">
									<a href="<?php echo base_url() ?>keranjang/clear/<?php echo $row->kd_barang ?>"><span
											class="ion-ios-close"></span></a>
								</td>
								<td class="image-prod"><img class="img-fluid"
										src="<?php echo base_url() ?>gambar/<?php echo $row->gambar; ?>" width="80"
										height="80"></td>
								<td class="product-name"><?php echo $row->nama_barang ?></td>
								<td class="price">Rp. <?php echo number_format($row->harga) ?></td>
								<td class="quantity"><?php echo $row->qty ?></td>
								<td class="total">Rp. <?php echo number_format($row->qty * $row->harga) ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td colspan="5" align="right">Total :</td>
								<td align="center">Rp. <?php echo number_format($total) ?></td>
							</tr>
							<?php
							foreach ($data as $row) {
								$grandtotal = $total + $row->ongkir;
								?>
							<tr>
								<td colspan="5" align="right">Biaya Ongkir :</td>
								<td align="center">Rp. <?php echo number_format($row->ongkir) ?></td>
							</tr>
							<tr>
								<td colspan="5" align="right">Grand Total :</td>
								<td align="center">Rp. <?php echo number_format($grandtotal) ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table><br><br>
					<button type="submit" name="submit" class="btn btn-primary px-3"
						value="Checkout">BAYAR</button><br><br>

				</div>
			</div>
		</div>
	</form>
</div>
