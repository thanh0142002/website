<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::orderByDesc('created_at')->get();

        return view('admin.vouchers.list', [
            'title' => 'Shop quần áo',
            'vouchers' => $vouchers,
        ]);
    }

    public function updateActiveStatus()
    {
        $today = Carbon::today(); // Lấy ngày hôm nay

        // Cập nhật active = 0 cho các voucher hết hạn vào ngày hôm nay
        Voucher::whereDate('expiry_date', $today)->update(['active' => 0]);

        return response()->json(['message' => 'Updated successfully']);
    }


    public function create()
    {

        return view('admin.vouchers.add', [
            'title' => 'Thêm voucher mới',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'nullable',
            'sale_off' => 'required|numeric',
            'minimum' => 'nullable',
            'maximum' => 'nullable',
            'active' => 'required',
        ],[
            'sale_off.required' => 'Bạn muốn giảm bao nhiêu % ?',
        ]);

        $voucher = new Voucher();
        $voucher->content = $data['content'];
        $voucher->sale_off = $data['sale_off'];
        $voucher->minimum = $data['minimum'];
        $voucher->maximum = $data['maximum'];
        $voucher->active = $data['active'];
        $voucher->save();

        return redirect()->back()->with( 'success', 'Thêm voucher thành công');

    }
}
