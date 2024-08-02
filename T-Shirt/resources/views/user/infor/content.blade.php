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
            Thông tin cá nhân
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                @include('admin.alert')
                <div class="col-md-2 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Cài đặt chung</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Thay đổi mật khẩu</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-delivery-success">Đơn hàng của bạn</a>
                        {{-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-delivery-wait">Đang chờ giao hàng</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a> --}}
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general"
                            style="background: white !important">
                            {{-- <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn main-btn2">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <form action="{{ route('infor.post') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Họ và tên</label>
                                        <input type="text" name="name" class="form-control mb-1"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" name="email" class="form-control mb-1"
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn main-btn">Save changes</button>&nbsp;
                                        <button type="button" class="btn main-btn2">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password" style="background: white !important">
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="current_password">Mật khẩu hiện tại</label>
                                        <input id="current_password" type="password" name="current_password" required
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Mật khẩu mới</label>
                                        <input id="password" type="password" name="password" required
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">Xác nhận mật khẩu
                                            mới</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            required class="form-control">
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn main-btn">Save changes</button>&nbsp;
                                        <button type="button" class="btn main-btn2">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-delivery-success" style="background: white !important">
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center">
                                                    <thead class="text-uppercase bg-light">
                                                        <tr class="text-white">
                                                            <th scope="col">Mã đơn hàng</th>
                                                            <th scope="col">Số Lượng</th>
                                                            <th scope="col">Phí ship</th>
                                                            <th scope="col">Tổng Tiền</th>
                                                            <th scope="col">Trạng Thái</th>
                                                            <th scope="col">Ngày Đặt Hàng</th>
                                                            <th scope="col">Thao Tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($customers as $customer)
                                                            @foreach ($orders as $order)
                                                                @if ($customer->id == $order->customer_id)
                                                                    <tr>
                                                                        <th scope="row">{{ $order->id }}</th>
                                                                        <td>{{ $order->total_quantity }}</td>
                                                                        <td>{{ $order->total_price_sale < 2000000 ? '25.000đ' : 'free' }}
                                                                        </td>
                                                                        <td>{{ number_format($order->total_price_sale, 0, ',', '.') }}VNĐ
                                                                        </td>
                                                                        <td>
                                                                            @if ($order->status == 0)
                                                                                <span class="badge badge-pill badge-warning">Đang xử lý</span>
                                                                            @elseif ($order->status == 1)
                                                                                <span class="badge badge-pill badge-primary">Đang giao hàng</span>
                                                                            @elseif ($order->status == 2)
                                                                                <span class="badge badge-pill badge-success">Đã hoàn thành</span>
                                                                            @elseif ($order->status == 3)
                                                                                <span class="badge badge-pill badge-danger">Đã hủy</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $order->created_at }}</td>
                                                                        <td>
                                                                            <a style="width: px;"
                                                                                href="/user/infor/detail/{{ $order->id }}">
                                                                                <button type="button"
                                                                                    class="main-btn2">
                                                                                    Chi tiết
                                                                                </button>
                                                                            </a>
                                                                            @if ($order->status == 0)
                                                                                <form action="{{ route('order.cancel', $order->id) }}" method="POST"
                                                                                    onsubmit="return confirm('bạn chắc chắn muốn hủy đơn hàng này?');">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                    <button style="margin-top: 5px; padding: 1px 17px"
                                                                                    type="submit" class="btn btn-outline-danger">Hủy</button>
                                                                                </form>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="account-delivery-wait" style="background: white !important">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Google+</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control"
                                        value="https://www.instagram.com/user">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="card-body">
                                <button type="button" class="btn btn-twitter">Connect to
                                    <strong>Twitter</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                            class="ion ion-md-close"></i> Remove</a>
                                    <i class="ion ion-logo-google text-google"></i>
                                    You are connected to Google:
                                </h5>
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="f9979498818e9c9595b994989095d79a9694">[email&#160;protected]</a>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-facebook">Connect to
                                    <strong>Facebook</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-instagram">Connect to
                                    <strong>Instagram</strong></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my
                                            article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div>
                        </div> --}}
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
