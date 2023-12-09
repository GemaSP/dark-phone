<table class="table text-start table-hover mb-0">
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