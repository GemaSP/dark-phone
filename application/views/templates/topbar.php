<!-- Content Start -->
<div class="content">
    <div class="min-vh-100">
        <!-- Navbar Start -->
        <nav class="navbar mb-3 navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control bg-dark border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="position-absolute bottom end-50 translate-middle badge bg-primary">0</span>
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <?php $count = 0; ?>
                        <?php foreach ($komentar as $k) { ?>
                            <?php if ($count >= 3)
                                break; ?>
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">
                                            <?= $k['komentar']; ?>
                                        </h6>
                                        <small>
                                            <?php
                                            $timestamp = ($k['time']);
                                            $current_time = time();
                                            $time_diff = $current_time - $timestamp;

                                            if ($time_diff < 60) {
                                                echo 'a few moments ago';
                                            } elseif ($time_diff < 3600) {
                                                $ago = round($time_diff / 60);
                                                echo $ago . ' minutes ago';
                                            } elseif ($time_diff < 86400) {
                                                $ago = round($time_diff / 3600);
                                                echo $ago . ' hours ago';
                                            } else {
                                                echo date('d M Y', $timestamp);
                                            } ?>
                                        </small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <?php $count++; ?>
                        <?php } ?>
                        <a href="#" class="dropdown-item text-center">See all messages</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="position-absolute bottom end-50 translate-middle badge bg-primary">
                            <?= $jumlah_data; ?>
                        </span>
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notifikasi</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <?php $count = 0; ?>
                        <?php foreach ($notifikasi as $n) { ?>
                            <?php if ($count >= 3)
                                break; ?>
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">
                                    <?= $n['notifikasi']; ?>
                                </h6>
                                <small>
                                    <?php
                                    $timestamp = ($n['waktu']);
                                    $current_time = time();
                                    $time_diff = $current_time - $timestamp;

                                    if ($time_diff < 60) {
                                        echo 'baru saja';
                                    } elseif ($time_diff < 3600) {
                                        $ago = round($time_diff / 60);
                                        echo $ago . ' menit yang lalu';
                                    } elseif ($time_diff < 86400) {
                                        $ago = round($time_diff / 3600);
                                        echo $ago . ' jam yang lalu';
                                    } else {
                                        echo date('d M Y', $timestamp);
                                    } ?>
                                </small>
                            </a>
                            <hr class="dropdown-divider">
                            <?php $count++; ?>
                        <?php } ?>
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2"
                            src="<?= base_url('assets/back-end/img/profile/') . $user['image']; ?>" alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">
                            <?= $user['username']; ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="<?= base_url('user'); ?>" class="dropdown-item">My Profile</a>
                        <a href="<?= base_url('user/changePassword'); ?>" class="dropdown-item">Change Password</a>
                        <a href="<?= base_url('autentifikasi/logout'); ?>" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->