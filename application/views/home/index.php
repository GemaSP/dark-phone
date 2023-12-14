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
                            <img src="<?php echo base_url('assets/back-end/img/upload/') . $g['img']; ?>" width="160"
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
                            <a  style="cursor: pointer;" data-id-gadget="<?= $g['id_gadget']; ?>"
                                class="badge bg-primary d-flex me-2 text-decoration-none tombol_tambah_keranjang">
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




<script>
function sessionExists() {
    return new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    resolve(response.isLoggedIn);
                } else {
                    reject(xhr.status);
                }
            }
        };
        xhr.open('GET', 'home/checkSessionStatus', true);
        xhr.send();
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.tombol_tambah_keranjang');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var gadgetID = this.getAttribute('data-id-gadget');
            sessionExists().then(function(isLoggedIn) {
                if (!isLoggedIn) {
                    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    errorModal.show();
                } else {
                    window.location.href ='<?= base_url('home/tambahKeranjang/'); ?>' + gadgetID;
                    // ...
                }
            }).catch(function(error) {
                console.error('Terjadi kesalahan: ' + error);
            });
        });
    });
});
</script>