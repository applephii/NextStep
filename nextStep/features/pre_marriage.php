<?php
session_start();
include '../includes/db.php'; // File koneksi database

// Fungsi untuk menambahkan data asesmen dan konsultasi ke database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_assessment'])) {
    $username = $_SESSION['username'];
    $mental_preparedness = $_POST['mental_preparedness'];
    $financial_preparedness = $_POST['financial_preparedness'];

    $sql = "INSERT INTO assessments (username, mental_preparedness, financial_preparedness) 
            VALUES ('$username', '$mental_preparedness', '$financial_preparedness')";

    if (mysqli_query($conn, $sql)) {
        $success_message = "Asesmen berhasil disimpan.";
    } else {
        $error_message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Marriage Platform</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Pre-Marriage Platform</h1>
    </header>

    <nav>
        <a href="courses.php">Kursus Persiapan Nikah</a>
        <a href="assessment.php">Assessment Kesiapan</a>
        <a href="consultation.php">Konsultasi Online</a>
        <a href="reproductive_health.php">Kesehatan Reproduksi</a>
        <a href="checklist.php">Checklist Administratif</a>
    </nav>

    <main>
        <!-- Perencanaan Pernikahan dan Keuangan -->
        <section class="card">
            <h2>Perencanaan Pernikahan dan Keuangan</h2>
            <form method="POST">
                <label for="income">Pendapatan Bulanan:</label>
                <input type="number" id="income" name="income" placeholder="Masukkan Pendapatan" required>

                <label for="expenses">Pengeluaran Bulanan:</label>
                <input type="number" id="expenses" name="expenses" placeholder="Masukkan Pengeluaran" required>

                <label for="wedding_cost">Estimasi Biaya Pernikahan:</label>
                <input type="number" id="wedding_cost" name="wedding_cost" placeholder="Masukkan Biaya Pernikahan" required>

                <button type="submit" name="calculate_budget" class="button">Hitung Perencanaan</button>
            </form>

            <?php
            function calculate_budget($income, $expenses, $wedding_cost) {
                // Calculate savings per month
                $savings = $income - $expenses;
                
                // Calculate months needed to save for the wedding
                if ($savings > 0) {
                    $months_to_save = ceil($wedding_cost / $savings); // Round up to the nearest whole month
                } else {
                    $months_to_save = 0; // If no savings are possible, set months to 0
                }

                return array($savings, $months_to_save);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calculate_budget'])) {
                list($savings, $months_to_save) = calculate_budget($_POST['income'], $_POST['expenses'], $_POST['wedding_cost']);
                echo "<p>Tabungan Bulanan: Rp$savings</p>";
                echo "<p>Waktu yang Dibutuhkan untuk Menabung: $months_to_save bulan</p>";
            }
            ?>
        </section>

        <div class="navigation">
            <a href="index.php">
                <button class="back-button">Kembali ke Beranda</button>
            </a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Pre-Marriage Platform</p>
    </footer>
</body>
</html>
