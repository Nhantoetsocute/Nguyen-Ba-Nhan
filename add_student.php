<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Thêm sinh viên</h3>

<form method="post" class="card p-4 shadow">
    <input type="text" name="fullname" class="form-control mb-2"
           placeholder="Họ tên" required>

    <input type="text" name="student_code" class="form-control mb-2"
           placeholsder="Mã sinh viên" required>

    <input type="email" name="email" class="form-control mb-2"
           placeholder="Email" required>

    <button class="btn btn-primary">Thêm mới</button>
    <a href="list_students.php" class="btn btn-secondary">Danh sách</a>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db_connect.php';

    $sql = "INSERT INTO students (fullname, student_code, email)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['fullname'],
        $_POST['student_code'],
        $_POST['email']
    ]);

    echo "<div class='alert alert-success mt-3'>
            Thêm sinh viên thành công!
          </div>";
}
?>

</body>
</html>
