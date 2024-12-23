<?php
session_start();
include '../includes/db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$name = $_SESSION['user'];
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit_question'])){
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        // Validasi input
        if (empty($message)) {
            $error_message = 'Semua field harus diisi!';
        } else {
            // Simpan data konsultasi ke database
            $sql = "INSERT INTO konsultasi (user_id, name, pertanyaan, status, created_at) 
                    VALUES ('$user_id', '$name', '$message', 'pending', NOW())";
            if (mysqli_query($conn, $sql)) {
                $success_message = 'Pesan konsultasi Anda telah terkirim. Kami akan menghubungi Anda segera.';
                header("Location: consultation.php");
                exit();
            } else {
                $error_message = 'Gagal mengirim pesan. Silakan coba lagi.';
            }
        }
    }
    elseif(isset($_POST['delete'])){
            $id = intval($_POST['id']);
            $query = "DELETE FROM konsultasi WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'i', $id);
                if (mysqli_stmt_execute($stmt)) {
                    $success_message = "Pertanyaan berhasil dihapus.";
                } else {
                    $error_message = "Terjadi kesalahan saat menghapus pertanyaan.";
                }
                mysqli_stmt_close($stmt);
            } else {
                $error_message = "Terjadi kesalahan pada query.";
            }

            header("Location: consultation.php"); // Redirect ke halaman daftar konsultasi
            exit();
        } else {
            header("Location: consultation.php");
            exit();
    }

}

// Ambil semua konsultasi pengguna
$sql = "SELECT * FROM konsultasi WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Online</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">
        <h1>Konsultasi Online</h1>
        <p>Silakan ajukan pertanyaan atau baca balasan dari konselor di bawah ini.</p>

        <!-- Tampilkan pesan error jika ada -->
        <?php if ($error_message) { ?>
            <div class="message"><?php echo $error_message; ?></div>
        <?php } ?>

        <!-- Tampilkan pesan sukses jika ada -->
        <?php if ($success_message) { ?>
            <div class="message success-message"><?php echo $success_message; ?></div>
        <?php } ?>

        <!-- Form untuk mengajukan pertanyaan baru -->
        <form action="consultation.php" method="POST">
            <h3>Ajukan Pertanyaan Baru</h3>
            <!-- <input type="text" name="name" placeholder="Nama Anda" class="form-input" required> -->
            <!-- <input type="email" name="email" placeholder="Email Anda" class="form-input" required> -->
            <textarea name="message" placeholder="Tuliskan pesan Anda" class="form-textarea" required></textarea>
            <button type="submit" name="submit_question" class="button">Kirim Pesan</button>
        </form>
        <!-- Back Button -->
        <button onclick="window.location.href='pre_marriage.php'" class="back-button">Kembali</button>
    </div>
    <div class="container">       
        <h1>Daftar Pertanyaan</h1>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="consultation-list">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="consultation-item">
                        <div class="container" style="padding: 20px;">
                            <!-- Bubble untuk pertanyaan -->
                            <div class="row">
                                <div class="col-12">
                                    <div style="
                                        background-color: #f0f0f0;
                                        color: #333;
                                        padding: 10px 15px;
                                        border-radius: 15px;
                                        margin: 10px 0;
                                        max-width: 70%;
                                        text-align: left;
                                        position: relative;">
                                        <strong>Pertanyaan:</strong><br>
                                        <?php echo htmlspecialchars($row['pertanyaan']); ?>
                                        <p style="
                                        font-size: small;
                                        position: absolute;
                                        bottom: 5px;
                                        right: 10px;
                                        margin: 0;">
                                        <?php echo date("d-m-Y H:i", strtotime($row['created_at'])); ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($row['balasan'])): ?>
                            <!-- Bubble untuk balasan -->
                            <div class="row">
                                <div class="col-12">
                                    <div style="
                                        background-color: #FFE2E2;
                                        color: #333;
                                        padding: 10px 15px;
                                        border-radius: 15px;
                                        margin: 10px 0 10px auto;
                                        max-width: 70%;
                                        text-align: left;
                                        position: relative;">
                                        <p style="font-size: small"><strong>Oleh: </strong><?php echo $row['nama_konselor'] ? htmlspecialchars($row['nama_konselor']) : '-'; ?></p>
                                        <strong>Balasan:</strong><br>
                                        <?php echo htmlspecialchars($row['balasan']); ?>
                                        <p style="
                                        font-size: small;
                                        position: absolute;
                                        bottom: 5px;
                                        right: 10px;
                                        margin: 0;">
                                        <?php echo date("d-m-Y H:i", strtotime($row['updated_at'])); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <form action="consultation.php" method="POST" style="top: 5px; right: 10px;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?');" style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 5px;">
                                    Hapus Pertanyaan
                                </button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>Belum ada pertanyaan yang diajukan.</p>
        <?php } ?>


    </div>

</body>

</html>