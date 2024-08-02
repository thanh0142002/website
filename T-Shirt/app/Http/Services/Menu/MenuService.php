<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuService{

    public function getParent(){
        return Menu::where("parent_id",0)->get();
    }

    public function getAll(){
        return Menu::orderByDesc("id")->paginate(10);
    }

    public function create($request){
        try{
            Menu::create([
                "name"=> (string) $request->input('name'),
                "parent_id"=> (int) $request->input('parent_id'),
                "active"=> (string) $request->input('active'),
                'slug'=> Str::slug($request->input('name'),'-') ,
            ]);
            $request->session()->flash('success', 'Tạo danh mục thành công');
        } catch(\Exception $e){
            $request->session()->flash('error', 'Danh mục đã tồn tại');
            return false;
        }
        return true;
    }
    public function update($request, $menu){
        if ($request->input('parent_id') != $menu->id){
            $menu->parent_id = (int) $request->input('parent_id');
        }
        $menu->name = (string) $request->input('name');
        $menu->active = (string) $request->input('active');
        $menu->save();

        $request->session()->flash('success','Cập nhật thành công!');
        return true;
    }
}