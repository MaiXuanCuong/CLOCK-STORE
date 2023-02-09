<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OrdersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::select('id','name_customer','phone','total','created_at','updated_at')->get();
    }
    public function headings() :array {
    	return ["STT", "Tên Khách Hàng", "Số Điện Thoại", "Tổng Tiền","Ngày Đặt","Ngày Duyệt"];
    }
    public function exportOrder(){
        return Excel::download(new OrdersExport, 'Xuat_Don_Dat_Hang_'.date("d_m_Y").'.xlsx');
    }
}
