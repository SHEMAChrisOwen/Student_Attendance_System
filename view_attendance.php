<?php
session_start();
if(!isset($_SESSION['user_id'])) header("Location: login.php");
require "database.php";

// SQL JOIN to get Student Name + Attendance Status
$sql = "SELECT a.attendance_date, a.status, s.fullname, s.reg_number 
        FROM attendance a 
        JOIN students s ON a.student_id = s.id 
        ORDER BY a.attendance_date DESC, s.fullname ASC";

$stmt = $conn->query($sql);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Attendance History</h1>
        
        <div class="nav">
            <a href="dashboard.php">Back to Dashboard</a>
            <a href="mark.php">Mark Attendance</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Reg Number</th>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $r): ?>
                <tr style="background-color: <?= $r['status'] == 'Absent' ? '#ffe6e6' : 'white' ?>">
                    <td><?= htmlspecialchars($r['attendance_date']) ?></td>
                    <td><?= htmlspecialchars($r['reg_number']) ?></td>
                    <td><?= htmlspecialchars($r['fullname']) ?></td>
                    <td>
                        <span style="color: <?= $r['status'] == 'Absent' ? 'red' : 'green' ?>; font-weight:bold;">
                            <?= htmlspecialchars($r['status']) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>