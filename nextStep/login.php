<?php
session_start();
include 'includes/db.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna berdasarkan username
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    // Jika pengguna ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password (gunakan hash untuk password yang disimpan)
        if (password_verify($password, $user['password'])) {
            // Set session untuk user yang login
            $_SESSION['user'] = $username;
            $_SESSION['user_id'] = $user['id'];

            // Redirect ke halaman index.php setelah login berhasil
            header("Location: features/index.php");  // Redirect ke halaman utama
            exit;  
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "Pengguna tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | NextStep</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to Family Services</h1>
    </header>

    <nav>
        <a href="index.php">About Us</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </nav>

    <main>
        <div class="register-container">
            <div class="register-form">
                <h2>Login ke NextStep</h2>

                <!-- Menampilkan pesan error jika ada -->
                <?php if (isset($error_message)) { ?>
                    <div class="error-message"> <?php echo $error_message; ?> </div>
                <?php } ?>

                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" class="button primary">Login</button>
                </form>

                <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Family Services. All Rights Reserved.</p>
    </footer>
</body>
</html>
