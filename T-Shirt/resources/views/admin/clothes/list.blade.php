@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-light">
                            <tr class="text-white">
                                <th scope="col">ID trang phục</th>
                                <th scope="col">Tên trang phục</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clothes as $clothe)
                                <tr>
                                    <th scope="row">{{ $clothe->id }}</th>
                                    <td>{{ $clothe->name }}</td>
                                    <td style="display: flex; justify-content: center; align-items: center">
                                        <form style="max-width: 0%;" action="{{ route('clothes.destroy', $clothe->id) }}" method="POST"
                                            onsubmit="return confirm('bạn chắc chắn muốn xóa trang phục này?');">
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
