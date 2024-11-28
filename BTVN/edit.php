<?php
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = getProductById($id);

    if (!$product) {
        die('Sản phẩm không tồn tại!');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $products = loadProducts();
    foreach ($products as &$item) {
        if ($item['id'] == $_POST['id']) {
            $item['name'] = htmlspecialchars($_POST['name']); // Ngăn chặn XSS
            $item['price'] = (int)$_POST['price'];
        }
    }
    saveProducts($products);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            font-size: 14px;
            color: #007bff;
            display: inline-block;
            margin-top: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">

            <label for="name">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" 
                   value="<?= htmlspecialchars($product['name']) ?>" 
                   placeholder="Nhập tên sản phẩm" required>

            <label for="price">Giá:</label>
            <input type="number" id="price" name="price" 
                   value="<?= htmlspecialchars($product['price']) ?>" 
                   placeholder="Nhập giá sản phẩm" min="1" required>

            <button type="submit">Cập nhật</button>
            <a href="index.php">Quay lại danh sách</a>
        </form>
    </div>
</body>
</html>
