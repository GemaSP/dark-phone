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
                                <a href="<?= base_url('akun'); ?>" class="nav-link text-white"
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
                            <!-- <li>
                                <a href="<?= base_url('akun/keranjang'); ?>" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>
                                    Keranjang
                                </a>
                            </li> -->
                            <li>
                                <a href="<?= base_url('pesanan'); ?>" class="nav-link text-white">
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
                <div class=" rounded h-100 p-4">
                    <h3 class="mb-4">Change Password</h3>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form action=" <?= base_url('akun/password'); ?> " method="post">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <?= form_error('current_password', '<small class="textdanger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="new_password1" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                            <?= form_error('new_password1', '<small class="textdanger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="new_password2" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <?= form_error('new_password2', '<small class="textdanger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                        <button type="cancel" class="btn btn-primary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>