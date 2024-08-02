<?php $url = request()->url(); ?>

<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="/template/admin/assets/images/logo.jpg" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ strpos($url, '/admin/home') !== false ? 'active' : '' }}"><a href="/admin/home"><i
                                class="fas fa-home"></i><span>Trang Chủ</span></a></li>
                    <li class="{{ strpos($url, '/admin/menus') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="ti-dashboard"></i><span>Danh mục</span></a>
                        <ul class="collapse">
                            <li class="{{ strpos($url, '/admin/menus/add') !== false ? 'active' : '' }}"><a
                                    href="/admin/menus/add">Thêm danh mục</a></li>
                            <li class="{{ strpos($url, '/admin/menus/list') !== false ? 'active' : '' }}"><a
                                    href="/admin/menus/list">Danh sách danh mục</a></li>
                        </ul>
                    </li>
                    <li class="{{ strpos($url, '/admin/clothes') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="fas fa-tshirt"></i><span>Trang phục</span></a>
                        <ul class="collapse">
                            <li class="{{ strpos($url, '/admin/clothes/add') !== false ? 'active' : '' }}"><a
                                    href="/admin/clothes/add">Thêm trang phục</a></li>
                            <li class="{{ strpos($url, '/admin/clothes/list') !== false ? 'active' : '' }}"><a
                                    href="/admin/clothes/list">Danh sách trang phục</a></li>
                        </ul>
                    </li>
                    <li class="{{ strpos($url, '/admin/colors') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="fas fa-palette"></i><span>Màu sắc</span></a>
                        <ul class="collapse">
                            <li class="{{ strpos($url, '/admin/colors/add') !== false ? 'active' : '' }}"><a
                                    href="/admin/colors/add">Thêm màu sắc</a></li>
                            <li class="{{ strpos($url, '/admin/colors/list') !== false ? 'active' : '' }}"><a
                                    href="/admin/colors/list">Danh màu sắc</a></li>
                        </ul>
                    </li>
                    <li class="{{ strpos($url, '/admin/products') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="fa fa-product-hunt" aria-hidden="true"></i><span>Sản phẩm</span></a>
                        <ul class="collapse">
                            <li class="{{ strpos($url, '/admin/products/add') !== false ? 'active' : '' }}"><a
                                    href="/admin/products/add">Thêm sản phẩm</a></li>
                            <li class="{{ strpos($url, '/admin/products/list') !== false ? 'active' : '' }}"><a
                                    href="/admin/products/list">Danh sách sản phẩm</a></li>
                        </ul>
                    </li>
                    <li class="{{ strpos($url, '/admin/Slider') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="fas fa-sliders-h"></i><span>Slider</span></a>
                        <ul class="collapse">
                            <li class="{{ strpos($url, '/admin/Slider/add') !== false ? 'active' : '' }}"><a
                                    href="/admin/Slider/add">Thêm Slider</a></li>
                            <li class="{{ strpos($url, '/admin/Slider/list') !== false ? 'active' : '' }}"><a
                                    href="/admin/Slider/list">Danh sách Slider</a></li>
                        </ul>
                    </li>
                    <li class="{{ strpos($url, '/admin/vouchers') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="fas fa-receipt"></i><span>Phiếu Giảm Giá</span></a>
                        <ul class="collapse">
                            <li class="{{ strpos($url, '/admin/vouchers/add') !== false ? 'active' : '' }}"><a
                                    href="/admin/vouchers/add">Thêm phiếu giảm giá</a></li>
                            <li class="{{ strpos($url, '/admin/vouchers/list') !== false ? 'active' : '' }}"><a
                                    href="/admin/vouchers/list">Danh sách phiếu giảm giá</a></li>
                        </ul>
                    </li>
                    <li class="{{ strpos($url, '/admin/orders/list') !== false ? 'active' : '' }}"><a
                            href="/admin/orders/list"><i class="fas fa-shipping-fast"></i><span>Đơn hàng</span></a></li>
                    <li class="{{ strpos($url, '/admin/users/list') !== false ? 'active' : '' }}"><a
                            href="/admin/users/list"><i class="fas fa-user"></i><span>Người Dùng</span></a></li>
                    <li class="{{ strpos($url, '/admin/comments/list') !== false ? 'active' : '' }}"><a
                            href="/admin/comments/list"><i class="fas fa-comments"></i><span>Bình Luận</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
