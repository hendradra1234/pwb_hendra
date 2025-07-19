<div class="container-fluid pt-9">
    <div class="text-center mb-4"><br>
        <h2 class="section-title px-5"><span class="px-2">Silakan Buat Akun Anda</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div id="success"></div>
            <?php if(isset($error)) echo $error; ?><br>
            <form name="form" method="post" action="<?php echo base_url() ?>login/simpan_registrasi">
                <div class="form-group">
                    <b><label for="email_pelanggan"></label></b>
                    <input type="email" class="form-control" name="email_pelanggan" id="email_pelanggan" placeholder="Masukkan Email Anda">
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="nama_pelanggan"></label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukkan Nama Pelanggan">
                </div>
                <div class="form-group">
                    <label for="alamat_pelanggan"></label>
                    <input type="text" class="form-control" name="alamat_pelanggan" id="alamat_pelanggan" placeholder="Masukkan Alamat Pelanggan">
                </div>
                <div class="form-group">
                    <label for="telp_pelanggan"></label>
                    <input type="text" class="form-control" name="telp_pelanggan" id="telp_pelanggan" placeholder="Masukkan Telpon Pelanggan">
                </div>
                <div class="form-group">
                    <label for="kota_pelanggan"></label>
                    <input type="text" class="form-control" name="kota_pelanggan" id="kota_pelanggan" placeholder="Masukkan Kota Pelanggan">
                </div>
                <br>
                <div class="text-center">
                    <input name="submit" value="BUAT AKUN" class="btn btn-info py-2 px-4" type="submit" id="sendMessageButton">
                </div>
            </form>
        </div>
    </div>
</div>
