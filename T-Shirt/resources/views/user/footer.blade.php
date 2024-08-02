
<footer class="app-container">
    <p>Tải ứng dụng T-Shirt trên</p>
    <div class="app-google">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/2560px-Google_Play_Store_badge_EN.svg.png"
            alt="">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/2560px-Download_on_the_App_Store_Badge.svg.png"
            alt="">
    </div>
    <p>Nhận bản tin của chúng tôi</p>
    <input type="text" placeholder="Nhập email của bạn...">

    <div class="footer-top">
        <li><a href=""><img
                    src="https://sensecity.vn/cantho/wp-content/uploads/2021/03/logo-da-thong-bao-website-voi-bo-cong-thuong.png"
                    alt=""></a></li>
        <li><a href="">Liên hệ</a></li>
        <li><a href="">Tuyển dụng</a></li>
        <li><a href="">Giới thiệu</a></li>
        <li>
            <a href="" class="fa fa-facebook-f"></a>
            <a href="" class="fa fa-twitter"></a>
            <a href="" class="fa fa-youtube"></a>
        </li>
    </div>
    <p>Công ty cổ phần TNHH T_Style<br>
        Số điện thoại: 0582858959 <br>
        Địa chỉ của hàng: 147B ngõ 562 Đường Láng, Hà Nội
    </p>
</footer>

<script>
    //scroll
    const header = document.querySelector("header")
    window.addEventListener("scroll", function() {
        x = window.pageYOffset
        if (x > 0) header.classList.add("sticky")
        else header.classList.remove("sticky")
    })

    //slide show
    let slideIndex = 1;
    showSlides(slideIndex);

    window.plusSlides = function(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    window.currentSlide = function(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }


    //MDB
    type = "text/javascript"
    src = "https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"
</script>
