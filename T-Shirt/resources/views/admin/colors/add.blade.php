@extends('admin.main')

@section('content')

    <form method="POST">
    @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Màu</label>
                <input type="text" name="name" class="form-control" id="menu" placeholder="Tên Màu" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>

@endsection
