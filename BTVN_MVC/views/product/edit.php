<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style >* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    max-width: 600px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
    color: #4CAF50;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 16px;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

input[type="text"], textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea {
    resize: vertical;
}

button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

.preview-container {
    text-align: center;
    margin-top: 10px;
}

.preview-img {
    max-width: 100%;
    max-height: 200px;
    display: none;
    border-radius: 4px;
    margin-top: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.submit-container {
    text-align: center;
}

input[readonly] {
    background-color: #f9f9f9;
    cursor: not-allowed;
}

input, textarea {
    transition: border-color 0.3s;
}

input:focus, textarea:focus {
    border-color: #4CAF50;
    outline: none;
}
</style>
   

</head>
<body>
    <div class="container">
        <h1>Chỉnh sửa sản phẩm</h1>

        <form method="post" action="index.php?controller=product&action=edit&id=<?= $product['id'] ?>">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required placeholder="Nhập tên sản phẩm">
            </div>
            
            <div class="form-group">
                <label for="price">Giá sản phẩm:</label>
                <input type="number" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required placeholder="Nhập giá sản phẩm">
            </div>

            <button type="submit">Cập nhật sản phẩm</button>
            <a href="index.php?controller=product&action=index">Quay lại danh sách</a>
        </form>
    </div>
</body>
</html>
