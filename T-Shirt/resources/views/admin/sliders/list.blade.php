@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="...">ID</th>
                <th>Tiêu Đề</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Trạng Thái</th>
                <th>Cập nhật</th>
                <th style="..."></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td width="100px">{{$slider->name}}</td>
                    <td width="100px">{{$slider->url}}</td>
                    <td><a href="/upload/{{$slider->thumb}}"><img src="/upload/{{$slider->thumb}}" alt="ảnh" width="100px"></a></td>
                    <td>{{($slider->active ? 'Yes' : 'No')}}</td>
                    <td>{{$slider->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{$slider->id}},'/admin/sliders/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
