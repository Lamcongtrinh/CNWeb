<?php
require 'functions.php';
$products = loadProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .header {
          
            color: white;
            padding: 15px 20px;
            text-align: left;
        }
        .header a {
           
            font-weight: bold;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }
        .container {
            padding: 20px;
            background-color: #ffffff;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 16px;
        }
        .btn-add:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td a {
            color: #007bff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 14px;
        }
        td a:hover {
            background-color: #007bff;
            color: white;
        }
    
    </style>
</head>
<body>

<div class="header">
    <a href="#">Trang chủ</a>
    <a href="#">Trang ngoài</a>
    <a href="#">Thể loại</a>
    <a href="#">Tác giả</a>
    <a href="#">Bài viết</a>
</div>

<div class="container">
    <div style=" margin-bottom: 20px;">
        <a href="add.php" class="btn-add">Thêm mới</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá thành</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= number_format($product['price'], 0, ',', '.') ?> VND</td>
                <td>
                    <a href="edit.php?id=<?= $product['id'] ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <footer>
        <h2 class = "text-alight: center">
            TLU'S MUSIC GARDEN
        </h2>
    </footer>
</div>


</body>
</html>
