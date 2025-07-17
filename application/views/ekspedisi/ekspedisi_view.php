<div class="row">
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h3 align="left" style="color:red;">Manajemen Data ekspedisi<br></h3>
				<p align="left" style="color:black;">Lihat Data ekspedisi - BelajarAplikasi.com<br></p><br>
				<hr>
				<a href="<?php echo base_url() ?>ekspedisi/tambah"><span class="badge badge-primary btn-sm">+ Tambah
						Data</span></a><br><br>
				<table id="tabel-akademik" class="table table-bordered" border="1">
					<thead>
						<tr class="warning" align="center" style="background: grey;color:white;font-weight: bold;">
							<th scope="col" width="3%">No</th>
							<th scope="col">Kode</th>
							<th scope="col">Nama ekspedisi</th>
							<th scope="col">Tujuan</th>
							<th scope="col">Ongkir</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no= 1;
							if (isset($data)) {
							foreach ($data as $list) { ?>
							<tr class="active" align="center">
								<td><?php echo $no; ?></td>
								<td><?php echo $list->kd_ekspedisi; ?></td>
								<td><?php echo $list->nama_ekspedisi; ?></td>
								<td><?php echo $list->tujuan; ?></td>
								<td><?php echo $list->ongkir; ?></td>
								<td>
									<a href="<?php echo base_url() ?>ekspedisi/edit/<?php echo $list->kd_ekspedisi; ?>"><span
											class="badge bg-warning">EDIT</span></a>
									<a href="<?php echo base_url() ?>ekspedisi/delete/<?php echo $list->kd_ekspedisi; ?>"><span
											class="badge bg-danger">DELETE</span></a>
								</td>
							</tr>
							<?php $no++;
								} ?>
								<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
