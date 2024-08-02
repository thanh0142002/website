@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="...">ID</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá gốc</th>
                <th>Giá bán</th>
                <th>Active</th>
                <th>Ngày Nhập</th>
                <th style="..."></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="/upload/{{ $product->thumb }}" alt="ảnh" width="100px"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->menu->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }}đ</td>
                    <td>{{ number_format($product->price_sale -= ($product->price_sale * $product->sale_off) / 100, 0, ',', '.') }}đ</td>
                    <td>{{ $product->active ? 'Yes' : 'No' }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a href="/admin/products/edit/{{ $product->id }}">
                            <i class="fas fa-edit" style="font-size: 20px"></i>
                        </a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('bạn chắc chắn muốn xóa sản phẩm này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; color: red; background-color: white; font-size: 20px" >
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
