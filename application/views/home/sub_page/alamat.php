<div class="main-wrapper bg-dark" style="padding-top: 104px;">
    <div class="container-fluid">
        <div class="product-div text-white d-flex justify-content-center min-vh-100">
            <div class="product-div-left">
                <!-- Sidebar Start -->
                <div class="sidebar pe-4 pb-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                        <a href="/"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
                            </div>

                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="<?= base_url('akun/profile'); ?>" class="nav-link text-white"
                                    aria-current="page">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#home"></use>
                                    </svg>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('akun/password'); ?>" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#speedometer2"></use>
                                    </svg>
                                    Ubah Password
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('akun/alamat'); ?>" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#table"></use>
                                    </svg>
                                    Alamat
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('akun/keranjang'); ?>" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>
                                    Keranjang
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('akun/pesanan'); ?>" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#people-circle"></use>
                                    </svg>
                                    Pesanan Saya
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <a href="<?= base_url('home'); ?>" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#people-circle"></use>
                                </svg>
                                Kembali ke home
                            </a>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar End -->
            </div>
            <div class="product-div-right bg-dark">
                <div class="container bg-dark">
                    <article class="card bg-dark">
                        <header class="card-header bg-dark">Alamat Saya</header>

                        <?php foreach ($detail_user as $alamat): ?>
                            <div class="card-body bg-dark">
                                <h6>Alamat:</h6>
                                <article class="card bg-dark">
                                    <div class="card-body row">
                                        <div class="col-3 border-end">
                                            <strong>
                                                <?= $alamat['nama']; ?>
                                            </strong>
                                        </div>
                                        <div class="col">
                                            <?= $alamat['no_telp']; ?>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-link">Ubah</a>
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-7">
                                            <?= $alamat['alamat']; ?>
                                        </div>
                                        <div class="col text-end">
                                            <button class="btn-sm btn-primary">Atur sebagai utama</button>
                                        </div>
                                    </div>
                                </article>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>