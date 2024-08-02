@extends('admin.main')

@section('content')
    <style>
        :root {
            --arrow-bg: rgba(0, 0, 0, 0.2);
            --arrow-icon: url(https://upload.wikimedia.org/wikipedia/commons/9/9d/Caret_down_font_awesome_whitevariation.svg);
            --option-bg: white;
            --select-bg: rgba(0, 0, 0, 0);
        }

        * {
            box-sizing: border-box;
        }

        /* <select> styles */
        select {
            /* Reset */
            appearance: none;
            border: 0;
            outline: 0;
            font: inherit;
            /* Personalize */
            width: 10rem;
            padding: 5px;
            background: var(--arrow-icon) no-repeat right 0.8em center / 1.4em,
                linear-gradient(to left, var(--arrow-bg) 3em, var(--select-bg) 3em);
            color: black;
            border-radius: 0.25em;
            border: 1px solid rgba(0, 0, 0);
            cursor: pointer;

            /* Remove IE arrow */
            &::-ms-expand {
                display: none;
            }

            /* Remove focus outline */
            &:focus {
                outline: none;
            }

            /* <option> colors */
            option {
                color: inherit;
                background-color: var(--option-bg);
            }
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-light">
                            <tr class="text-white">
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Phí ship</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Thanh Toán</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->customer->user->email }}</td>
                                    <td>{{ $order->total_quantity }}</td>
                                    <td>{{ $order->total_price_sale < 2000000 ? '25.000đ' : 'free' }}</td>
                                    <td>{{ number_format($order->total_price_sale, 0, ',', '.') }}đ </td>
                                    @if ($order->payment == 'Đã thanh toán')
                                        <td style="color: green">{{ $order->payment }}</td>
                                    @else
                                        <td>{{ $order->payment }}</td>
                                    @endif
                                    <td>
                                        {{-- @if ($order->status != 1)
                                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST"
                                                onsubmit="return confirm('bạn có chắc chắn đơn hàng này đã hoàn thành?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning">Chờ xử lý</button>
                                            </form>
                                        @else
                                            <span class="badge badge-success">Đã hoàn thành</span>
                                        @endif --}}
                                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng không?');">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" <?php if ($order->status == 0): ?>
                                                style='color: orange;' <?php elseif ($order->status == 1): ?> style='color: blue;'
                                                <?php elseif ($order->status == 2): ?> style='color: green;' <?php elseif ($order->status == 3): ?>
                                                style='color: red;' <?php endif; ?>>
                                                <option style="color: orange" value="0"
                                                    {{ $order->status == 0 ? 'selected' : '' }}>Chờ Xử Lý</option>
                                                <option style="color: blue" value="1"
                                                    {{ $order->status == 1 ? 'selected' : '' }}>Đang Giao Hàng</option>
                                                <option style="color: green" value="2"
                                                    {{ $order->status == 2 ? 'selected' : '' }}>Đã Hoàn Thành</option>
                                                <option style="color: red" value="3"
                                                    {{ $order->status == 3 ? 'selected' : '' }}>Đã Hủy</option>
                                            </select>
                                        </form>

                                    </td>
                                    <td>
                                        <a href="/admin/orders/detail/{{ $order->id }}"> <i class="far fa-eye"
                                                style="font-size: 20px"></i></a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                            onsubmit="return confirm('bạn có chắc chắn muốn xóa sản phẩm này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="border: none; color: red; background-color: white; font-size: 20px">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
