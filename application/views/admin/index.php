<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Pelanggan</p>
                    <h6 class="mb-0">
                        <?= $jumlah_user; ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Stok</p>
                    <h6 class="mb-0">
                        <?= $total_stok; ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Penghasilan</p>
                    <h6 class="mb-0">
                        <?= $total_penghasilan; ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Transaction</p>
                    <h6 class="mb-0">
                        <?= $jumlah_transaksi; ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Sales Chart Start -->
<!-- <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Worldwide Sales</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Salse & Revenue</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div> -->
<!-- Sales Chart End -->


<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">#</th>
                        <th scope="col">id_pemesanan</th>
                        <th scope="col">total_transaksi</th>
                        <th scope="col">Tanggal_pesan</th>
                        <th scope="col">tanggal_kirim</th>
                        <th scope="col">tanggal_diterima</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($transaksi as $t) { ?>
                        <tr>
                            <td>
                                <?= $t['id_transaksi']; ?>
                            </td>
                            <td>
                                <?= $t['id_pemesanan']; ?>
                            </td>
                            <td>Rp
                                <?= $t['total_harga'] + 10000; ?>
                            </td>
                            <td>
                                <?= date('d F Y H:i:s', $t['tanggal_pesan']); ?>
                            </td>
                            <td>
                                <?= date('d F Y H:i:s', $t['tanggal_kirim']); ?>
                            </td>
                            <td>
                                <?= date('d F Y H:i:s', $t['tanggal_diterima']); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->


<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Pesan</h6>
                    <a href="">Show All</a>
                </div>
                <?php if (empty($notifications)) { ?>
                    <div class="d-flex align-items-center justify-content-center py-2" style="min-height: 250px;">
                        <span>Tidak ada Pesan</span>
                    </div>
                <?php } else { ?>
                    <?php foreach ($komentar as $k) { ?>
                        <div class="d-flex align-items-center border-bottom py-3">
                            <img class="rounded-circle flex-shrink-0" src="<?= $k['image']; ?>" alt=""
                                style="width: 40px; height: 40px;">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">
                                        <?= $k['username']; ?>
                                    </h6>
                                    <small>
                                        <?= $k['time']; ?>
                                    </small>
                                </div>
                                <span>
                                    <?= $k['komentar']; ?>
                                </span>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" style="max-height: 375px; overflow-y: auto;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Notifikasi</h6>
                    <a href="">Show All</a>
                </div>
                <?php if (empty($notifikasi)) { ?>
                    <div class="d-flex align-items-center justify-content-center py-2" style="min-height: 250px;">
                        <span>Tidak ada notifikasi</span>
                    </div>
                <?php } else { ?>
                    <?php foreach ($notifikasi as $n) { ?>
                        <div class="d-flex align-items-center border-bottom py-2">
                            <input class="form-check-input m-0" type="checkbox">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <h6 class="fw-normal mb-0">
                                        <?= $n['notifikasi']; ?>
                                    </h6>
                                </div>
                                <span>
                                    <?php
                                    $timestamp = ($n['waktu']);
                                    $current_time = time();
                                    $time_diff = $current_time - $timestamp;

                                    if ($time_diff < 60) {
                                        echo 'baru saja';
                                    } elseif ($time_diff < 3600) {
                                        $ago = round($time_diff / 60);
                                        echo $ago . ' menit yang lalu';
                                    } elseif ($time_diff < 86400) {
                                        $ago = round($time_diff / 3600);
                                        echo $ago . ' jam yang lalu';
                                    } else {
                                        echo date('d M Y', $timestamp);
                                    } ?>
                                </span>
                            </div>
                            <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->