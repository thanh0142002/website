   @include('user.head')

   <body>

       @include('user.navbar')

       @yield('content')

       @include('user.slide')
       <div class="container1">
           <div class="row-grid">
               <p class="heading-text">SẢN PHẨM MỚI</p>
           </div>
           <div class="myBtnContainer">
               <li class="showall">Hiện Tất Cả</li>
               <li class="nam">Nam</li>
               <li class="nu">Nữ</li>
               <li class="tre">Trẻ em</li>
           </div>
           <div class="row1">
               @foreach ($products as $product)
                   <div class="column1 btn{{ $product->menu_id }}" style="width: 20%;">
                       <div class="hot-product-item card1">
                           <a href="/user/product/content/{{ $product->id }}">
                               <div class="box-hover">
                                   <img
                                       src="{{ asset("img/$product->img1") }}"alt="">
                                   <img src="upload\{{ $product->thumb }}"alt="" class="img-change">
                               </div>
                           </a>
                           <div class="heart">
                               <a href=""><i class="far fa-heart"></i></a>
                           </div>
                           <a href=""><span style="height: 50px;">{{ $product->name }}</span></a>
                           <div class="hot-product-item-price">
                               @if ($product->sale_off != null)
                                   <p>{{ number_format($product->price_sale - ($product->price_sale * $product->sale_off) / 100, 0, ',', '.') }}đ
                                       <span>{{ number_format($product->price_sale, 0, ',', '.') }}đ</span>
                                   </p>
                               @else
                                   <p>{{ number_format($product->price_sale, 0, ',', '.') }}đ</p>
                               @endif
                               <a href="" class="card-shopping"><i class="fas fa-shopping-cart"></i></a>
                           </div>
                       </div>
                   </div>
               @endforeach
           </div>
           {{-- <div class="row-grid">
               <p class="heading-text">SẢN PHẨM PHỔ BIẾN</p>
           </div>
           <div class="row1">
               @foreach ($products as $product)
                   <div class="column1" style="width: 20%;">
                       <div class="hot-product-item card1">
                           <a href="">
                               <div class="box-hover">
                                   <img
                                       src="https://pubcdn.ivymoda.com/files/product/thumab/400/2024/04/12/725aa0022a86342058fe3fb95628e47d.webp"alt="">
                                   <img src="upload\{{ $product->thumb }}"alt="" class="img-change">
                               </div>
                           </a>
                           <div class="heart">
                               <a href=""><i class="far fa-heart"></i></a>
                           </div>
                           <a href=""><span style="height: 50px;">{{ $product->name }}</span></a>
                           <div class="hot-product-item-price">
                               <p>{{ $product->price }}đ <span>{{ $product->price_sale }}đ</span> </p>
                               <a href="" class="card-shopping"><i class="fas fa-shopping-cart"></i></a>
                           </div>
                       </div>
                   </div>
               @endforeach
           </div> --}}
       </div>

       @include('user.footer')
       <script>
           //Filter
           const showall = document.querySelector(".showall")
           const nam = document.querySelector(".nam")
           const nu = document.querySelector(".nu")
           const tre = document.querySelector(".tre")
           const active_nam = document.querySelectorAll(".btn11");
           const active_nu = document.querySelectorAll(".btn12");
           const active_tre = document.querySelectorAll(".btn13");
           if (showall) {
               showall.addEventListener("click", function() {
                   for (let i = 0; i < active_nam.length; i++) {
                       active_nam[i].style.display = "block";
                   }
                   for (let i = 0; i < active_nu.length; i++) {
                       active_nu[i].style.display = "block";
                   }
                   for (let i = 0; i < active_tre.length; i++) {
                       active_tre[i].style.display = "block";
                   }
               })
           }
           if (nam) {
               nam.addEventListener("click", function() {
                   for (let i = 0; i < active_nam.length; i++) {
                       active_nam[i].style.display = "block";
                   }
                   for (let i = 0; i < active_nu.length; i++) {
                       active_nu[i].style.display = "none";
                   }
                   for (let i = 0; i < active_tre.length; i++) {
                       active_tre[i].style.display = "none";
                   }
               })
           }
           if (nu) {
               nu.addEventListener("click", function() {
                   for (let i = 0; i < active_nam.length; i++) {
                       active_nam[i].style.display = "none";
                   }
                   for (let i = 0; i < active_nu.length; i++) {
                       active_nu[i].style.display = "block";
                   }
                   for (let i = 0; i < active_tre.length; i++) {
                       active_tre[i].style.display = "none";
                   }
               })
           }
           if (tre) {
               tre.addEventListener("click", function() {
                   for (let i = 0; i < active_nam.length; i++) {
                       active_nam[i].style.display = "none";
                   }
                   for (let i = 0; i < active_nu.length; i++) {
                       active_nu[i].style.display = "none";
                   }
                   for (let i = 0; i < active_tre.length; i++) {
                       active_tre[i].style.display = "block";
                   }
               })
           }
       </script>
   </body>

   </html>
