<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eser Güncelleme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h1 {
            color: #007bff;
        }

        .success-message {
            color: #28a745;
            font-size: 18px;
            margin-top: 20px;
        }

        .error-message {
            color: #dc3545;
            font-size: 18px;
            margin-top: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            /* Bağlantı bilgilerinin alınması */
            require_once("baglanti.php");

            /* Ekleme işlemi sorgusu */
            $eserADI = mysqli_real_escape_string($baglanti, $_POST['eserADI']);
            $eserID = 8; // Güncellenmek istenen eserID

            $sorgu = "UPDATE eser SET eserADI='$eserADI' WHERE eserID = $eserID";

            if (mysqli_query($baglanti, $sorgu)) {
                echo "<h1>Eser Güncellendi!</h1>";
                echo "<p class='success-message'>Eser başarıyla güncellendi.</p>";
            } else {
                echo "<h1>Hata!</h1>";
                echo "<p class='error-message'>Eser güncellenirken bir hata oluştu: " . mysqli_error($baglanti) . "</p>";
            }

            mysqli_close($baglanti);
        ?>
        <!-- Eser güncellendikten sonra Eser İşlemleri sayfasına dönmek için buton -->
        <a href="eser_islemleri.php">Eser İşlemleri Sayfasına Dön</a>
    </div>
</body>
</html>
