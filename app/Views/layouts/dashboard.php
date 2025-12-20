<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard | SPARK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DASHBOARD CSS -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/dashboard-user.css">

    <!-- ✅ LEAFLET CSS (WAJIB) -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
</head>

<body>

    <div class="dashboard-layout">

        <?php require_once __DIR__ . '/../components/sidebar-user.php'; ?>

        <div class="dashboard-main">
            <?php require_once __DIR__ . '/../components/navbar-dashboard.php'; ?>

            <?= $content ?>
        </div>

    </div>

    <!-- ✅ LEAFLET JS (WAJIB & HARUS SEBELUM map.js) -->
    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="">
    </script>

    <!-- MAP SCRIPT -->
    <script src="<?= BASEURL ?>/assets/js/map.js"></script>

    <script src="<?= BASEURL; ?>/assets/js/navbar.js"></script>


</body>

</html>