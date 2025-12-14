<?php
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
require "database.php";

// Fetch students for the list
$stmt = $conn->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        
        <div class="nav">
            <a href="dashboard.php">Home</a>
            <a href="add.php">Add Student</a>
            <a href="mark.php">Mark Attendance</a>
            <a href="view_attendance.php">View History</a>
            <a href="logout.php" style="color:#ff6b6b;">Logout</a>
        </div>

        <h2>Student List</h2>
        <?php if(isset($_GET['msg'])) echo "<p class='success'>".htmlspecialchars($_GET['msg'])."</p>"; ?>

        <table>
            <thead>
                <tr>
                    <th>Reg Number</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['reg_number']) ?></td>
                    <td><?= htmlspecialchars($s['fullname']) ?></td>
                    <td><?= htmlspecialchars($s['course']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $s['id'] ?>" class="btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $s['id'] ?>" class="btn-del" onclick="return confirm('Delete this student?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>