<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SPARK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/assets/img/logoSpark.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- maps -->
    <link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>


    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= BASEURL; ?>/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php require_once __DIR__ . '/../components/navbar.php'; ?>

    <main>
        <?= $content ?>
    </main>

    <?php require_once __DIR__ . '/../components/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="<?= BASEURL; ?>/assets/js/navbar.js"></script>

    <!-- maps -->
    <script
  src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
  integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
  crossorigin=""
></script>

<!-- Custom JS Map -->
    <script src="<?= BASEURL; ?>/assets/js/map.js"></script>
    <!-- Custom JS Navbar Scroll -->
    <script src="<?= BASEURL; ?>/assets/js/navbar-scroll.js"></script>
</body>
</html>
