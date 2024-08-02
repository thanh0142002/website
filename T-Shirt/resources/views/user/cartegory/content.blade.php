@include('user.head')

<body>

    @include('user.navbar')
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row1">
                <p>Trang chủ</p> <span>&#10230;</span>
                <p>Danh Mục</p> <span>&#10230;</span>
                <p>{{ $menu->name }}</p>
            </div>
        </div>
        <div class="container">
            <form method="GET">
                <div class="row1">
                    <div class="cartegory-left" style="width: 20%;">
                        <ul>
                            <li class="cartegory-left-li">
                                <p class="toggleLink-size">Kích cỡ<i class="fas fa-plus"></i></p>
                                <div class="Showdiv-size">
                                    <div class="invisible-checkboxes">
                                        @foreach ($sizes as $size)
                                            <input type="checkbox" name="size_id[]" value="{{ $size->id }}"
                                                {{ in_array($size->id, request()->input('size_id', [])) ? 'checked' : '' }}
                                                id="r{{ $size->id }}" />
                                            <label class="checkbox-alias btn1"
                                                for="r{{ $size->id }}">{{ $size->name }}</label>
                                        @endforeach
                                    </div>
                                </div>
                            <li class="cartegory-left-li">
                                <p class="toggleLink-color">Màu<i class="fas fa-plus"> </i></p>
                                <div class="Showdiv-color">
                                    @foreach ($colors as $color)
                                        <div class="checkbox-wrapper-32">
                                            <input type="checkbox" name="color_id[]" value="{{ $color->id }}"
                                                {{ in_array($color->id, request()->input('color_id', [])) ? 'checked' : '' }}
                                                id="checkbox-color-{{ $color->id }}">
                                            <label for="checkbox-color-{{ $color->id }}">{{ $color->name }}</label>
                                            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                    stroke-dashoffset="113"></path>
                                                <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                    stroke-dashoffset="113"></path>
                                            </svg>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                            <li class="cartegory-left-li">
                                <p class="toggleLink-price">Mức Giá<i class="fas fa-plus"> </i></p>
                                <div class="Showdiv-price">
                                    <div class="checkbox-wrapper-32">
                                        <input type="checkbox" name="price_range[]" id="checkbox-price-1"
                                            value="0-500000"
                                            {{ in_array('0-500000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <label for="checkbox-price-1">0đ - 500.000đ</label>
                                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                            <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                        </svg>
                                    </div>
                                    <div class="checkbox-wrapper-32">
                                        <input type="checkbox" name="price_range[]" id="checkbox-price-2"
                                            value="500000-1000000"
                                            {{ in_array('500000-1000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <label for="checkbox-price-2">500.000đ - 1.000.000đ</label>
                                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                            <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                        </svg>
                                    </div>
                                    <div class="checkbox-wrapper-32">
                                        <input type="checkbox" name="price_range[]" id="checkbox-price-3"
                                            value="1000000-2000000"
                                            {{ in_array('1000000-2000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <label for="checkbox-price-3">1.000.000đ - 2.000.000đ</label>
                                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                            <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                        </svg>
                                    </div>
                                    <div class="checkbox-wrapper-32">
                                        <input type="checkbox" name="price_range[]" id="checkbox-price-4"
                                            value="2000000-5000000"
                                            {{ in_array('2000000-5000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <label for="checkbox-price-4">2.000.000đ - 5.000.000đ</label>
                                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                            <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                        </svg>
                                    </div>
                                    <div class="checkbox-wrapper-32">
                                        <input type="checkbox" name="price_range[]" id="checkbox-price-5"
                                            value="5000000-10000000"
                                            {{ in_array('5000000-10000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <label for="checkbox-price-5">5.000.000đ - 10.000.000đ</label>
                                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                            <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                        </svg>
                                    </div>
                                    <div class="checkbox-wrapper-32">
                                        <input type="checkbox" name="price_range[]" id="checkbox-price-6"
                                            value="10000000-"
                                            {{ in_array('10000000-', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <label for="checkbox-price-6">Trên 10.000.000đ</label>
                                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                            <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                stroke-dashoffset="113"></path>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                            <li class="cartegory-left-li">
                                <p class="toggleLink-clothes">Trang Phục<i class="fas fa-plus"> </i></p>
                                <div class="Showdiv-clothes">
                                    @foreach ($clothes as $clothe)
                                        <div class="checkbox-wrapper-32">
                                            <input type="checkbox" name="clothes_id[]" value="{{ $clothe->id }}"
                                                {{ in_array($clothe->id, request()->input('clothes_id', [])) ? 'checked' : '' }}
                                                id="checkbox-clothes-{{ $clothe->name }}">
                                            <label
                                                for="checkbox-clothes-{{ $clothe->name }}">{{ $clothe->name }}</label>
                                            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M 10 10 L 90 90" stroke="#000" stroke-dasharray="113"
                                                    stroke-dashoffset="113"></path>
                                                <path d="M 90 10 L 10 90" stroke="#000" stroke-dasharray="113"
                                                    stroke-dashoffset="113"></path>
                                            </svg>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                        <div class="box-buttonfilter">
                            <div class="buttonfilter"><button type="button" class="main-btn clear"
                                    onclick="window.location.href='{{ $menu->id }}'">
                                    Bỏ Lọc </button></div>
                            <div class="buttonfilter"><button type="submit" class="main-btn2 "> Lọc
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="cartegory-right" style="width: 80%;">
                        <div class="row1">
                            <div class="cartegory-right-top-item">
                                <p>DANH MỤC {{ $menu->name }}</p>
                            </div>
                            <div class="search-box">
                                <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                                <input type="text" name="search" value="{{ request()->input('search') }}"
                                    class="input-search" placeholder="Tìm kiếm sản phẩm...">
                            </div>
                            <div class="cartegory-right-top-item">
                                {{-- nếu muốn cập nhật ngay khi click thì dùng: onchange="this.form.submit()" vào select --}}
                                <select name="sort">
                                    <option value="">Sắp xếp</option>
                                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá thấp
                                        đến cao</option>
                                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá cao
                                        đến thấp</option>
                                </select>
                            </div>
                        </div>
                        <div class="cartegory-right-content">
                            <div class="row1">
                                @foreach ($products as $product)
                                    <div class="column1 btn{{ $product->menu_id }}" style="width: 25%;">
                                        <div class="hot-product-item card1">
                                            <a href="/user/product/content/{{ $product->id }}">
                                                <div class="box-hover">
                                                    <img src="{{ asset("img/$product->img1") }}"alt="">
                                                    <img src="{{ asset("upload/$product->thumb") }}"alt=""
                                                        class="img-change">
                                                </div>
                                            </a>
                                            <div class="heart">
                                                <a href=""><i class="far fa-heart"></i></a>
                                            </div>
                                            <a href=""><span
                                                    style="height: 50px;">{{ $product->name }}</span></a>
                                            <div class="hot-product-item-price">
                                                @if ($product->sale_off != null)
                                                    <p>{{ number_format($product->price_sale - ($product->price_sale * $product->sale_off) / 100, 0, ',', '.') }}đ
                                                        <span>{{ number_format($product->price_sale, 0, ',', '.') }}đ</span>
                                                    </p>
                                                @else
                                                    <p>{{ number_format($product->price_sale, 0, ',', '.') }}đ</p>
                                                @endif
                                                <a href="" class="card-shopping"><i
                                                        class="fas fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cartegory-right-bottom row1">
                            {{-- <div class="cartegory-right-bottom-items">
                                <p>Hiển thị 2 <span>|</span> 4 sản phẩm</p>
                            </div> --}}
                            <div class="cartegory-right-bottom-items">
                                <p><span>&#171;</span>1 2 3 4 5 <span>&#187;</span> Trang cuối</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        const itemsilderbar = document.querySelectorAll(".cartegory-left-li")
        itemsilderbar.forEach(function(menu, index) {
            menu.addEventListener("click", function() {
                menu.classList.toggle("block")
            })
        })
    </script>

    @include('user.footer')

    <script>
        const toggleLink_size = document.querySelector('.toggleLink-size');
        const divToShow_size = document.querySelector('.Showdiv-size');
        const toggleLink_color = document.querySelector('.toggleLink-color');
        const divToShow_color = document.querySelector('.Showdiv-color');
        const toggleLink_price = document.querySelector('.toggleLink-price');
        const divToShow_price = document.querySelector('.Showdiv-price');
        const toggleLink_clothes = document.querySelector('.toggleLink-clothes');
        const divToShow_clothes = document.querySelector('.Showdiv-clothes');

        toggleLink_size.addEventListener('click', function(event) {
            divToShow_size.classList.toggle("show");
            localStorage.setItem('divToShow_size', divToShow_size.classList.contains('show'));
        });
        toggleLink_color.addEventListener('click', function(event) {
            divToShow_color.classList.toggle("show");
            localStorage.setItem('divToShow_color', divToShow_color.classList.contains('show'));
        });
        toggleLink_price.addEventListener('click', function(event) {
            divToShow_price.classList.toggle("show");
            localStorage.setItem('divToShow_price', divToShow_price.classList.contains('show'));
        });
        toggleLink_clothes.addEventListener('click', function(event) {
            divToShow_clothes.classList.toggle("show");
            localStorage.setItem('divToShow_clothes', divToShow_clothes.classList.contains('show'));
        });
        window.onload = function() {
            var isDivVisible_size = localStorage.getItem('divToShow_size');
            if (isDivVisible_size == 'true') {
                divToShow_size.classList.add('show');
            }

            var isDivVisible_color = localStorage.getItem('divToShow_color');
            if (isDivVisible_color == 'true') {
                divToShow_color.classList.add('show');
            }

            var isDivVisible_price = localStorage.getItem('divToShow_price');
            if (isDivVisible_price == 'true') {
                divToShow_price.classList.add('show');
            }

            var isDivVisible_clothes = localStorage.getItem('divToShow_clothes');
            if (isDivVisible_clothes == 'true') {
                divToShow_clothes.classList.add('show');
            }
        };

        document.querySelector('.clear').addEventListener('click', function(event) {
            divToShow_size.classList.remove('show');
            divToShow_color.classList.remove('show');
            divToShow_price.classList.remove('show');
            divToShow_clothes.classList.remove('show');

            localStorage.removeItem('divToShow_size');
            localStorage.removeItem('divToShow_color');
            localStorage.removeItem('divToShow_price');
            localStorage.removeItem('divToShow_clothes');
        });
    </script>
</body>
