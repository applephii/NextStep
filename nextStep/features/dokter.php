<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori Profesional</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .d-flex.justify-content-center {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            gap: 20px;
        }

        .card-0 {
            text-align: center;
            flex: 1;
            max-width: 150px;
        }

        .card-0 img {
            max-width: 50px;
            height: auto;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>Direktori Profesional</h1>
            <br>
            <div class="d-flex justify-content-center">
                <div class="card-0 text-center" style="margin: 10px; flex: 1;">
                    <a href="listdokter.php?kategori=dkandungan" style="color: black;">
                        <img src="integrated/ikon.webp" alt="" class="img-fluid" style="max-width: 50px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">Dokter Kandungan</h5>
                        </div>
                    </a>
                </div>

                <div class="card-0 text-center" style="margin: 10px; flex: 1;">
                    <a href="listdokter.php?kategori=danak" style="color: black;">
                        <img src="integrated/ikon.webp" alt="" class="img-fluid" style="max-width: 50px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">Dokter Anak</h5>
                        </div>
                    </a>
                </div>

                <div class="card-0 text-center" style="margin: 10px; flex: 1;">
                    <a href="listdokter.php?kategori=psikolog" style="color: black;">
                        <img src="integrated/ikon.webp" alt="" class="img-fluid" style="max-width: 50px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">Psikolog</h5>
                        </div>
                    </a>
                </div>

                <div class="card-0 text-center" style="margin: 10px; flex: 1;">
                    <a href="listdokter.php?kategori=konselor" style="color: black;">
                        <img src="integrated/ikon.webp" alt="" class="img-fluid" style="max-width: 50px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">Konselor</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <center>
            <button class="back-button" onclick="window.location.href='integrated.php';">Kembali</button>
        </center>
    </div>

</body>

</html>