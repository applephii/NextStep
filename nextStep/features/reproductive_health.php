<?php
session_start();
include '../includes/db.php';

// Mengambil data materi kesehatan reproduksi dari database
$sql = "SELECT * FROM reproductive_health";
$result = mysqli_query($conn, $sql);

// Cek apakah ada materi yang ditemukan
if (mysqli_num_rows($result) > 0) {
    $materials = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $materials = [];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kesehatan Reproduksi</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <center>
        <div class="container">
            <h1>Kesehatan Reproduksi</h1>
            <p>Pelajari lebih lanjut tentang kesehatan reproduksi untuk memastikan kesiapan fisik Anda.</p>

            <?php if (empty($materials)) { ?>
                <p>Tidak ada materi kesehatan reproduksi yang tersedia saat ini.</p>
            <?php } else { ?>
                <?php foreach ($materials as $material) { ?>
                    <section>
                        <h2><?php echo htmlspecialchars($material['title']); ?></h2>
                        <p><?php echo nl2br(htmlspecialchars($material['content'])); ?></p>
                    </section>
                <?php } ?>
            <?php } ?>

            <!-- Kembali ke halaman sebelumnya -->
            <div class="navigation">
                <a href="index.php">
                    <button class="back-button">Kembali ke Beranda</button>
                </a>
            </div>
        </div>
    </center>

</body>

</html>