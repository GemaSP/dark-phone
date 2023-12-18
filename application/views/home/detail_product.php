<div class="main-wrapper bg-dark" style="padding-top: 104px;">
    <div class="container">
        <div class="product-div bg-dark text-white d-flex justify-content-center">
            <div class="product-div-left">
                <img p src="<?= base_url('assets/back-end/img/upload/') . $gadget['img']; ?>" width="300" alt="watch">
            </div>
            <div class="product-div-right">
                <span class="product-name">
                    <?= $gadget['nama_gadget']; ?>
                </span>
                <span class="product-price">
                    Rp<?php echo number_format($gadget['harga'], 0, '.', '.'); ?>
                </span>
                <div class="product-rating">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star-half-alt"></i></span>
                    <span>(350 ratings)</span>
                </div>
                <p class="product-description">
                    <?= $gadget['nama_gadget']; ?> merupakan smartphone dari brand
                    <?= $gadget['nama_merek']; ?> keluaran tahun
                    <?= $gadget['tahun_rilis']; ?>. Ditenagai oleh teknologi canggih, smartphone ini hadir dengan
                    fitur-fitur unggulan yang memukau. Layar luasnya memberikan pengalaman visual yang memikat,
                    sementara kamera berkualitas tinggi memungkinkan Anda menangkap momen-momen berharga dengan detail
                    yang luar biasa. Didesain untuk kebutuhan sehari-hari,
                    <?= $gadget['nama_merek']; ?> adalah kombinasi sempurna antara gaya, keandalan, dan inovasi."
                </p>
                <div class="btn-groups">
                    <button type="button" class="add-cart-btn addcart"><i class="fas fa-shopping-cart"></i>add to cart</button>
                    <button id="buynow"
                        
                        type="button" class="buy-now-btn buynow"><i class="fas fa-wallet"></i>buy now</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
        xhr.open('GET', '/dark-phone/home/checkSessionStatus', true);
        xhr.send();
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('.buynow');

    button.addEventListener('click', function() {
        var gadgetID = this.getAttribute('data-id-gadget');
        sessionExists().then(function(isLoggedIn) {
            if (!isLoggedIn) {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            } else {
                window.location.href = '<?= base_url('home/buynow/').$gadget['id_gadget']; ?>';
                // ...
            }
        }).catch(function(error) {
            console.error('Terjadi kesalahan: ' + error);
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('.addcart');

    button.addEventListener('click', function() {
        var gadgetID = this.getAttribute('data-id-gadget');
        sessionExists().then(function(isLoggedIn) {
            if (!isLoggedIn) {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            } else {
                window.location.href = '<?= base_url('home/buynow/').$gadget['id_gadget']; ?>';
                // ...
            }
        }).catch(function(error) {
            console.error('Terjadi kesalahan: ' + error);
        });
    });
});
</script>