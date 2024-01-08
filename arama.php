<?php
/* Bağlantı bilgileri */
require_once("baglanti.php");

/* Veritabanı sorgulama */
$q = isset($_GET["q"]) ? mysqli_real_escape_string($baglanti, $_GET["q"]) : '';

$sorgu = mysqli_query($baglanti, "SELECT eser.eserID, eser.eserADI, yazar.yazarID, CONCAT(yazar.yazarADI, ' ', yazar.yazarSOYADI) AS yazarAdSoyad
                                  FROM eser
                                  INNER JOIN yazar ON eser.yazarID = yazar.yazarID
                                  WHERE yazar.yazarADI LIKE '%$q%' OR yazar.yazarSOYADI LIKE '%$q%' OR eser.eserADI LIKE '%$q%'");

// $sorgu başarısız olursa
if (!$sorgu) {
    // Hata mesajını göster ve işlemi sonlandır
    die("Sorgu hatası: " . mysqli_error($baglanti));
}

// $toplam'ı $sorgu'dan almadan önce kontrol et
$toplam = ($sorgu) ? mysqli_num_rows($sorgu) : 0;
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <!-- Head kısmı buraya gelecek -->
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Navbar kısmı buraya gelecek -->
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
                    <!-- Ana Sayfa Butonu -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Ana Sayfa</a>
                    </li>
                    <!-- /Ana Sayfa Butonu -->
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
        <h1 class="mt-5">Eserleri Listele</h1>

        <!-- Arama Formu -->
        <form action="arama.php" method="GET">
            <div class="mb-3">
                <label for="aramaKelimesi" class="form-label">Arama Kelimesi:</label>
                <input type="text" class="form-control" id="aramaKelimesi" name="q" required>
            </div>
            <button type="submit" class="btn btn-primary">Ara</button>
        </form>
        <!-- Arama Formu Bitişi -->

        <p class="lead">Bu sayfada veri tabanının eserler tablosunda yer alan kayıtların tamamı listelenmektedir.</p>
        <h2>Eser Kayıtları</h2>
        <p><?php echo "Toplam kayıt sayısı: " . $toplam; ?></p>
        <p>
            <?php
            // $sorgu değeri null değilse işlemlere devam et
            while ($satir = mysqli_fetch_assoc($sorgu)) {
                printf("<h4>" . $satir["eserADI"] . "</h4>");
                printf("<p><b>Eser No:</b> " . $satir["eserID"] . "</br>");
                printf("<p><b>Yazar:</b> " . $satir["yazarAdSoyad"] . "</br>");
                printf("<hr>");
            }
            ?>
        </p>
    </div>
</main>
<!-- Sayfa İçerik Bitişi -->

<footer class="footer mt-auto py-3 bg-light">
    <!-- Footer kısmı buraya gelecek -->
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
