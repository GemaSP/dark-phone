<!-- header -->
<?= $this->session->flashdata('pesan'); ?>
    <header id = "header" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px;">
        <div class = "h-100 d-flex align-items-center">
            <div class = "text-center carousel-item active">
                <img src="<?= base_url('assets/front-end/home/images/PocoF5.jpg');?>" width="100%" alt="">
            </div>
            <div class = "text-center carousel-item">
                <img src="<?= base_url('assets/front-end/home/images/Poco X5 pro.jpg');?>" width="100%" alt="">
            </div>
        </div>

        <button class = "carousel-control-prev" type = "button" data-bs-target="#header" data-bs-slide = "prev">
            <span class = "carousel-control-prev-icon"></span>
        </button>
        <button class = "carousel-control-next" type = "button" data-bs-target="#header" data-bs-slide = "next">
            <span class = "carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->