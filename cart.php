<?php
session_start();

$products = [
    1 => "Laptop",
    2 => "Chuột",
    3 => "Bàn phím"
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $_SESSION['cart'][] = $_GET['add'];
}
?>

<h2>Giỏ hàng</h2>

<?php foreach ($products as $id => $name): ?>
    <p>
        <?= $name ?>
        <a href="?add=<?= $id ?>">[Thêm]</a>
    </p>
<?php endforeach; ?>

<hr>

<h3>Sản phẩm đã chọn:</h3>
<ul>
    <?php foreach ($_SESSION['cart'] as $id): ?>
        <li><?= $products[$id] ?></li>
    <?php endforeach; ?>
</ul>

<a href="dashboard.php">Quay lại Dashboard</a>
