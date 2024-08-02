<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::orderBy("id","desc")->paginate(10);   
        return view("admin.sliders.list", ["title" => "Danh sách tiêu đề"])->with(compact("sliders"));
    }

    public function create()
    {
        return view("admin.sliders.add", ['title' => 'Thêm tiêu đề mới']);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required",
                "url" => "nullable",
                "thumb" => "required",
                "sort_by" => "required|numeric",
                "active" => "required",

            ],
            [
                'name.required' => 'Vui lòng nhập tiêu đề',
                'thumb.required' => 'Vui lòng thêm ảnh',
                'sort_by.numeric' => 'Vui lòng nhập số',
                'active.numeric' => 'Vui lòng nhập số',
            ]
        );
        $slider = new Slider();
        $slider->name = $data['name'];
        $slider->url = $data['url'];
        $slider->sort_by = $data['sort_by'];
        $slider->active = $data['active'];
        $file = $request->file('thumb');
        $file->move('upload', $file->getClientOriginalName());
        $slider->thumb = $file->getClientOriginalName();
        $slider->save();
        return redirect()->back()->with( $request->session()->flash('success', 'Thêm tiêu đề thành công') );

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
