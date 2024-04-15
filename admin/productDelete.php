<?php
    include "class/product_class.php";

    if(isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        $product = new product;
        $result = $product->delete_product($product_id);

        if($result) {
            // Chuyển hướng hoặc thực hiện các thao tác khác sau khi xóa
            header("Location: productlist.php");
            exit();
        } else {
            echo "Xóa không thành công!";
        }
    } else {
        echo "Tham số không hợp lệ!";
    }
?>