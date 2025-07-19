<div class="container-fluid pt-5">
    <form method="post" action="<?php echo base_url() ?>keranjang/checkout" name="form">
        <div class="row px-xl-5">
            <div class="col-lg-12 mb-5">
                <div class="cart-list">
                    <p>Daftar Data Barang</p>
                    <table class="table-bordered" width="100%" align="center">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data) {
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
                                        <td class="image-prod"><img class="img-fluid" src="<?php echo base_url() ?>gambar/<?php echo $row->gambar; ?>" width="80" height="80"></td>
                                        <td class="product-name"><?php echo $row->nama_barang ?></td>
                                        <td class="price">Rp. <?php echo number_format($row->harga) ?></td>
                                        <td class="quantity"><?php echo $row->qty ?></td>
                                        <td class="total">Rp. <?php echo number_format($row->qty * $row->harga) ?></td>
                                        <td>
                                            <div onclick="javascript: return confirm('Batalkan Pesanan..?')">
                                                <a href="<?php echo base_url() ?>keranjang/clear/<?php echo $row->kd_barang ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                    Batal
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                        </tbody>
                        <tr>
                            <td colspan="5" align="right">Grand Total :</td>
                            <td align="center">Rp. <?php echo number_format($grandtotal) ?></td>
                        </tr>
                    </table>
                    <br><br>
                    <a href="<?php echo base_url() ?>Home/index" class="btn btn-info">Continue shopping</a><br><br>
                    <button type="submit" name="submit" class="btn btn-primary px-3" value="Checkout">Checkout</button>
                    <br>
                </div>
            </div>
        </div>
    </form>
</div>
