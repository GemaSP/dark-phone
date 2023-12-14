<!-- footer -->
<section id="footer">
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row text-white g-4">
                <div class="col-md-6 col-lg-3">
                    <a class="text-uppercase text-decoration-none brand text-white" href="index.html">DarkPhone</a>
                    <p class="text-white text-muted mt-3">DarkPhone adalah website Penjualan Smartphone disini kalian
                        bisa membeli smartphone yang kalian inginkan.</p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light">Links</h5>
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="#header" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#products" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Products
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#about" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> About Us
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#footer" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Contact Us</h5>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-map-marked-alt"></i>
                        </span>
                        <span class="fw-light">
                            Ciherang Street, Bogor, Jabar, Indonesia
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="fw-light">
                            gesap02@gmail.com
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="fw-light">
                            +62 858 1100 360
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class="list-unstyled d-flex">
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
<!-- end of footer -->
<!-- Modal untuk form daftar -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Form Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form daftar -->
                <?= $this->session->flashdata('pesan'); ?>
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
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Form Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form login -->
                <div id="error-message" class="alert alert-danger alert-message" role="alert"></div>
                <form id="form-login" method="post" action="<?= base_url('pelanggan'); ?>">
                    <!-- Isi dengan form login yang sesuai -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <!-- Pesan kesalahan -->
                        <small class="text-danger pl-3"><?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <!-- Pesan kesalahan -->
                        <small class="text-danger pl-3"><?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Silahkan login terlebih dahulu sebelum menambahkan item ke keranjang
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>



<!-- jquery -->
<script src="<?= base_url('assets/front-end/home/'); ?>js/jquery-3.6.0.js"></script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<!-- bootstrap js -->
<script src="<?= base_url('assets/front-end/home/'); ?>bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="<?= base_url('assets/front-end/home/'); ?>js/script.js"></script><script>
$('#loginModal').on('shown.bs.modal', function () {
    // Event ini akan terpanggil ketika modal ditampilkan sepenuhnya
    $('#form-login').submit(function(e) {
        e.preventDefault(); // Mencegah form submit default

        var formData = $(this).serialize(); // Mengambil data form

        $.ajax({
            url: $(this).attr('action'), // Sesuaikan dengan URL Anda
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect; // Redirect jika login berhasil
                } else {
                    $('#error-message').html(response.message); // Menampilkan pesan kesalahan
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Tampilkan respons error ke console jika terjadi kesalahan
            }
        });
    });
});
</script>
</body>

</html>