<div class="container-fluid pt-5">
	<form method="post" action="<?php echo base_url() ?>keranjang/histori_pesanan" name="form">
		<div class="row px-xl-5">
			<div class="col-lg-12 mb-5">
				<div class="cart-list">
					<table class="table table-bordered" width="100%" align="center">
						<thead class="thead-primary">
							<tr class="text center">
								<th>Id Pesanan</th>
								<th>Tanggal Pesanan</th>
								<th>Status</th>
								<th>Total Pembayaran</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if($data)
									$grandtotal = 0;
								foreach ($data as $row) {
									foreach ($data2 as $col) {
									$grandtotal += $col->qty * $col->harga;
									}
							?>
							<tr class="text-center" align="center">
								<td><?php echo $row->no_pesanan; ?></td>
								<td><?php echo tgl_indonesia($row->tanggal_pesanan); ?></td>
								<td>
									<div class="badge bg-success"><?php echo $row->status ?>
								</td>
								<td><?php echo number_format($grandtotal) ?></td>
								<td>
									<?php
										if($row->status == 'Belum Bayar') {
									?>
									<a href="<?php echo base_url().'pembayaran/bayar/'.$row->no_pesanan; ?>">
										<span class="badge badge-primary">
											Konfirmasi Pembayaran</span>
									</a>
									<?php } else if($row->status == 'Sudah Bayar') {
										echo '<p style="color:blue;font-weight:bold;">Sedang Diproses</p>';
										} else {
										echo '<p style="color:blue;font-weight:bold;">Konfirmasi diterima</p>';
										}
										?>
								</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
					<br><br>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
	function tgl_indonesia($tanggal){
		$bulan = array (
		1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
?>
