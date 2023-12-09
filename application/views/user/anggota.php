<style>
    #admin {
        display: none; /* Sembunyikan tabel Admin saat halaman pertama kali dimuat */
    }
</style>
<div class="container-fluid pt-4 px-4">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Data User</h6>
                            <div class="tabs">
                                <button class="tablink" onclick="openTab(event, 'pelanggan')">Tabel Pelanggan</button>
                                <button class="tablink" onclick="openTab(event, 'admin')">Tabel Admin</button>
                            </div>
                            <div id="pelanggan" class="tabcontent">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Aktif Sejak</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $a = 1;
                                    foreach ($anggota as $u) { 
                                        if ($u['role_id'] == 2) {?>
                                    <tr>
                                        <th scope="row"><?= $a++; ?></th>
                                        <td><?= $u['username']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td><?= date('d F Y', $u['tanggal_input']); ?></td>
                                        <td>
                                            <picture>
                                                <source srcset="" type="image/svg+xml">
                                                <img width="100" src="<?= base_url('assets/img/profile/') . $u['image'];?>" class="img-fluid img-thumbnail" alt="...">
                                            </picture>
                                        </td>
                                        <td>
                                            <?php
                                            if ($u['is_active'] == 0) {
                                                echo 'Non-aktif';}
                                                else 
                                                {echo 'Aktif';} ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('user/updateAnggota/').$u['id']; ?>" onclick="return confirm('Kamu yakin akan <?php
                                            if ($u['is_active'] == 0) {
                                                echo 'mengaktifkan';}
                                                else 
                                                {echo 'menon-aktifkan';} ?> <?= $u['username']; ?> ?');" class="badge bg-secondary"><i class="fas fa-trash"></i>
                                            <?php
                                            if ($u['is_active'] == 0) {
                                                echo 'Aktifkan';}
                                                else 
                                                {echo 'Nonaktifkan';} ?>
                                        </a>
                                        </td>
                                    </tr>
                                <?php } }?>      
                                </tbody>
                            </table>
                            </div>
                            <div id="admin" class="tabcontent">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Aktif Sejak</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $a = 1;
                                    foreach ($anggota as $u) { 
                                        if ($u['role_id'] == 1) {?>
                                    <tr>
                                        <th scope="row"><?= $a++; ?></th>
                                        <td><?= $u['username']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td><?= date('d F Y', $u['tanggal_input']); ?></td>
                                        <td>
                                            <picture>
                                                <source srcset="" type="image/svg+xml">
                                                <img width="100" src="<?= base_url('assets/img/profile/') . $u['image'];?>" class="img-fluid img-thumbnail" alt="...">
                                            </picture>
                                        </td>
                                        <td>
                                            <?php
                                            if ($u['is_active'] == 0) {
                                                echo 'Non-aktif';}
                                                else 
                                                {echo 'Aktif';} ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('user/updateAnggota/').$u['id']; ?>" onclick="return confirm('Kamu yakin akan <?php
                                            if ($u['is_active'] == 0) {
                                                echo 'mengaktifkan';}
                                                else 
                                                {echo 'menon-aktifkan';} ?> <?= $u['username']; ?> ?');" class="badge bg-secondary"><i class="fas fa-trash"></i>
                                            <?php
                                            if ($u['is_active'] == 0) {
                                                echo 'Aktifkan';}
                                                else 
                                                {echo 'Nonaktifkan';} ?>
                                        </a>
                                        </td>
                                    </tr>
                                <?php } }?>      
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        // Sembunyikan semua konten tab
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Nonaktifkan semua link tab
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Tampilkan konten tab yang dipilih
        document.getElementById(tabName).style.display = "block";

        // Tandai link tab yang aktif
        evt.currentTarget.className += " active";
    }
</script>