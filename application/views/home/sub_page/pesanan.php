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
                <!-- Tab-menu untuk status pesanan -->
                <div class="container">
                    <ul class="nav nav-tabs custom-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link active btn btn-block" id="semua-tab" data-bs-toggle="tab"
                                data-bs-target="#semua" type="button" role="tab" aria-controls="semua"
                                aria-selected="true">Semua</button>
                        </li>
                        <!-- Tab Belum Bayar -->
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link btn btn-block" id="belumBayar-tab" data-bs-toggle="tab"
                                data-bs-target="#belumBayar" type="button" role="tab" aria-controls="belumBayar"
                                aria-selected="false">Belum
                                Bayar</button>
                        </li>
                        <!-- Tab Sedang Dikemas -->
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link btn btn-block" id="sedangDikemas-tab" data-bs-toggle="tab"
                                data-bs-target="#sedangDikemas" type="button" role="tab" aria-controls="sedangDikemas"
                                aria-selected="false">Sedang Dikemas</button>
                        </li>
                        <!-- Tab Dikirim -->
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link btn btn-block" id="dikirim-tab" data-bs-toggle="tab"
                                data-bs-target="#dikirim" type="button" role="tab" aria-controls="dikirim"
                                aria-selected="false">Dikirim</button>
                        </li>
                        <!-- Tab Selesai -->
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link btn btn-block" id="selesai-tab" data-bs-toggle="tab"
                                data-bs-target="#selesai" type="button" role="tab" aria-controls="selesai"
                                aria-selected="false">Selesai</button>
                        </li>
                        <!-- Tab Dibatalkan -->
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link btn btn-block " id="dibatalkan-tab" data-bs-toggle="tab"
                                data-bs-target="#dibatalkan" type="button" role="tab" aria-controls="dibatalkan"
                                aria-selected="false">Dibatalkan</button>
                        </li>
                    </ul>
                    <!-- Konten untuk setiap tab -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Konten Tab Semua -->
                        <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                            <!-- Isi konten untuk tab Dikirim -->
                            <?php
                            $totalHargaSemuaProduk = 0;
                            foreach ($pemesanan as $p): ?>
                                <div class="container mt-5 border">
                                    <div class="row">
                                        <div class="col mt-2">
                                            <!-- Deskripsi pesanan -->
                                            <?php if ($p['status'] == 1): ?>
                                                <p class="text-end">Pesanan belum dibayar</p>
                                            <?php elseif ($p['status'] == 2): ?>
                                                <p class="text-end">Pesanan sedang dikemas</p>
                                            <?php elseif ($p['status'] == 3): ?>
                                                <p class="text-end">Pesanan sedang dikirim</p>
                                            <?php elseif ($p['status'] == 4): ?>
                                                <p class="text-end">Pesanan telah diterima</p>
                                            <?php elseif ($p['status'] == 5): ?>
                                                <p class="text-end">Pesanan telah dibatalkan</p>
                                            <?php endif; ?>
                                            <hr class="line">
                                            <!-- Gambar produk -->
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <img src="<?= base_url('assets/back-end/img/upload/') . $p['img']; ?>"
                                                        alt="Produk" class="img-fluid" style="max-width: 100px;">
                                                </div>
                                                <div class="col">
                                                    <!-- Nama produk -->
                                                    <h5>
                                                        <?= $p['nama_gadget']; ?>
                                                    </h5>
                                                    <!-- Kuantitas -->
                                                    <p>Kuantitas:
                                                        <?= $p['qty']; ?>
                                                    </p>
                                                </div>
                                                <div class="col text-end">
                                                    <!-- Harga produk -->
                                                    <p>Harga:
                                                        Rp
                                                        <?php echo number_format($p['harga'], 0, '.', '.'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Garis horizontal -->
                                            <hr class="line">
                                            <!-- Tombol selesai dan ajukan kembalian -->
                                            <div class="row align-items-center mb-3">
                                                <div class="col text-end">
                                                    <p>Total Pesanan:
                                                        Rp
                                                        <?php echo number_format($p['total_harga'] + 10000, 0, '.', '.'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center align-items-center mb-3">
                                                <div class="col text-start">
                                                    <p class="text-muted mb-0">Silahkan konfirmasi setelah menerima pesanan
                                                    </p>
                                                </div>
                                                <div class="col text-end">
                                                    <button class="btn-sm btn-primary me-2">Pesanan Selesai</button>
                                                    <button
                                                        onclick="window.location.href='<?= base_url('pesanan/detailpesanan/') . $p['id_pemesanan']; ?>';"
                                                        class="btn-sm btn-secondary">Detail Pesanan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Konten Tab Belum Bayar -->
                        <div class="tab-pane fade" id="belumBayar" role="tabpanel" aria-labelledby="belumBayar-tab">
                            Konten untuk status Belum Bayar
                        </div>
                        <!-- Konten Tab Sedang Dikemas -->
                        <div class="tab-pane fade" id="sedangDikemas" role="tabpanel"
                            aria-labelledby="sedangDikemas-tab">
                            <!-- Konten Tab Semua -->
                            <?php
                            $adaPesananStatus2 = false; // Inisialisasi variabel untuk menandai keberadaan pesanan dengan status 2
                            foreach ($pemesanan as $p):
                                if ($p['status'] == 2):
                                    $adaPesananStatus2 = true; // Mengatur variabel jika ada pesanan dengan status 2
                                    ?>
                                    <div class="container mt-5 border">
                                        <div class="row">
                                            <div class="col mt-2">
                                                <!-- Deskripsi pesanan -->
                                                <p class="text-end">Pesanan sedang dikemas</p>
                                                <hr class="line">
                                                <!-- Gambar produk -->
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <img src="<?= base_url('assets/back-end/img/upload/') . $p['img']; ?>"
                                                            alt="Produk" class="img-fluid" style="max-width: 100px;">
                                                    </div>
                                                    <div class="col">
                                                        <!-- Nama produk -->
                                                        <h5>
                                                            <?= $p['nama_gadget']; ?>
                                                        </h5>
                                                        <!-- Kuantitas -->
                                                        <p>Kuantitas:
                                                            <?= $p['qty']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="col text-end">
                                                        <!-- Harga produk -->
                                                        <p>Harga:
                                                            <?= $p['harga']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- Garis horizontal -->
                                                <hr class="line">
                                                <!-- Tombol selesai dan ajukan kembalian -->
                                                <div class="row align-items-center mb-3">
                                                    <div class="col text-end">
                                                        <p>Total Pesanan: Rp
                                                            <?= $p['total_harga']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center align-items-center mb-3">
                                                    <div class="col text-start">
                                                        <p class="text-muted mb-0">Silahkan konfirmasi setelah menerima
                                                            pesanan
                                                        </p>
                                                    </div>
                                                    <div class="col text-end">
                                                        <button class="btn-sm btn-primary me-2">Pesanan Selesai</button>
                                                        <button
                                                        onclick="window.location.href='<?= base_url('pesanan/detailpesanan/') . $p['id_pemesanan']; ?>';"
                                                        class="btn-sm btn-secondary">Detail Pesanan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            endforeach;
                            if (!$adaPesananStatus2): // Menampilkan pesan jika tidak ada pesanan dengan status 2
                                ?>
                                <p>Tidak ada pesanan yang sedang dikemas</p>
                            <?php endif; ?>
                        </div>
                        <!-- Konten Tab Dikirim -->
                        <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
                            <?php
                            $adaPesananStatus2 = false; // Inisialisasi variabel untuk menandai keberadaan pesanan dengan status 2
                            foreach ($pemesanan as $p):
                                if ($p['status'] == 3):
                                    $adaPesananStatus2 = true; // Mengatur variabel jika ada pesanan dengan status 2
                                    ?>
                                    <div class="container mt-5 border">
                                        <div class="row">
                                            <div class="col mt-2">
                                                <!-- Deskripsi pesanan -->
                                                <p class="text-end">Pesanan sedang dikirim</p>
                                                <hr class="line">
                                                <!-- Gambar produk -->
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <img src="<?= base_url('assets/back-end/img/upload/') . $p['img']; ?>"
                                                            alt="Produk" class="img-fluid" style="max-width: 100px;">
                                                    </div>
                                                    <div class="col">
                                                        <!-- Nama produk -->
                                                        <h5>
                                                            <?= $p['nama_gadget']; ?>
                                                        </h5>
                                                        <!-- Kuantitas -->
                                                        <p>Kuantitas:
                                                            <?= $p['qty']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="col text-end">
                                                        <!-- Harga produk -->
                                                        <p>Harga:
                                                            <?= $p['harga']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- Garis horizontal -->
                                                <hr class="line">
                                                <!-- Tombol selesai dan ajukan kembalian -->
                                                <div class="row align-items-center mb-3">
                                                    <div class="col text-end">
                                                        <p>Total Pesanan: Rp
                                                            <?= $p['total_harga']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center align-items-center mb-3">
                                                    <div class="col text-start">
                                                        <p class="text-muted mb-0">Silahkan konfirmasi setelah menerima
                                                            pesanan
                                                        </p>
                                                    </div>
                                                    <div class="col text-end">
                                                        <button onclick="window.location.href='<?= base_url('pesanan/konfirmasi/') . $p['id_pemesanan']; ?>';" class="btn-sm btn-primary me-2">Pesanan Selesai</button>
                                                        <button
                                                        onclick="window.location.href='<?= base_url('pesanan/detailpesanan/') . $p['id_pemesanan']; ?>';"
                                                        class="btn-sm btn-secondary">Detail Pesanan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            endforeach;
                            if (!$adaPesananStatus2): // Menampilkan pesan jika tidak ada pesanan dengan status 2
                                ?>
                                <p>Tidak ada pesanan yang sedang dikirim</p>
                            <?php endif; ?>
                        </div>
                        <!-- Konten Tab Selesai -->
                        <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                        <?php
                            $adaPesananStatus2 = false; // Inisialisasi variabel untuk menandai keberadaan pesanan dengan status 2
                            foreach ($pemesanan as $p):
                                if ($p['status'] == 4):
                                    $adaPesananStatus2 = true; // Mengatur variabel jika ada pesanan dengan status 2
                                    ?>
                                    <div class="container mt-5 border">
                                        <div class="row">
                                            <div class="col mt-2">
                                                <!-- Deskripsi pesanan -->
                                                <p class="text-end">Pesanan telah diterima dan selesai di konfirmasi</p>
                                                <hr class="line">
                                                <!-- Gambar produk -->
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <img src="<?= base_url('assets/back-end/img/upload/') . $p['img']; ?>"
                                                            alt="Produk" class="img-fluid" style="max-width: 100px;">
                                                    </div>
                                                    <div class="col">
                                                        <!-- Nama produk -->
                                                        <h5>
                                                            <?= $p['nama_gadget']; ?>
                                                        </h5>
                                                        <!-- Kuantitas -->
                                                        <p>Kuantitas:
                                                            <?= $p['qty']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="col text-end">
                                                        <!-- Harga produk -->
                                                        <p>Harga:
                                                            <?= $p['harga']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- Garis horizontal -->
                                                <hr class="line">
                                                <!-- Tombol selesai dan ajukan kembalian -->
                                                <div class="row align-items-center mb-3">
                                                    <div class="col text-end">
                                                        <p>Total Pesanan: Rp
                                                            <?= $p['total_harga']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center align-items-center mb-3">
                                                    <div class="col text-start">
                                                        <p class="text-muted mb-0">Silahkan konfirmasi setelah menerima
                                                            pesanan
                                                        </p>
                                                    </div>
                                                    <div class="col text-end">
                                                        <button class="btn-sm btn-primary me-2">Ajukan Pengembalian</button>
                                                        <button
                                                        onclick="window.location.href='<?= base_url('pesanan/detailpesanan/') . $p['id_pemesanan']; ?>';"
                                                        class="btn-sm btn-secondary">Detail Pesanan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            endforeach;
                            if (!$adaPesananStatus2): // Menampilkan pesan jika tidak ada pesanan dengan status 2
                                ?>
                                <p>Tidak ada pesanan yang sedang dikemas</p>
                            <?php endif; ?>
                        </div>
                        <!-- Konten Tab Dibatalkan -->
                        <div class="tab-pane fade" id="dibatalkan" role="tabpanel" aria-labelledby="dibatalkan-tab">
                            Konten untuk status Dibatalkan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>