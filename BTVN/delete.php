<?php
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products = loadProducts();
    $products = array_filter($products, function ($product) use ($id) {
        return $product['id'] != $id;
    });
    saveProducts($products);
    header('Location: index.php');
    exit;
}
?>
