<div class="main-wrapper bg-dark" style="padding-top: 104px;">
    <div class="container-fluid">
        <div class="product-div text-white d-flex justify-content-center min-vh-100">
            <div class="product-div-left">
                <!-- Sidebar Start -->
                <div class="sidebar pe-4 pb-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                        <a href="/"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <div class="position-relative">
                                <img class="rounded-circle"
                                    src="<?= base_url('assets/back-end/img/profile/') . $user['image']; ?>" alt=""
                                    style="width: 40px; height: 40px;">
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
                                <a href="<?= base_url('akun'); ?>" class="nav-link text-white"
                                    aria-current="page">
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
                            <!-- <li>
                                <a href="<?= base_url('akun/keranjang'); ?>" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>
                                    Keranjang
                                </a>
                            </li> -->
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
                <div class="min-vh-100">
                    <div class="border my-3 p-3 text-white mx-5">
                        <div class="container-fluid my-3">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <label class="form-check-label">
                                        <input id="checkboxUtama" class="form-check-input me-2" type="checkbox"
                                            onclick="checkAll(this)"> Produk
                                    </label>
                                </div>
                                <div class="col text-center">
                                    <span>Harga Satuan</span>
                                </div>
                                <div class="col text-center">
                                    <span>Kuantitas</span>
                                </div>
                                <div class="col text-center">
                                    <span>Total Harga</span>
                                </div>
                                <div class="col text-center">
                                    <span>Aksi</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($keranjang as $k): ?>
                        <div class="border my-3 p-3 text-white mx-5" id="row_<?= $k['id_gadget']; ?>">
                            <div class="container-fluid my-3">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <label class="form-check-label d-flex align-items-center">
                                            <input class="form-check-input me-2 checkbox-produk" type="checkbox"
                                                data-id="<?= $k['id_gadget']; ?>">
                                            <img src="<?= base_url('assets/back-end/img/upload/') . $k['image']; ?>" alt=""
                                                class="me-2" style="max-width: 50px;">
                                            <span>
                                                <?= $k['nama_gadget'] ?>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col text-center">
                                        <span id="harga_<?= $k['id_gadget']; ?>">Rp
                                            <?= $harga = number_format($k['harga'], 0, '.', '.'); ?>
                                        </span>
                                    </div>
                                    <div class="col text-center">
                                        <div class="input-group d-flex justify-content-center">
                                            <input id="nilai_<?= $k['id_gadget']; ?>" type="number"
                                                class="form-control text-center checkbox-value"
                                                value="<?= $k['jumlah_barang'] ?>" data-id="<?= $k['id_gadget'] ?>"
                                                oninput="updateValue(this.value, this.dataset.id)">
                                        </div>
                                    </div>
                                    <div class="col text-center">
                                        <span id="totalHarga_<?= $k['id_gadget']; ?>">Rp
                                            <?php echo number_format($k['harga'] * $k['jumlah_barang'], 0, '.', '.'); ?>
                                        </span>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-danger"
                                            onclick="deleteRow(<?= $k['id_gadget']; ?>)">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="border my-3 p-3 text-white mx-5">
                        <div class="container-fluid my-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label class="form-check-label">
                                        <input id="checkboxUtama1" class="form-check-input me-2" type="checkbox"
                                            onclick="checkAll(this)"><label for="checkboxUtama1"
                                            id="checkboxLabel">Pilih Semua</label></input>
                                    </label>
                                </div>
                                <div class="col-3 text-start">
                                    <span>Hapus</span>
                                </div>
                                <div class="col-5 text-end">
                                    <span id="totalNilai">Total (0 Produk): Rp</span>
                                </div>
                                <div class="col text-end">
                                    <a href="<?php echo base_url('home/checkout?items='); ?>"
                                        id="checkoutButton" class="btn btn-danger">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    // Fungsi untuk mengontrol checkbox "Pilih Semua"
                    function checkAll(checkbox) {
                        var isChecked = checkbox.checked;
                        $("#checkboxUtama1, #checkboxUtama").prop("checked", isChecked);
                        $(".checkbox-produk").prop("checked", isChecked);
                        updateTotalNilai();
                    }

                    // Fungsi untuk mengubah nilai jumlah barang
                    function changeValue(operation) {
                        var input = document.getElementById('nilai');
                        var value = parseInt(input.value) || 0;

                        if (operation === 'increment') {
                            input.value = value + 1;
                        } else if (operation === 'decrement' && value > 0) {
                            input.value = value - 1;
                        }

                        updateValue(input.value, input.getAttribute('data-id'));
                    }

                    // Fungsi untuk memperbarui nilai di database dan total harga
                    function updateValue(value, id) {
                        var input = document.getElementById('nilai_' + id);
                        if (isNaN(value) || value < 1) {
                            value = 1;
                            input.value = 1;
                        }

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('home/update_jumlah_barang'); ?>",
                            data: { id_gadget: id, jumlah_barang: value },
                            success: function (response) {
                                console.log('Nilai berhasil diperbarui');

                                var nilaiText = ($("#harga_" + id).text());
                                var nilaiBersih = nilaiText.replace(/\D/g, '');
                                var harga = parseFloat(nilaiBersih);
                                var totalHarga = harga * value;
                                var totalHargaFormatted = totalHarga.toLocaleString('id-ID', {
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 2
                                });

                                totalHargaFormatted = 'Rp' + totalHargaFormatted;

                                $("#totalHarga_" + id).text(totalHargaFormatted);
                                updateTotalNilai(); // Panggil fungsi updateTotalNilai setelah total harga diperbarui
                            },
                            error: function (xhr, status, error) {
                                console.error('Terjadi kesalahan: ', error);
                            }
                        });
                    }

                    // Fungsi untuk menghapus baris
                    function deleteRow(id) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('home/delete_row'); ?>",
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

                    // Fungsi untuk mengupdate total nilai
                    function updateTotalNilai() {
                        var total = 0;
                        var totalProduk = 0;
                        var checkboxes = document.querySelectorAll('.checkbox-produk');

                        checkboxes.forEach(function (checkbox) {
                            if (checkbox.checked) {
                                var id = checkbox.getAttribute('data-id');
                                var nilaiText = (document.getElementById('totalHarga_' + id).innerText);
                                var nilaiBersih = nilaiText.replace(/\D/g, '');
                                var harga = parseFloat(nilaiBersih);
                                total += harga;
                                totalProduk++;
                            }
                        });
                        var totalHargaFormatted = total.toLocaleString('id-ID', {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 2
                        });

                        totalFormatted = 'Rp' + totalHargaFormatted;

                        var totalProdukElement = document.getElementById('checkboxLabel');
                        totalProdukElement.innerText = 'Pilih semua (' + totalProduk + ')';


                        var totalNilaiElement = document.getElementById('totalNilai');
                        totalNilaiElement.innerText = 'Total (' + totalProduk + ' Produk): ' + totalFormatted;
                    }

                    // Menambah event listener ke checkbox-produk untuk mengupdate total saat ada perubahan
                    var checkboxes = document.querySelectorAll('.checkbox-produk');
                    checkboxes.forEach(function (checkbox) {
                        checkbox.addEventListener('change', function () {
                            updateTotalNilai();
                        });
                    });

                    // Panggil fungsi updateTotalNilai() untuk menginisialisasi total saat halaman dimuat
                    updateTotalNilai();

                    function updateCheckoutLink() {
                        var checkedItems = [];
                        var checkboxes = document.querySelectorAll('.checkbox-produk');

                        checkboxes.forEach(function (checkbox) {
                            if (checkbox.checked) {
                                checkedItems.push(checkbox.getAttribute('data-id'));
                            }
                        });

                        var checkoutUrl = "<?= base_url('home/checkout?items='); ?>" + checkedItems.join(',');
                        document.getElementById('checkoutButton').href = checkoutUrl;
                    }

                    // Tambahkan event listener ke setiap checkbox
                    var checkboxes = document.querySelectorAll('.checkbox-produk');
                    checkboxes.forEach(function (checkbox) {
                        checkbox.addEventListener('change', function () {
                            updateCheckoutLink();
                        });
                    });

                    // Panggil updateCheckoutLink() untuk menginisialisasi link saat halaman dimuat
                    updateCheckoutLink();
                </script>
            </div>
        </div>
    </div>
</div>