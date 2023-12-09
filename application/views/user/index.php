<!-- Begin Page Content -->
<div class="m-4 col-sm-12 col-xl-8">

    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="card bg-secondary text-center rounded p-4 mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/back-end/img/profile/') .$user['image']; ?>" width="" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-text"><?= $user['username'];?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="textmuted">Jadi member sejak: <br><b><?= date('d F Y H:i:s',$user['tanggal_input']); ?></b></small></p>
                </div>
                <div class="btn btn-primary">
                    <a href="<?= base_url('user/ubahprofil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->