<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::get();
        return view("admin.colors.list", ['title' => 'Danh sách màu sắc'], ['colors' => $colors ]);
    }

    public function create()
    {
        return view("admin.colors.add", ['title' => 'Thêm màu sắc mới']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $colors = new Color();
        $colors->name = $data['name'];
        $colors->save();
        return redirect()->back()->with('success', 'Thêm màu sắc thành công!');
    }

    public function destroy($id)
    {
        $color = Color::find($id);

        if ($color) {
            $color->delete();
            return redirect()->back()->with('success', 'Xóa màu thành công!');
        }

        return redirect()->back()->with('error', 'Xóa màu thất bại!');
    }
}
