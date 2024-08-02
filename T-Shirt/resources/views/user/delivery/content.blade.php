@include('user.head')

<body>
    @include('user.navbar')
    <form action="{{ route('delivery.post') }}" method="POST">
        @csrf
        <section class="delivery">
            <div class="container">
                <div class="delivery-top-wrap">
                    <div class="delivery-top">
                        <div class="delivery-top-delivery delivery-top-item">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="delivery-top-address delivery-top-item">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="delivery-top-payment delivery-top-item">
                            <i class="fa fa-credit-card"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                @include('admin.alert')
                <div class="delivery-content row1">
                    <div class="delivery-content-left ">
                        <div class="name-phone">
                            <div class="delivery-content-left-input-top-item ">
                                <label for="">Họ tên <span style="color: red">*</span></label>
                                <input type="text" name="name" id="" required>
                            </div>
                            <div class="delivery-content-left-input-top-item ">
                                <label for="">Điện thoại <span style="color: red">*</span></label>
                                <input type="text" name="phone" id="" required>
                            </div>
                        </div>
                        <div class="address">
                            <div class="delivery-content-left-input-top-item ">
                                <label for="">Tỉnh/TP <span style="color: red">*</span></label>
                                <input type="text" name="city" id="" required>
                            </div>
                            <div class="delivery-content-left-input-top-item ">
                                <label for="">Quận/Huyện <span style="color: red">*</span></label>
                                <input type="text" name="district" id="" required>
                            </div>
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <label for="">Địa chỉ<span style="color: red">*</span></label>
                            <input type="text" name="address" id="" required>
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <label for="">Ghi chú</label>
                            <input type="text" name="notes" id="">
                        </div>
                        <div class="delivery-content-left-button row1">
                            <a href="cart/content"><span>&#171;</span>
                                <p>Quay lại giỏ hàng</p>
                            </a>
                            <button class="main-btn2" name="btn" type="submit">
                                <p style="font-weight: bold;">THANH TOÁN KHI GIAO HÀNG</p>
                            </button>
                            <button class="main-btn" value="1" type="submit" name="redirect">
                                <input type="hidden" name="total_price_sale" value="{{ $total_price_sale }}">
                                <p style="font-weight: bold;">THANH TOÁN BẰNG VNPAY</p>
                            </button>
                        </div>
                    </div>
                    <div class="delivery-content-right ">
                        <table>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Size</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>

                            @foreach ($cart_users as $cart_user)
                                <tr>
                                    <td>{{ $cart_user->product_size->product->name }}</td>
                                    <td>{{ $cart_user->product_size->size->name }}</td>
                                    <td>{{ $cart_user->quantity }}</td>
                                    <td>{{ number_format($cart_user->price_sale, 0, ',', '.') }} <sup>đ</sup></td>
                                </tr>
                            @endforeach

                            <tr>
                                <td style="font-weight: bold;" colspan="3">Voucher giảm giá
                                    {{ isset($voucher->sale_off) ? $voucher->sale_off . '%' : '' }}</td>
                                <td style="font-weight: bold;">
                                    <p>{{ number_format($price_sale, 0, ',', '.') }} <sup>đ</sup></p>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight: bold;" colspan="2">Tổng</td>
                                <td style="font-weight: bold;">{{ $total_quantity }}</td>
                                <input type="hidden" value="{{ $total_quantity }}" name="total_quantity">
                                <td style="font-weight: bold;">
                                    <p>{{ number_format($total_price_sale, 0, ',', '.') }} <sup>đ</sup></p>
                                </td>
                            </tr>
                            @if (!$total_price_sale)
                                <tr>
                                    <td style="font-weight: bold;" colspan="3">Phí Ship</td>
                                    <td style="font-weight: bold;">
                                        <p>0 <sup>đ</sup></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                                    <td style="font-weight: bold;">
                                        <p>0 <sup>đ</sup></p>
                                    </td>
                                </tr>
                            @else
                                @if ($total_price_sale < 2000000)
                                    <tr>
                                        <td style="font-weight: bold;" colspan="3">Phí Ship</td>
                                        <td style="font-weight: bold;">
                                            <p>25.000 <sup>đ</sup></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                                        <td style="font-weight: bold;">
                                            <p>{{ number_format($total_price_sale + 25000, 0, ',', '.') }} <sup>đ</sup>
                                            </p>
                                            <input type="hidden" value="{{ $total_price }}" name="total_price">
                                            <input type="hidden" value="{{ $total_price_sale }}"
                                                name="total_price_sale">
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="font-weight: bold;" colspan="3">Phí Ship</td>
                                        <td style="font-weight: bold;">
                                            <p>Miễn phí ship</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                                        <td style="font-weight: bold;">
                                            <p>{{ number_format($total_price_sale, 0, ',', '.') }} <sup>đ</sup></p>
                                            <input type="hidden" value="{{ $total_price }}" name="total_price">
                                            <input type="hidden" value="{{ $total_price_sale }}"
                                                name="total_price_sale">
                                        </td>
                                    </tr>
                                @endif
                            @endif

                        </table>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn main-btn2" style="margin-top: 20px" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Chọn vouchor
                        </button>
                    </div>
                </div>
        </section>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mã giảm giá</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($vouchers as $voucher)
                        <div class="container-voucher" style="margin-bottom: 40px">
                            <div class="coupon bg-white rounded mb-3 d-flex justify-content-between">
                                <div class="kiri p-3">
                                    <div class="icon-container ">
                                        <div class="icon-container_box">
                                            <img src="/template/admin/assets/images/logo.jpg" width="85"
                                                alt="totoprayogo.com" class="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="tengah py-3 d-flex w-100 justify-content-start"
                                    style="align-items: center">
                                    <p style="font-weight: bold"><span style="color: red">Giảm
                                            {{ $voucher->sale_off }}%</span> Cho đơn tối thiểu
                                        {{ number_format($voucher->minimum, 0, ',', '.') }}đ Tối đa
                                        {{ number_format($voucher->maximum, 0, ',', '.') }}đ</p>
                                </div>
                                <div class="kanan">
                                    <div class="info m-3 d-flex align-items-center">
                                        <div class="w-100">
                                            <div class="block">
                                                <span class="time font-weight-light">
                                                    <span>19 ngày</span>
                                                </span>
                                            </div>
                                            <form action="{{ route('apply.voucher') }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="voucher_id" value="{{ $voucher->id }}">
                                                <button type="submit" <?php echo $voucher && $total_price_sale < $voucher->minimum ? 'disabled style="color: #717171; border-color: #717171; "' : ''; ?>
                                                    class="btn btn-sm btn-outline-danger btn-block">
                                                    Chọn
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
    @include('user.footer')
</body>
