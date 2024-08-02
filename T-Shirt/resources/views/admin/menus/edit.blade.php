@extends('admin.main')

@section('content')
    <form method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control" id="menu" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="">Danh Mục Cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : ''}}> Danh mục cha </option>
                    @foreach ($menus as $menuParent)
                        <option value="{{ $menuParent->id }}" {{ $menu->parent_id == $menuParent->id ? 'selected' : ''}} >
                            {{ $menuParent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Kích Hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" id="active" {{ $menu->active == 1 ? "checked" : "" }} >
                    <label class="form-check-label" for="active">
                        Có
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" id="no_active" {{ $menu->active == 0 ? "checked" : "" }}>
                    <label class="form-check-label" for="no_active">
                        Không
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection
