<nav class="navbar navbar-expand-lg spark-navbar">
    <div class="container position-relative">

        <!-- LOGO (KIRI) -->
        <a class="navbar-brand d-flex align-items-center spark-left" href="/">
            <img src="<?= BASEURL; ?>/assets/img/logoSpark.png" alt="Logo" class="img-fluid" style="max-height: 60px;">
        </a>

        <!-- TOGGLER (MOBILE) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sparkNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU (TENGAH) -->
        <div class="collapse navbar-collapse spark-center" id="sparkNav">
            <ul class="navbar-nav mx-auto gap-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Reserved Park Now!</a>
                </li>
            </ul>
        </div>

        <!-- LOGIN (KANAN) -->
        <div class="spark-right d-none d-lg-block">
            <a href="#" class="btn spark-login-btn">Login</a>
        </div>

    </div>
</nav>
