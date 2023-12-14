<div class="container mt-4" style="padding-top: 104px;">
  <!-- Container 1: Alamat Pengiriman -->
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title"><i class="bi bi-geo-alt-fill"></i> Alamat Pengiriman</h5>
      <div class="row">
        <div class="col-auto">
          <p class="card-text">Nama: <span id="namaOutput">
              <?= isset($detail_user['nama']) ? $detail_user['nama'] : 'Nama Belum Dimasukkan'; ?>
            </span></p>
          <p class="card-text">No Telepon: <span id="noTelpOutput">
              <?= isset($detail_user['no_telp']) ? $detail_user['no_telp'] : 'No Telepon Belum Dimasukkan'; ?>
            </span></p>
        </div>
        <div class="col d-flex justify-content-between align-items-center">
          <?php if (isset($detail_user['state']) && $detail_user['state'] == 1): ?>
            <div class="text-justify">
              <p id="alamatOutput" class="card-text mb-0">
                <?= isset($detail_user['alamat']) ? $detail_user['alamat'] : 'Alamat Belum Dimasukkan'; ?>
              </p>
            </div>
          <?php else: ?>
            <p class="card-text">Alamat belum dimasukkan</p>
          <?php endif; ?>
          <button data-bs-toggle="modal" data-bs-target="#exampleModal"
            class="btn btn-sm btn-outline-primary">Ubah</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Container 2: Produk Dipesan -->
  <div class="card mt-4">
    <div class="card-body">
      <div class="row mb-3">
        <div class="col">
          <h5 class="card-title text-start">Produk Dipesan</h5>
        </div>
        <div class="col text-center">Harga Satuan</div>
        <div class="col text-center">Jumlah</div>
        <div class="col text-end">Subtotal Produk</div>
      </div>
      <?php
      $totalHargaSemuaProduk = 0;
      foreach ($selectedItems as $g): ?>
        <!-- Contoh produk -->
        <div class="row align-items-center mb-2">

          <div class="col text-start">
            <img src="<?= base_url('assets/back-end/img/upload/') . $g['img']; ?>" alt="Produk" class="img-fluid"
              style="max-width: 50px;">
            <?= $g['nama_gadget']; ?>
          </div>
          <div class="col text-center">Rp
            <?php echo number_format($g['harga'], 0, '.', ','); ?>
          </div>
          <div class="col text-center">
            <?= $g['jumlah_barang']; ?>
          </div>
          <div class="col text-end">
            Rp
            <?php echo number_format($g['harga'] * $g['jumlah_barang'], 0, '.', '.'); ?>
          </div>
        </div>
        <?php $totalHargaSemuaProduk += $g['harga'] * $g['jumlah_barang']; // Tambahkan harga produk ke total 
      endforeach; ?>
    </div>
  </div>
  <div class="card border-bottom mt-4">
    <div class="card-body">
      <h5 class="card-title">Metode Pembayaran</h5>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <button class="btn btn-outline-secondary me-md-2 mb-2" type="button">Darkpay</button>
        <button class="btn btn-outline-secondary me-md-2 mb-2" type="button">COD</button>
        <!-- Tambahkan tombol lainnya -->
      </div>
    </div>
  </div>

  <!-- Informasi Subtotal, Total, dan Tombol "Buat Pesanan" -->
  <div class="card border-bottom mt-4">
    <div class="card-body">
      <p class="text-end">Subtotal untuk Produk:
        Rp
        <?php echo number_format($totalHargaSemuaProduk, 0, '.', '.'); ?>
      </p>
      <p class="text-end">Total Ongkos Kirim: Rp8.000</p>
      <p class="text-end">Biaya Layanan: Rp1.000</p>
      <p class="text-end">Biaya Penanganan: Rp1.000</p>
      <hr>
      <p class="text-end"><strong>Total Pembayaran:
          Rp
          <?php echo number_format($totalHargaSemuaProduk + 8000 + 1000 + 1000, 0, '.', '.'); ?>
        </strong></p>
      <div class="d-flex justify-content-end">
        <button id="btnBuatPesanan" class="btn btn-pink" type="button">Buat Pesanan</button>
      </div>
    </div>
  </div>
</div>
<!-- Formulir untuk mengirimkan data -->
<form id="formPesan" method="post" action="<?= base_url('keranjang/create_order'); ?>">
  <!-- Input hidden untuk alamat pengiriman -->
  <input type="hidden" name="nama" value="<?= $user['username']; ?>">
  <input type="hidden" name="nomor_telepon" value="1234567890">
  <input type="hidden" name="alamat"
    value="Jalan Ciherang Hegar Sari No.9, Ciherang, Dramaga (RT.05/RW.08), KAB. BOGOR - DRAMAGA, JAWA BARAT, ID 16680">

  <!-- Input hidden untuk produk dipesan -->
  <?php foreach ($selectedItems as $index => $g): ?>
    <input type="hidden" name="produk[<?= $index; ?>][id]" value="<?= $g['id_gadget']; ?>">
    <input type="hidden" name="produk[<?= $index; ?>][nama]" value="<?= $g['nama_gadget']; ?>">
    <input type="hidden" name="produk[<?= $index; ?>][harga]" value="<?= $g['harga']; ?>">
    <input type="hidden" name="produk[<?= $index; ?>][jumlah]" value="<?= $g['jumlah_barang']; ?>">
    <!-- Tambahan lainnya dari data produk yang ingin Anda kirim -->

    <!-- ... (lanjutkan loop jika ada produk lainnya) ... -->
  <?php endforeach; ?>

  <!-- Input hidden untuk metode pembayaran -->
  <input type="hidden" name="metode_pembayaran" value="E-wallet">
  <!-- Jika ada opsi lain, tambahkan input hidden untuk setiap opsi -->
</form>
<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="checkmark">
          <div class="checkmark_circle"></div>
          <div class="checkmark_stem"></div>
          <div class="checkmark_kick"></div>
        </div>
        <p>Pesanan berhasil dibuat!</p>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered position-fixed top-50 start-50 translate-middle"
    style="width: 500px;">
    <div class="modal-content" style="max-height: 80vh;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">

        <form action="<?= base_url('keranjang/simpanAlamat'); ?>" method="post" id="formAlamat">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama"
                value="<?= isset($detail_user['nama']) ? $detail_user['nama'] : 'Isikan data'; ?>">
            </div>
            <div class="col-md-6">
              <label for="no_telepon" class="form-label">No Telepon</label>
              <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                value="<?= isset($detail_user['no_telp']) ? $detail_user['no_telp'] : 'Isikan data'; ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat"
              rows="3"><?= isset($alamat) ? $alamat : 'Isikan data'; ?></textarea>
          </div>
          <div class="row mb-3">
            <div class="col-md-3">
              <label for="rt" class="form-label">RT</label>
              <input type="text" class="form-control" id="rt" name="rt"
                value="<?= isset($rt) ? $rt : 'Isikan data'; ?>">
            </div>
            <div class="col-md-3">
              <label for="rw" class="form-label">RW</label>
              <input type="text" class="form-control" id="rw" name="rw"
                value="<?= isset($rw) ? $rw : 'Isikan data'; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="kelurahan" class="form-label">Kelurahan</label>
              <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                value="<?= isset($kelurahan) ? $kelurahan : 'Isikan data'; ?>">
            </div>
            <div class="col-md-6">
              <label for="kecamatan" class="form-label">Kecamatan</label>
              <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                value="<?= isset($kecamatan) ? $kecamatan : 'Isikan data'; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="kota" class="form-label">Kabupaten/Kota</label>
              <input type="text" class="form-control" id="kota" name="kota"
                value="<?= isset($kota) ? $kota : 'Isikan data'; ?>">
            </div>
            <div class="col-md-6">
              <label for="provinsi" class="form-label">Provinsi</label>
              <input type="text" class="form-control" id="provinsi" name="provinsi"
                value="<?= isset($provinsi) ? $provinsi : 'Isikan data'; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-3">
              <label for="kodepos" class="form-label">Kodepos</label>
              <input type="text" class="form-control" id="kodepos" name="kodepos"
                value="<?= isset($kodepos) ? $kodepos : 'Isikan data'; ?>">
            </div>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="tandai-sebagai">
            <label class="form-check-label" for="tandai-sebagai">
              Tandai sebagai rumah atau kantor
            </label>
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

    document.getElementById('btnBuatPesanan').addEventListener('click', function () {
      document.getElementById('formPesan').submit();
      var myModal = new bootstrap.Modal(document.getElementById('successModal'));
      myModal.show();
    });
  });
</script>