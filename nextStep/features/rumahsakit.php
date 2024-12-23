<?php
session_start();
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik dan Rumah Sakit</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <center>
                    <div class="tour-title">
                        <h2>Daftar Klinik dan Rumah Sakit</h2>
                    </div>
                    <div class="dropdown-center d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Daerah Anda
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="rumahsakit.php">
                                    <center>Semua Provinsi</center>
                                </a></li>
                            <?php
                            $sql = "SELECT DISTINCT provinsi FROM rumahsakit ORDER BY provinsi ASC";
                            $lines = $conn->query($sql);
                            while ($row = $lines->fetch_object()) { ?>
                                <li><a class="dropdown-item" href="rumahsakit.php?prov=<?= $row->provinsi; ?>">
                                        <center><?= $row->provinsi; ?></center>
                                    </a></li>

                            <?php }
                            ?>
                        </ul>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <br>
    <div style="margin:3%;">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['provinsi'])) {
                    $pl = $_GET['provinsi'];
                    $query = mysqli_query($conn, "SELECT * FROM rumahsakit WHERE provinsi='$pl'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="col-md-3">
                            <div class="card" style="width: 16rem;">
                                <img src="integrated/rumahsakit.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                                <div class="card-body">
                                    <center>
                                        <div class="card-title">
                                            <h5 class="card-title"><?= $data['nama'] ?></h5>
                                        </div>
                                        <p class="card-text">
                                            <font color="black">
                                                <ul>
                                                    <li><strong>Provinsi: </strong><?= $data['provinsi'] ?></li>
                                                    <li><strong>Alamat: </strong><?= $data['alamat'] ?></li>
                                                </ul>
                                                <a href="maps.php" class="btn btn-outline-dark">
                                                    <font color="blue">
                                                        Google Maps
                                                    </font>
                                                </a>
                                            </font>
                                        </p>
                                    </center>
                                </div>
                            </div>
                            <br>
                        </div>
                    <?php }
                } else {
                    $query = mysqli_query($conn, "SELECT * FROM rumahsakit");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="col-md-3">
                            <div class="card" style="width: 16rem;">
                                <img src="integrated/rumahsakit.jpg" class="card-img-top" width="90%" style="aspect-ratio:1/1; object-fit: cover;">
                                <div class="card-body">
                                    <center>
                                        <div class="card-title">
                                            <h5 class="card-title"><?= $data['nama'] ?></h5>
                                        </div>
                                        <p class="card-text">
                                            <font color="black">
                                                <ul>
                                                    <li><strong>Provinsi: </strong><?= $data['provinsi'] ?></li>
                                                    <li><strong>Alamat: </strong><?= $data['alamat'] ?></li>
                                                </ul>
                                                <a href="maps.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-dark">
                                                    <font color="blue">
                                                        Google Maps
                                                    </font>
                                                </a>
                                            </font>
                                        </p>
                                    </center>
                                </div>
                            </div>
                            <br>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
        <center>
            <button class="back-button" onclick="window.location.href='integrated.php';">Kembali</button>
        </center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>