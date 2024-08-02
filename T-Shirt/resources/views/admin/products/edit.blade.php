@extends('admin.main')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Sản phẩm</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="menu"
                    placeholder="">
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="">Danh Mục</label>
                    <select class="form-control" name="menu_id">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{$product->menu_id == $menu->id ? 'selected' : ''}}>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Trang phục</label>
                    <select class="form-control" name="clothes_id">
                        @foreach ($clothes as $clothe)
                            <option value="{{ $clothe->id }}" {{$product->clothes_id == $clothe->id ? 'selected' : ''}}>{{ $clothe->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Màu</label>
                    <select class="form-control" name="color_id">
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}" {{$product->color_id == $color->id ? 'selected' : ''}}>{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row" style="align-items: center">
                @foreach ($product_sizes as $product_size)
                    @if ($product_size->product_id == $product->id)
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="menu">Size: {{ $product_size->size->name }}</label>
                                <input type="hidden" name="sizes[{{ $product_size->size_id }}]"
                                    value="{{ $product_size->size_id }}" id="r1" />
                                <input type="number" name="stocks[{{ $product_size->size_id }}]"
                                    value="{{ $product_size->stock }}" class="form-control" placeholder="Tồn kho">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Giá Bán</label>
                        <input type="number" name="price_sale" value="{{ $product->price_sale }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Sell Off (%)</label>
                        <input type="number" name="sale_off" value="{{ $product->sale_off }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Mô Tả</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Mô Tả Chi Tiết</label>
                <textarea name="content" class="form-control">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file" name="thumb" class="form-control" id="upload">
                <img src="/upload/{{ $product->thumb }}" alt="ảnh" width="100px">
                <input type="file" name="img1" class="form-control" id="upload">
                <img src="/upload/{{ $product->img1 }}" alt="ảnh" width="100px">
                <input type="file" name="img2" class="form-control" id="upload">
                <input type="file" name="img3" class="form-control" id="upload">
            </div>

            <div class="form-group">
                <label for="">Kích Hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" id="active" checked>
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
