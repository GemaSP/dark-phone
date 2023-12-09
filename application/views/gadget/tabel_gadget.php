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
                    <img width="100" src="<?= base_url('assets/img/upload/') . $g['image'];?>" class="img-fluid img-thumbnail" alt="...">
                </picture>
            </td>
            <td><?= $g['stok']; ?></td>
            <td><?= $g['harga']; ?></td>
            <td>
                <a href="<?= base_url('gadget/ubahgadget/').$g['id'];?>" class="badge bg-warning text-dark"><i class="fas fa-edit"></i> Ubah</a>
                <a href="<?= base_url('gadget/hapusgadget/').$g['id'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $g['nama_gadget'];?> ?');" class="badge bg-primary"><i class="fas fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>