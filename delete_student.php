<?php
require 'db_connect.php';

if (!isset($_GET['id'])) {
    header("Location: list_students.php");
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->execute([$id]);

header("Location: list_students.php");
exit;
