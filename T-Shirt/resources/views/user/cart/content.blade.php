@include('user.head')

<body>
    @include('user.navbar')

    <section class="cart">
        <div class="container">
            <div class="cart-top-wrap">
                <div class="cart-top">
                    <div class="cart-top-cart cart-top-item">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="cart-top-address cart-top-item">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="cart-top-payment cart-top-item">
                        <i class="fa fa-credit-card"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cart-content row">
                <div class="cart-content-left column" style="width: 65%;">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                        @foreach ($cart_users as $cart_user)
                            <tr>
                                <td><img src="/upload/{{ $cart_user->product_size->product->thumb }}" alt="">
                                </td>
                                <td>
                                    <p>{{ $cart_user->product_size->product->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $cart_user->product_size->product->color->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $cart_user->product_size->size->name }}</p>
                                </td>
                                <td>{{ $cart_user->quantity }}</td>
                                <td>
                                    <p>{{ number_format($cart_user->price_sale, 0, ',', '.') }}<sup>đ</sup></p>
                                </td>
                                <td>
                                    <form action="{{ route('cart.destroy', $cart_user->id) }}" method="POST"
                                        onsubmit="return confirm('bạn chắc chắn muốn xóa sản phẩm này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button style="border: none" type="submit"><span>X</span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="cart-content-right column" style="width: 35%;">
                    <table>
                        <tr>
                            <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td>TỔNG SẢN PHẨM</th>
                            <td>{{ $total_quantity }}</th>
                        </tr>
                        <tr>
                            <td>TỔNG TIỀN HÀNG</th>
                            <td>{{ number_format($total_price_sale, 0, ',', '.') }}<sup>đ</sup></th>
                        </tr>
                        <tr>
                            <td>TẠM TÍNH</th>
                            <td>{{ number_format($total_price_sale, 0, ',', '.') }}<sup>đ</sup></th>
                        </tr>
                    </table>
                    <div class="cart-content-right-text">
                        <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000đ</p>
                        <p style="color: red; font-weight: bold;">Mua thêm <span> 131.000<sup>đ</sup></span> để được
                            miễn phí SHIP
                        </p>
                    </div>
                    <div class="cart-content-right-button">
                        <a href="/"><button class="main-btn">TIẾP TỤC MUA SẮM</button></a>
                        <a href="/user/delivery"><button class="main-btn2">THANH TOÁN</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('user.footer')
</body>
