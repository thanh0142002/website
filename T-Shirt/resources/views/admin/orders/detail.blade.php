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
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Màu</th>
                                <th scope="col">Size</th>
                                <th scope="col">Giá nhập</th>
                                <th scope="col">Giá bán</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                {{-- <th scope="col">Thao Tác</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_items as $order_item)
                                <tr>
                                    <th>
                                        @if (isset($order_item->product_size->product->thumb))
                                            <img src="/upload/{{ $order_item->product_size->product->thumb }}" alt="ảnh"
                                                width="100px">
                                        @else
                                            sản phẩm đã bị xóa
                                        @endif
                                    </th>
                                    <td>{{ isset($order_item->product_size->product->name) ? $order_item->product_size->product->name : 'sản phẩm đã bị xóa' }}
                                    </td>
                                    <td>{{ isset($order_item->product_size->product->color->name) ? $order_item->product_size->product->color->name : 'sản phẩm đã bị xóa' }}
                                    </td>
                                    <td>{{ isset($order_item->product_size->size->name) ? $order_item->product_size->size->name : 'sản phẩm đã bị xóa' }}
                                    </td>
                                    <td>{{ number_format($order_item->price / $order_item->quantity, 0, ',', '.') }}đ</td>
                                    <td>{{ number_format($order_item->price_sale / $order_item->quantity, 0, ',', '.') }}đ</td>
                                    <td>{{ $order_item->quantity }}</td>
                                    <td>{{ number_format($order_item->price_sale, 0, ',', '.') }}đ</td>
                                    {{-- <td><i class="far fa-eye"></i> <i class="ti-trash"></i></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
