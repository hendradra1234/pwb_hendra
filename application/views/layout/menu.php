<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EComerce ISB ATMA LUHUR</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url() ?>img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url() ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="<?php echo base_url() ?>" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-success font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-info">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="<?php echo base_url() ?>" class="btn border">
                    <i class="fas fa-heart text-danger"></i>
                    <span class="badge">0</span>
                </a>
                <a href="<?php echo base_url() ?>" class="btn border">
                    <i class="fas fa-shopping-cart text-info"></i>
                    <span class="badge">0</span>
                </a>
            </div>
           <div class="col-lg-12 text-right">
			<?php
				if(($this->session->userdata('email_pelanggan')) != null) {
					?>
					<b>Selamat Datang, <?php echo $_SESSION['email_pelanggan']; ?></b>
					<a href="<?php echo base_url(); ?>login/logout" class="btn btn-info">Logout</a>
					<?php
				} else {
					?>
					<a href="<?php echo base_url(); ?>login" class="btn btn-info">Login</a>
					<a href="<?php echo base_url(); ?>login/registrasi" class="btn btn-info">Register</a>
					<?php
				}
				?>
			</div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-0">
        <div class="row border-top px-xl-5">

            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="<?php echo base_url() ?>" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-info font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?php echo base_url() ?>" class="nav-item nav-link active">Home</a>
                            <a href="<?php echo base_url() ?>produk" class="nav-item nav-link">Produk</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="<?php echo base_url() ?>baju" class="dropdown-item">Baju Kaos</a>
                                    <a href="<?php echo base_url() ?>celana" class="dropdown-item">Celana</a>
                                    <a href="<?php echo base_url() ?>jaket" class="dropdown-item">Jaket</a>
                                    <a href="<?php echo base_url() ?>kemeja" class="dropdown-item">Kemeja</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Histori Pesanan</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <!-- <a href="<?php echo base_url() ?>keranjang" class="dropdown-item">Keranjang</a>
									<a href="<?php echo base_url() ?>pembayaran" class="dropdown-item">Konfirmasi Pembayaran</a> -->
									<a href="<?php echo base_url() ?>keranjang/histori_pesanan_pelanggan" class="dropdown-item">Histori Pesanan</a>
                                </div>
                            </div>
                            <a href="<?php echo base_url() ?>hubungikami" class="nav-item nav-link">Hubungi Kami</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Slider Start -->

    <!-- Slder End -->


    <!-- Products Start -->
    <hr>
    <!-- Products End -->

    <!-- Footer Start -->
