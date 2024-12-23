<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Offline</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Make images fill the container while maintaining aspect ratio */
        .card-img-top {
            width: 95%;
        }
        </style>
</head>

<body>

    <div class="container">
        <h1>Rujukan</h1>
        <form method="POST">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" class="form-input">
            <label>Kategori:</label>
            <select name="menu" id="dropdown-menu" style="padding: 5px; font-size: 12px; border-radius: 5px;">
                <option value="psikolog">Psikolog</option>
                <option value="psikolog_an">Psikolog Anak</option>
                <option value="rujukan">Rujukan ke Spesialis</option>
            </select>
            <br>
            <label>Keluhan atau Masalah:</label>
            <textarea  name="keluhan" class="form-textarea"></textarea>
            
        </form>
        <!-- Back Button -->
        <button onclick="window.location.href='integrated.php'" class="back-button">Kembali</button>
        <button onclick="window.location.href='rujukan.php'" class="button">Submit</button>
        </center>
    </div>
        
</body>

</html>