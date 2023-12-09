<div class="container-fluid pt-2 px-4">
    <h1 class="">Data Merek</h1>
    <div class="bg-secondary text-center rounded p-4 col-6">
        <?php if(validation_errors()){?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
            </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="d-flex align-items-center justify-content-between mb-4">
                <a href="" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#merekBaruModal"><i class="fas fa-file-alt"></i> Tambah Gadget</a>
                <form class="d-none d-md-flex ms-4">
                    <input id="searchInput" class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table text-start table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $a = 1;
                            foreach ($merek as $m) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $m['nama_merek'] ;?></td>
                            <td>
                                <a href="<?= base_url('gadget/ubahmerek/').$m['id_merek'];?>" class="badge bg-warning text-dark"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('gadget/hapusmerek/').$m['id_merek'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $m['nama_merek'];?> ?');" class="badge bg-primary"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchText = $(this).val().trim();

        $.ajax({
            url: '<?= base_url('gadget/searchmerek'); ?>',
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
<div class="modal fade" id="merekBaruModal" tabindex="-1" role="dialog" aria-labelledby="merekBaruModalLabel" ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h5 class="modal-title" id="merekBaruModalLabel">Tambah Merek</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('gadget/merek'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="nama_merek" name="nama_merek" placeholder="Masukkan Nama Merek">
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


