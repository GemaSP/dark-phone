<div class="main-wrapper bg-dark" style="padding-top: 150px;">
    <div class="container">
        <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">
                <h6>Order ID:
                    <?= $pemesanan['id_pemesanan']; ?>
                </h6>
                <article class="card">
                    <div class="card-body row">
                    <?php if ($pemesanan['status'] == 2 ): ?>
                        <div class="col"> <strong>Perkiraan waktu dikirim:</strong> <br>
                        <?php
                           $timestamp = $pemesanan['tanggal_pesan'];
                           $tanggalTambahTigaHari = strtotime('+1 days', $timestamp);
                           $tanggalBaru = date('d M Y', $tanggalTambahTigaHari);
                           
                           echo $tanggalBaru;
                            ?>
                            
                            </div>
                        <?php elseif ($pemesanan['status'] == 3): ?>
                            <div class="col"> <strong>Perkiraan waktu sampai:</strong> <br>
                            <?php
                           $timestamp = $pemesanan['tanggal_pesan'];
                           $tanggalTambahTigaHari = strtotime('+3 days', $timestamp);
                           $tanggalBaru = date('d M Y', $tanggalTambahTigaHari);
                           
                           echo $tanggalBaru;
                            ?>
                        </div>
                        <?php elseif ($pemesanan['status'] == 4): ?>
                            <div class="col"> <strong>Tanggal diterima:</strong> <br>
                            <?=date('d M Y', $pemesanan['tanggal_diterima']);
                            ?>
                        </div>
                        <?php elseif ($pemesanan['status'] == 5): ?>
                            <div class="col"> <strong>Tanggal pembatalan:</strong> <br>
                            <?=date('d M Y', $pemesanan['tanggal_pesan']);
                            ?>
                        </div>
                            <?php else: ?>
                            
                    
                            <?php endif; ?>
                        
                        <div class="col"> <strong>Dikirim oleh:</strong> <br> DARKPHONE, | <i class="fa fa-phone"></i>
                            +123456789 </div>
                        <div class="col">
                            <?php if ($pemesanan['status'] == 1): ?>
                                <strong>Status: Pesanan belum dibayar</strong> <br>
                            <?php elseif ($pemesanan['status'] == 2): ?>
                                <strong>Status: Pesanan sedang dikemas</strong> <br>
                            <?php elseif ($pemesanan['status'] == 3): ?>
                                <strong>Status: Pesanan sedang dikirim</strong> <br>
                            <?php elseif ($pemesanan['status'] == 4): ?>
                                <strong>Status: Pesanan telah diterima</strong> <br>
                            <?php elseif ($pemesanan['status'] == 5): ?>
                                <strong>Status: Pesanan telah dibatalkan</strong> <br>
                            <?php endif; ?>
                        </div>
                        <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                    </div>
                </article>
                <?php if ($pemesanan['status'] == 1): ?>
                    <div class="track">
                        <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Pesanan dibuat</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">
                                Pesanan dikemas</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">
                                Pesanan dikirim</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span class="text">
                                Pesanan diterima</span> </div>
                    </div>
                <?php elseif ($pemesanan['status'] == 2): ?>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Pesanan dibuat</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">
                                Pesanan dikemas</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">
                                Pesanan dikirim</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span class="text">
                                Pesanan diterima</span> </div>
                    </div>
                <?php elseif ($pemesanan['status'] == 3): ?>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Pesanan dibuat</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">
                                Pesanan dikemas</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                class="text">
                                Pesanan dikirim</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span class="text">
                                Pesanan diterima</span> </div>
                    </div>
                <?php elseif ($pemesanan['status'] == 4): ?>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Pesanan dibuat</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">
                                Pesanan dikemas</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                class="text">
                                Pesanan dikirim</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span
                                class="text">
                                Pesanan diterima</span> </div>
                    </div>
                <?php endif; ?>
                <hr>
                <ul class="row">
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                            <img src="<?= base_url('assets/back-end/img/upload/') . $pemesanan['img']; ?>"
                                alt="Produk" class="img-fluid" style="max-width: 100px;">
                        </div>
                        <div class="col">
                            <!-- Nama produk -->
                            <h5>
                                <?= $pemesanan['nama_gadget']; ?>
                            </h5>
                            <!-- Kuantitas -->
                            <p>Kuantitas:
                                <?= $pemesanan['qty']; ?>
                            </p>
                        </div>
                        <div class="col text-end">
                            <!-- Harga produk -->
                            <p>Harga:
                                Rp
                                <?php echo number_format($pemesanan['harga'], 0, '.', '.'); ?>
                            </p>
                        </div>
                    </div>
                </ul>
                <hr class="m-0 p-0">
                <div class="row">
                    <div class="col-9 border-end border-dark">
                        <p class="text-end">Subtotal Produk</p>
                    </div>
                    <div class="col">
                        <p class="text-end">
                            Rp
                            <?php echo number_format($pemesanan['total_harga'], 0, '.', '.'); ?>
                        </p>
                    </div>
                </div>
                <hr class="m-0 p-0">
                <div class="row">
                    <div class="col-9 border-end border-dark">
                        <p class="text-end">Biaya Pengiriman</p>
                    </div>
                    <div class="col">
                        <p class="text-end">Rp8.000</p>
                    </div>
                </div>
                <hr class="m-0 p-0">
                <div class="row">
                    <div class="col-9 border-end border-dark">
                        <p class="text-end">Biaya layanan</p>
                    </div>
                    <div class="col">
                        <p class="text-end">Rp1.000</p>
                    </div>
                </div>
                <hr class="m-0 p-0">
                <div class="row">
                    <div class="col-9 border-end border-dark">
                        <p class="text-end">Biaya Penanganan</p>
                    </div>
                    <div class="col">
                        <p class="text-end">Rp1.000</p>
                    </div>
                </div>
                <hr class="m-0 p-0">
                <div class="row">
                    <div class="col-9 border-end border-dark">
                        <p class="text-end">Total Pesanan</p>
                    </div>
                    <div class="col">
                        <p class="text-end">
                            Rp
                            <?php echo number_format($pemesanan['total_harga'] + 10000, 0, '.', '.'); ?>
                        </p>
                    </div>
                </div>
                <hr class="mt-0 pt-0">
                <a href="<?= base_url('akun/pesanan'); ?>" class="btn btn-warning" data-abc="true"> <i
                        class="fa fa-chevron-left"></i> Back to
                    orders</a>
            </div>
        </article>
    </div>
</div>