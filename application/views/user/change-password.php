<div class="col-sm-12 col-xl-6 m-4" >
                        <div class="bg-secondary rounded h-100 p-4">
                            <?= $this->session->flashdata('pesan'); ?>
                            <h6 class="mb-4">Change Password</h6>
                            <form action=" <?= base_url('user/changePassword'); ?> " method="post">
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <?= form_error('current_password', '<small class="textdanger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password1" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                    <?= form_error('new_password1', '<small class="textdanger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password2" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                    <?= form_error('new_password2', '<small class="textdanger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Change</button>
                                <button type="cancel" class="btn btn-primary">Cancel</button>
                            </form>
                        </div>
                    </div>