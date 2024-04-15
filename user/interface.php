<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
    
    <title>Đây là web bán chó</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img web/logo1.png">
        </div>
        <div class="menu">
            <li><a href="../admin/cartegory.php">CHÓ</a>
            <li><a href="../admin/cartegory.php">MÈO</a></li>
            <li><a href="../admin/cartegory.php">PHỤ KIỆN THÚ CƯNG</a></li>
            <li><a href="../admin/cartegory.php">THỨC ĂN THÚ CƯNG</a></li>
            <li><a href="">VỀ CHÚNG TÔI</a></li>
            <li><a href="contact.html">LIÊN HỆ</a></li>
            <li><a href="">THÔNG TIN</a></li>
        </div>

        <div class="others">
            <li class="icon"><input placeholder="Tìm Kiếm" type="text"><a class="search" href=""><img src="img web/search.png"></a></li>
            <li class="icon"><a href="../admin/user_page.php"><h1 style="font-size: 8px;">welcome <span><?php echo $_SESSION['user_name'] ?></span></a></h1></li>
            <li class="icon"><a class="user" href="" ><img src="img web/headphones.png" ></a></li>
            <li class="icon"><a class="user" href="" ><img src="img web/carts.png" ></a></li>
        </div>
    </header>
    <section id="Slider">
        <div class="aspect-ratio-169">
            <img src="img web/bg.jpg">
            <img src="img web/bg1.jpg">
            <img src="img web/bg2.jpg">
            <img src="img web/bg3.jpg">
        </div>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
<!-- footer -->
<footer>
    <div class="roww">
        <div class="col">
            <img src="img web/logo-title.png" class="logo">
            <p>hello everyone</p>
        </div>
        <div class="col">
            <h3>office <div class="underline"><span></span></div></h3>
            <p>ten</p>
            <p>diachi</p>
            <p>diachii</p>
            <p class="email-id">email</p>
            <h4>sdt</h4>
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


    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector(".aspect-ratio-169")
    const dotItem = document.querySelectorAll(".dot")
    let imgNuber = imgPosition.length
    let currentindex = 0
    imgPosition.forEach(function(image,i){
        image.style.left = i*100 +"%"
        dotItem[i].addEventListener("click",function(){
            slider(i)
        })
    })
   
    function imgSlide() {
        currentindex++;
        console.log(currentindex);
        if (currentindex >= imgNuber) {
            currentindex = 0;
        }
        slider(currentindex);
    }

    function slider(index) {
        imgContainer.style.left = "-" + index * 100 + "%";
        const dotActive = document.querySelector('.active');
        if (dotActive) {
            dotActive.classList.remove("active");
        }
        dotItem[index].classList.add("active");
    }

    setInterval(imgSlide, 4000); 
</script>
</html>