<?php
session_start();
if(!isset($_SESSION['user_id'])) header("Location: login.php");
require "database.php";

// Get students for dropdown
$students = $conn->query("SELECT * FROM students")->fetchAll();
$msg = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    try {
        $stmt=$conn->prepare("INSERT INTO attendance(student_id,attendance_date,status) VALUES(:sid,:d,:s)");
        $stmt->execute([
            ':sid'=>$_POST['student_id'],
            ':d'=>$_POST['date'],
            ':s'=>$_POST['status']
        ]);
        $msg = "<p class='success'>Attendance Saved</p>";
    } catch(PDOException $e) {
        $msg = "<p class='error'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <div class="nav"><a href="dashboard.php">Back to Dashboard</a></div>
        <h2>Mark Attendance</h2>
        <?= $msg ?>
        <form method="POST">
            <label>Select Student:</label>
            <select name="student_id" required>
                <option value="">-- Select --</option>
                <?php foreach($students as $s): ?>
                <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['fullname']) ?> (<?= $s['reg_number'] ?>)</option>
                <?php endforeach; ?>
            </select>
            <input type="date" name="date" required>
            <select name="status">
                <option>Present</option>
                <option>Absent</option>
            </select>
            <button>Save</button>
        </form>
    </div>
</body>
</html>