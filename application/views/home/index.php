<!-- products -->
<section id="products" class="py-5">
    <div class="container text-white">
        <div class="title text-center">
            <h2 class="position-relative text-white d-inline-block">Products</h2>
        </div>

        <div class="row g-0">
            <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                <button type="button" class="btn m-2 text-dark active-filter-btn" data-filter="*">All</button>
                <?php foreach ($merek as $m): ?>
                    <button type="button" class="btn m-2 text-dark" data-filter=".<?= $m['nama_merek']; ?>">
                        <?= $m['nama_merek']; ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="collection-list mt-4 row gx-0 gy-3">
                <?php foreach ($gadget as $g): ?>
                    <div class="col-md-6 col-lg-4 col-xl-2 p-2  <?php echo $g['nama_merek']; ?>">
                        <div class="d-flex justify-content-center m-2">
                            <img src="<?php echo base_url('assets/back-end/img/upload/') . $g['image']; ?>" width="160"
                                height="212">
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">
                                <?php echo $g['nama_gadget']; ?>
                            </p>
                            <span class="fw-bold">
                                Rp<?php echo number_format($g['harga'], 0, '.', '.'); ?>
                            </span>
                        </div>
                        <!-- Badges for Add to Cart and Details -->
                        <div class="d-flex justify-content-center m-2">
                            <a href="<?= base_url('home/tambahKeranjang/') . $g['id_gadget']; ?>"
                                class="badge bg-primary d-flex me-2 text-decoration-none">
                                <i class="fa fa-shopping-cart me-1"></i><span class="ms-1">Add</span>
                            </a>
                            <a href="<?= base_url('home/detailProducts/') . $g['id_gadget']; ?>"
                                class="badge bg-secondary d-flex text-decoration-none">
                                <i class="fa fa-search me-1"></i><span class="ms-1">Details</span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- end of collection -->
<!-- about us -->
<section id="about" class="py-5">
    <div class="container text-white">
        <div class="row gy-lg-5 align-items-center">
            <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                <div class="title pt-3 pb-5">
                    <h2 class="position-relative d-inline-block ms-4">About Us</h2>
                </div>
                <p class="lead text-muted">Kita disini membuat website DarkPhone.</p>
                <p>Kami membuat website DarkPhone karena menurut kami website ini mampu untuk meningkatkan daya jual
                    smartphone.</p>
            </div>
            <div class="col-lg-6 order-lg-0">
                <img width="100%" src="<?= base_url('assets/front-end/home/images/about us.jpg'); ?>" alt=""
                    class="img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- end of about us -->

<!-- Modal untuk form login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center justify-content-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Form Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form login -->
                <form method="post" action="<?= base_url('pelanggan'); ?>">
                    <!-- Isi dengan form login yang sesuai -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk form daftar -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center justify-content-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Form Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form daftar -->
                <form method="post" action="<?= base_url('pelanggan/registrasi'); ?>">
                    <!-- Isi dengan form daftar yang sesuai -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>