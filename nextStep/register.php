<?php
session_start();
include 'includes/db.php';  // Pastikan sudah ada koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Mengecek apakah username sudah ada di database
    $sql_check = "SELECT * FROM user WHERE username='$username'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        $error_message = "Username sudah terdaftar. Silakan login.";
    } else {
        // Query untuk menyimpan data registrasi
        $sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";
        if (mysqli_query($conn, $sql)) {
                $user_id = $conn->insert_id;
                $table_name1 = "checklist_user_" . $user_id;
                $create_table_query1 = "CREATE TABLE `$table_name1` (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    item VARCHAR (255),
                    is_completed tinyint(1)
                )";

                if ($conn->query($create_table_query1) === TRUE){              
                    $data = [
                        ['Surat Keterangan Catatan Kepolisian (SKCK)', 0],
                        ['Surat Izin Nikah dari Orang Tua', 0],
                        ['Fotokopi Akta Kelahiran', 0],
                        ['Pas Foto Terbaru', 0],
                        ['Surat Keterangan Sehat', 0]
                    ];
                    $sqli = "INSERT INTO `checklist_user_{$user_id}` (item, is_completed) VALUES (?, ?)";
                    $stmt = $conn->prepare($sqli);

                    foreach ($data as $row) {
                        $stmt->bind_param("si", $row[0], $row[1]);
                        $stmt->execute();
                    }
                    
                        $success_message = "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
                        $stmt->close();
                }
        } else {
            $error_message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | NextStep</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1 class="header-title">Welcome to Family Services</h1>
    </header>

    <nav>
        <a href="index.php">About Us</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </nav>

    <main>
        <div class="register-container">
            <div class="register-form">
                <h2>Daftar Akun Baru</h2>

                <!-- Menampilkan pesan error atau sukses jika ada -->
                <?php if (isset($error_message)) { ?>
                    <div class="error-message"> <?php echo $error_message; ?> </div>
                <?php } ?>

                <?php if (isset($success_message)) { ?>
                    <div class="success-message"> <?php echo $success_message; ?> </div>
                <?php } ?>

                <form method="POST">
                    <input type="text" name="username" placeholder="Username" class="input-field" required>
                    <input type="password" name="password" placeholder="Password" class="input-field" required>

                    <!-- Dropdown untuk memilih role -->
                    <label for="role" class="dropdown-label">Role</label>
                    <select id="role" name="role" class="dropdown" required>
                        <option value="couple">Couple</option>
                        <option value="parent">Parent</option>
                        <option value="new_parent">New Parent</option>
                    </select>

                    <button type="submit" class="button primary">Register</button>
                </form>

                <p class="form-footer">Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>

            <div class="feature-section">
                <h3>Why Choose Family Services?</h3>
                <ul class="feature-list">
                    <li>✅ Tailored services for every stage of life</li>
                    <li>✅ Expert guidance for couples and parents</li>
                    <li>✅ Easy-to-use and accessible platform</li>
                </ul>
                <a href="#" class="button learn-more">Learn More</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; 2024 Family Services. All Rights Reserved.</p>
    </footer>
</body>

</html>