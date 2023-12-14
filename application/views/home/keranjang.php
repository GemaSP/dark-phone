<div class="min-vh-100" style="padding-top: 104px;">
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
    <?php if (!empty($keranjang)): ?>
        <?php foreach ($keranjang as $k): ?>
            <div class="border my-3 p-3 text-white mx-5" id="row_<?= $k['id_gadget']; ?>">
                <div class="container-fluid my-3">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <label class="form-check-label d-flex align-items-center">
                                <input class="form-check-input me-2 checkbox-produk" type="checkbox"
                                    data-id="<?= $k['id_gadget']; ?>">
                                <img src="<?= base_url('assets/back-end/img/upload/') . $k['img']; ?>" alt="" class="me-2"
                                    style="max-width: 50px;">
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
                                <input data-max-stock="<?= $k['stok'] ?>" id="nilai_<?= $k['id_gadget']; ?>" type="number"
                                    class="form-control text-center checkbox-value" value="<?= $k['jumlah_barang'] ?>"
                                    data-id="<?= $k['id_gadget'] ?>" oninput="updateValue(this.value, this.dataset.id)">
                            </div>
                        </div>
                        <div class="col text-center">
                            <span id="totalHarga_<?= $k['id_gadget']; ?>">Rp
                                <?php echo number_format($k['harga'] * $k['jumlah_barang'], 0, '.', '.'); ?>
                            </span>
                        </div>
                        <div class="col text-center">
                            <button class="btn btn-danger" onclick="deleteRow(<?= $k['id_gadget']; ?>)">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- Kode untuk menampilkan pesan jika tidak ada item di keranjang -->
        <div class="border my-3 p-3 text-white mx-5 d-flex align-items-center" style="height: 240px;">
            <div class="text-center text-white mx-auto">
                <p>Tidak ada item di keranjang.</p>
            </div>
        </div>
    <?php endif; ?>

    <div class="border my-3 p-3 text-white mx-5">
        <div class="container-fluid my-3">
            <div class="row align-items-center">
                <div class="col">
                    <label class="form-check-label">
                        <input id="checkboxUtama1" class="form-check-input me-2" type="checkbox"
                            onclick="checkAll(this)"><label for="checkboxUtama1" id="checkboxLabel">Pilih
                            Semua</label></input>
                    </label>
                </div>
                <div class="col-3 text-start">
                    <span>Hapus</span>
                </div>
                <div class="col-5 text-end">
                    <span id="totalNilai">Total (0 Produk): Rp</span>
                </div>
                <div class="col text-end">
                    <a onclick="return checkout()" id="checkoutButton" class="btn btn-danger">Checkout</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- about us -->
<section id="about" class="py-5">
    <div class="container text-white">
        <div class="row gy-lg-5 align-items-center">
            <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                <div class="title pt-3 pb-5">
                    <h2 class="position-relative d-inline-block ms-4">About Us</h2>
                </div>
                <p class="lead text-muted">Kita disini membuat website DarkPhone.</p>
                <p>Kami membuat website DarkPhone karena menurut kami website ini mampu untuk meningkatkan daya jual
                    smartphone.</p>
            </div>
            <div class="col-lg-6 order-lg-0">
                <img width="100%" src="<?= base_url('assets/front-end/home/images/about us.jpg'); ?>" alt=""
                    class="img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- end of about us -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tempatkan pesan kesalahan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


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

    function validateCheckout() {
        var checkedItems = document.querySelectorAll('.checkbox-produk:checked');

        if (checkedItems.length === 0) {
            var errorMessage = "Tidak ada item yang dipilih, silakan pilih terlebih dahulu.";
            var errorModalBody = document.querySelector('.modal-body');
            errorModalBody.innerHTML = errorMessage;
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        } else {
            // Lakukan navigasi ke halaman checkout
            window.location.href = "<?php echo base_url('keranjang/checkout?items='); ?>" + getSelectedItems();
        }
    }

    function checkout() {
        var isValid = validateCheckout();
        if (isValid) {

            // Lakukan aksi checkout jika valid
            // ...kode lain untuk aksi checkout...
            // Misalnya, jika tombol checkout mengarahkan ke halaman lain:
            // window.location.href = "alamat_halaman_checkout";
        }
    }

    // Fungsi untuk memperbarui nilai di database dan total harga
    function updateValue(value, id) {
        var input = document.getElementById('nilai_' + id);
        var stockColumnValue = parseInt(input.getAttribute('data-max-stock')) || 0; // Mengambil nilai stok dari atribut
        if (isNaN(value) || value < 1 || value > stockColumnValue) {
            value = 1;
            input.value = 1;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('keranjang/update_jumlah_barang'); ?>",
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
            url: "<?php echo base_url('keranjang/delete_row'); ?>",
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

    function getSelectedItems() {
        var selectedItems = [];
        var checkboxes = document.querySelectorAll('.checkbox-produk:checked');

        checkboxes.forEach(function (checkbox) {
            selectedItems.push(checkbox.getAttribute('data-id'));
        });

        return selectedItems.join(',');
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