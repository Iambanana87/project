

<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";

    $product = new product;
    $update_product_message = '';

    if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $product_data = $product->get_product_details($product_id);

        if ($product_data) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $update_result = $product->update_product($_POST);

            if ($update_result) {
                // Hiển thị thông báo cập nhật thành công
                $update_product_message = "Thông tin sản phẩm đã được cập nhật thành công!";
                // Lấy lại thông tin sau khi cập nhật
                $product_data = $product->get_product_details($product_id);
            } else {
                $update_product_message = "Cập nhật không thành công. Vui lòng thử lại.";
            }

            echo "<script>var updateProductMessage = '$update_product_message';</script>";

        }
            ?>

            <div class="admin-content-right">
                <div class="admin-content-right-cartegory-add">
                    <div class="admin-content-right">
                        <div class="admin-content-right-product-add">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <h1>Chỉnh sửa sản phẩm</h1>
                                <input type="hidden" name="product_id" value="<?php echo $product_data['product_id']; ?>">

                                <label for="product_name">Tên sản phẩm</label>
                                <input name="product_name" required type="text" value="<?php echo $product_data['product_name']; ?>">

                                <label for="cartegory_id">Chọn danh mục</label>
                                <select name="cartegory_id" id="">
                                    <?php
                                        $show_cartegory = $product->show_cartegory();
                                        if ($show_cartegory) {
                                            while ($result = $show_cartegory->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $result['cartegory_id']; ?>" <?php if ($result['cartegory_id'] == $product_data['cartegory_id']) echo "selected"; ?>>
                                                    <?php echo $result['cartegory_name']; ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>

                                <label for="product_price">Giá sản phẩm</label>
                                <input name="product_price" required type="text" value="<?php echo $product_data['product_price']; ?>">

                                <label for="product_price_new">Giá khuyến mãi</label>
                                <input name="product_price_new" required type="text" value="<?php echo $product_data['product_price_new']; ?>">

                                <label for="product_desc">Mô tả sản phẩm</label>
                                <textarea name="product_desc" id="" cols="30" rows="10"><?php echo $product_data['product_desc']; ?></textarea>

                                <label for="product_img">Ảnh sản phẩm</label>
                                <input name="product_img" type="file">

                                <label for="product_img_desc">Ảnh mô tả sản phẩm</label>
                                <input name="product_img_desc[]" multiple type="file">

                                <button type="submit">Lưu chỉnh sửa</button>
                            </form>

                            <?php if ($update_product_message): ?>
                                <p><?php echo $update_product_message; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        } else {
            echo "Không tìm thấy sản phẩm!";
        }
    } else {
        echo "Tham số không hợp lệ!";
    }
?>
<script>
    if (typeof updateProductMessage !== 'undefined') {
        alert(updateProductMessage);
    }
</script>

