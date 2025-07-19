<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <?php
        if($data)
        foreach($data as $row){
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="<?php echo "gambar/".$row->gambar; ?>">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3"><?php echo $row->nama_barang; ?></h6>
                    <div class="d-flex justify-content-center">
                        <h6><?php echo "Rp. " . number_format($row->harga,0,",","."); ?></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="<?php echo base_url()?>Home/detail/<?php echo $row->kd_barang; ?>" class="btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-info mr-1"></i>Add To Cart
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
