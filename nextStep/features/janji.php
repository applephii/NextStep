<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$name = $_SESSION['user'];
$error_message = '';
$success_message = '';

// Proses Form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_janji'])) {
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $dokter = mysqli_real_escape_string($conn, $_POST['dokter']);
        $tanggal_konsultasi = mysqli_real_escape_string($conn, $_POST['tanggal_konsultasi']);

        if (empty($message) || empty($name) || empty($dokter) || empty($tanggal_konsultasi)) {
            $error_message = 'Semua field harus diisi!';
        } else {
            $sql = "INSERT INTO appointment (user_id, nama, dokter, tanggal, keluhan) 
                    VALUES ('$user_id', '$name', '$dokter', '$tanggal_konsultasi', '$message')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['success_message'] = 'Pesan konsultasi Anda telah terkirim.';
                header("Location: janji.php");
                exit();
            } else {
                $error_message = 'Gagal mengirim pesan. Silakan coba lagi.';
            }
        }
    }
}

// Ambil data konsultasi
$sql = "SELECT * FROM appointment WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Offline</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h1>Booking Konsultasi Offline</h1>
        <p>Buat janji konsultasi untuk mendapatkan layanan lebih!</p>

        <?php if ($error_message) { ?>
            <div class="message"><?php echo $error_message; ?></div>
        <?php } ?>

        <?php if ($success_message) { ?>
            <div class="message success-message"><?php echo $success_message; ?></div>
        <?php } ?>

        <form action="janji.php" method="POST">
            <input type="text" name="name" placeholder="Nama Anda" class="form-input" required>
            <input type="text" name="dokter" placeholder="Dokter Janji" class="form-input" required>
            <input type="date" name="tanggal_konsultasi" class="form-input" required>
            <textarea name="message" placeholder="Tuliskan keluhan Anda" class="form-textarea" required></textarea>
            <button type="submit" name="submit_janji" class="form-button">Buat Janji</button>
        </form>

        <!-- Back Button -->
        <button onclick="window.location.href='integrated.php'" class="back-button">Kembali</button>
    </div>

    <div class="container">
        <h1>Daftar Booking</h1>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="consultation-list">
                <?php while ($row = mysqli_fetch_assoc($result)) { 
                    $status = htmlspecialchars($row['status']);
                    $color = '';
                    
                    switch ($status) {
                        case 'pending':
                            $color = '#ffc107';
                            break;
                        case 'approved':
                            $color = '#28a745';
                            break;
                        case 'rejected':
                            $color = '#dc3545';
                            break;
                        case 'finished':
                            $color = '#007bff';
                            break;
                        default:
                            $color = '#6c757d';
                    }?>
                    <div class="consultation-item">
                        <div class="container" style="padding: 20px;">
                            <div class="row">
                                <strong>Nama: </strong><?php echo htmlspecialchars($row['nama']); ?><br>
                                <strong>Nama Dokter: </strong><?php echo htmlspecialchars($row['dokter']); ?><br>
                                <strong>Tanggal: </strong><?php echo htmlspecialchars($row['tanggal']); ?><br>
                                <strong>Status Janji Temu: </strong>
                                <div style="
                                    display: inline-block;
                                    border: 2px solid <?php echo $color; ?>;
                                    background-color: <?php echo $color; ?>;
                                    color: #fff;
                                    padding: 5px 10px;
                                    border-radius: 5px;
                                    font-weight: bold;
                                    font-size: small;
                                    text-align: center;">
                                    <?php echo $status; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>Belum ada janji temu.</p>
        <?php } ?>


    </div>
</body>

</html>