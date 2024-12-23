<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori Profesional</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <?php
    $kategori = $_GET['kategori'];
    if ($kategori == 'dkandungan') {
    ?>
        <div class="container">
            <div class="row">
                <center>
                    <h2>Daftar Dokter Kandungan</h2>
                </center>
                <!-- Card 1 -->
                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/dkandungan.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Andini Prameswari, Sp. OG</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Rumah Sakit Pondok Indah, Jakarta Selatan</li>
                                    <li><strong>Lulusan: </strong>Fakultas Kedokteran Universitas Indonesia</li>
                                    <li><strong>Spesialisasi: </strong>Kehamilan Risiko Tinggi dan Infertilitas</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/dkandungan.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Budi Santoso, Sp.OG(K)</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>RS Hermina, Bandung</li>
                                    <li><strong>Lulusan: </strong>Universitas Padjadjaran</li>
                                    <li><strong>Spesialisasi: </strong>Bedah Laparoskopi dan Kesehatan Reproduksi</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/dkandungan.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Clara Wijaya, Sp.OG</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>RS Siloam, Yogyakarta</li>
                                    <li><strong>Lulusan: </strong>Universitas Gadjah Mada</li>
                                    <li><strong>Spesialisasi: </strong>Pemeriksaan USG dan Perawatan Kehamilan</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/dkandungan.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Hendra Kusuma, Sp.OG</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Rumah Sakit Eka Hospital, Bekasi</li>
                                    <li><strong>Lulusan: </strong>Universitas Airlangga</li>
                                    <li><strong>Spesialisasi: </strong>Persalinan Normal dan Operasi Caesar</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <button class="back-button" onclick="window.location.href='dokter.php';">Kembali</button>
            </center>
        </div>

    <?php } elseif ($kategori == 'danak') {
    ?>
        <div class="container">
            <div class="row">
                <center>
                    <h2>Daftar Dokter Anak</h2>
                </center>
                <!-- Card 1 -->
                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/danak.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Dimas Arifin, Sp.A</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Rumah Sakit Bunda, Jakarta Pusat</li>
                                    <li><strong>Lulusan: </strong>Fakultas Kedokteran Universitas Indonesia</li>
                                    <li><strong>Spesialisasi: </strong>Tumbuh Kembang Anak dan Nutrisi</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/danak.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Lestari Wijaya, Sp.A(K)</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>RS Hermina, Depok</li>
                                    <li><strong>Lulusan: </strong>Universitas Padjadjaran</li>
                                    <li><strong>Spesialisasi: </strong>Neonatologi (Perawatan Bayi Baru Lahir) dan Imunisasi</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/danak.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Rizky Permadi, Sp.A</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>RS Siloam, Surabaya</li>
                                    <li><strong>Lulusan: </strong>Universitas Airlangga</li>
                                    <li><strong>Spesialisasi: </strong>Alergi dan Imunologi Anak</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/danak.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">dr. Adinda Setiawan, Sp.A</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Klinik Anakku Sehat, Bandung</li>
                                    <li><strong>Lulusan: </strong>Universitas Gadjah Mada</li>
                                    <li><strong>Spesialisasi: </strong>Infeksi Saluran Pernapasan dan Demam pada Anak</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <button class="back-button" onclick="window.location.href='dokter.php';">Kembali</button>
            </center>
        </div>
    <?php } elseif ($kategori == 'psikolog') { ?>
        <div class="container">
            <div class="row">
                <center>
                    <h2>Daftar Psikolog</h2>
                </center>
                <!-- Card 1 -->
                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/psikolog.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Mira Pranajaya, M.Psi., Psikolog</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Klinik Harmoni Keluarga, Jakarta Selatan</li>
                                    <li><strong>Lulusan: </strong>Universitas Indonesia</li>
                                    <li><strong>Spesialisasi: </strong>Konseling pranikah, pemulihan konflik rumah tangga, dan komunikasi pasangan</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/psikolog.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Prof. Rafi Ardiansyah, S.Psi., M.Pd., Ph.D.</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>RSIA Melati, Bandung</li>
                                    <li><strong>Lulusan: </strong>Universitas Padjadjaran</li>
                                    <li><strong>Spesialisasi: </strong>Stimulasi perkembangan anak, keterlambatan bicara, dan edukasi orang tua</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/psikolog.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Dr. Anisa Maharani, M.Pd., M.Psi., Psikolog</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Rumah Konseling Bahtera, Yogyakarta</li>
                                    <li><strong>Lulusan: </strong>Universitas Airlangga</li>
                                    <li><strong>Spesialisasi: </strong>Terapi pemulihan trauma pernikahan, konflik emosional, dan pendampingan pasangan</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/psikolog.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Dr. Vania Kusuma, S.Psi., M.A., Psikolog</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Klinik Tumbuh Kembang Ceria, Semarang</li>
                                    <li><strong>Lulusan: </strong>Universitas Diponegoro</li>
                                    <li><strong>Spesialisasi: </strong>Stimulasi kecerdasan anak, kesiapan sekolah, dan intervensi perkembangan sosial</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <button class="back-button" onclick="window.location.href='dokter.php';">Kembali</button>
            </center>
        </div>

    <?php } elseif ($kategori == 'konselor') { ?>
        <div class="container">
            <div class="row">
                <center>
                    <h2>Daftar Psikolog</h2>
                </center>
                <!-- Card 1 -->
                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/konselor.png" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Ayu Pratiwi, M.Kons., CPC, CT</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Klinik Jiwa Tenang, Surabaya</li>
                                    <li><strong>Lulusan: </strong>Universitas Indonesia</li>
                                    <li><strong>Spesialisasi: </strong>Peningkatan motivasi, penetapan tujuan hidup, dan pengelolaan waktu</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/konselor.png" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Dr. Putra Widodo, M.Pd., M.Kons., CPLC</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Rumah Konseling Produktifitas, Malang</li>

                                    <li><strong>Lulusan: </strong>Universitas Negeri Malang</li>
                                    <li><strong>Spesialisasi: </strong>Konflik remaja dan keluarga, pendidikan karakter, dan pengelolaan emosi remaja</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/konselor.png" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Dina Rahmawati, M.Kons., CCLC</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Pusat Konseling Tunas Harapan, Bandung</li>
                                    <li><strong>Lulusan: </strong>Universitas Airlangga</li>
                                    <li><strong>Spesialisasi: </strong>Pendampingan pemulihan trauma, terapi mental pascakejadian, dan penguatan emosional</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img src="integrated/konselor.png" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                        <div class="card-body">
                            <center>
                                <div class="card-title">
                                    <h3 class="card-title">Adi Pratama, S.Pd., M.Kons., CPC</h3>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Tempat Praktik: </strong>Konsultan Karier Bright Future, Yogyakarta</li>
                                    <li><strong>Lulusan: </strong>Universitas Diponegoro</li>
                                    <li><strong>Spesialisasi: </strong>Konseling pranikah, penyelesaian konflik pernikahan, dan pendampingan emosional pasangan</li>
                                </ul>
                                <font color="blue">
                                    <a href="janji.php" class="btn btn-outline-dark">
                                        <font color="blue">
                                            Buat Janji Temu
                                        </font>
                                    </a>
                                </font>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <button class="back-button" onclick="window.location.href='dokter.php';">Kembali</button>
            </center>
        </div>
    <?php }
    ?>
</body>

</html>