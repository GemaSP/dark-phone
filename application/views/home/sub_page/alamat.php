<div class="main-wrapper bg-dark" style="padding-top: 104px;">
  <div class="container-fluid">
    <div class="product-div text-white d-flex justify-content-center min-vh-100">
      <div class="product-div-left">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <div class="position-relative">
                <img class="rounded-circle" src="<?= base_url('assets/back-end/img/profile/') . $user['image']; ?>"
                  alt="" style="width: 40px; height: 40px;">
                <div
                  class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
              </div>
              <div class="ms-3">
                <h6 class="mb-0">
                  <?= $user['username']; ?>
                </h6>
              </div>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="<?= base_url('akun'); ?>" class="nav-link text-white" aria-current="page">
                  <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                  </svg>
                  Profile
                </a>
              </li>
              <li>
                <a href="<?= base_url('akun/password'); ?>" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                  </svg>
                  Ubah Password
                </a>
              </li>
              <li>
                <a href="<?= base_url('akun/alamat'); ?>" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                  </svg>
                  Alamat
                </a>
              </li>
              <li>
                <a href="<?= base_url('akun/keranjang'); ?>" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                  </svg>
                  Keranjang
                </a>
              </li>
              <li>
                <a href="<?= base_url('pesanan'); ?>" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle"></use>
                  </svg>
                  Pesanan Saya
                </a>
              </li>
            </ul>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <a href="<?= base_url('home'); ?>" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                  <use xlink:href="#people-circle"></use>
                </svg>
                Kembali ke home
              </a>
            </ul>
          </div>
        </div>
        <!-- Sidebar End -->
      </div>
      <div class="product-div-right bg-dark">
        <div class="container bg-dark">
          <article class="card bg-dark">
            <div class="row align-items-center">
              <div class="col">
                <header class="card-header bg-dark">Alamat Saya</header>
              </div>
              <div class="col text-end">
                <button data-bs-toggle="modal" data-bs-target="#tambahAlamatModal"
                  class="btn btn-sm btn-outline-primary">Tambah Alamat</button>
              </div>
            </div>
            <?php
            // Pisahkan data berdasarkan state
            $detail_user_state_1 = [];
            $detail_user_state_0 = [];
            foreach ($detail_user as $alamat) {
              if ($alamat['state'] == 1) {
                $detail_user_state_1[] = $alamat;
              } else {
                $detail_user_state_0[] = $alamat;
              }
            }
            // Gabungkan dua set data
            $detail_user = array_merge($detail_user_state_1, $detail_user_state_0);
            ?>
            <?php foreach ($detail_user as $alamat): ?>
              <div class="card-body bg-dark" id="row_<?= $alamat['id_alamat']; ?>">
                <h6>Alamat:</h6>
                <article class="card bg-dark">
                  <div class="card-body row">
                    <div class="col-3 border-end">
                      <strong>
                        <?= $alamat['nama']; ?>
                      </strong>
                    </div>
                    <div class="col">
                      <?= $alamat['no_telp']; ?>
                    </div>
                    <?php if ($alamat['state'] == 1): ?>
                      <div class="col text-end">
                        <a data-bs-toggle="modal" data-bs-target="#ubahAlamatModal<?php echo $alamat['id_alamat']; ?>"
                          class="btn btn-sm btn-outline-primary">Ubah</a>
                      </div>
                    <?php else: ?>
                      <div class="col text-end">
                        <a data-bs-toggle="modal" data-bs-target="#ubahAlamatModal<?php echo $alamat['id_alamat']; ?>"
                          class="btn btn-sm btn-outline-primary">Ubah</a>
                        <button class="btn btn-danger" onclick="deleteRow(<?= $alamat['id_alamat']; ?>)">Hapus</button>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="card-body row">
                    <div class="col-7">
                      <?= $alamat['alamat']; ?>
                    </div>
                    <?php if ($alamat['state'] == 1): ?>
                      <div class="col text-end">
                        <p>Ini adalah alamat utama</p>
                      </div>
                    <?php else: ?>
                      <div class="col text-end">
                        <a href="<?= base_url('akun/alamatUtama/') . $alamat['id_alamat']; ?>"
                          class="btn-sm btn-primary">Atur
                          sebagai utama</a>
                      </div>
                    <?php endif; ?>
                  </div>
                </article>
                <hr>
              </div>
            <?php endforeach; ?>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Tambah Alamat-->
<div class="modal fade" id="tambahAlamatModal" tabindex="-1" aria-labelledby="tambahAlamatModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered position-fixed top-50 start-50 translate-middle"
    style="width: 500px;">
    <div class="modal-content" style="max-height: 80vh;">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahAlamatLabel">Tambah Alamat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">
        <form action="<?= base_url('akun/simpanAlamat'); ?>" method="post" id="formAlamat">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="col-md-6">
              <label for="no_telepon" class="form-label">No Telepon</label>
              <input type="text" class="form-control" id="no_telepon" name="no_telepon">
            </div>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Kecamatan, Kota, Provinsi, Kodepos</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ubah Alamat-->
<?php
foreach ($detail_user as $d) {
  $alamatArray = explode(', ', $d['alamat']); // Memisahkan alamat berdasarkan koma
  $jumlahElemen = count($alamatArray); // Mendapatkan jumlah elemen dalam array
  // Mendapatkan bagian alamat dari belakang (Kodepos sampai Kecamatan)
  $bagian2 = implode(', ', array_slice($alamatArray, $jumlahElemen - 4, $jumlahElemen));
  // Mendapatkan bagian alamat dari depan (Sebelum Kodepos)
  $bagian1 = implode(', ', array_slice($alamatArray, 0, $jumlahElemen - 4)); ?>
  <div class="modal fade" id="ubahAlamatModal<?php echo $d['id_alamat']; ?>" tabindex="-1"
    aria-labelledby="ubahAlamatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered position-fixed top-50 start-50 translate-middle"
      style="width: 500px;">
      <div class="modal-content" style="max-height: 80vh;">
        <div class="modal-header">
          <h5 class="modal-title" id="UbahAlamatLabel">Ubah Alamat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">
          <form action="<?= base_url('akun/ubahAlamat/') . $d['id_alamat']; ?>" method="post" id="formAlamat">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama"
                  value="<?= isset($d['nama']) ? $d['nama'] : 'Isikan data'; ?>">
              </div>
              <div class="col-md-6">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                  value="<?= isset($d['no_telp']) ? $d['no_telp'] : 'Isikan data'; ?>">
              </div>
            </div>
            <div class="mb-3">
              <label for="kelurahan" class="form-label">Kelurahan</label>
              <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                value="<?= isset($bagian2) ? $bagian2 : 'Isikan data'; ?>">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Lengkap</label>
              <textarea class="form-control" id="alamat" name="alamat"
                rows="3"><?= isset($bagian1) ? $bagian1 : 'Isikan data'; ?></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('#formAlamat').submit(function (e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $(this).serialize(),
        success: function (response) {
          console.log(response);
          var scrollPosition = $(window).scrollTop();
          location.reload();
          $(window).scrollTop(scrollPosition);
          $('#exampleModal').modal('hide');
        },
        error: function (error) {
          console.log('Terjadi kesalahan: ' + error);
        }
      });
    });

    document.getElementById('btnSimpan').addEventListener('click', function () {
      console.log('Tombol Simpan Ditekan');
    });
  });
  function deleteRow(id) {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('akun/hapusAlamat'); ?>",
      data: { id: id },
      success: function (response) {
        if (response === 'success') {
          var row = document.getElementById('row_' + id);
          row.remove(); // Hapus baris dari tampilan setelah penghapusan dari database berhasil
          updateTotalNilai(); // Panggil fungsi updateTotalNilai setelah baris dihapus
        }
      },
      error: function (xhr, status, error) {
        console.error('Terjadi kesalahan: ', error);
      }
    });
  }
</script>