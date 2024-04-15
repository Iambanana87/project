<?php
    include "class/product_class.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product = new product;
        $update_result = $product->update_product($_POST);

        if($update_result) {
            // Chuyển hướng hoặc thực hiện các thao tác khác sau khi cập nhật
            header("Location: productlist.php");
            exit();
        } else {
            echo "Cập nhật không thành công!";
        }
    } else {
        echo "Yêu cầu không hợp lệ!";
    }
?>
