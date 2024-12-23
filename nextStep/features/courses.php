<?php
session_start();
include '../includes/db.php';  // File konfigurasi database

// Ambil pelajaran saat ini berdasarkan parameter 'lesson' di URL
$current_lesson_order = isset($_GET['lesson']) ? (int)$_GET['lesson'] : 1;

// Query untuk mendapatkan pelajaran saat ini berdasarkan lesson_order
$sql = "SELECT * FROM lessons WHERE lesson_order = $current_lesson_order";
$result = mysqli_query($conn, $sql);

// Jika pelajaran ditemukan
if ($result && mysqli_num_rows($result) > 0) {
    $lesson = mysqli_fetch_assoc($result);
} else {
    // Jika pelajaran tidak ditemukan, redirect ke pelajaran pertama
    header("Location: course.php?lesson=1");
    exit;
}

// Query untuk pelajaran sebelumnya dan berikutnya
$prev_sql = "SELECT lesson_order FROM lessons WHERE lesson_order = " . ($current_lesson_order - 1);
$next_sql = "SELECT lesson_order FROM lessons WHERE lesson_order = " . ($current_lesson_order + 1);

$prev_result = mysqli_query($conn, $prev_sql);
$next_result = mysqli_query($conn, $next_sql);

$prev_exists = mysqli_num_rows($prev_result) > 0;
$next_exists = mysqli_num_rows($next_result) > 0;

// If previous lesson exists, get its lesson_order
$prev_lesson_order = $prev_exists ? mysqli_fetch_assoc($prev_result)['lesson_order'] : null;

// If next lesson exists, get its lesson_order
$next_lesson_order = $next_exists ? mysqli_fetch_assoc($next_result)['lesson_order'] : null;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Persiapan Nikah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            padding: 20px;
            margin-top: 50px;
        }

        h1 {
            font-size: 28px;
            color: #2c3e50;
        }

        p {
            font-size: 18px;
            color: #34495e;
        }

        .navigation {
            margin-top: 20px;
        }

        .nav-button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
        }

        .nav-button:hover {
            background-color: #2980b9;
        }

        .back-button {
            background-color: #e74c3c;
        }

        .back-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Kursus Persiapan Nikah</h1>
        <p><strong>Lesson <?php echo $lesson['id']; ?>:</strong> <?php echo $lesson['lesson_title']; ?></p>
        <p><?php echo $lesson['lesson_content']; ?></p>

        <div class="navigation">
            <?php if ($prev_exists) { ?>
                <a href="courses.php?lesson=<?php echo $prev_lesson_order; ?>">
                    <button class="nav-button">Sebelumnya</button>
                </a>
            <?php } ?>

            <?php if ($next_exists) { ?>
                <a href="courses.php?lesson=<?php echo $next_lesson_order; ?>">
                    <button class="nav-button">Berikutnya</button>
                </a>
            <?php } ?>
        </div>


        <!-- Back Button -->
        <button class="back-button" onclick="window.location.href='pre_marriage.php';">Kembali</button>
    </div>

</body>

</html>