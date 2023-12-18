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
                        echo "Dibatalkan";
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