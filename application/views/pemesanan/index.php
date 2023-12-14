<!-- Recent Sales Start -->
<div class="container-fluid pt-2 px-4">
    <h1 class="">Data Gadget</h1>
    <div class="bg-secondary text-center rounded p-4">
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php } ?>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#gadgetBaruModal"><i
                    class="fas fa-file-alt"></i> Tambah Gadget</a>

            <form class="d-none d-md-flex ms-4">
                <input id="searchInput" class="form-control bg-dark border-0" type="search" placeholder="Search">
            </form>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Kode Pemesanan</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Nama Smartphone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($pemesanan as $p) { ?>
                        <tr>
                            <td>
                                <?= $p['id_pemesanan']; ?>
                            </td>
                            <td>
                                <?= $p['username']; ?>
                            </td>
                            <td>
                                <?= $p['nama_gadget']; ?>
                            </td>
                            <td>
                                <?php
                                if ($p['status'] == 1) {
                                    echo "Belum dibayar";
                                } else if ($p['status'] == 2) {
                                    echo "Dikemas";
                                } else if ($p['status'] == 3) {
                                    echo "Dikirim";
                                } else if ($p['status'] == 4) {
                                    echo "Diterima";
                                } else if ($p['status'] == 5) {
                                    echo "Dikembalikan";
                                } else {
                                    echo "";
                                }
                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailPemesananModal<?= $p['id_pemesanan']; ?>">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Ubah gadget baru-->
<?php
foreach ($pemesanan as $p) { ?>
    <div class="modal fade" id="detailPemesananModal<?php echo $p['id_pemesanan']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="detailPemesananModalLabel" ariahidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPemesananModalLabel">Detail Pemesanan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <article class="card bg-secondary text-white mb-3 border-white">
                        <div class="card-body bg-secondary">
                            <h6>Order ID:
                                <?= $p['id_pemesanan']; ?>
                            </h6>
                            <article class="card bg-secondary">
                                <div class="card-body row">
                                    <div class="card-body row">
                                        <div class="col-auto">
                                            <p class="card-text">Nama: <span id="namaOutput">
                                                    <?= $p['nama']; ?>
                                                </span></p>
                                            <p class="card-text">No Telepon: <span id="noTelpOutput">
                                                    <?= $p['no_telp']; ?>
                                                </span></p>
                                        </div>
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <div class="text-justify">
                                                <p id="alamatOutput" class="card-text mb-0">
                                                    <?= $p['alamat']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php if ($p['status'] == 1): ?>
                                <div class="track text-white">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                            class="text text-white">Pesanan dibuat</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">
                                            Pesanan dikemas</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                            class="text text-white">
                                            Pesanan dikirim</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span
                                            class="text text-white">
                                            Pesanan diterima</span> </div>
                                </div>
                            <?php elseif ($p['status'] == 2): ?>
                                <div class="track text-white">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                            class="text text-white">Pesanan dibuat</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                            class="text text-white">
                                            Pesanan dikemas</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                            class="text text-white">
                                            Pesanan dikirim</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span
                                            class="text text-white">
                                            Pesanan diterima</span> </div>
                                </div>
                            <?php elseif ($p['status'] == 3): ?>
                                <div class="track text-white">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                            class="text text-white">Pesanan dibuat</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                            class="text text-white">
                                            Pesanan dikemas</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                            class="text text-white">
                                            Pesanan dikirim</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-handshake"></i> </span> <span
                                            class="text text-white">
                                            Pesanan diterima</span> </div>
                                </div>
                            <?php elseif ($p['status'] == 4): ?>
                                <div class="track text-white">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                            class="text text-white">Pesanan dibuat</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                            class="text text-white">
                                            Pesanan dikemas</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                            class="text text-white">
                                            Pesanan dikirim</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-handshake"></i> </span>
                                        <span class="text text-white">
                                            Pesanan diterima</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <hr>
                            <ul class="row">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <img src="<?= base_url('assets/back-end/img/upload/') . $p['img']; ?>" alt="Produk"
                                            class="img-fluid" style="max-width: 50px;">
                                    </div>
                                    <div class="col">
                                        <!-- Nama produk -->
                                        <h6>
                                            <?= $p['nama_gadget']; ?>
                                        </h6>
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
                            </ul>
                            <hr class="m-0 p-0">
                            <div class="row">
                                <div class="col-9 border-end border-dark">
                                    <p class="text-end">Subtotal Produk</p>
                                </div>
                                <div class="col">
                                    <p class="text-end">
                                        Rp
                                        <?php echo number_format($p['total_harga'], 0, '.', '.'); ?>
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
                                        <?php echo number_format($p['total_harga'] + 10000, 0, '.', '.'); ?>
                                    </p>
                                </div>
                            </div>
                            <hr class="mt-0 pt-0">
                            <a href="<?= base_url('Pemesanan/updatePemesanan/') . $p['id_pemesanan']; ?>"
                                class="btn btn-warning text-dark"><i class="fas fa-edit"></i>
                                <?php
                                if ($p['status'] == 1) {
                                    echo "Ingatkan";
                                } else if ($p['status'] == 2) {
                                    echo "Kirimkan";
                                } else if ($p['status'] == 3) {
                                    echo "Menunggu Konfirmasi";
                                } else {
                                    echo "Selesai";
                                }
                                ?>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Recent Sales End -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            var searchText = $(this).val().trim();

            $.ajax({
                url: '<?= base_url('gadget/searchgadget'); ?>',
                method: 'POST',
                data: { searchText: searchText },
                success: function (response) {
                    $('.table').html(response);
                }
            });
        });
    });
</script>