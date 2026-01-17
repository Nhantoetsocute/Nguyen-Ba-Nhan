<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form POST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Form POST - Đăng ký</h3>

<form method="post">
    <input type="text" name="name" class="form-control mb-2"
           placeholder="Tên" required>

    <input type="password" name="password" class="form-control mb-2"
           placeholder="Mật khẩu" required>

    <button class="btn btn-success">Gửi</button>
</form>

<?php
if (isset($_POST['name'])) {
    echo "<div class='alert alert-success mt-3'>
            Đã nhận thông tin của <b>" . htmlspecialchars($_POST['name']) . "</b>
          </div>";
}
?>

</body>
</html>
