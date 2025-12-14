<?php
session_start();
if(!isset($_SESSION['user_id'])) header("Location: login.php");
require "database.php";

if(isset($_GET['id'])) {
    try {
        // Delete attendance records first to avoid foreign key error
        $stmt = $conn->prepare("DELETE FROM attendance WHERE student_id=:id");
        $stmt->execute([':id'=>$_GET['id']]);

        // Delete student
        $stmt = $conn->prepare("DELETE FROM students WHERE id=:id");
        $stmt->execute([':id'=>$_GET['id']]);
        
        header("Location: dashboard.php?msg=Student Deleted");
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>