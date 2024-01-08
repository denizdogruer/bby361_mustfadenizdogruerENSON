<?php
require_once("baglanti.php");

if (isset($_GET['eserID'])) {
    $eserID = mysqli_real_escape_string($baglanti, $_GET['eserID']);
    $sorgu = mysqli_query($baglanti, "SELECT eser.*, yayinevi.yayineviADI, CONCAT(yazar.yazarADI, ' ', yazar.yazarSOYADI) AS adSoyad
                                       FROM eser
                                       LEFT JOIN yazar ON eser.yazarID = yazar.yazarID
                                       LEFT JOIN yayinevi ON eser.yayineviID = yayinevi.yayineviID
                                       WHERE eserID = '$eserID'");
    $eser = mysqli_fetch_assoc($sorgu);

    // Yayınevi bilgilerini çek
    $yayinevi_sorgu = mysqli_query($baglanti, "SELECT * FROM yayinevi");
    $yayinevleri = mysqli_fetch_all($yayinevi_sorgu, MYSQLI_ASSOC);

    // Yazar bilgilerini çek
    $yazar_sorgu = mysqli_query($baglanti, "SELECT yazarID, CONCAT(yazarADI, ' ', yazarSOYADI) AS adSoyad FROM yazar");
    $yazarlar = mysqli_fetch_all($yazar_sorgu, MYSQLI_ASSOC);
} else {
    // EserID parametresi eksik, kullanıcıyı başka bir sayfaya yönlendir
    header("Location: index.php");
    exit();
}

// Form gönderildiğinde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Güncelleme işlemleri burada gerçekleştirilecek
    $eserADI = mysqli_real_escape_string($baglanti, $_POST['eserADI']);
    $isbn = mysqli_real_escape_string($baglanti, $_POST['isbn']);
    $yayinYili = mysqli_real_escape_string($baglanti, $_POST['yayinYili']);
    $yayineviID = mysqli_real_escape_string($baglanti, $_POST['yayineviID']);
    $yazarID = mysqli_real_escape_string($baglanti, $_POST['yazarID']);

    $guncelleSorgu = mysqli_query($baglanti, "UPDATE eser
                                              SET eserADI = '$eserADI',
                                                  ISBN = '$isbn',
                                                  yayinyili = '$yayinYili',
                                                  yayineviID = '$yayineviID',
                                                  yazarID = '$yazarID'
                                              WHERE eserID = '$eserID'");

    if ($guncelleSorgu) {
        // Güncelleme başarılı, kullanıcıyı eser_islemleri.php sayfasına yönlendir
        header("Location: eser_islemleri.php?guncelleme=basarili&id=$eserID");
        exit();
    } else {
        echo "Güncelleme başarısız: " . mysqli_error($baglanti);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eser Güncelle</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Eser Güncelle</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="eserADI" class="form-label">Eser Adı:</label>
            <input type="text" class="form-control" id="eserADI" name="eserADI" value="<?php echo isset($eser['eserADI']) ? $eser['eserADI'] : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo isset($eser['ISBN']) ? $eser['ISBN'] : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="yayinYili" class="form-label">Yayın Yılı:</label>
            <input type="text" class="form-control" id="yayinYili" name="yayinYili" value="<?php echo isset($eser['yayinyili']) ? $eser['yayinyili'] : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="yayineviID" class="form-label">Yayınevi:</label>
            <select class="form-select" id="yayineviID" name="yayineviID" required>
                <?php foreach ($yayinevleri as $yayinevi) : ?>
                    <option value="<?php echo $yayinevi['yayineviID']; ?>" <?php echo ($yayinevi['yayineviID'] == $eser['yayineviID']) ? 'selected' : ''; ?>>
                        <?php echo $yayinevi['yayineviADI']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="yazarID" class="form-label">Yazar:</label>
            <select class="form-select" id="yazarID" name="yazarID" required>
                <?php foreach ($yazarlar as $yazar) : ?>
                    <option value="<?php echo $yazar['yazarID']; ?>" <?php echo ($yazar['yazarID'] == $eser['yazarID']) ? 'selected' : ''; ?>>
                        <?php echo $yazar['adSoyad']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
