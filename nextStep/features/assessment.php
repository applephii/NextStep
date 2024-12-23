<?php
session_start();
include '../includes/db.php';  // Koneksi ke database

// Fetch questions from the database
$sql = "SELECT * FROM assessment_questions";
$result = mysqli_query($conn, $sql);
$questions = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answers'];
    $mental_score = 0;
    $financial_score = 0;

    foreach ($answers as $id => $answer) {
        $id = (int)$id; // Sanitize input
        $answer = strtolower($answer);
        $sql = "SELECT category FROM assessment_questions WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        if ($query && $row = mysqli_fetch_assoc($query)) {
            if ($row['category'] === 'mental') {
                $mental_score += ($answer === 'yes') ? 1 : 0;
            } else if ($row['category'] === 'financial') {
                $financial_score += ($answer === 'yes') ? 1 : 0;
            }
        }
    }

    // Store the results in session or process them further
    $_SESSION['mental_score'] = $mental_score;
    $_SESSION['financial_score'] = $financial_score;

    // Redirect to the results page
    header('Location: assessment_results.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesmen Kesiapan Mental dan Finansial</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<div class="container">
    <h1>Asesmen Kesiapan Mental dan Finansial</h1>
    <form action="assessment.php" method="POST">
        <?php foreach ($questions as $question): ?>
            <div class="question">
                <p><?php echo htmlspecialchars($question['question']); ?></p>
                <label>
                    <input type="radio" name="answers[<?php echo $question['id']; ?>]" value="yes" required> Ya
                </label>
                <label>
                    <input type="radio" name="answers[<?php echo $question['id']; ?>]" value="no"> Tidak
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="button">Kirim Jawaban</button>

    </form>
</div>
</body>
</html>
