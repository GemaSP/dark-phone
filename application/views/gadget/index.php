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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun Rilis</th>
                                    <th scope="col">Merek</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $a = 1;
                                    foreach ($gadget as $g) { ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                    <td><?= $g['nama_gadget']; ?></td>
                                    <td><?= $g['tahun_rilis']; ?></td>
                                    <td><?= $g['nama_merek'] ;?></td>
                                    <td>
                                        <picture>
                                            <source srcset="" type="image/svg+xml">
                                            <img width="100" src="<?= base_url('assets/back-end/img/upload/') . $g['image'];?>" class="img-fluid img-thumbnail" alt="...">
                                        </picture>
                                    </td>
                                    <td><?= $g['stok']; ?></td>
                                    <td>Rp. <?= $g['harga']; ?></td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#gadgetUbahModal<?php echo $g['id_gadget'] ?>" class="badge bg-warning text-dark"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="<?= base_url('gadget/hapusgadget/').$g['id_gadget'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $g['nama_gadget'];?> ?');" class="badge bg-primary"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchText = $(this).val().trim();

        $.ajax({
            url: '<?= base_url('gadget/searchgadget'); ?>',
            method: 'POST',
            data: { searchText: searchText },
            success: function(response) {
                $('.table').html(response);
            }
        });
    });
});
</script>

<!-- Modal Tambah gadget baru-->
<div class="modal fade" id="gadgetBaruModal" tabindex="-1" role="dialog" aria-labelledby="gadgetBaruModalLabel" ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h5 class="modal-title" id="gadgetBaruModalLabel">Tambah Gadget</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('gadget');?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="nama_gadget" name="nama_gadget" placeholder="Masukkan Nama Gadget">
                    </div>
                    <div class="form-group mb-3">
                        <select name="id_merek" id="id_merek" class="form-select mb-3">
                            <option value="">Pilih Merek</option>
                            <?php
                            foreach ($merek as $m) { ?>
                                <option value="<?= $m['id_merek'];?>"><?= $m['nama_merek'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select name="tahun_rilis" id="tahun_rilis" class="form-select mb-3">
                            <option value="">Pilih Tahun</option>
                            <?php
                            for ($i=date('Y'); $i > 1000 ; $i--) { ?>
                                <option value="<?= $i;?>"><?= $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                            <input type="file" class="form-control bg-dark" id="image" name="image">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan nominal harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->

<!-- Modal Ubah gadget baru-->
<?php 
foreach ($gadget as $g) { ?>
<div class="modal fade" id="gadgetUbahModal<?php echo $g['id_gadget']; ?>" tabindex="-1" role="dialog" aria-labelledby="gadgetUbahModalLabel" ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h5 class="modal-title" id="gadgetUbahModalLabel">Ubah Gadget</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('gadget/ubahgadget/').$g['id_gadget']; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="nama_gadget" name="nama_gadget" placeholder="Masukkan Nama Gadget" value="<?= $g['nama_gadget']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <select name="id_merek" id="id_merek" class="form-select mb-3">
                            <option value="<?= $g['id_merek']?>"><?=$g['nama_merek']; ?></option>
                            <?php
                            foreach ($merek as $m) {
                                // Check if the option value matches the initially selected value, skip if true
                                if ($m['id_merek'] !== $g['id_merek']) {
                            ?>
                                    <option value="<?= $m['id_merek'];?>"><?= $m['nama_merek'];?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select name="tahun_rilis" id="tahun_rilis" class="form-select mb-3">
                            <option value="<?= $g['tahun_rilis']; ?>"><?= $g['tahun_rilis']; ?></option>
                            <?php
                            $selected_value = $g['tahun_rilis'];
                            for ($i=date('Y'); $i > 1000 ; $i--) { 
                                if ($i != $selected_value) {
                                ?>
                                <option value="<?= $i;?>"><?= $i;?></option>
                            <?php } }?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                    <input type="hidden" name="old_pict" id="old_pict" value="<?= $g['image']; ?>">
                            <input type="file" class="form-control bg-dark" id="image" name="image" accept="image/*">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?= $g['stok']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan nominal harga" value="<?= $g['harga']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<!-- End of Modal Tambah Mneu -->
