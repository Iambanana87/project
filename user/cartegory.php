<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <script language="javascript" src="script.js"></script> -->
    <!-- <script type="text/javascript" src="script.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
    
    <title>Đây là web bán chó 2</title>
    <link rel = "icon" href =  
"https://drfossums.com/wp-content/uploads/2020/03/cropped-pets-logo.png" 
        type = "image/x-icon"> 
</head>
<body>
    <script src="script.js"></script>
    <header>
        <div class="logo">
            <img src="img web/logo1.png">
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
            <li class="icon"><input placeholder="Tìm Kiếm" type="text"><a class="search" href=""><img src="img web/search.png"></a></li>
            <li class="icon"><a class="user" href="" ><img src="img web/user.png" ></a></li>
            <li class="icon"><a class="user" href="" ><img src="img web/headphones.png" ></a></li>
            <li class="icon"><a class="user" href="" ><img src="img web/carts.png" ></a></li>
        </div>
    </header>


    <?php
        include "../admin/class/product_class.php";
        $prd = new product;
        $show_cartegory = $prd->show_cartegory();
    ?>

    <!---------cartegory------------ -->
<section class="category" style="margin-top: 100px;padding-left: 50px;">
        <h2>Danh Mục Sản Phẩm</h2>
        <div class="container">
            @foreach($categories as $item)
            <div class="cartegory-top row">
                <p>Trang chủ</p> <span>&rarr;</span><p>Nữ</p><span>&rarr;</span><p>Hàng mới về</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left">
                    <ul>
                        <li class="cartegory-left-li"><a href="#">Nữ</a>
                        <li class="cartegory-left-li "><a href="#">Nam</a>
                        <li><div class="cartegory-left-li"><a href="#">Trẻ em</a></div></li>
                        <li><div class="cartegory-left-li"><a href="#">Bộ sưu tập</a></div></li>
                    </ul>
                </div>
              <div class="cartegory-right row">
                <div class="cartegory-right-top-item">
                    <p>HÀNG NỮ MỚI VỀ</p>
                </div>
                <div class="cartegory-right-top-item">
                    <button><span>Bộ lọc</span><i class="fa-solid fa-arrow-down"></i></button>
                </div>
                <div class="cartegory-right-top-item">
                    <select name="" id="">
                        <option value="">Sắp xếp</option>
                        <option value="">Giá cao đến thấp</option>
                        <option value="">Giá thấp đến cao</option>
                    </select>
                </div>

            <?php
                if($show_cartegory){
                    while($result = $show_cartegory->fetch_asssoc()){
            ?>
                            <div class="cartegory-right-content row"> 
                                <a href="cart.html">
                                <div class="cartegory-right-content-item">
                                    <img src="img web/sp10.jpg" alt="" >
                                    <h1>CHÓ DOBERMAN</h1>
                                    <p>100.000<sup>đ</sup></p></a>
                            </div>
            <?php
                    }
                }
            ?>

                    <div class="cartegory-right-content-item">
                        <img src="img web/sp1.jpg" alt="">
                        <h1>CHÓ PHỐC SÓC</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp2.jpg" alt="">
                        <h1>CHÓ POODLE</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp3.jpg" alt="">
                        <h1>CHÓ CHIHUAHUA</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp4.jpg" alt="">
                        <h1>CHÓ GOLDEN</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp5.jpg" alt="">
                        <h1>CHÓ LABRADOR</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp6.webp" alt="">
                        <h1>CHÓ ALASKA</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp7.jpg" alt="">
                        <h1>CHÓ CORGI</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp8.jpg" alt="">
                        <h1>CHÓ SAMOYED</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                    <div class="cartegory-right-content-item">
                        <img src="img web/sp9.jpg" alt="">
                        <h1>CHÓ HUSKY</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div>
                  </div>


                  <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-item">
                            <p>Hiện thị 2 <span>|</span> 9 sản phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-item">
                           <p><span>&#171;</span> 1 2 3 <span>&#187;</span> Trang cuối</p>
                        </div>
                  </div>

              </div>
        </div>
    </div>
    </section>
    <script>
    const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
        itemsliderbar.forEach(function(menu,index){
            menu.addEventListener("click", function(){
                menu.classList.toggle("block")
            })
        })
    </script>