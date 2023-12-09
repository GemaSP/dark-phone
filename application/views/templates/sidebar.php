<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPhone</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle"
                            src="<?= base_url('assets/back-end/img/profile/') . $user['image']; ?>" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                            <?= $user['username']; ?>
                        </h6>
                        <span>
                            <?php
                            if ($user['role_id'] == 2) {
                                echo 'Member';
                            } else {
                                echo 'Admin';
                            } ?>
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?= base_url('admin'); ?>" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Data Master</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= base_url('gadget/merek'); ?>" class="dropdown-item">Merek Gadget</a>
                            <a href="<?= base_url('gadget'); ?>" class="dropdown-item">Data Gadget</a>
                            <a href="<?= base_url('user/anggota'); ?>" class="dropdown-item">Data User</a>
                            <a href="<?= base_url('pemesanan'); ?>" class="dropdown-item">Data Pemesanan</a>
                            <a href="<?= base_url('pemesanan/transaksi'); ?>" class="dropdown-item">Data Transaksi</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Data Report</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= base_url('gadget/merek'); ?>" class="dropdown-item">Merek Gadget</a>
                            <a href="<?= base_url('gadget'); ?>" class="dropdown-item">Data Gadget</a>
                            <a href="<?= base_url('user/anggota'); ?>" class="dropdown-item">Data User</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->