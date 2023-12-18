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
                                <a href="<?= base_url('akun'); ?>" class="nav-link text-white" aria-current="page">
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
                <div class="rounded h-100 p-4">
                    <h6 class="mb-4">Ubah Profile</h6>
                    <?= form_open_multipart('akun'); ?>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= $user['username']; ?>">
                            <?= form_error('username', '<small class="textdanger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">Gambar</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="mb-3">
                                    <img id="image-preview" width="150" alt="placeholder"
                                        src="<?= base_url('assets/back-end/img/profile/') . $user['image']; ?>"
                                        width="150" class="imgthumbnail" alt="">
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="image" name="image"
                                        accept="image/*" onchange="updatePreview(this, 'image-preview')">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a class="btn btn-dark" href="<?= base_url('user'); ?>">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function updatePreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }
</script>