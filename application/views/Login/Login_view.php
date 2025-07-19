<div class="container-fluid pt-9">
    <div class="text-center mb-4"><br>
        <h2 class="section-title px-5"><span class="px-2">Silakan Login Disini</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div id="success"><br>
                <?php if(isset($error)) echo $error; ?> <br>
                <form name="form" method="post" action="<?php echo base_url()?>login/authentication">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email_pelanggan" id="email_pelanggan" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                    </div>
                    <center>
                        <button class="btn btn-info py-2 px-4" name="submit" value="Login" type="submit" id="sendMessageButton">LOGIN</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
