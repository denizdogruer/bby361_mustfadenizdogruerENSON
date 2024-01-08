<?php
/* Bağlantı bilgilerinin alınması */
require_once("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen eserID değerini alın
    $eserID = isset($_POST['eserID']) ? $_POST['eserID'] : null;

    // Eğer eserID tanımlı değilse veya boşsa hata mesajı gösterin
    if (empty($eserID)) {
        echo "EserID alanını doldurmalısınız.";
        exit; // Kodun devamını çalıştırmamak için çıkış yapın
    }

    // Eser ID'nin varlığını kontrol et
    $kontrolSorgusu = "SELECT COUNT(*) as sayi FROM eser WHERE eserID = ?";
    $kontrolStatement = mysqli_prepare($baglanti, $kontrolSorgusu);
    mysqli_stmt_bind_param($kontrolStatement, "s", $eserID);
    mysqli_stmt_execute($kontrolStatement);
    mysqli_stmt_bind_result($kontrolStatement, $sayi);
    mysqli_stmt_fetch($kontrolStatement);

    // Kontrol ifadesini kapat
    mysqli_stmt_close($kontrolStatement);

    if ($sayi > 0) {
        echo "Bu eserID zaten mevcut. Lütfen farklı bir eserID seçin.";
        exit;
    } else {
        // Diğer form verilerini alın
        $eserAdi = isset($_POST['eserADI']) ? $_POST['eserADI'] : null;
        $yazarID = isset($_POST['yazarID']) ? $_POST['yazarID'] : null;
        


        // Ekleme işlemini gerçekleştir
        $sorgu = "INSERT INTO eser (eserID, eserAdi, yazarID) VALUES (?, ?, ?)";
        $ekleStatement = mysqli_prepare($baglanti, $sorgu);
        mysqli_stmt_bind_param($ekleStatement, "sss", $eserID, $eserAdi, $yazarID);

        if (mysqli_stmt_execute($ekleStatement)) {
            // Başarı mesajı
            echo '<div style="text-align: center; padding: 20px; background-color: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6; border-radius: 5px;">';
            echo '<p>Eser başarıyla eklendi!</p>';
            echo '<a href="eser_islemleri.php" style="text-decoration: none; color: #3c763d; font-weight: bold;">Eser İşlemleri Sayfasına Git</a>';
            echo '</div>';
        } else {
            // Hata mesajı
            echo "Hata: Eser eklenirken bir sorun oluştu. Lütfen daha sonra tekrar deneyin.";
            // Hatanın ayrıntılarını görüntülemek için geliştirme aşamasında kullanılabilir
            // printf("Hata: " . $sorgu . "<br>" . mysqli_error($baglanti));
        }

        mysqli_close($baglanti);
    }
}
?>
