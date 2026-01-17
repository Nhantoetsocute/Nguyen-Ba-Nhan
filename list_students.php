<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Danh sách sinh viên</h3>

<?php
require 'db_connect.php';

$stmt = $conn->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Mã SV</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $sv): ?>
        <tr>
            <td><?= $sv['id'] ?></td>
            <td><?= htmlspecialchars($sv['fullname']) ?></td>
            <td><?= htmlspecialchars($sv['student_code']) ?></td>
            <td><?= htmlspecialchars($sv['email']) ?></td>
            <td>
                <a href="edit_student.php?id=<?= $sv['id'] ?>"
                   class="btn btn-warning btn-sm">Sửa</a>

                <a href="delete_student.php?id=<?= $sv['id'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="add_student.php" class="btn btn-primary mt-3">➕ Thêm sinh viên</a>

</body>
</html>
