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
    .cartegory-right-content{
    margin-top: 20px;
    justify-content: left;
    display: flex;
    flex-wrap: wrap;
}
    div#search form{
        width: 200px;
        display:flex;
        justify-content: center;
        align-items: center;
        height: 40px;
        margin-top: 30px;
        position: relative;
        margin-right: 20px;
    }


    div#search form  button{
        position: absolute;
        right: 0;
        top: 50%;
        font-size: 18px;
    }
</style>
<body>
    <script src="script.js"></script>
    <header>
        <div class="logo">
            <img src="img/logo1.png" alt="">
        </div>
        <div class="menu">
            <li><a href="">CHÓ</a>
            <li><a href="">MÈO</a></li>
            <li><a href="">PHỤ KIỆN THÚ CƯNG</a></li>
            <li><a href="">THỨC ĂN THÚ CƯNG</a></li>
            <li><a href="">DỊCH VỤ</a></li>
            <li><a href="">TIN TỨC</a></li>
            <!-- <li><a href="">THÔNG TIN</a></li> -->
        </div>
        
        <div id="search">
            <form action="">
                <input style="height: 30px;margin-top: 25px;" type="text">
                <button  class="fa-solid fa-magnifying-glass"></button>
            </form>
        </div>
        <div class="others">

            <li class="icon"><a class="user" href="" ><img src="img/user.png" ></a></li>
            <li class="icon"><a class="user" href="" ><img src="img/headphones.png" ></a></li>
            <li class="icon"><a class="user" href="" ><img src="img/carts.png" ></a></li>
        </div>
    </header>


    <?php
        include "../admin/class/product_class.php";
        $prd = new product;
        $show_product = $prd->show_product();
    ?>

    <!---------cartegory------------ -->
<section class="category" style="margin-top: 100px;padding-left: 50px;">
        <h2>Danh Mục Sản Phẩm</h2>
        <div class="container">
            @foreach($categories as $item)
            <div class="cartegory-top row">
                <p>Trang chủ</p> <span>&rarr;</span><p>Chó</p><span>&rarr;</span><p>Hàng mới về</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left">
                    <ul>
                        <li class="cartegory-left-li"><a href="#">Chó</a>
                        <li class="cartegory-left-li "><a href="#">Mèo</a>
                        <li><div class="cartegory-left-li"><a href="#">Phụ kiện thú cưng</a></div></li>
                        <li><div class="cartegory-left-li"><a href="#">Thức ăn thú cưng</a></div></li>
                    </ul>
                </div>
              <div class="cartegory-right">
               <div class="cartegory-right-top row">
                <div class="cartegory-right-top-item">
                        <p>HÀNG MỚI VỀ</p>
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
               </div>
                <style>
                    .cartegory-right-content-item > h1, p{
                        margin: 0 auto;
                        /* background-color: #fc0202; */
                        width: 265px;
                        font-size: 18px;
                        color: black;

                    }
                    .center-text {
                        text-align: center;
                    }
                    .cartegory-right-content-item img{
                        width: 250.5px;
                        height: 250.5px;
}
                </style>
                <div class="cartegory-right-content" > 
                    <?php
                        if($show_product){
                            while($result = $show_product->fetch_assoc()){
                    ?>
                                        <a href="product_details.php?prd_id=<?php echo $result['product_id']; ?>">
                                            <div class="cartegory-right-content-item">
                                                <img src="uploads/<?php echo $result['product_img']; ?>" alt="" style="margin-right: 8px;">
                                                <h1 style=" "><?php echo $result['product_name']; ?></h1>
                                                <p style="color: #C70039;font-size: 24px;">Sale  <?php echo $result['product_price_new']; ?><sup>đ</sup></p>
                                                <p style="text-decoration:line-through;">Giá cũ <?php echo $result['product_price']; ?><sup>đ</sup></p>
                                            </div>
                                        </a>
                                        <?php
                            }
                        }
                        ?>
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
    <script>
    const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
        itemsliderbar.forEach(function(menu,index){
            menu.addEventListener("click", function(){
                menu.classList.toggle("block")
            })
        })
    </script>