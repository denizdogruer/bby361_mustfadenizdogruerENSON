<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBY361 Veri Tabanı Yönetim Sistemi</title>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #007bff;
        }
        .row {
            margin-top: 30px;
        }
        .card {
            background-color: #fff;
            border: 2px solid #007bff;
            border-radius: 10px;
            transition: border 0.3s;
        }
        .card:hover {
            border: 2px solid #007bff;
        }
        .card-title {
            color: #007bff;
            font-size: 1.5rem;
        }
        .card-text {
            color: #6c757d;
            font-size: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: 2px solid #0056b3;
            border-radius: 8px;
            color: #fff;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border: 2px solid #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">BBY361 Veri Tabanı Yönetim Sistemi</h1>
        <hr>
<p>Veri Tabanı Yönetim Sistemleri dersinde yaptığımız çalışmalar için hazırlanan bu web şablonuna hoş geldiniz :)

</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Eserleri Listele</h5>
                        <p class="card-text">Veritabanındaki eserleri listeleyin.</p>
                        <a href="eserleri_listele.php" class="btn btn-primary">Listele</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Yeni Eser Ekle</h5>
                        <p class="card-text">Veritabanına yeni bir eser ekleyin.</p>
                        <a href="eser_ekle.php" class="btn btn-primary">Ekle</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Eser İşlemleri</h5>
                        <p class="card-text">Eserleri güncelleyin veya silin.</p>
                        <a href="eser_islemleri.php" class="btn btn-primary">İşlemler</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Arama</h5>
                        <p class="card-text">Eserleri arayın.</p>
                        <a href="arama.php" class="btn btn-primary">Ara</a>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Diğer İşlemler</h5>
                        <p class="card-text">İhtiyaç duyulan diğer işlemleri gerçekleştirin.</p>
                        <a href="#" class="btn btn-primary">Diğer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
