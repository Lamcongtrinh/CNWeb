<<<<<<< HEAD
<?php
$host = 'localhost'; // Your database host
$dbname = 'product'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Stop execution if the connection fails
}
?>
=======
<?php
$host = 'localhost'; // Your database host
$dbname = 'product'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Stop execution if the connection fails
}
?>
>>>>>>> bf3111874f2ce9b00efd9cefd77cdaa65a8587ee
