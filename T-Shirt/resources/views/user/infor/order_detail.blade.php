@include('user.head')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | Profile Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <style>
        body {
            background: #f5f5f5;
            margin-top: 20px;
        }

        .ui-w-80 {
            width: 80px !important;
            height: auto;
        }

        .btn-default {
            border-color: rgba(24, 28, 33, 0.1);
            background: rgba(0, 0, 0, 0);
            color: #4E5155;
        }

        label.btn {
            margin-bottom: 0;
        }

        .btn-outline-primary {
            border-color: #26B4FF;
            background: transparent;
            color: #26B4FF;
        }

        .btn {
            cursor: pointer;
        }

        .text-light {
            color: #babbbc !important;
        }

        .btn-facebook {
            border-color: rgba(0, 0, 0, 0);
            background: #3B5998;
            color: #fff;
        }

        .btn-instagram {
            border-color: rgba(0, 0, 0, 0);
            background: #000;
            color: #fff;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
        }

        .row-bordered {
            overflow: hidden;
        }

        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .account-settings-links .list-group-item.active {
            font-weight: bold !important;
        }

        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: transparent !important;
        }

        .account-settings-multiselect~.select2-container {
            width: 100% !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .material-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .material-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .dark-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }

        .dark-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4E5155 !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
    </style>

    @include('user.navbar')
    <div class="container light-style flex-grow-1 container-p-y" style="padding-top: 50px">
        <h4 class="font-weight-bold py-3 mb-4">
            Chi tiết đơn hàng
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="card">
                    <div class="card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-light">
                                        <tr class="text-white">
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Màu</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody style="align-items: center">
                                        @foreach ($order_items as $order_item)
                                            <tr style="align-items: center">
                                                <th style="align-items: center">
                                                    @if (isset($order_item->product_size->product->thumb))
                                                        <img src="/upload/{{ $order_item->product_size->product->thumb }}"
                                                            alt="ảnh" width="100px">
                                                    @else
                                                        sản phẩm đã bị xóa
                                                    @endif
                                                </th style="align-items: center">
                                                <td>{{ isset($order_item->product_size->product->name) ? $order_item->product_size->product->name : 'sản phẩm đã bị xóa' }}
                                                </td>
                                                <td>{{ isset($order_item->product_size->product->color->name) ? $order_item->product_size->product->color->name : 'sản phẩm đã bị xóa' }}
                                                </td>
                                                <td>{{ isset($order_item->product_size->size->name) ? $order_item->product_size->size->name : 'sản phẩm đã bị xóa' }}
                                                </td>
                                                <td>{{  number_format($order_item->price_sale / $order_item->quantity, 0, ',', '.') }}</td>
                                                <td>{{ $order_item->quantity }}</td>
                                                <td>{{ number_format($order_item->price_sale, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h5 class="font-weight-bold py-3 mb-4">
                            Thông tin khách hàng
                        </h5>
                        <div class="form-group row">
                            <div class="col-md-3" style="margin-bottom: 15px">
                                <label for="menu">Họ tên</label>
                                <input type="text" value="{{ $orders->customer->name }}" class="form-control"
                                    id="menu" placeholder="" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="menu">Số điện thoại</label>
                                <input type="number" value="0{{ $orders->customer->phone }}" class="form-control"
                                    id="menu" placeholder="" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="menu">Tỉnh/TP</label>
                                <input type="text" value="{{ $orders->customer->city }}" class="form-control"
                                    id="menu" placeholder="" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="menu">Quận/Huyện</label>
                                <input type="text" value="{{ $orders->customer->district }}" class="form-control"
                                    id="menu" placeholder="" disabled>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="menu">Địa chỉ</label>
                                <input type="text" value="{{ $orders->customer->address }}" class="form-control"
                                    id="menu" placeholder="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="menu">Ghi chú</label>
                                <input type="text" value="{{ $orders->customer->notes }}" class="form-control"
                                    id="menu" placeholder="" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>
@include('user.footer')

</html>
