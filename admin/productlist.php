<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
?>

<?php
    $product = new product;
    $show_product = $product -> show_product();
?>

<div class="admin-content-right">
<div class="admin-content-right-cartegory-list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <th>Mô tả</th>
                        <th>Ảnh</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                    if($show_product){
                        $i=0;
                        while($result = $show_product->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <th><?php echo $result['product_name'] ?></th>
                        <th><?php echo $result['product_price'] ?></th>
                        <th><?php echo $result['product_price_new'] ?></th>
                        <th><?php echo $result['product_desc'] ?></th>
                        <td><img src="uploads/<?php echo $result['product_img'] ?>" alt="Product Image" style="width: 100px; height: 100px;"></td>
                        <td><a href="productEdit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a>|<a href="productDelete.php?product_id=<?php echo $result['product_id'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                    }
                }
                ?>
                </table>
            </div>
</div>
    </section>
</body>
</html>