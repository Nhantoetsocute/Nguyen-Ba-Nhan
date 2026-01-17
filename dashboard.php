<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Dashboard</h2>
<p>Xin chào, <b><?= $_SESSION['user'] ?></b></p>

<a href="cart.php">Giỏ hàng</a><br><br>
<a href="logout.php">Đăng xuất</a>
