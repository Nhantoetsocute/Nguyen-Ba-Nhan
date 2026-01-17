<?php
require 'db_connect.php';

if (!isset($_GET['id'])) {
    header("Location: list_students.php");
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("Sinh viên không tồn tại");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Sửa sinh viên</h3>

<form method="post" class="card p-4 shadow">
    <input type="hidden" name="id" value="<?= $student['id'] ?>">

    <input type="text" name="fullname" class="form-control mb-2"
           value="<?= htmlspecialchars($student['fullname']) ?>" required>

    <input type="text" name="student_code" class="form-control mb-2"
           value="<?= htmlspecialchars($student['student_code']) ?>" required>

    <input type="email" name="email" class="form-control mb-2"
           value="<?= htmlspecialchars($student['email']) ?>" required>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="list_students.php" class="btn btn-secondary">Quay lại</a>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE students
            SET fullname = ?, student_code = ?, email = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['fullname'],
        $_POST['student_code'],
        $_POST['email'],
        $_POST['id']
    ]);

    echo "<div class='alert alert-success mt-3'>
            Cập nhật sinh viên thành công!
          </div>";
}
?>

</body>
</html>
