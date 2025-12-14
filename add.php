<?php
session_start();
if(!isset($_SESSION['user_id'])) header("Location: login.php");
require "database.php";

$msg = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $reg = trim($_POST['reg']);
    $name = trim($_POST['name']);
    $course = trim($_POST['course']);

    if(empty($reg) || empty($name)) {
        $msg = "<p class='error'>Fields cannot be empty</p>";
    } else {
        try {
            $stmt=$conn->prepare("INSERT INTO students(reg_number,fullname,course) VALUES(:reg,:name,:course)");
            $stmt->execute([':reg'=>$reg, ':name'=>$name, ':course'=>$course]);
            $msg = "<p class='success'>Student Added Successfully</p>";
        } catch(PDOException $e) {
            $msg = "<p class='error'>Error: " . $e->getMessage() . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <div class="nav"><a href="dashboard.php">Back to Dashboard</a></div>
        <h2>Add New Student</h2>
        <?= $msg ?>
        <form method="POST">
            <input name="reg" placeholder="Reg Number" required>
            <input name="name" placeholder="Full Name" required>
            <input name="course" placeholder="Course" required>
            <button>Add Student</button>
        </form>
    </div>
</body>
</html>