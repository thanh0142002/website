<!doctype html>
<html class="no-js" lang="en">

@include('admin.head')

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{route('signup')}}" method="POST">
                    @csrf
                    <div class="login-form-head">
                        <h4>Đăng ký</h4>
                        <p>Xin chào, Đăng ký và tham gia cùng chúng tôi</p>
                    </div>
                    @include('admin.alert')
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Họ tên</label>
                            <input type="text" name="name" id="exampleInputName1">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Địa chỉ email</label>
                            <input type="email" name="email" id="exampleInputEmail1">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="password">Mặt khẩu</label>
                            <input type="password" name="password" id="password" required autocomplete="new-password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="password_confirmation">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Đăng ký <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Đăng nhập với <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Đăng nhập với <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Bạn đã có tài khoản đăng nhập rồi? <a href="{{route('login')}}">Đăng nhập</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>
