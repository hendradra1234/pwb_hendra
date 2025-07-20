<div class="container-fluid pt-5">
	<div class="row px-xl-5 pb-3">
		<div class="container-fluid py-5">
			<div class="row px-xl-5">
				<div class="col-lg-5 pb-5">
					<div id="product-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner border">
							<div class="carousel-item active">
								<img class="w-100 h-100" src="<?php echo base_url()."gambar/".$data->gambar; ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7 pb-5">
					<form action="<?php echo base_url() ?>keranjang/add" method="post">
						<h3 class="font-weight-semi-bold"><?php echo $data->nama_barang; ?></h3>
						<div class="d-flex mb-3">
							<div class="text-primary mr-2">
								<small class="fas fa-star"></small>
								<small class="fas fa-star"></small>
								<small class="fas fa-star"></small>
								<small class="fas fa-star-half-alt"></small>
								<small class="far fa-star"></small>
							</div>
							<small class="pt-1"></small>
						</div>
						<h3 class="font-weight-semi-bold mb-4">
							<?php echo "Rp. " . number_format($data->harga, 0, ",", "."); ?></h3>
						<p class="mb-4"><?php echo $data->keterangan; ?></p>
						<div class="d-flex mb-3">
							<p class="text-dark font-weight-medium mb-0 mr-3">Satuan : <?php echo $data->satuan; ?></p>
						</div>
						<div class="d-flex align-items-center mb-4 pt-2">
							<h6 class="qty2">Jumlah : <br></h6>
							<input type="text" hidden name="Id_Barang" value="<?php echo $data->kd_barang; ?>" style="text-align: center;" class="Id_Barang"
										style="text-align: center;"/>
							<div class="row-centered">
								<center>&nbsp;&nbsp;&nbsp;<input type="number" name="quantity" data-min="1"
										data-max="100" value="1" style="text-align: center;" class="qty2"
										style="text-align: center;">
								</center>
							</div>
						</div>
						<p>Tersedia : <?php echo $data->stok; ?></p>
						<br>
						<div class="d-flex align-items-center mb-4 pt-2">
							<button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>
								Masukkan Ke Keranjang
							</button>
						</div>
					</Form>
				</div>
			</div>
		</div>
	</div>
