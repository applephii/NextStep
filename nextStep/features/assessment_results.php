<?php
session_start();
include '../includes/db.php'; // Pastikan path ini sesuai
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mental_score = $_SESSION['mental_score'] ?? 0;
$financial_score = $_SESSION['financial_score'] ?? 0;

$mental_feedback = ($mental_score >= 2) 
    ? "Anda memiliki kesiapan mental yang baik untuk pernikahan." 
    : "Anda perlu mempersiapkan mental lebih baik sebelum menikah.";

$financial_feedback = ($financial_score >= 2) 
    ? "Anda memiliki kesiapan finansial yang baik untuk pernikahan." 
    : "Anda perlu mempersiapkan finansial lebih baik sebelum menikah.";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Asesmen</title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body {
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px;
        }
        .result-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
        }
        p {
            font-size: 18px;
            color: #34495e;
        }
    </style>
</head>
<body>
<div class="result-container">
    <h1>Hasil Asesmen</h1>
    <p><strong>Kesiapan Mental:</strong> <?php echo $mental_feedback; ?></p>
    <p><strong>Kesiapan Finansial:</strong> <?php echo $financial_feedback; ?></p>
    <a href="../features/assessment.php"><button type="submit" class="button">Ulangi Asesmen</button></a>
</div>

<div class="navigation">
        <a href="pre_marriage.php">
            <button class="back-button">Kembali ke Course</button>
        </a>
    </div>
</body>
</html>
