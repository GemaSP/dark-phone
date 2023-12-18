<nav class="navbar navbar-expand-lg navbar-light bg-dark py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.html">
            <img src="<?= base_url('assets/front-end/home/images/D.jpg'); ?>">
            <span class="text-uppercase text-white fw-lighter ms-2">DarkPhone</span>
        </a>

        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="<?= base_url('home'); ?>#header">home</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="<?= base_url('home'); ?>#products">products</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="#about">about us</a>
                </li>
                <li class="nav-item px-2 py-2 border-0">
                    <a class="nav-link text-uppercase text-white" href="#footer">Contact us</a>
                </li>
            </ul>
        </div>
        <!-- Garis pemisah -->
         
    <?php
    // Misalkan $isLoggedIn adalah variabel yang menunjukkan status login pengguna // Ganti dengan logika sesuai kondisi login di backend

    if (!empty($this->session->userdata('email'))) {
        // Jika pengguna telah login, tampilkan menu selamat datang dan dropdown
    ?>
        <div class="d-flex align-items-center">
        <div class="dropdown">
            <a class="text-white dropdown-toggle text-decoration-none" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- Ganti dengan round profile icon atau avatar -->
                <img src="<?= base_url('assets/back-end/img/profile/').$user['image']; ?> "width="50" height="50" class="rounded-circle">
                <?=$user['username'];?> <!-- Ganti dengan nama pengguna yang sesuai -->
            </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="<?= base_url('akun'); ?>">Akun Saya</a></li>
                <li><a class="dropdown-item" href="<?= base_url('pesanan'); ?>">Pesanan Saya</a></li>
                <li><a class="dropdown-item" href="<?= base_url('pelanggan/logout'); ?>">Logout</a></li>
            </ul>
        </div>
        <!-- Symbol keranjang diganti -->
        <a href="<?= base_url('keranjang');?>" class="text-white position-relative ms-2">
            <i class="fa fa-shopping-cart"></i>
            <!-- Ganti dengan icon keranjang yang sesuai -->
            <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"><?= $jumlah_data;?></span>
        </a>
        </div>
    <?php } else { ?>
        <div class="order-lg-3">
        <!-- Jika pengguna belum login, tampilkan tombol Masuk dan Daftar -->
        <a href="#loginModal" class="text-white" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</a>
        <a href="#registerModal" class="text-white" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</a>
        <!-- Symbol keranjang diganti -->
        <a href="#" class="text-white position-relative ms-2">
            <i class="fa fa-shopping-cart"></i>
            <!-- Ganti dengan icon keranjang yang sesuai -->
            <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">0</span>
        </a>
    </div>
    <?php } ?>

    
    </div>
</nav>