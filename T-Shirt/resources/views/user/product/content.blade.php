@include('user.head')

<body>

    @include('user.navbar')

    <form action="{{ route('UploadProduct_detail.post', ['product' => $products->id]) }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="{{ $products->id }}">
        @csrf
        <div class="container" style="margin-top: 100px">
            <div class="product-top row1">
                <p>Trang chủ</p> <span>&#10230;</span>
                <p>{{ $products->menu->name }}</p> <span>&#10230;</span>
                <p>{{ $products->name }}</p>
            </div>
            <div class="product-content row1">
                <div class="product-content-left column1">
                    <div class="product-content-left-big-img column1">
                        <img src="{{ asset("img/$products->thumb") }}" alt="">
                    </div>
                    <div class="product-content-left-small-img column1">
                        <img src="{{ asset("img/$products->thumb") }}" alt="">
                        <img src="{{ asset("img/$products->img1") }}" alt="">
                        <img src="{{ asset("img/$products->img2") }}" alt="">
                        <img src="{{ asset("img/$products->img3") }}" alt="">
                    </div>
                </div>
                <div class="product-content-right column1">
                    <div class="product-content-right-product-name">
                        <h1>{{ $products->name }}</h1>
                        <p>MSP: 123001</p>
                    </div>
                    <div class="product-content-right-product-price">
                        <p>
                            @if ($products->sale_off != null)
                                <p>{{ number_format($products->price_sale - ($products->price_sale * $products->sale_off) / 100, 0, ',', '.') }}đ
                                    <span
                                        class="price_sale">{{ number_format($products->price_sale, 0, ',', '.') }}đ</span>
                                </p>
                            @else
                                <p>{{ number_format($products->price_sale, 0, ',', '.') }}đ</p>
                            @endif
                            <input type="hidden" name="price_sale"
                                value="{{ $products->price_sale - ($products->price_sale * $products->sale_off) / 100 }}">
                            <input type="hidden" name="price" value="{{ $products->price }}">
                        </p>
                    </div>
                    <div class="product-content-right-product-color">
                        <p>
                            <span style="font-weight: bold;">Màu sắc</span>:{{ $products->color->name }}
                        </p>
                    </div>
                    <div class="product-content-right-product-size">
                        <p style=" ">Size: </p>
                        <div class="invisible-radioes">
                            @foreach ($products->sizes as $size)
                                @if ($size->pivot->stock > 0)
                                    <input type="radio" name="size_id" value="{{ $size->id }}"
                                        id="r{{ $size->id }}" />
                                    <label class="radio-alias" for="r{{ $size->id }}">{{ $size->name }}</label>
                                @else
                                    <input type="radio" name="size_id" value="{{ $size->id }}"
                                        id="r{{ $size->id }}" disabled />
                                    <label class="radio-alias" style="color: #cccccc; cursor: not-allowed"
                                        for="r{{ $size->id }}">{{ $size->name }}</label>
                                @endif
                            @endforeach
                        </div>
                        <div class="size">
                        </div>
                    </div>
                    <div class="quantity">
                        <p style="padding-right: 10px">Số lượng: </p>
                        <input type="number" name="quantity" min="0" value="1">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="product-content-right-product-button">
                        <a href="/user/cart/content">
                            <button type="submit" class="main-btn"><i class="fa fa-shopping-cart"></i>
                                <p>Mua Hàng</p>
                            </button>
                        </a>
                    </div>

                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fa fa-phone">Hotline</i>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fa fa-comments">Chat</i>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fa fa-envelope">Mail</i>
                        </div>
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            &#8744;
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row1">
                                <div class="product-content-right-bottom-content-title-item gioithieu column1">
                                    Giới thiệu
                                </div>
                                <div class="product-content-right-bottom-content-title-item chitiet column1">
                                    Chi tiết
                                </div>
                                <div class="product-content-right-bottom-content-title-item baoquan column1">
                                    Bảo quản
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-gioithieu">
                                    Set đồ dành cho bé trai được làm từ chất liệu vải cotton kháng khuẩn. Đây là sự kết
                                    hợp
                                    giữa chất liệu cotton organic và lớp kháng khuẩn mạnh mẽ được phủ lên trong quá
                                    trình
                                    hoàn thiện vải cuối cùng. Bởi vậy cotton kháng khuẩn không chỉ mang lại sự thoáng
                                    mát mà
                                    còn rất an toàn với làn da nhạy cảm của bé.
                                    <br>
                                    <br>
                                    Áo thun cổ tròn tay ngắn, trước ngực có phối túi nhỏ. Quần sooc có chun co giãn.
                                </div>
                                <div class="product-content-right-bottom-content-chitiet" style="display: none;">
                                    Dòng sản phẩm Boy
                                    <br>
                                    Nhóm sản phẩm Áo
                                    <br>
                                    Cổ áo Cổ tròn
                                    <br>
                                    Tay áo Tay ngắn
                                    Kiểu dáng Khác
                                    Độ dài Dài thường
                                    Họa tiết Họa tiết khác
                                    Chất liệu Thun
                                </div>
                                <div class="product-content-right-bottom-content-baoquan" style="display: none;">
                                    Chi tiết bảo quản sản phẩm :
                                    <br>
                                    * Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ
                                    giặt
                                    khô, tuyệt đối không giặt ướt.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('Product_comment.post', ['product' => $products->id]) }}" method="POST">
        @csrf
        <div class="container">
            <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div
                        class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                        <h4>Bình Luận</h4>
                    </div>
                    <div class="coment-bottom bg-white p-2 px-4">
                        <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                            <div class="col-0">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/OOjs_UI_icon_userAvatar-progressive.svg/1024px-OOjs_UI_icon_userAvatar-progressive.svg.png"
                                    width="33" class="rounded-circle mt-2">
                            </div>
                            <div class="col-10">
                                <div class="comment-box ml-2">
                                    @if (isset($user->name) == null)
                                        <div class="rating" style="margin-left: 18px">
                                            <input type="radio" name="rate" value="5"
                                                id="5"><label for="5">☆</label>
                                            <input type="radio" name="rate" value="4"
                                                id="4"><label for="4">☆</label>
                                            <input type="radio" name="rate" value="3"
                                                id="3"><label for="3">☆</label>
                                            <input type="radio" name="rate" value="2"
                                                id="2"><label for="2">☆</label>
                                            <input type="radio" name="rate" value="1"
                                                id="1"><label for="1">☆</label>
                                        </div>
                                    @else
                                        <h4 style="margin-left: 18px">{{ $user->name }}</h4>
                                        <div class="rating" style="margin-left: 18px">
                                            <input type="radio" name="rate" value="5"
                                                id="5"><label for="5">☆</label>
                                            <input type="radio" name="rate" value="4"
                                                id="4"><label for="4">☆</label>
                                            <input type="radio" name="rate" value="3"
                                                id="3"><label for="3">☆</label>
                                            <input type="radio" name="rate" value="2"
                                                id="2"><label for="2">☆</label>
                                            <input type="radio" name="rate" value="1"
                                                id="1"><label for="1">☆</label>
                                        </div>
                                    @endif
                                    <div class="comment-area">
                                        <textarea class="form-control-1" name="content" placeholder="Bình luận của bạn" style="width: 100%" rows="2"></textarea>
                                    </div>
                                    <div class="comment-btns mt-2">
                                        <div class="row">
                                            <div class="col-12" style="margin-left: 18px">
                                                <div class="pull-right">
                                                    <button class="main-btn" type="submit">Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($comments as $comment)
                            @if ($comment->user->name != 'null')
                                <div class="commented-section mt-2">
                                    <div class="d-flex flex-row align-items-center commented-user">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/OOjs_UI_icon_userAvatar-progressive.svg/1024px-OOjs_UI_icon_userAvatar-progressive.svg.png"
                                            width="33" class="rounded-circle mt-2">
                                        <h5 style="margin-left: 18px" class="mr-2">{{ $comment->user->name }}</h5>
                                        <span class="dot mb-1"></span>
                                        <div class="rating" style="margin-left: 18px">
                                            <input type="radio" disabled
                                                {{ $comment->rate == 5 ? 'checked' : '' }}><label>☆</label>
                                            <input type="radio" disabled
                                                {{ $comment->rate == 4 ? 'checked' : '' }}><label>☆</label>
                                            <input type="radio" disabled
                                                {{ $comment->rate == 3 ? 'checked' : '' }}><label>☆</label>
                                            <input type="radio" disabled
                                                {{ $comment->rate == 2 ? 'checked' : '' }}><label>☆</label>
                                            <input type="radio" disabled
                                                {{ $comment->rate == 1 ? 'checked' : '' }}><label>☆</label>
                                        </div>
                                        <span style="margin-left: 18px"
                                            class="mb-1 ml-2">{{ $comment->created_at }}</span>
                                    </div>
                                    <div style="margin-left: 50px" class="comment-text-sm">
                                        <span>{{ $comment->content }}</span>
                                    </div>
                                    <div style="margin-left: 50px" class="reply-section">
                                        <div class="d-flex flex-row align-items-center voting-icons">
                                            <h6 class="ml-2 mt-1">Reply</h6>
                                        </div>
                                    </div>
                                </div>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

@include('user.footer')

<script>
    const bigImg = document.querySelector(".product-content-left-big-img img")
    const smallImg = document.querySelectorAll(".product-content-left-small-img img")
    smallImg.forEach(function(itemImg) {
        itemImg.addEventListener("click", function() {
            bigImg.src = itemImg.src
        })
    })

    const gioithieu = document.querySelector(".gioithieu")
    const chitiet = document.querySelector(".chitiet")
    const baoquan = document.querySelector(".baoquan")
    if (gioithieu) {
        gioithieu.addEventListener("click", function() {
            document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none"
            document.querySelector(".product-content-right-bottom-content-gioithieu").style.display = "block"
        })
    }
    if (chitiet) {
        chitiet.addEventListener("click", function() {
            document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none"
            document.querySelector(".product-content-right-bottom-content-gioithieu").style.display = "none"
        })
    }
    if (baoquan) {
        baoquan.addEventListener("click", function() {
            document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block"
            document.querySelector(".product-content-right-bottom-content-gioithieu").style.display = "none"
        })
    }
</script>
