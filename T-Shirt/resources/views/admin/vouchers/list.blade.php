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
                                <th scope="col">ID Voucher</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Giảm %</th>
                                <th scope="col">Đơn tối thiểu</th>
                                <th scope="col">Giảm tối đa</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Hiệu lực còn lại</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <th scope="row">{{ $voucher->id }}</th>
                                    <td>{{ $voucher->content }}</td>
                                    <td>{{ $voucher->sale_off }}</td>
                                    <td>{{ number_format($voucher->minimum, 0, ',', '.') }}đ</td>
                                    <td>{{ number_format($voucher->maximum, 0, ',', '.') }}đ</td>
                                    <td>{{ $voucher->created_at }}</td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <a href="/admin/vouchers/detail/{{ $voucher->id }}"> <i class="far fa-eye"
                                                style="font-size: 20px"></i></a>
                                        <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST"
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
