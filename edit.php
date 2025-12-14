<?php
session_start();
if(!isset($_SESSION['user_id'])) header("Location: login.php");
require "database.php";

if(!isset($_GET['id'])) header("Location: dashboard.php");
$id = $_GET['id'];

// Fetch current data
$stmt = $conn->prepare("SELECT * FROM students WHERE id=:id");
$stmt->execute([':id'=>$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    try {
        $sql = "UPDATE students SET reg_number=:reg, fullname=:name, course=:course WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':reg'=>$_POST['reg'], 
            ':name'=>$_POST['name'], 
            ':course'=>$_POST['course'], 
            ':id'=>$id
        ]);
        header("Location: dashboard.php?msg=Updated Successfully");
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <div class="nav"><a href="dashboard.php">Cancel</a></div>
        <h2>Edit Student</h2>
        <form method="POST">
            <input name="reg" value="<?= htmlspecialchars($student['reg_number']) ?>" required>
            <input name="name" value="<?= htmlspecialchars($student['fullname']) ?>" required>
            <input name="course" value="<?= htmlspecialchars($student['course']) ?>" required>
            <button>Update</button>
        </form>
    </div>
</body>
</html>