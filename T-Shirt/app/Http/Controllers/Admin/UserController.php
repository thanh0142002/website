<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Lấy thông tin người dùng
        // $users = User::with(['customers.order'])->get();
        // return view('admin.users.list', [
        //     'title' => 'Người dùng',
        //     'users' => $users,
        // ]);

        // Lấy danh sách người dùng với thông tin khách hàng và đơn hàng của họ
        $users = User::with(['customers.order'])->get();

        // Tạo một mảng tạm thời để lưu trữ tổng giá bán của mỗi người dùng
        $usersWithTotalPriceSale = [];

        foreach ($users as $user) {
            $totalPriceSale = 0;

            foreach ($user->customers as $customer) {
                if ($customer->order && $customer->order->status == 1) {
                    $totalPriceSale += $customer->order->total_price_sale;
                }
            }

            // Lưu tổng giá bán vào mảng tạm thời
            $usersWithTotalPriceSale[] = [
                'user' => $user,
                'totalPriceSale' => $totalPriceSale,
            ];
        }

        // Sắp xếp mảng tạm thời theo tổng giá bán giảm dần
        usort($usersWithTotalPriceSale, function ($a, $b) {
            return $b['totalPriceSale'] - $a['totalPriceSale'];
        });

        // Trả về view với dữ liệu đã sắp xếp
        return view('admin.users.list', [
            'title' => 'Người dùng',
            'usersWithTotalPriceSale' => $usersWithTotalPriceSale,
        ]);
    }

    // public function show(){
    //     $user = User::
    // }


}
