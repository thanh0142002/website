@extends('admin.main')

@section('content')
    {{-- <form method="POST" enctype="multipart/form-data" action="{{ route('UploadProduct.post') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Sản phẩm</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="menu"
                    placeholder="">
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="">Danh Mục</label>
                    <select class="form-control" name="menu_id" value="{{ old('menu_id') }}">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Trang phục</label>
                    <select class="form-control" name="clothes_id" value="{{ old('clothes_id') }}">
                        @foreach ($clothes as $clothe)
                            <option value="{{ $clothe->id }}">{{ $clothe->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Màu</label>
                    <select class="form-control" name="color_id" value="{{ old('color_id') }}">
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row" style="align-items: center">
                <div class="col-md-6">
                    <div class="invisible-checkboxes">
                        <input type="checkbox" name="size_id[]" value="1" id="r1" />
                        <label class="checkbox-alias" for="r1">S</label>
                        <input type="checkbox" name="size_id[]" value="2" id="r2" />
                        <label class="checkbox-alias" for="r2">M</label>
                        <input type="checkbox" name="size_id[]" value="3" id="r3" />
                        <label class="checkbox-alias" for="r3">L</label>
                        <input type="checkbox" name="size_id[]" value="4" id="r4" />
                        <label class="checkbox-alias" for="r4">XL</label>
                        <input type="checkbox" name="size_id[]" value="5" id="r5" />
                        <label class="checkbox-alias" for="r5">XXL</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tồn Kho</label>
                        <input type="number" name="stock" value="{{ old('stock') }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="price_sale" value="{{ old('price_sale') }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Mô Tả</label>
                <textarea name="description" value="{{ old('description') }}" class="form-control" id=""></textarea>
            </div>

            <div class="form-group">
                <label for="">Mô Tả Chi Tiết</label>
                <textarea name="content" value="{{ old('content') }}" class="form-control" id=""></textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file" name="thumb" value="{{ old('thumb') }}" class="form-control" id="upload">
                <input type="file" name="img1" value="{{ old('img1') }}" class="form-control" id="upload">
                <input type="file" name="img2" value="{{ old('img2') }}" class="form-control" id="upload">
                <input type="file" name="img3" value="{{ old('img3') }}" class="form-control" id="upload">
            </div>

            <div class="form-group">
                <label for="">Kích Hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" id="active"
                        checked>
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
    </form> --}}

    <form method="POST" enctype="multipart/form-data" action="{{ route('UploadProduct.post') }}">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="menu">Mã Sản Phẩm</label>
                    <input type="number" name="id" value="{{ old('id') }}" class="form-control" id="menu"
                        placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="menu">Tên Sản phẩm</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="menu"
                        placeholder="">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="">Danh Mục</label>
                    <select class="form-control" name="menu_id">
                        <option value=""></option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Trang phục</label>
                    <select class="form-control" name="clothes_id">
                        <option value=""></option>
                        @foreach ($clothes as $clothe)
                            <option value="{{ $clothe->id }}">{{ $clothe->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Màu</label>
                    <select class="form-control" name="color_id">
                        <option value=""></option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row" style="align-items: center">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Size: S</label>
                        <input type="hidden" name="sizes[1]" value="1" id="r1" />
                        <input type="number" name="stocks[1]" value="{{ old('stocks.1') }}" class="form-control"
                            placeholder="Tồn kho">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Size: M</label>
                        <input type="hidden" name="sizes[2]" value="2" id="r2" />
                        <input type="number" name="stocks[2]" value="{{ old('stocks.2') }}" class="form-control"
                            placeholder="Tồn kho">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Size: L</label>
                        <input type="hidden" name="sizes[3]" value="3" id="r3" />
                        <input type="number" name="stocks[3]" value="{{ old('stocks.3') }}" class="form-control"
                            placeholder="Tồn kho">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Size: XL</label>
                        <input type="hidden" name="sizes[4]" value="4" id="r4" />
                        <input type="number" name="stocks[4]" value="{{ old('stocks.4') }}" class="form-control"
                            placeholder="Tồn kho">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Size: XXL</label>
                        <input type="hidden" name="sizes[5]" value="5" id="r5" />
                        <input type="number" name="stocks[5]" value="{{ old('stocks.5') }}" class="form-control"
                            placeholder="Tồn kho">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Giá Bán</label>
                        <input type="number" name="price_sale" value="{{ old('price_sale') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Sell Off (%)</label>
                        <input type="number" name="sale_off" value="{{ old('sale_off') }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Mô Tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Mô Tả Chi Tiết</label>
                <textarea name="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file" name="thumb" class="form-control" id="upload">
                <input type="file" name="img1" class="form-control" id="upload">
                <input type="file" name="img2" class="form-control" id="upload">
                <input type="file" name="img3" class="form-control" id="upload">
            </div>

            <div class="form-group">
                <label for="">Kích Hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" id="active"
                        checked>
                    <label class="form-check-label" for="active">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" id="no_active">
                    <label class="form-check-label" for="no_active">Không</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
