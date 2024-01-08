<?php
    /* Bağlantı bilgileri */
    require_once("baglanti.php");

    /* Veritabanı sorgulama */
    $sorgu = mysqli_query($baglanti, "SELECT ES.*, CONCAT(YA.yazarADI, ' ', YA.yazarSOYADI) AS yazarAdSoyad, YE.yayineviADI AS yayineviAdi, KO.konuAdi
                                      FROM eser ES
                                      INNER JOIN yazar YA ON ES.yazarID = YA.yazarID
                                      INNER JOIN yayinevi YE ON ES.yayineviID = YE.yayineviID
                                      INNER JOIN konu KO ON ES.konuID = KO.konuID");
    $toplam = mysqli_num_rows($sorgu);

?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HU BBY361 VTYS çalışmaları">
    <meta name="author" content="Orçun Madran">
    <title>BBY361 Eserleri Listele - Bootstrap v5.2</title>

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

      /* Eklenen Stiller */
      .eser-kart {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 10px;
      }

      .eser-kart .card-body {
        padding: 1.25rem;
      }

      .eser-kart h4 {
        margin-bottom: 0.75rem;
        font-size: 1.75em;
        color: #007bff;
      }

      .eser-kart p {
        margin-bottom: 0.5rem;
      }

      .eser-kart hr {
        margin-top: 0.75rem;
        margin-bottom: 0.75rem;
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
        <script>
          document.write(searchForm)
        </script>
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
    <h1 class="mt-5">Eserleri Listele</h1>
    <p class="lead">Bu sayfada veri tabanının eserler tablosunda yer alan kayıtların tamamı listelenmektedir.</p>
    <h2>Eser Kayıtları</h2>
    <p><?php echo("Toplam kayıt sayısı: ".$toplam);?></p>
    <?php
      while($satir = mysqli_fetch_assoc($sorgu)){
    ?>
        <div class="card eser-kart">
          <div class="card-body">
            <h4 class="card-title"><?php echo $satir["eserADI"]; ?></h4>
            <p class="card-text"><b>Eser No:</b> <?php echo $satir["eserID"]; ?></p>
            <p class="card-text"><b>ISBN:</b> <?php echo $satir["ISBN"]; ?></p>
            <p class="card-text"><b>Eser yayım tarihi:</b> <?php echo $satir["yayinyili"]; ?></p>
            <p class="card-text"><b>Yazar:</b> <?php echo $satir["yazarAdSoyad"]; ?></p>
            <p class="card-text"><b>Yayınevi:</b> <?php echo $satir["yayineviAdi"]; ?></p>
            <p class="card-text"><b>Konu:</b> <?php echo $satir["konuAdi"]; ?></p>
            <hr>
          </div>
        </div>
    <?php
      }
    ?>
  </div>
</main>
<!-- Sayfa İçerik Bitişi -->

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <script>
      document.write(footer)
    </script>
  </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
