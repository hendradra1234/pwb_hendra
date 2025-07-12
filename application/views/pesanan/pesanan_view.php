<div class="row">
	<div class="col-12 grid-margin">
		<div class="card">

			<div class="card-body">
				<h3 align="left" style="color:red;">Lihat Data Pesanan<br /></h3>
				<p align="left" style="color:black;">Lihat Data Pesanan Pelanggan - BelajarAplikasi.com<br /></p><br />
				<hr>

				<table id="tabel-akademik" class="table table-bordered border=" 1">
					<thead>
						<tr class="warning" align="center" style="background: grey;color:white;font-weight: bold;">
							<th scope="col">No</th>

							<th scope="col">Nomor Pesanan</th>
							<th scope="col">Tanggal Pesanan</th>

							<th scope="col">Nama Penerima</th>
							<th scope="col">Alamat</th>
							<th scope="col">Telepon</th>
							<th scope="col">Nama Ekspedisi</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							foreach ($data as $list) { ?>
								<tr class="active" align="center">
									<td><?php echo $no; ?></td>
									<td><?php echo $list->no_pesanan; ?></td>
									<td><?php echo $list->tanggal_pesanan; ?></td>
									<td><?php echo $list->nama; ?></td>
									<td><?php echo $list->alamat; ?></td>
									<td><?php echo $list->telp; ?></td>
									<td><?php echo $list->nama_ekspedisi; ?></td>
									<td><span class="badge bg-success"><?php echo $list->status; ?></span></td>
									<td>
										<a href="<?php echo base_url() ?>pesanan/delete/<?php echo $list->no_pesanan ?>"></span><span
												class="badge bg-danger">DELETE</span></a>
									</td>
								</tr>
								<?php $no++;
							}
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
