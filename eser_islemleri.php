<?php
    /* Bağlantı bilgileri */
    require_once("baglanti.php");

    /* Veritabanı sorgulama */
    $sorgu = mysqli_query($baglanti, "SELECT eser.*, yazar.yazarADI, yazar.yazarSOYADI, yayinevi.yayineviADI, konu.konuAdi
                                       FROM eser
                                       LEFT JOIN yazar ON eser.yazarID = yazar.yazarID
                                       LEFT JOIN yayinevi ON eser.yayineviID = yayinevi.yayineviID
                                       LEFT JOIN konu ON eser.konuID = konu.konuID");
    $toplam = mysqli_num_rows($sorgu);
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HU BBY361 VTYS çalışmaları">
    <meta name="author" content="Orçun Madran">
    <title>BBY361 Eser İşlemleri - Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/common.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /* Yeni eser ekle butonu için stil */
        .eser-ekle-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
        }

        .eser-ekle-button:hover {
            background-color: #218838;
        }

        /* Liste stil */
        .eser-liste {
            list-style: none;
            padding: 0;
        }

        .eser-liste-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 5px;
        }

        .eser-liste-item a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BBY361</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <script>
                        for (index in mainMenu) {
                            document.write('<li className="nav-item"><a class="nav-link" target=' + mainMenu[index][2] + ' href=' + mainMenu[index][1] + '>' + mainMenu[index][0] + '</a></li>');
                        }
                    </script>
                </ul>
                <script>document.write(searchForm)</script>
            </div>
        </div>
    </nav>
</header>

<!-- Sayfa İçerik Başlangıcı -->
<main class="flex-shrink-0">
    <div class="container">
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-primary btn-lg border-3 rounded-pill px-4">Ana Sayfa</a>
        </div>
        <h1 class="mt-5">Eser İşlemleri</h1>
        <p class="lead">Bu sayfada veri tabanında yer alan eserler ile ilgili işlemler yapabilir veya yeni eser ekleyebilirsiniz.</p>
        <p><a class="eser-ekle-button" href="eser_ekle.php">Yeni Eser Ekle</a></p>
        <h2 class="mt-4">Eserleri Güncelle veya Sil</h2>
        <p><?php echo("Toplam kayıt sayısı: " . $toplam); ?></p>
    </div>
</main>

<ul class="eser-liste">
    <?php
    // Veritabanı sorgusunu tekrar başa al
    mysqli_data_seek($sorgu, 0);

    while ($satir = mysqli_fetch_assoc($sorgu)) {
        echo '<li class="eser-liste-item">';
        echo '<strong>' . $satir['eserID'] . ' - ' . $satir['eserADI'] . '</strong>';
        echo '<br>';
        echo 'ISBN: ' . $satir['ISBN'] . '<br>';
        echo 'Yayın Yılı: ' . $satir['yayinyili'] . '<br>';
        echo 'Yazar: ' . $satir['yazarADI'] . ' ' . $satir['yazarSOYADI'] . '<br>';
        echo 'Yayınevi: ' . $satir['yayineviADI'] . '<br>';
        echo 'Konu: ' . $satir['konuAdi'] . '<br>';
        echo '<span class="text-muted">(<a href="eser_guncelle.php?eserID=' . $satir['eserID'] . '">Güncelle</a>) ';
        echo ' (<a href="eser_sil.php?eserID=' . $satir['eserID'] . '">Sil</a>)</span>';
        echo '</li>';
    }
    ?>
</ul>
<!-- Sayfa İçerik Bitişi -->

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <script>document.write(footer)</script>
    </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
