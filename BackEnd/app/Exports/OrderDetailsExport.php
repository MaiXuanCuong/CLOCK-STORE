<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OrderDetailsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */  
    public function __construct(int $id = 1) {
    	$this->id = $id;
    }
    public function exportOrderDetail($id){
        $order = Order::findOrFail($id);
        return Excel::download(new OrderDetailsExport($id), 'KH_'.$order->name_customer.'_'.date("d_m_Y").'.xlsx');
    }
    public function headings() :array {
    	return ["STT", "Tên Khách Hàng", "Số Điện Thoại","Tên Sản Phẩm","Giá Sản Phẩm","Số Lượng", "Tổng Tiền"];
    }
    public function collection()
    {   
        return OrderDetail::join('orders','orders.id','order_details.order_id')
        ->join('products','products.id','order_details.product_id')
        ->select('order_details.id','orders.name_customer','orders.phone','products.name','products.price','order_details.quantity','order_details.total')
        ->where('order_details.order_id',$this->id)->get();
    }
}
