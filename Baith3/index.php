<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển Thị Tệp CSV</title>
    <style>
        
    </style>
</head>

<body>
<h1>Danh sách tài khoản</h1>
<table>
    <thead>
    <tr>
        <th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Lớp</th>
        <th>Email</th>
        <th>Môn học</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $file = 'data.csv'; // Đường dẫn tới tệp CSV
    if (file_exists($file)) {
        // Mở tệp CSV
        if (($handle = fopen($file, 'r')) !== false) {
            $header = fgetcsv($handle); // Đọc dòng tiêu đề
            // Đọc từng dòng dữ liệu
            while (($row = fgetcsv($handle)) !== false) {
                echo '<tr>';
                foreach ($row as $cell) {
                    echo '<td>' . htmlspecialchars($cell) . '</td>';
                }
                echo '</tr>';
            }
            fclose($handle); // Đóng tệp
        } else {
            echo '<tr><td colspan="7">Không thể mở tệp CSV.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="7">Tệp CSV không tồn tại.</td></tr>';
    }
    ?>
    </tbody>
</table>
</body>

</html>
