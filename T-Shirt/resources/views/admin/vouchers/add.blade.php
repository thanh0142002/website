@extends('admin.main')
<link href="https://kendo.cdn.telerik.com/themes/8.0.1/default/default-main.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('vouchers.post') }}">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Nội dung mã giảm giá</label>
                <input type="text" name="content" value="{{ old('content') }}" class="form-control">
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Giảm %</label>
                        <input type="number" name="sale_off" value="{{ old('sale_off') }}" class="form-control"
                            id="menu">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Đơn tối thiểu</label>
                        <input type="number" name="minimum" value="{{ old('minimum') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Giảm tối đa</label>
                        <input type="number" name="maximum" value="{{ old('maximum') }}" class="form-control">
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="k-d-flex k-justify-content-center" style="padding-top: 54px;">
                        <div class="k-w-300">
                            <label for="datetimepicker">Select Date/Time:</label>
                            <input id="datetimepicker" title="datetimepicker" />
                            </br>
                            </br>
                            <label for="dropDownList">Set component type</label>
                            <input id="dropDownList" />
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Ngày </label>
                        <input type="text" name="content" value="{{ old('content') }}" class="form-control" id="menu">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">CÓ hiệu lực</label>
                        <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                    </div>
                </div>
            </div> --}}

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
    <script>
        $(document).ready(function() {
            $("#datetimepicker").kendoDateTimePicker({
                componentType: "modern",
                value: new Date()
            });

            $("#dropDownList").kendoDropDownList({
                dataSource: ["modern", "classic"],
                value: "modern",
                change: function(e) {
                    var picker = $("#datetimepicker").data("kendoDateTimePicker");
                    var type = this.value();
                    var value = picker.value();
                    var parent = $("#datetimepicker").parent();

                    picker.destroy();
                    parent.empty();
                    parent.append(
                        '<input id="datetimepicker" title="datetimepicker" style="width: 100%;" />')

                    $("#datetimepicker").kendoDateTimePicker({
                        componentType: type,
                        value: value
                    });
                }
            });
        });
    </script>
@endsection
