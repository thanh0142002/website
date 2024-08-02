<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clothes;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function index()
    {
        $clothes = Clothes::get();
        return view("admin.clothes.list", ['title' => 'Danh sách trang phục'], ['clothes' => $clothes ]);
    }

    public function create()
    {
        return view("admin.clothes.add", ['title' => 'Thêm trang phục mới']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $clothes = new Clothes();
        $clothes->name = $data['name'];
        $clothes->save();
        return redirect()->back()->with('success', 'Thêm trang phục thành công!');
    }

    public function destroy($id)
    {
        $clothes = Clothes::find($id);

        if ($clothes) {
            $clothes->delete();
            return redirect()->back()->with('success', 'Xóa trang phục thành công!');
        }

        return redirect()->back()->with('error', 'Xóa trang phục thất bại!');
    }
}
