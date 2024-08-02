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
                                <th scope="col">Mã bình luận</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Mã người dùng</th>
                                <th scope="col">Đánh giá</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Thời gian đánh giá</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <th scope="row">{{ $comment->id }}</th>
                                    <td><img src="/upload/{{ $comment->product->thumb }}" alt="ảnh" width="100px"></td>
                                    <td>{{ $comment->user_id }}</td>
                                    <td>{{ $comment->rate }} sao</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->created_at }} </td>
                                    <td>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
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
