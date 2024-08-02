@include('user.head')
@include('user.navbar')
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        padding-top: 120px;
        background: #EBF0F5;
    }

    .success {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    .failed {
        color: rgb(226, 91, 91);
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    .p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    .checkmark {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>

<body>
    <div style="text-align: center;">
        <div class="card">
            @if (isset($_GET['vnp_SecureHash']))
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✓</i>
                </div>
                <h1 class="success">Thanh Toán Thành Công</h1>
                <p class="p" style="margin-bottom: 50px">Đơn hàng của bạn đã được gửi đến chúng tôi<br /> Chúng tôi
                    sẽ
                    liên hệ lại ngay!</p>
                <a style="padding: 10px;" href="/user/infor/content" class="main-btn2">Đơn Hàng Của Bạn</a>
            @else
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark" style="color: red">✗</i>
                </div>
                <h1 class="failed">Thanh Toán Không Thành Công</h1>
                <p class="p" style="margin-bottom: 50px"> Có gì đó không đúng!</p>
                <a style="padding: 10px;" href="/user/infor/content" class="main-btn2">Trang Chủ</a>
            @endif
        </div>
    </div>
</body>

</html>
@include('user.footer')
