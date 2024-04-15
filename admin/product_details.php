<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_interface.css">
    <!-- <script language="javascript" src="script.js"></script> -->
    <!-- <script type="text/javascript" src="script.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
    
    <title>Đây là web bán chó 2</title>
    <link rel = "icon" href =  
"https://drfossums.com/wp-content/uploads/2020/03/cropped-pets-logo.png" 
        type = "image/x-icon"> 
</head>
<style>
.product-content-left-main-img{
    height: 100px;
    width: 500px;
}
.selected {
            background-color: #3498db; /* Một ví dụ về màu xanh lam */
            color: #fff; /* Màu chữ trắng */
        }

        /* Thêm bảng điều khiển CSS khác theo ý muốn */
        .size span {
            cursor: pointer;
            padding: 5px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
            display: inline-block;
        }
</style>

<?php
    include "class/product_class.php";
    $prd = new product;
    $prd_id = $_GET['prd_id'];
    $show_product_by_id = $prd->show_product_by_id($prd_id);
    if($show_product_by_id){
        $result = $show_product_by_id->fetch_assoc();
    }
    
?>


<body>
    <script src="script.js"></script>
    <header>
        <div class="logo">
            <img src="img/logo1.png">
        </div>
        <div class="menu">
            <li><a href="">CHÓ</a>
            <!-- <ul class="sub-menu">
                <li><a href="">Hàng mới về</a></li>
                <li><a href="">Collection</a></li>
                <li><a href="">Áo</a>
                    <ul>
                        <li><a href="">Áo sơ mi</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                    </ul>
                </li>
                <li><a href="">Quần</a>
                    <ul>
                        <li><a href="">Áo sơ mi</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                    </ul>
                </li>
            </ul>

            </li> -->
            <li><a href="">MÈO</a></li>
            <li><a href="">PHỤ KIỆN THÚ CƯNG</a></li>
            <li><a href="">THỨC ĂN THÚ CƯNG</a></li>
            <li><a href="">DỊCH VỤ</a></li>
            <li><a href="">TIN TỨC</a></li>
            <!-- <li><a href="">THÔNG TIN</a></li> -->
        </div>

        <div class="others">
        <li class="icon"><input placeholder="Tìm Kiếm" type="text"><a class="search" href=""><img src="img/search.png" alt=""></a></li>
            <li class="icon"><a class="user" href="" ><img src="img/user.png" ></a></li>
            <li class="icon"><a class="user" href="" ><img src="img/headphones.png" ></a></li>
            <li class="icon"><a class="user" href="" ><img src="img/carts.png" ></a></li>
        </div>
    </header>
    <style>
        .product-top{
            margin-left: 40px;
        }
        .product-content-right-product-size{
            padding-bottom: 20px;
        }
        .product-content-right-buttom-top{
            padding-top: 20xp;
        }
    </style>

    <section class="product">
        <div class="container">
            <div class="product-top row">
                <p>Trang chủ</p> <span>&rarr;</span><p>Chó</p><span>&rarr;</span><p><?php echo $result['product_name']; ?></p>
            </div>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-main-img">
                        <img src="uploads/<?php echo $result['product_img']; ?>" alt="">
                    </div>
                    <div class="product-content-left-sub-img">

                        <?php

                            $show_product_img_desc = $prd->show_product_img_desc($prd_id);
                            if($show_product_img_desc){
                                while($result_desc = $show_product_img_desc->fetch_assoc()){
                                    ?>
                                        <img src="uploads/<?php echo $result_desc['product_img_desc']; ?>" alt="">
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1 style="font-size: 30px;"><?php echo $result['product_name']; ?></h1>
                        <p>MSP: <span><?php echo $result['product_id']; ?></span></p>
                    </div>
                    <div class="product-content-right-product-price">
                        <p><?php echo $result['product_price_new']; ?><span>đ</span></p>
                    </div>
                    <div class="product-content-right-product-color">
                        <!-- <p><span style="font-weight: bold;">Màu sắc</span>: Vàng cam <span style="color: red;"></span></p>
                            <div class="product-content-right-product-color-img">
                                <img src="img/image-260nw-1074321152.jpg" alt="">
                            </div> -->
                    </div>
                    <div class="product-content-right-product-size">
                        <p style="font-weight: bold;">Size</p>
                        <div class="size">
                        <span onclick="toggleSize(this)">M</span>
                        <span onclick="toggleSize(this)">S</span>
                        <span onclick="toggleSize(this)">L</span>
                        <span onclick="toggleSize(this)">XL</span>
                        <span onclick="toggleSize(this)">XXL</span>
                        </div>
                    </div>
                    <div class="quantity">
                        <p style="font-weight: bold;">Số lượng</p>
                        <input type="number" min="0" value="1">
                        
                    </div>
                    <!-- <p style="color: rebeccapurple;">Vui lòng chọn size</p> -->
                    <div class="product-content-right-product-buttom">
                        <button id="muaHangButton"><i class="fa-solid fa-cart-shopping"></i><p>MUA HÀNG</p></button>
                    </div>
                    <div class="product-content-right-product-icon row">
                        <div class="product-content-right-product-icon-item">
                            <i class="fa-solid fa-phone-volume"></i><p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fa-regular fa-comments"></i><p>chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fa-regular fa-envelope"></i><p>Main</p>
                        </div>
                    </div>
                    <div class="product-content-right-product-qr">
                        <img src="img/qr.png" alt="" style="width: 50px;height: 50px;">
                    </div>
                    <div class="product-content-right-buttom">
                        <div class="product-content-right-buttom-top">
                            &#8910;
                        </div>
                    </div>
                    <div class="product-content-right-buttom-content-big">
                        <div class="product-content-right-buttom-content-title row">
                            <div class="product-content-right-buttom-content-title-item mota">
                                <p>Mô Tả</p>
                            </div>
                            <div class="product-content-right-buttom-content-title-item danhgia">
                                <p>Đánh Giá</p>
                            </div>
                        </div>
                        <div class="product-content-right-buttom-content">
                            <div class="product-content-right-buttom-content-mota">
                            <?php echo $result['product_desc']; ?>
                            </div>
                            <div class="product-content-right-buttom-content-danhgia">
                                2
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-related">
        <div class="product-related-title">
            <p>SẢN PHẨM TƯƠNG TỰ</p>
        </div>
        <div class="product-content row">
            <div class="product-related-item">
                <img src="img/Doberman-1.jpg" alt="">
                <h1>CHÓ DOBERMAN</h1>
                <p>99.999<sub>đ</sub></p>
            </div>
            <div class="product-related-item">
                <img src="img/Doberman-2.jpg" alt="">
                <h1>CHÓ DOBERMAN</h1>
                <p>99.999<sub>đ</sub></p>
            </div>
            <div class="product-related-item">
                <img src="img/Doberman-3.jpg" alt="">
                <h1>CHÓ DOBERMAN</h1>
                <p>99.999<sub>đ</sub></p>
            </div>
        </div>
    </section>
    <footer>
        <div class="roww">
            <div class="col">
                <img src="img web/logo-title.png" class="logo">
                <p>hello everyone</p>
            </div>
            <div class="col">
                <h3>office <div class="underline"><span></span></div></h3>
                <p>Cửa hàng thú cưng</p>
                <p>Ninh Kiều, Cần Thơ</p>
                <p>SDT: 019238429</p>
                <p class="email-id">alesst43@gmail.com</p>
            </div>
            <div class="col">
                <h3>links <div class="underline"><span></span></div></h3>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Features</a></li>
                    <li><a href="">Contacts</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>Newletter <div class="underline"><span></span></div></h3>
                <form >
                    <i class="fa-regular fa-envelope" style="color: #2b0f4d;"></i>
                    <input type="email" placeholder="Enter your mail id" required>
                    <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                </form>
                <div class="social-icons">
                    <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #0a67ff;"></i></a>
                    <a href=""><i class="fa-brands fa-youtube fa-xl" style="color: #ff0000;"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok fa-xl"style="color: #000;"></i></a>
                    <a href=""><i class="fa-brands fa-instagram fa-xl"style="color: #52d59c;"></i></a>
                    <a href=""><i class="fa-brands fa-pinterest fa-xl" style="color: #fc0202;"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright">Easy Tutorials @ 2023 - All Rights Reserved</p>
    </footer>

</body>
<script>


   // -------------PRODUCT--
    const bigImg = document.querySelector(".product-content-left-main-img img")
    const smallImg = document.querySelectorAll(".product-content-left-sub-img img")
    smallImg.forEach(function(imgItem,X){
        imgItem.addEventListener("click",function(){
            bigImg.src = imgItem.src
        })
    })



    const buton = document.querySelector(".product-content-right-buttom-top")
    if(buton){
        buton.addEventListener("click",function(){
            document.querySelector(".product-content-right-buttom-content-big").classList.toggle("activeA")
        })
    }
    const mota = document.querySelector(".mota")
    const danhgia = document.querySelector(".danhgia")
    const diachi = document.querySelector(".diachi")
    if(mota){
        mota.addEventListener("click",function(){
            document.querySelector(".product-content-right-buttom-content-mota").style.display = "block"
            document.querySelector(".product-content-right-buttom-content-danhgia").style.display = "none"
            document.querySelector(".product-content-right-buttom-content-diachi").style.display = "block"
        })
    }
    if(danhgia){
        danhgia.addEventListener("click",function(){
            document.querySelector(".product-content-right-buttom-content-mota").style.display = "none"
            document.querySelector(".product-content-right-buttom-content-danhgia").style.display = "block"
            document.querySelector(".product-content-right-buttom-content-diachi").style.display = "block"
        })
    }
    // if(diachi){
    //     diachi.addEventListener("click",function(){
    //         document.querySelector(".product-content-right-buttom-content-mota").style.display = "block"
    //         document.querySelector(".product-content-right-buttom-content-danhgia").style.display = "block"
    //         document.querySelector(".product-content-right-buttom-content-diachi").style.display = "none"
    //     })
    // }
    document.getElementById('muaHangButton').addEventListener('click', function() {
        window.location.href = 'view_products.php';
    });

    function toggleSize(element) {
        // Loại bỏ tất cả các lớp "selected" từ tất cả các ô chứa chữ
        var sizeElements = document.querySelectorAll('.size span');
        sizeElements.forEach(function (sizeElement) {
            sizeElement.classList.remove('selected');
        });

        // Thêm lớp "selected" cho ô chứa chữ được nhấp vào
        element.classList.toggle('selected');
    }

</script>