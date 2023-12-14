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
                    <button type="button" class="add-cart-btn"><i class="fas fa-shopping-cart"></i>add to cart</button>
                    <button id="buynow"
                        onclick="window.location.href='<?= base_url('home/buyNow/') . $gadget['id_gadget']; ?>';"
                        type="button" class="buy-now-btn"><i class="fas fa-wallet"></i>buy now</button>
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