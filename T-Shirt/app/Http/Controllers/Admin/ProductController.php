<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductAdminService;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Models\Clothes;
use App\Models\Product_size;
use App\Models\Size;
use App\Models\Color;
use App\Models\Menu;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productAdminService;

    public function __construct(ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function index()
    {
        $products = Product::with('menu')->orderByDesc("id")->paginate(10);
        $product_sizes = Product_size::get();
        return view(
            "admin.products.list",
            [
                "title" => "Danh sách sản phẩm",
                'products' => $products,
                'product_sizes' => $product_sizes,
            ]
        );
    }

    public function create()
    {
        return view(
            "admin.products.add",
            [
                'title' => 'Thêm sản phẩm mới',
                'menus' => $this->productAdminService->getMenu(),
                'colors' => $this->productAdminService->getColor(),
                'clothes' => $this->productAdminService->getClothes(),
                'sizes' => $this->productAdminService->getsize(),
            ]
        );
    }


    // public function store(Request $request)
    // {
    //     $data = $request->validate(
    //         [
    //             "name" => "required",
    //             "menu_id" => "required",
    //             "clothes_id" => "required",
    //             "color_id" => "required",
    //             "size_id" => "required|array",
    //             'size_id.*' => 'integer|exists:sizes,id', // Kiểm tra từng phần tử của mảng
    //             "stock" => "required",
    //             "price" => "required|numeric",
    //             "price_sale" => "nullable|numeric",
    //             "description" => "required",
    //             "content" => "required",
    //             "active" => "required",
    //             "thumb" => "required",
    //             "img1" => "required|max:2048",
    //             "img2" => "nullable|max:2048",
    //             "img3" => "nullable|max:2048",
    //         ],
    //         [
    //             'name.required' => 'Vui lòng nhập tên danh mục',
    //             'stock.required' => 'Vui lòng nhập tồn kho sản phẩm',
    //             'price.required' => 'Vui lòng nhập giá tiền',
    //             'thumb.required' => 'Phải có ít nhất 2 ảnh',
    //             'img1.required' => 'Phải có ít nhất 2 ảnh',
    //         ]
    //     );
    //     $product = new Product();
    //     $product->name = $data['name'];
    //     $product->menu_id = $data['menu_id'];
    //     $product->clothes_id = $data['clothes_id'];
    //     $product->color_id = $data['color_id'];
    //     $product->size_id = $data['size_id'];
    //     $product->stock = $data['stock'];
    //     $product->price = $data['price'];
    //     $product->price_sale = $data['price_sale'];
    //     $product->description = $data['description'];
    //     $product->content = $data['content'];
    //     $product->active = $data['active'];

    //     $file = $request->file('thumb');
    //     $file->move('upload', $file->getClientOriginalName());
    //     $product->thumb = $file->getClientOriginalName();

    //     $imgFields = ['img1','img2','img3'];
    //     foreach ($imgFields as $field) {
    //         if($request->hasFile($field)) {
    //             $img = $request->file($field);
    //             $img->move('upload', $img->getClientOriginalName());
    //             $product->$field = $img->getClientOriginalName();
    //         }
    //     }


    //     $product->save();
    //     return redirect()->back()->with($request->session()->flash('success', 'Thêm sản phẩm thành công'));
    // }


    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "id" => "required|unique:products|max:10",
                "name" => "required",
                "menu_id" => "required",
                "clothes_id" => "required",
                "color_id" => "required",
                'sizes' => 'required|array',
                'sizes.*' => 'integer|exists:sizes,id',
                'stocks' => 'required|array',
                "price" => "required|numeric",
                "price_sale" => "nullable|numeric",
                "sale_off" => "nullable|numeric",
                "description" => "required",
                "content" => "required",
                "active" => "required",
                "thumb" => "required",
                "img1" => "required|max:2048",
                "img2" => "nullable|max:2048",
                "img3" => "nullable|max:2048",
            ],
            [
                'id.unique' => 'Mã sản phẩm đã tồn tại',
                'id.required' => 'Vui lòng nhập mã sản phẩm',
                'id.max' => 'Mã sản phẩm chỉ có 10 số',
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'menu_id.required' => 'Vui lòng nhập tên danh mục',
                'clothes_id.required' => 'Vui lòng nhập trang phục',
                'color_id.required' => 'Vui lòng nhập màu sắc',
                'stocks.required' => 'Vui lòng nhập số lượng tồn kho cho từng kích cỡ',
                'price.required' => 'Vui lòng nhập giá tiền',
                'price_sale.required' => 'Vui lòng nhập giá bán',
                'thumb.required' => 'Phải có ít nhất 2 ảnh',
                'img1.required' => 'Phải có ít nhất 2 ảnh',
            ]
        );
        $product = new Product();
        $product->id = $data['id'];
        $product->name = $data['name'];
        $product->menu_id = $data['menu_id'];
        $product->clothes_id = $data['clothes_id'];
        $product->color_id = $data['color_id'];
        $product->price = $data['price'];
        $product->price_sale = $data['price_sale'];
        $product->sale_off = $data['sale_off'];
        $product->description = $data['description'];
        $product->content = $data['content'];
        $product->active = $data['active'];

        $file = $request->file('thumb');
        $file->move('upload', $file->getClientOriginalName());
        $product->thumb = $file->getClientOriginalName();

        $imgFields = ['img1', 'img2', 'img3'];
        foreach ($imgFields as $field) {
            if ($request->hasFile($field)) {
                $img = $request->file($field);
                $img->move('upload', $img->getClientOriginalName());
                $product->$field = $img->getClientOriginalName();
            }
        }

        $product->save();
        // nếu muốn ko để null thì dùng code này
        // foreach ($data['sizes'] as $size_id => $size_value) {
        //     if (isset($data['stocks'][$size_id])) {
        //         $product->sizes()->attach($size_id, [
        //             'stock' => $data['stocks'][$size_id],
        //         ]);
        //     }
        // }
        $sizes = $data['sizes'];
        if (isset($data['sizes'])) {
            foreach ($sizes as $size_id) {
                $product->sizes()->attach($size_id, [
                    'product_id' => $data['id'],
                    'stock' => $data['stocks'][$size_id],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Tạo sản phẩm thành công!');
    }

    public function show(Product $product)
    {
        $product_sizes = Product_size::get();
        return view('admin.products.edit', [
            'title' => 'chỉnh sửa sản phẩm',
            'product' => $product,
            'menus' => $this->productAdminService->getMenu(),
            'colors' => $this->productAdminService->getColor(),
            'clothes' => $this->productAdminService->getClothes(),
            'sizes' => $this->productAdminService->getsize(),
            'product_sizes' => $product_sizes,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required",
            "menu_id" => "required",
            "clothes_id" => "required",
            "color_id" => "required",
            'sizes' => 'required|array',
            'sizes.*' => 'integer|exists:sizes,id',
            'stocks' => 'required|array',
            "price" => "required|numeric",
            "price_sale" => "required|numeric",
            "sale_off" => "nullable|numeric",
            "description" => "required",
            "content" => "required",
            "active" => "required",
            'thumb' => 'nullable',
            'img1' => 'nullable',
            "img2" => "nullable|max:2048",
            "img3" => "nullable|max:2048",
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->menu_id = $request->menu_id;
        $product->clothes_id = $request->clothes_id;
        $product->color_id = $request->color_id;
        $product->price = $request->price;
        $product->price_sale = $request->price_sale;
        $product->sale_off = $request->sale_off;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->active = $request->active;

        $file = $request->file('thumb');
        if ($request->hasFile($file)) {
            $file->move('upload', $file->getClientOriginalName());
            $product->thumb = $file->getClientOriginalName();
        }

        $imgFields = ['img1', 'img2', 'img3'];
        foreach ($imgFields as $field) {
            if ($request->hasFile($field)) {
                $img = $request->file($field);
                $img->move('upload', $img->getClientOriginalName());
                $product->$field = $img->getClientOriginalName();
            }
        }
        $product->save();

        $sizes = $request->sizes;
        foreach ($sizes as $size_id) {
            if (isset($request->stocks[$size_id])) {
                $product->sizes()->syncWithoutDetaching([$size_id => ['stock' => $request->stocks[$size_id]]]);
            }
        }
        return redirect()->route('product.list')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'Xóa sản phẩm thành công!');
        }

        return redirect()->back()->with('error', 'Xóa sản phẩm thất bại!');
    }
}
