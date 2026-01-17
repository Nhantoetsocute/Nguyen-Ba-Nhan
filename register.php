<?php
session_start();
require 'db_connect.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([$email, $password]);
        $msg = "Đăng ký thành công! <a href='login.php'>Đăng nhập</a>";
    } catch (PDOException $e) {
        $msg = "Email đã tồn tại!";
    }
}
?>

<h2>Đăng ký</h2>
<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button>Đăng ký</button>
</form>

<p><?= $msg ?></p>
