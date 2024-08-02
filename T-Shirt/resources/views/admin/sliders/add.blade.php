@extends('admin.main')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('UploadSlider.post') }}">
        @csrf
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu Đề</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="menu">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường Dẫn</label>
                        <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file" name="thumb" value="{{ old('thumb') }}" class="form-control" id="upload">
            </div>

            <div class="form-group">
                <label for="menu">Sắp Xếp</label>
                <input type="number" name="sort_by" value="1" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Kích Hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" id="active" checked>
                    <label class="form-check-label" for="active">
                        Có
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" id="no_active">
                    <label class="form-check-label" for="no_active">
                        Không
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
