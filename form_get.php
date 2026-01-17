<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form GET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Form GET - Tìm kiếm</h3>

<form method="get">
    <input type="text" name="keyword" class="form-control mb-2"
           placeholder="Nhập từ khóa">
    <button class="btn btn-primary">Tìm</button>
</form>

<?php
if (isset($_GET['keyword'])) {
    echo "<div class='alert alert-info mt-3'>
            Bạn đang tìm kiếm từ khóa: <b>" . htmlspecialchars($_GET['keyword']) . "</b>
          </div>";
}
?>

</body>
</html>
