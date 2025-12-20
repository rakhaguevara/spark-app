<nav class="dashboard-navbar">
    <div class="left">
        <span>Find Parking Right Now</span>
    </div>

    <div class="center">
        <input
            type="text"
            placeholder="Search Your Park Location"
            class="search-input">
    </div>

    <div class="right">
        <div class="profile-wrapper">
            <div class="avatar" id="profileToggle">
                <?= strtoupper(substr($_SESSION['user']['nama_pengguna'], 0, 1)) ?>
            </div>

            <div class="profile-dropdown" id="profileDropdown">
                <div class="profile-name">
                    <?= htmlspecialchars($_SESSION['user']['nama_pengguna']) ?>
                </div>
                <a href="<?= BASEURL ?>/logout" class="logout-btn">Logout</a>
            </div>
        </div>
    </div>

</nav>