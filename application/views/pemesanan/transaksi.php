<!-- Recent Sales Start -->
<div class="container-fluid pt-2 px-4">
<h1 class="">Data Gadget</h1>
                <div class="bg-secondary text-center rounded p-4">
                <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                    <a href="" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#gadgetBaruModal"><i class="fas fa-file-alt"></i> Tambah Gadget</a>
                        
                    <form class="d-none d-md-flex ms-4">
                    <input id="searchInput" class="form-control bg-dark border-0" type="search" placeholder="Search">
                    </form>
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
                                    <td><?= $t['id_transaksi']; ?></td>
                                    <td><?= $t['id_pemesanan']; ?></td>
                                    <td>Rp<?= $t['total_harga'] + 10000; ?></td>
                                    <td><?= date('d F Y H:i:s', $t['tanggal_pesan']);?></td>
                                    <td><?= date('d F Y H:i:s', $t['tanggal_kirim']); ?></td>
                                    <td><?= date('d F Y H:i:s', $t['tanggal_diterima']); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
