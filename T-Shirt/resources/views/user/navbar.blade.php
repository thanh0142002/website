<header>
    <img src="/template/admin/assets/images/logo.jpg" alt="">
    <div class="menu">
        <li>
            <a class="dropbtn" href="/"><i class="fas fa-home" style="font-size: 23px"></i></a>
        </li>
        @foreach ($menus as $key => $menu)
            @if ($menu->parent_id == 0)
                <li>
                    <div class="dropdown">
                        <a href="/user/cartegory/content/{{ $menu->id }}" class="dropbtn">{{ $menu->name }}</a>
                        <div class="dropdown-content">
                            @foreach ($menus as $subMenu)
                                @if ($subMenu->parent_id == $menu->id)
                                    <a href="#">{{ $subMenu->name }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </li>
            @endif
        @endforeach
    </div>
    <div class="other">
        <li><a class="fa fa-paw" href=""></a></li>
        <li><a class="fa fa-shopping-bag" href="{{ route('cart.content') }}"></a></li>
        <li>
            <div class="dropdown">
                @if (Auth::check())
                    <i class="fa fa-user" href=""> {{ Auth::user()->name }} </i>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="dropdown-content">
                            <a href="{{route('infor.content')}}">Thông tin cá nhân</a>
                            <button style="border: none; padding: 15px 0px 15px 16px" type="submit">Đăng xuất</button>
                        </div>
                    </form>
                @else
                    <i class="fa fa-user" href=""></i>
                    <div class="dropdown-content">
                        <a href="{{ route('login') }}">Đăng nhập</a>
                        <a href="{{ route('signup') }}">Đăng kí</a>
                    </div>
                @endif
            </div>
        </li>
    </div>
    </a>
    </li>
    </div>
</header>
