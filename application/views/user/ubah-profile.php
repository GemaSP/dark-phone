<div class="m-4 col-sm-12 col-xl-8">
    <div class="bg-secondary rounded p-4">
        <h6 class="mb-4">Ubah Profile</h6>
        <?= form_open_multipart('user/ubahprofil'); ?>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="username" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'];?>">
                    <?= form_error('username', '<small class="textdanger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row mb-3">
            <div class="col-sm-3">Gambar</div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="mb-3">
                        <img id="image-preview"
                        width="150" alt="placeholder"
                        src="<?= base_url('assets/back-end/img/profile/') .$user['image']; ?>" width="150" class="imgthumbnail" alt="">
                    </div>
                    <div class="mb-3">
                            <input type="file" class="form-control bg-dark" id="image" name="image" accept="image/*"
                    onchange="updatePreview(this, 'image-preview')">
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <button class="btn btn-dark" href="<?= base_url('user'); ?>"> Kembali</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function updatePreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }
</script>