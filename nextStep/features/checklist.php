<?php
session_start();
include '../includes/db.php'; // Sesuaikan dengan path file konfigurasi koneksi database
$uid = $_SESSION['user_id'];

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Periksa setiap item checklist
    if (isset($_POST['checklist'])) {
        foreach ($_POST['checklist'] as $id => $completed) {
            // Update status is_completed di database
            // $completed = $completed ? 1 : 0;
            // $update_sql = "UPDATE checklist_user_{$uid} SET is_completed = $completed WHERE id = $id";
            // mysqli_query($conn, $update_sql);
            $completed = $completed ? 1 : 0;
            $update_sql = "UPDATE checklist_user_{$uid} SET is_completed = ? WHERE id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("ii", $completed, $id);
            $stmt->execute();
        }
    }
}

// Ambil data checklist dari database
$sql = "SELECT * FROM checklist_user_{$uid}";
$result = mysqli_query($conn, $sql);

// Cek apakah ada data
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist Persiapan Administratif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            padding: 20px;
            max-width: 600px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        .checklist-item {
            margin: 10px 0;
            font-size: 18px;
        }
        .checklist-item input {
            margin-right: 10px;
        }
        .form-button {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-button:hover {
            background-color: #2ecc71;
        }
        .back-button {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Checklist Persiapan Administratif</h1>
    <p>Gunakan checklist ini untuk memastikan semua dokumen dan persyaratan administratif telah siap.</p>

    <!-- Form untuk mengirim status checklist -->
    <!-- <form action="checklist.php" method="POST">
        <?php //while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="checklist-item">
                <input type="checkbox" name="checklist[<?php //echo $row['id']; ?>]" <?php //echo $row['is_completed'] ? 'checked' : ''; ?>>
                <?php //echo $row['item']; ?>
            </div>
        <?php //} ?>
        <button type="submit" class="form-button">Simpan Status</button>
    </form> -->
    <form action="checklist.php" method="POST">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="checklist-item">
                <!-- Input tersembunyi untuk mengirim nilai default 0 -->
                <input type="hidden" name="checklist[<?php echo $row['id']; ?>]" value="0">
                <!-- Checkbox untuk status is_completed -->
                <input type="checkbox" name="checklist[<?php echo $row['id']; ?>]" value="1" <?php echo $row['is_completed'] ? 'checked' : ''; ?>>
                <?php echo htmlspecialchars($row['item']); ?>
            </div>
        <?php } ?>
        <button type="submit" class="form-button">Simpan Status</button>
    </form>

    <!-- Back Button -->
    <button onclick="window.location.href='pre_marriage.php';" class="back-button">Kembali</button>
    
</div>

</body>
</html>
