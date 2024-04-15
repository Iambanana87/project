<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
?>
<?php
    $product = new product;
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        //var_dump($_POST,$_FILES);
        // echo '<pre>';
        // echo print_r($_POST);
        // echo print_r($_FILES['product_img_desc']);
        // echo'<pre>';
   $insert_product = $product->insert_product($_POST,$_FILES);
}
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory-add">
            <div class="admin-content-right">
            <div class="admin-content-right-product-add">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Thêm sản phẩm</h1>
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" required type="text" placeholder="Nhập tên sản phẩm">
                    <label for="">Chọn danh mục <span style="color: red;">*</span></label>
                        <select name="cartegory_id" id="">
                            <?php
                            $show_cartegory = $product -> show_cartegory();
                            if($show_cartegory) {
                                while($result = $show_cartegory -> fetch_assoc()){

                            ?>
                            <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                            <?php 
                            }}
                            ?>
                        </select>
                        <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
                        <input name="product_price" required type="text">
                        <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                        <input name="product_price_new" required type="text">
                        <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label><br>
                        <textarea name="product_desc" id="" cols="30" rows="10" placeholder=""></textarea><br>
                        <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                        <input name="product_img" required type="file">
                        <label for="">Ảnh mô tả sản phẩm <span style="color: red;">*</span></label>
                        <input name="product_img_desc[]" required multiple type="file">
                        <button type="submit">Thêm</button>
                    </form>
            </div>
        </div>
    </section>
</body>
</html>