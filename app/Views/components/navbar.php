<nav class="navbar navbar-expand-lg spark-navbar">
    <div class="container position-relative">

        <!-- LOGO (KIRI) -->
        <a class="navbar-brand d-flex align-items-center spark-left" href="<?= BASEURL ?>">
            <img src="<?= BASEURL; ?>/assets/img/logoSpark.png"
                 alt="Logo"
                 class="img-fluid"
                 style="max-height: 60px;">
        </a>

        <!-- TOGGLER (MOBILE) -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sparkNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU (TENGAH) -->
        <div class="collapse navbar-collapse spark-center" id="sparkNav">
            <ul class="navbar-nav mx-auto gap-4">

                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/spark-app/public/') ? 'active' : '' ?>"
                       href="<?= BASEURL ?>">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="#">
                        Service
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold"
                       href="#">
                        Reserved Park Now!
                    </a>
                </li>

            </ul>
        </div>

        <!-- AUTH BUTTON (KANAN) -->
        <div class="spark-right d-none d-lg-block">

            <?php if (!isset($_SESSION['user'])): ?>

                <!-- JIKA BELUM LOGIN -->
                <a href="<?= BASEURL ?>/login" class="btn spark-login-btn">
                    Login
                </a>

            <?php else: ?>

                <!-- JIKA SUDAH LOGIN -->
                <div class="dropdown">
                    <button class="btn spark-login-btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown">
                        <?= htmlspecialchars($_SESSION['user']['nama']) ?>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item"
                               href="<?= BASEURL ?>/dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-danger"
                               href="<?= BASEURL ?>/logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>

            <?php endif; ?>

        </div>

    </div>
</nav>
