<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Services\Product\ProductUserService;
use Illuminate\Http\Request;

class MainUserController extends Controller
{

    protected $productUserService;
    
    public function __construct(ProductUserService $productUserService){
        $this->productUserService = $productUserService;
    }

    public function index()
    {
        $oneMonthAgo = Carbon::now()->subMonth();
        $products = Product::where("created_at", ">=", $oneMonthAgo)
                            ->orderByDesc('id')
                            ->limit(12)
                            ->get();
        return view("user.main",["title"=> "Shop quần áo"])->with(compact("products"));
        // return view("user.main",["title"=> "Shop quần áo", "products"=> $this->productUserService->get()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
