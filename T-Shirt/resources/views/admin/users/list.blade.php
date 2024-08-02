@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Thead dark</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-light">
                            <tr class="text-white">
                                <th scope="col">ID</th>
                                <th scope="col">Tên TK</th>
                                <th scope="col">Phân quyền</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số tiền đã mua hàng</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @php
                                            $totalPrice_sale = 0;
                                            foreach ($user->customers as $customer) {
                                                if ($customer->order && $customer->order->status == 'đã hoàn thành') {
                                                    $totalPrice_sale += $customer->order->total_price_sale;
                                                }
                                            }
                                        @endphp
                                        {{ $totalPrice_sale }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/admin/orders/detail/{{ $user->id }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('bạn chắc chắn muốn xóa sản phẩm này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach --}}
                            @foreach ($usersWithTotalPriceSale as $item)
                                @php
                                    $user = $item['user'];
                                    $totalPrice_sale = $item['totalPriceSale'];
                                @endphp
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ ($user->role == 0) ? "quản trị viên" : "người dùng"}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ number_format($totalPrice_sale, 0, ',', '.') }}đ</td>
                                    <td>
                                        <a href="/admin/users/edit/{{ $user->id }}"> <i class="far fa-eye"
                                                style="font-size: 20px"></i></a>
                                        <form action="{{-- {{ route('users.destroy', $user->id) }} --}}" method="POST"
                                            onsubmit="return confirm('bạn chắc chắn muốn xóa sản phẩm này?');">
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
