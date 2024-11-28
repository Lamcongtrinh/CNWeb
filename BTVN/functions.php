<?php
function loadProducts() {
    $file = 'products.json';
    if (file_exists($file)) {
        return json_decode(file_get_contents($file), true);
    }
    return [];
}

function saveProducts($products) {
    $file = 'products.json';
    file_put_contents($file, json_encode($products, JSON_PRETTY_PRINT));
}

function getProductById($id) {
    $products = loadProducts();
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}
?>
